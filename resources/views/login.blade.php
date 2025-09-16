<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="/login">
        @csrf
        <label for="nis">NIS:</label>
        <input type="text" name="nis" required>
        <button type="submit">Login</button>
    </form>
    @if ($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif
</body>
</html>
