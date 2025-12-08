<?php 

namespace App\Http\Controllers; 

use App\Models\Post; 
use App\Models\Category; 
use Illuminate\Support\Str; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; // Wajib Import Storage
use Illuminate\Support\Facades\Validator; 

class DashboardPostController extends Controller 
{ 
    public function index() 
    { 
        $posts = Post::where('user_id', Auth::user()->id); 
        if (request('search')) { 
            $posts->where('title', 'like', '%' . request('search') . '%' ); 
        } 
        return view('dashboard.index', ['posts' => $posts->paginate(10)->withQueryString()]); 
    } 

    public function create() 
    { 
        $categories = Category::all(); 
        return view('dashboard.create', compact('categories')); 
    } 

    public function store(Request $request) 
    { 
        $slug = Str::slug($request->title); 
        $originalSlug = $slug; 
        $count = 1; 
        while (Post::where('slug', $slug)->exists()) { 
            $slug = $originalSlug . '-' . $count; 
            $count++; 
        } 
        
        $imagePath = null; 
        if ($request->hasFile('image')) { 
            $imagePath = $request->file('image')->store('post-images', 'public'); 
        } 

        $validator = Validator::make($request->all(), [ 
            'title' => 'required|max:255', 
            'category_id' => 'required|exists:categories,id', 
            'excerpt' => 'required', 
            'body' => 'required', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]); 

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput(); 
        } 

        Post::create([ 
            'title'=> $request->title, 
            'slug'=> $slug, 
            'category_id'=> $request->category_id, 
            'excerpt'=> $request->excerpt, 
            'body'=> $request->body, 
            'image'=> $imagePath, 
            'user_id'=> Auth::user()->id, 
        ]); 
        return redirect()->route('dashboard.index')->with('success','Post Created Successfully'); 
    } 

    public function show(Post $post) 
    { 
        return view('dashboard.show', ['post' => $post]); 
    } 

    // --- TUGAS 2: UPDATE ---
    public function edit(Post $post) 
    { 
        if($post->user_id !== Auth::id()) { abort(403); }

        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    } 

    public function update(Request $request, Post $post) 
    { 
        if($post->user_id !== Auth::id()) { abort(403); }

        $rules = [ 
            'title' => 'required|max:255', 
            'category_id' => 'required|exists:categories,id', 
            'excerpt' => 'required', 
            'body' => 'required', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput(); 
        } 

        // Logic Slug Update
        $slug = $post->slug;
        if($request->title != $post->title) {
            $slug = Str::slug($request->title); 
            $originalSlug = $slug; 
            $count = 1; 
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) { 
                $slug = $originalSlug . '-' . $count; 
                $count++; 
            }
        }

        // Logic Image Update
        $imagePath = $post->image;
        if ($request->hasFile('image')) { 
            if($post->image) { Storage::delete($post->image); }
            $imagePath = $request->file('image')->store('post-images', 'public'); 
        } 

        Post::where('id', $post->id)->update([
            'title'       => $request->title,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'excerpt'     => $request->excerpt,
            'body'        => $request->body,
            'image'       => $imagePath
        ]);

        return redirect()->route('dashboard.index')->with('success','Post Updated Successfully'); 
    } 

    // --- TUGAS 3: DELETE ---
    public function destroy(Post $post) 
    { 
        if($post->user_id !== Auth::id()) { abort(403); }

        if($post->image) { Storage::delete($post->image); }
        Post::destroy($post->id);

        return redirect()->route('dashboard.index')->with('success', 'Post has been deleted!');
    } 
}