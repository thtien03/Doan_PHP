# PHP Store

Đây là một dự án ứng dụng web đơn giản cho việc quản lý sản phẩm, xây dựng bằng PHP và MySQL, chạy trên môi trường Laragon.

## Hướng Dẫn Cài Đặt

### Bước 1: Giải nén và cấu hình Laragon

1. Giải nén thư mục dự án đã tải về.
2. Di chuyển toàn bộ thư mục giải nén vào thư mục `www` của Laragon. Thư mục này thường nằm trong đường dẫn cài đặt Laragon của bạn.

### Bước 2: Import Cơ Sở Dữ Liệu

1. Mở Laragon và khởi động dịch vụ Apache và MySQL.
2. Truy cập vào phpMyAdmin qua đường dẫn: http://localhost/phpmyadmin
3. Tạo một cơ sở dữ liệu mới: "techstore"
4. Tại giao diện phpMyAdmin, chọn cơ sở dữ liệu vừa tạo và import tệp SQL đi kèm với dự án này.

### Bước 3: Đăng Nhập Quản Trị

1. Truy cập vào trang đăng nhập quản trị tại: http://localhost/php_store/admin/login.php
2. Sử dụng tài khoản quản trị mặc định để đăng nhập:
   - **Email:** huutien@gmail.com
   - **Mật khẩu:** admin123

### Bước 4: Truy Cập Giao Diện Khách Hàng

1. Để truy cập giao diện chính của khách hàng, vào đường dẫn: http://localhost/php_store/client
