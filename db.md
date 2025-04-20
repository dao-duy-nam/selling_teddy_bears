1. Bảng users
Mô tả: Lưu trữ thông tin người dùng (khách hàng).

Các trường:

id: ID người dùng (auto-increment).

name: Tên người dùng.

email: Email người dùng (unique).

password: Mật khẩu đã mã hóa.

image: Hình ảnh người dùng (optional).

dob: Ngày sinh (optional).

gender: Giới tính (optional).

phone: Số điện thoại (optional).

address: Địa chỉ (optional).

created_at, updated_at: Thời gian tạo và cập nhật.

2. Bảng categories
Mô tả: Lưu trữ các danh mục sản phẩm (e.g., Gấu bông thú, Gấu bông hình).

Các trường:

id: ID danh mục (auto-increment).

name: Tên danh mục.

description: Mô tả danh mục (optional).

created_at, updated_at: Thời gian tạo và cập nhật.

3. Bảng products
Mô tả: Lưu trữ thông tin sản phẩm gấu bông.

Các trường:

id: ID sản phẩm (auto-increment).

name: Tên sản phẩm.

category_id: Khóa ngoại liên kết với bảng categories.

description: Mô tả sản phẩm.

price: Giá sản phẩm.

stock_quantity: Số lượng tồn kho.

image: Hình ảnh sản phẩm (optional).

created_at, updated_at: Thời gian tạo và cập nhật.

4. Bảng orders
Mô tả: Lưu trữ các đơn hàng của người dùng.

Các trường:

id: ID đơn hàng (auto-increment).

user_id: Khóa ngoại liên kết với bảng users.

status: Trạng thái đơn hàng (pending, completed, cancelled...).

total_price: Tổng giá trị đơn hàng.

shipping_address: Địa chỉ giao hàng.

created_at, updated_at: Thời gian tạo và cập nhật.

5. Bảng order_items
Mô tả: Lưu trữ các sản phẩm trong từng đơn hàng.

Các trường:

id: ID đơn hàng (auto-increment).

order_id: Khóa ngoại liên kết với bảng orders.

product_id: Khóa ngoại liên kết với bảng products.

quantity: Số lượng sản phẩm trong đơn hàng.

price: Giá của mỗi sản phẩm trong đơn hàng.

created_at, updated_at: Thời gian tạo và cập nhật.

6. Bảng reviews
Mô tả: Lưu trữ các đánh giá của người dùng về sản phẩm.

Các trường:

id: ID đánh giá (auto-increment).

user_id: Khóa ngoại liên kết với bảng users.

product_id: Khóa ngoại liên kết với bảng products.

rating: Đánh giá từ 1 đến 5.

comment: Bình luận về sản phẩm (optional).

created_at, updated_at: Thời gian tạo và cập nhật.

7. Bảng payments
Mô tả: Lưu trữ thông tin thanh toán của đơn hàng.

Các trường:

id: ID thanh toán (auto-increment).

order_id: Khóa ngoại liên kết với bảng orders.

payment_method: Phương thức thanh toán (e.g., COD, thẻ tín dụng, PayPal).

amount: Số tiền thanh toán.

status: Trạng thái thanh toán (pending, completed, failed).

created_at, updated_at: Thời gian tạo và cập nhật.

8. Bảng variants
Mô tả: Lưu trữ các biến thể sản phẩm (e.g., màu sắc, kích thước).

Các trường:

id: ID biến thể (auto-increment).

product_id: Khóa ngoại liên kết với bảng products.

size: Kích thước sản phẩm (optional).

color: Màu sắc sản phẩm (optional).

price: Giá của biến thể (nếu khác so với giá sản phẩm gốc).

stock_quantity: Số lượng tồn kho của biến thể.

created_at, updated_at: Thời gian tạo và cập nhật.

9. Bảng variant_images
Mô tả: Lưu trữ ảnh của các biến thể sản phẩm.

Các trường:

id: ID ảnh (auto-increment).

variant_id: Khóa ngoại liên kết với bảng variants.

image: Đường dẫn hoặc URL của ảnh.

created_at, updated_at: Thời gian tạo và cập nhật.

Quan hệ giữa các bảng:
users và orders: Một người dùng có thể có nhiều đơn hàng (one-to-many).

orders và order_items: Một đơn hàng có thể chứa nhiều sản phẩm (one-to-many).

products và order_items: Một sản phẩm có thể xuất hiện trong nhiều đơn hàng (many-to-many).

users và reviews: Một người dùng có thể viết nhiều đánh giá cho sản phẩm (one-to-many).

products và reviews: Một sản phẩm có thể có nhiều đánh giá từ người dùng (one-to-many).

orders và payments: Một đơn hàng có thể có một hoặc nhiều phương thức thanh toán (one-to-one hoặc one-to-many).

products và variants: Một sản phẩm có thể có nhiều biến thể (one-to-many).

variants và variant_images: Một biến thể có thể có nhiều ảnh (one-to-many).