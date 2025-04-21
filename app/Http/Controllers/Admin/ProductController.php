<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')
                   ->orderBy('id', 'desc') // ID cao hơn -> mới hơn
                   ->paginate(10); // Lấy tất cả sản phẩm
        return view('admin.products.index', compact('products'));
    }

    // Hiển thị form tạo sản phẩm
    public function create()
    {
        $categories = Category::all();  // Lấy danh sách danh mục
        return view('admin.products.create', compact('categories'));
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validate ảnh
        ]);
    
        $data = $request->all();
    
        // Lưu ảnh vào thư mục public
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName(); // tên file có timestamp
            $path = $image->storeAs('images/products', $filename, 'public'); // Lưu ảnh vào thư mục public/images/products
            $data['image'] = 'storage/' . $path; // Lưu đường dẫn ảnh
        }
    
        Product::create($data);
    
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm!');
    }
     
    // Hiển thị form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);  // Lấy sản phẩm theo ID
        $categories = Category::all();  // Lấy danh sách danh mục
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock_quantity' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh
    ]);

    $product = Product::findOrFail($id);

    // Nếu có ảnh mới
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ (nếu có)
        if ($product->image) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->image)); // Xóa ảnh cũ
        }

        // Lưu ảnh mới vào thư mục public
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName(); // tên file có timestamp
        $path = $image->storeAs('images/products', $filename, 'public'); // Lưu ảnh mới
        $product->image = 'storage/' . $path;
    }

    // Cập nhật thông tin sản phẩm
    $product->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'description' => $request->description,
        'price' => $request->price,
        'stock_quantity' => $request->stock_quantity,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật!');
}

    // Xóa mềm sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();  // Xóa mềm

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa!');
    }

    // Hiển thị sản phẩm đã xóa
    public function trash()
    {
        $products = Product::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);  // Sắp xếp theo thời gian xóa (mới nhất lên đầu)->paginate(10);  // Phân trang với 10 sản phẩm mỗi trang
        return view('admin.products.trash', compact('products'));
    }

    // Khôi phục sản phẩm
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();  // Khôi phục sản phẩm đã xóa mềm

        return redirect()->route('admin.products.trash')->with('success', 'Sản phẩm đã được khôi phục!');
    }

    // Xóa vĩnh viễn sản phẩm
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();  // Xóa vĩnh viễn sản phẩm

        return redirect()->route('admin.products.trash')->with('success', 'Sản phẩm đã được xóa vĩnh viễn!');
    }
}

