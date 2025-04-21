@extends('layouts.AdminLayout')

@section('content')
<h1 class="mb-4">Thùng rác danh mục</h1>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <!-- Khôi phục -->
                <form action="{{ route('admin.categories.restore', $category->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm">Khôi phục</button>
                </form>

                <!-- Xóa vĩnh viễn -->
                <form action="{{ route('admin.categories.force-delete', $category->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Xóa vĩnh viễn?')" class="btn btn-danger btn-sm">Xóa vĩnh viễn</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    {{ $categories->links('pagination::bootstrap-5') }}
</div>
<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mb-3">⬅ Về danh sách</a>
@endsection
