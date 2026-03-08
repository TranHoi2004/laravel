<h2>Danh sách danh mục</h2>

<a href="{{ route('categories.create') }}">Thêm mới</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Danh mục cha</th>
        <th>Active</th>
        <th>Action</th>
    </tr>

@foreach($categories as $cat)
<tr>
    <td>{{ $cat->id }}</td>

    <td>{{ $cat->name }}</td>

    <td>
        {{ $cat->parent ? $cat->parent->name : '---' }}
    </td>

    <td>
        {{ $cat->is_active ? 'Yes' : 'No' }}
    </td>

    <td>

        <a href="{{ route('categories.edit',$cat->id) }}">
            Edit
        </a>

        <form action="{{ route('categories.destroy',$cat->id) }}" 
              method="POST" 
              style="display:inline">

            @csrf
            @method('DELETE')

            <button type="submit"
            onclick="return confirm('Bạn có chắc muốn xóa?')">

            Delete

            </button>

        </form>

    </td>

</tr>
@endforeach

</table>