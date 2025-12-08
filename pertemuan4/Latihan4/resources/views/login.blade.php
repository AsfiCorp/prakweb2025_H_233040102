<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 40px; }
        .container { width: 350px; margin: auto; background: white; padding: 25px; border-radius: 8px; }
        input, button {
            width: 100%; padding: 10px; margin-top: 10px;
            border-radius: 5px; border: 1px solid #ccc;
        }
        button { background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
        .error { color: red; margin-top: 5px; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" required>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Password:</label>
        <input type="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">Login</button>
    </form>

    <p style="margin-top: 10px;">
        Belum punya akun? <a href="/register">Register</a>
    </p>
</div>

</body>
</html>
