<h1>Danh sách sản phẩm</h1>

<a href="{{ route('product.add') }}"> Thêm sản phẩm</a>

<ul>
@foreach($products as $p)
    <li>
        {{ $p['name'] }} - {{ $p['price'] }} $
    </li>
@endforeach
</ul>
