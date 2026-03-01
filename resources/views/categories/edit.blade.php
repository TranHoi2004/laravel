@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Sửa danh mục</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tên danh mục</label>
            <input type="text" name="name"
                   value="{{ $category->name }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">
                {{ $category->description }}
            </textarea>
        </div>

        <div class="mb-3">
            <label>Danh mục cha</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Không có --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>
                <input type="checkbox" name="is_active" value="1"
                    {{ $category->is_active ? 'checked' : '' }}>
                Active
            </label>
        </div>

        <button class="btn btn-success">Cập nhật</button>
    </form>

</div>
@endsection