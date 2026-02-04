@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách sản phẩm</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        ➕ Thêm sản phẩm
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th width="180">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        {{ $product->status ? 'Hiển thị' : 'Ẩn' }}
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                            ✏️ Sửa
                        </a>

                        <form action="{{ route('products.destroy', $product) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Xóa sản phẩm này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️ Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Chưa có sản phẩm</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
