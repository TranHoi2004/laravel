<h1>Xin chào {{ auth()->user()->name }}</h1>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Đăng xuất</button>
</form>
