<!DOCTYPE html>
<html>
<head>
    <title>Nhập tuổi</title>
</head>
<body>
    <h2>Nhập tuổi của bạn</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/age">
        @csrf
        <input type="number" name="age" placeholder="Nhập tuổi">
        <button type="submit">Gửi</button>
    </form>
</body>
</html>
