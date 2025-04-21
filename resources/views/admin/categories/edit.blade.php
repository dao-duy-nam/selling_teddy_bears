@extends('layouts.AdminLayout')

@section('content')
<h1 class="mb-4">Chỉnh sửa danh mục</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
        @error('name') 
            <div class="text-danger">{{ $message }}</div> 
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Mô tả:</label>
        <textarea class="form-control" id="description" name="description">{{ old('description', $category->description) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection
