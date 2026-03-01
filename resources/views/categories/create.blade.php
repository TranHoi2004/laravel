@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Danh sách danh mục</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        Thêm danh mục
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Danh mục cha</th>
                <th>Trạng thái</th>
                <th width="200">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->parent?->name }}</td>
                    <td>{{ $cat->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection