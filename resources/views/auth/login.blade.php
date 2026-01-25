<h2>ĐĂNG NHẬP</h2>

@if (session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
    @csrf

    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Mật khẩu"><br><br>

    <button type="submit">Đăng nhập</button>
</form>

<a href="/register">Chưa có tài khoản? Đăng ký</a>
