<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 40px; }
        .container { width: 400px; margin: auto; background: white; padding: 25px; border-radius: 8px; }
        input, button {
            width: 100%; padding: 10px; margin-top: 10px;
            border-radius: 5px; border: 1px solid #ccc;
        }
        button { background: #2196F3; color: white; border: none; cursor: pointer; }
        button:hover { background: #1976D2; }
        .error { color: red; }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <form action="/register" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>Password:</label>
        <input type="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>

</div>

</body>
</html>
