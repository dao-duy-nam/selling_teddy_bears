@extends('layouts.AdminLayout')

@section('content')
<h1 class="mb-4">Danh sách sản phẩm</h1>

<div class="mb-3">
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Thêm sản phẩm</a>
    <a href="{{ route('admin.products.trash') }}" class="btn btn-secondary">🗑 Xem thùng rác</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>
                @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="60">
                @endif            
            </td>
            <td>{{ $product->category->name ?? 'Chưa phân loại' }}</td>
            <td>{{ number_format($product->price) }} đ</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection
