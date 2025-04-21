@extends('layouts.AdminLayout')

@section('content')
<h1 class="mb-4">Thùng rác sản phẩm</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
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
            <td>{{ (int)$index + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 60px;">
                @else
                    <span>Không có hình ảnh</span>
                @endif
            </td>
            <td>{{ $product->category->name ?? 'Không có danh mục' }}</td>
            <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <form action="{{ route('admin.products.restore', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-info btn-sm">Khôi phục</button>
                </form>
                <form action="{{ route('admin.products.force-delete', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa vĩnh viễn?')">Xóa vĩnh viễn</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-end mt-3">
    {{ $products->links('pagination::bootstrap-5') }}
</div>

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary mb-3">⬅ Về danh sách</a>

@endsection
