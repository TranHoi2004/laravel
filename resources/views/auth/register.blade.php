<h2>ĐĂNG KÝ</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $err)
            <li style="color:red">{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Tên"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Mật khẩu"><br><br>
    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu"><br><br>

    <button type="submit">Đăng ký</button>
</form>

<a href="/login">Đã có tài khoản? Đăng nhập</a>
