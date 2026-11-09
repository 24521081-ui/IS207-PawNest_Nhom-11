# Kiểm kê và bổ sung sườn giao diện

- Ngày kiểm kê: 03/11/2026 (Asia/Saigon).
- Dự án thực tế: `D:\Đồ án lập trình web\Code`. Thao tác trực tiếp tại workspace này, không tạo dự án thứ hai hoặc thư mục Code/Code.
- Phạm vi: bổ sung file PHP/CSS/JS giao diện còn thiếu dưới dạng rỗng. Báo cáo này là file mới duy nhất có nội dung.
- Đây là sườn để chia việc cho nhóm 4 người; chưa có giao diện, CSS, JavaScript, dữ liệu hoặc backend hoạt động.

## 1. Căn cứ khảo sát và hiện trạng ban đầu

Đã kiểm kê tên, loại file/thư mục, dung lượng và SHA-256 của toàn bộ file hiện có. Ban đầu có **38 thư mục, 73 file, tất cả 0 byte**; gồm 61 PHP, 5 CSS, 1 JavaScript và 6 file không có phần mở rộng trong thư mục ảnh. Vì đều rỗng nên không có nội dung nghiệp vụ, include, link hay route để đọc hoặc xác nhận hành vi. Việc đối chiếu dựa trên đường dẫn, tên file, danh mục chức năng do người dùng cung cấp và hai xác nhận cụ thể bên dưới.

Không tìm thấy AGENTS.md, README, tài liệu cấu trúc hay tài liệu giao diện trong dự án. Thư mục docs ban đầu rỗng. Không có composer.json, package.json hoặc dấu hiệu đủ để xác định một framework hiện hữu; không dựng thêm bộ MVC. Các thư mục config, database, routes, storage, test có sẵn và rỗng, được giữ nguyên.

Đã kiểm tra Git: workspace không thuộc repository Git (git status báo không phải repository). Không khởi tạo Git, đổi nhánh, commit hay push. Vì không có Git nên dùng bản kiểm kê trong bộ nhớ và SHA-256 trước/sau để kiểm chứng, không dựa vào git diff.

Không đọc bí mật hoặc nội dung .env; không tải tài nguyên, cài thư viện, chạy server, truy cập database hay dịch vụ ngoài.

## 2. Bảng đối chiếu chức năng với đường dẫn thực tế

**Đã có** và **tạo mới** trong bảng chỉ nói đến sự hiện diện của file sườn, không có nghĩa màn hình đã được triển khai. Cột tạo mới đồng thời ghi lại các phần còn thiếu ở thời điểm khảo sát, trước khi bổ sung.

| Khu vực / nhiệm vụ màn hình | File thực tế đã có (đều rỗng) | File còn thiếu đã tạo mới (đều 0 byte) | Trạng thái / căn cứ |
| --- | --- | --- | --- |
| Dùng chung: Khung khách, tài khoản và vận hành | `app/Views/layouts/Components.php`<br>`app/Views/layouts/KhungCustomers.php`<br>`app/Views/layouts/Operations.php` | — | Đã có; Components.php là khung tài khoản theo xác nhận của người dùng. |
| Dùng chung: Đầu/chân trang, menu, thông báo, phân trang, lỗi nhập liệu, nhãn trạng thái, xác nhận | `app/Views/Components/Footers.php`<br>`app/Views/Components/Headers.php`<br>`app/Views/Components/MenuOperations.php`<br>`app/Views/Components/MenuTaiKhoan.php`<br>`app/Views/Components/PhanTrang.php`<br>`app/Views/Components/ThongBao.php` | `app/Views/Components/LoiNhapLieu.php`<br>`app/Views/Components/NhanTrangThai.php`<br>`app/Views/Components/XacNhanThaoTac.php` | Đã có + tạo mới |
| Khách: Trang chủ và khu vực banner | `app/Views/Customers/TrangChu.php` | — | Đã có; Banner dự kiến đặt trong TrangChu.php; không cần một trang PHP khác. |
| Khách: Danh sách/chi tiết sản phẩm | `app/Views/Customers/SanPham/ChiTietSP.php`<br>`app/Views/Customers/SanPham/DanhSach.php` | — | Đã có |
| Khách: Danh sách/chi tiết dịch vụ | `app/Views/Customers/DichVu/ChiTietDV.php`<br>`app/Views/Customers/DichVu/DanhSach.php` | — | Đã có |
| Khách: Danh sách/chi tiết phòng hoặc loại phòng | `app/Views/Customers/LuuTru/ChiTietLT.php`<br>`app/Views/Customers/LuuTru/DanhSach.php` | — | Đã có |
| Khách: Biểu mẫu, xem lại, kết quả và các phần chọn/chi phí | `app/Views/Customers/DatLich/Components/ChonDichVu.php`<br>`app/Views/Customers/DatLich/Components/ChonLuuTru.php`<br>`app/Views/Customers/DatLich/Components/ChonThuCungChiNhanh.php`<br>`app/Views/Customers/DatLich/Components/TongHopChiPhi.php`<br>`app/Views/Customers/DatLich/Forms.php`<br>`app/Views/Customers/DatLich/Forms_Informations.php`<br>`app/Views/Customers/DatLich/KetQua.php` | — | Đã có; Forms_Informations.php là bước xem lại theo xác nhận của người dùng. |
| Khách: Giỏ hàng | `app/Views/Customers/GioHang/DanhSach.php` | — | Đã có |
| Khách: Biểu mẫu đặt đơn và kết quả | `app/Views/Customers/DatHang/Forms.php`<br>`app/Views/Customers/DatHang/KetQua.php` | — | Đã có |
| Khách: Thông tin/hướng dẫn và kết quả thanh toán | `app/Views/Customers/ThanhToan/KetQua.php`<br>`app/Views/Customers/ThanhToan/ThongTin.php` | — | Đã có; Dùng chung theo đối tượng; COD không bắt buộc thanh toán trực tuyến. |
| Khách: Danh sách/chi tiết chi nhánh | `app/Views/Customers/ChiNhanh/ChiTiet.php`<br>`app/Views/Customers/ChiNhanh/DanhSach.php` | — | Đã có |
| Khách: Thông tin tiếp nhận, biểu mẫu, kết quả | `app/Views/Customers/QuyenGop/Forms.php`<br>`app/Views/Customers/QuyenGop/KetQua.php`<br>`app/Views/Customers/QuyenGop/ThongTin.php` | — | Đã có |
| Xác thực: Đăng nhập, đăng ký, đổi mật khẩu | `app/Views/XacThuc/DangKy.php`<br>`app/Views/XacThuc/DangNhap.php`<br>`app/Views/XacThuc/DoiMatKhaui.php` | — | Đã có; Giữ đúng tên DoiMatKhaui.php; không tạo DoiMatKhau.php trùng chức năng. |
| Cá nhân: Xem/sửa hồ sơ | `app/Views/TaiKhoan/HoSo/ChiTiet.php`<br>`app/Views/TaiKhoan/HoSo/Sua.php` | — | Đã có |
| Cá nhân: Danh sách/thêm/sửa/chọn địa chỉ mặc định | `app/Views/TaiKhoan/DiaChi/DanhSach.php`<br>`app/Views/TaiKhoan/DiaChi/Sua.php`<br>`app/Views/TaiKhoan/DiaChi/Them.php` | — | Đã có; Chọn mặc định trong DanhSach.php hoặc biểu mẫu hiện có. |
| Cá nhân: Danh sách/chi tiết/thêm/sửa thú cưng | `app/Views/TaiKhoan/ThuCung/ChiTiet.php`<br>`app/Views/TaiKhoan/ThuCung/DanhSach.php`<br>`app/Views/TaiKhoan/ThuCung/Sua.php`<br>`app/Views/TaiKhoan/ThuCung/Them.php` | — | Đã có |
| Cá nhân: Danh sách/chi tiết/theo dõi giao sản phẩm | `app/Views/TaiKhoan/DonHang/ChiTiet.php`<br>`app/Views/TaiKhoan/DonHang/DanhSach.php` | — | Đã có; Theo dõi giao sản phẩm nằm trong ChiTiet.php. |
| Cá nhân: Danh sách/chi tiết/xem nhật ký | `app/Views/TaiKhoan/LichDat/ChiTiet.php`<br>`app/Views/TaiKhoan/LichDat/DanhSach.php`<br>`app/Views/TaiKhoan/LichDat/NhatKy.php` | — | Đã có |
| Cá nhân: Danh sách/chi tiết/xem và in hóa đơn | `app/Views/TaiKhoan/GiaoDich/ChiTiet.php`<br>`app/Views/TaiKhoan/GiaoDich/DanhSach.php`<br>`app/Views/TaiKhoan/GiaoDich/HoaDon.php` | — | Đã có |
| Cá nhân: Lịch sử/chi tiết quyên góp | `app/Views/TaiKhoan/QuyenGop/ChiTiet.php`<br>`app/Views/TaiKhoan/QuyenGop/DanhSach.php` | — | Đã có |
| Vận hành: Tổng quan theo vai trò/phạm vi | `app/Views/Operations/TongQuan.php/TrangChinh.php` | — | Đã có; TongQuan.php là thư mục; TrangChinh.php là file. |
| Vận hành: Danh sách/chi tiết đơn và vùng thao tác theo quyền | `app/Views/Operations/DonHang.php/ChiTiet.php`<br>`app/Views/Operations/DonHang.php/DanhSach.php` | — | Đã có; DonHang.php là thư mục; không tạo Operations/DonHang song song. |
| Vận hành: Danh sách/chi tiết lịch, nhận/trả lưu trú, thông tin khách/thú cưng cần thiết, tiến độ và biểu mẫu nhật ký | `app/Views/Operations/LichDat/ChiTiet.php`<br>`app/Views/Operations/LichDat/DanhSach.php`<br>`app/Views/Operations/LichDat/FormNhatKy.php` | — | Đã có; Những phần phụ được dự kiến trong ChiTiet.php và FormNhatKy.php; chưa có nội dung. |
| Vận hành: Danh sách/chi tiết/thêm/sửa sản phẩm | — | `app/Views/Operations/SanPham/DanhSach.php`<br>`app/Views/Operations/SanPham/ChiTiet.php`<br>`app/Views/Operations/SanPham/Them.php`<br>`app/Views/Operations/SanPham/Sua.php` | Tạo mới; Nhóm này thực tế chưa có trước khi bổ sung. |
| Vận hành: Danh sách/chi tiết/thêm/sửa dịch vụ và áp dụng tại chi nhánh | — | `app/Views/Operations/DichVu/DanhSach.php`<br>`app/Views/Operations/DichVu/ChiTiet.php`<br>`app/Views/Operations/DichVu/Them.php`<br>`app/Views/Operations/DichVu/Sua.php` | Tạo mới; Áp dụng tại chi nhánh thuộc biểu mẫu/chi tiết, không thêm trang cho từng thao tác. |
| Vận hành: Danh sách/chi tiết/thêm/sửa phòng lưu trú, vị trí trạng thái phòng | — | `app/Views/Operations/LuuTru/DanhSach.php`<br>`app/Views/Operations/LuuTru/ChiTiet.php`<br>`app/Views/Operations/LuuTru/Them.php`<br>`app/Views/Operations/LuuTru/Sua.php` | Tạo mới; Theo tên LuuTru đang có ở Customers; không tạo thêm Phong cùng chức năng. |
| Vận hành: Danh sách/chi tiết/thêm/sửa tài khoản và vị trí phân quyền | — | `app/Views/Operations/TaiKhoanNhanVien/DanhSach.php`<br>`app/Views/Operations/TaiKhoanNhanVien/ChiTiet.php`<br>`app/Views/Operations/TaiKhoanNhanVien/Them.php`<br>`app/Views/Operations/TaiKhoanNhanVien/Sua.php`<br>`app/Views/Operations/TaiKhoanNhanVien/PhanQuyen.php` | Tạo mới; Chỉ là vị trí giao diện, chưa quyết định ma trận quyền. |
| Vận hành: Danh sách/chi tiết/thêm/sửa chi nhánh | — | `app/Views/Operations/ChiNhanh/DanhSach.php`<br>`app/Views/Operations/ChiNhanh/ChiTiet.php`<br>`app/Views/Operations/ChiNhanh/Them.php`<br>`app/Views/Operations/ChiNhanh/Sua.php` | Tạo mới; Bốn chi nhánh TP.HCM; kho tổng không phải chi nhánh phục vụ. |
| Vận hành: Tồn kho, nhập/xuất, chi tiết/lập phiếu và lịch sử biến động | — | `app/Views/Operations/Kho/TonKho.php`<br>`app/Views/Operations/Kho/LichSuBienDong.php`<br>`app/Views/Operations/Kho/NhapKho/DanhSach.php`<br>`app/Views/Operations/Kho/NhapKho/ChiTiet.php`<br>`app/Views/Operations/Kho/NhapKho/Forms.php`<br>`app/Views/Operations/Kho/XuatKho/DanhSach.php`<br>`app/Views/Operations/Kho/XuatKho/ChiTiet.php`<br>`app/Views/Operations/Kho/XuatKho/Forms.php` | Tạo mới |
| Vận hành: Danh sách/chi tiết/lập phiếu điều chuyển | — | `app/Views/Operations/DieuChuyenKho/DanhSach.php`<br>`app/Views/Operations/DieuChuyenKho/ChiTiet.php`<br>`app/Views/Operations/DieuChuyenKho/Forms.php` | Tạo mới; Điều chuyển hàng hóa kho tổng–chi nhánh. |
| Vận hành: Danh sách/chi tiết khoản thu, xem/in hóa đơn | — | `app/Views/Operations/ThanhToan/DanhSach.php`<br>`app/Views/Operations/ThanhToan/ChiTiet.php`<br>`app/Views/Operations/ThanhToan/HoaDon.php` | Tạo mới |
| Vận hành: Danh sách/chi tiết theo dõi quyên góp theo quyền | — | `app/Views/Operations/QuyenGop/DanhSach.php`<br>`app/Views/Operations/QuyenGop/ChiTiet.php` | Tạo mới; Không thêm quản trị chiến dịch hoặc đăng ký tổ chức. |
| Vận hành: Báo cáo đơn hàng/đặt lịch/thanh toán/tồn kho | — | `app/Views/Operations/BaoCao/DonHang.php`<br>`app/Views/Operations/BaoCao/DatLich.php`<br>`app/Views/Operations/BaoCao/ThanhToan.php`<br>`app/Views/Operations/BaoCao/TonKho.php` | Tạo mới; Phạm vi chi nhánh hoặc tổng hợp theo quyền cần đặc tả. |
| Lỗi: Không có quyền, không tìm thấy, lỗi máy chủ | — | `app/Views/Errors/KhongCoQuyen.php`<br>`app/Views/Errors/KhongTimThay.php`<br>`app/Views/Errors/LoiServer.php` | Tạo mới |
| Tài nguyên: CSS chung/thành phần/khách/tài khoản/vận hành và ảnh | `public/tainguyen/images/banners`<br>`public/tainguyen/images/logo`<br>`public/tainguyen/images/placeholders`<br>`public/tainguyen/images/products`<br>`public/tainguyen/images/rooms`<br>`public/tainguyen/images/services`<br>`public/tainguyen/Account.css`<br>`public/tainguyen/Base.css`<br>`public/tainguyen/Components.css`<br>`public/tainguyen/Khachhang.css`<br>`public/tainguyen/Operations.css` | — | Đã có; images là thư mục; sáu tên con là file rỗng nên giữ nguyên, không đổi thành thư mục. |
| Tài nguyên: JavaScript chung và các module đã xác định | `public/js/Base.js` | `public/js/GioHang.js`<br>`public/js/DatHang.js`<br>`public/js/DatLich.js`<br>`public/js/ThanhToan.js`<br>`public/js/QuyenGop.js`<br>`public/js/XacThuc.js`<br>`public/js/TaiKhoan.js`<br>`public/js/DonHang.js`<br>`public/js/LichDat.js`<br>`public/js/SanPham.js`<br>`public/js/DichVu.js`<br>`public/js/LuuTru.js`<br>`public/js/TaiKhoanNhanVien.js`<br>`public/js/ChiNhanh.js`<br>`public/js/Kho.js`<br>`public/js/DieuChuyenKho.js`<br>`public/js/BaoCao.js` | Đã có + tạo mới; Giữ Base.js; dùng các file module chung theo nghiệp vụ, không nhân bản theo vai trò. |
| Quyền và trạng thái nghiệp vụ | Các danh sách, chi tiết, biểu mẫu nêu trên | — | Cần làm rõ trong đặc tả tiếp theo: ma trận quyền, trạng thái và thao tác hợp lệ; không tạo thêm trang bằng suy đoán. |
| Tổ chức ảnh theo nhóm | `public/tainguyen/images/` và sáu file banners, logo, placeholders, products, rooms, services | — | Đã có thư mục ảnh dùng chung. Sáu mục con hiện là file, không phải thư mục; giữ nguyên. Nếu cần chuyển chúng thành thư mục thì cần một yêu cầu thay đổi riêng. |

## 3. Danh sách đầy đủ file mới, ý nghĩa và người dự kiến sử dụng

Các vai trò dưới đây là định hướng sử dụng theo yêu cầu của người dùng, không phải cấp quyền, ma trận quyền cuối cùng hoặc kết luận ai được thay đổi giá, hoàn tiền, xóa giao dịch hay duyệt đơn. Cùng một file có thể phục vụ nhiều vai trò với menu, dữ liệu và thao tác phù hợp; việc kiểm tra quyền backend phải được thực hiện sau.

Năm vai trò nội bộ giữ nguyên tên: **Nhân viên lễ tân; Nhân viên kho; Nhân viên chăm sóc; Quản lý chi nhánh; Quản lý tổng chi nhánh**. Khách truy cập/khách hàng là nhóm sử dụng giao diện công khai và cá nhân; không thêm vai trò Admin IT.

| File mới | Ý nghĩa dự kiến | Người/vai trò dự kiến sử dụng |
| --- | --- | --- |
| `app/Views/Components/LoiNhapLieu.php` | Vị trí hiển thị lỗi nhập liệu dùng chung | Khách truy cập/khách hàng; năm vai trò nội bộ theo trang sử dụng |
| `app/Views/Components/NhanTrangThai.php` | Nhãn trạng thái dùng chung; chưa xác định tập trạng thái | Khách truy cập/khách hàng; năm vai trò nội bộ theo trang sử dụng |
| `app/Views/Components/XacNhanThaoTac.php` | Thành phần xác nhận thao tác trong trang hiện có | Khách truy cập/khách hàng; năm vai trò nội bộ theo trang sử dụng |
| `app/Views/Errors/KhongCoQuyen.php` | Trang lỗi không có quyền | Khách truy cập/khách hàng; năm vai trò nội bộ |
| `app/Views/Errors/KhongTimThay.php` | Trang lỗi không tìm thấy | Khách truy cập/khách hàng; năm vai trò nội bộ |
| `app/Views/Errors/LoiServer.php` | Trang lỗi máy chủ | Khách truy cập/khách hàng; năm vai trò nội bộ |
| `app/Views/Operations/SanPham/DanhSach.php` | Danh sách sản phẩm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/SanPham/ChiTiet.php` | Chi tiết sản phẩm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/SanPham/Them.php` | Biểu mẫu thêm sản phẩm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/SanPham/Sua.php` | Biểu mẫu sửa sản phẩm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/DichVu/DanhSach.php` | Danh sách dịch vụ; thông tin áp dụng tại chi nhánh nằm trong cùng nhóm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/DichVu/ChiTiet.php` | Chi tiết dịch vụ; thông tin áp dụng tại chi nhánh nằm trong cùng nhóm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/DichVu/Them.php` | Biểu mẫu thêm dịch vụ; thông tin áp dụng tại chi nhánh nằm trong cùng nhóm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/DichVu/Sua.php` | Biểu mẫu sửa dịch vụ; thông tin áp dụng tại chi nhánh nằm trong cùng nhóm | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/LuuTru/DanhSach.php` | Danh sách phòng/loại phòng lưu trú; trạng thái nằm trong danh sách/chi tiết | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/LuuTru/ChiTiet.php` | Chi tiết phòng/loại phòng lưu trú; trạng thái nằm trong danh sách/chi tiết | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/LuuTru/Them.php` | Biểu mẫu thêm phòng/loại phòng lưu trú; trạng thái nằm trong danh sách/chi tiết | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/LuuTru/Sua.php` | Biểu mẫu sửa phòng/loại phòng lưu trú; trạng thái nằm trong danh sách/chi tiết | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/TaiKhoanNhanVien/DanhSach.php` | Danh sách tài khoản nhân viên với đúng năm vai trò nội bộ | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/TaiKhoanNhanVien/ChiTiet.php` | Chi tiết tài khoản nhân viên với đúng năm vai trò nội bộ | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/TaiKhoanNhanVien/Them.php` | Biểu mẫu thêm tài khoản nhân viên với đúng năm vai trò nội bộ | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/TaiKhoanNhanVien/Sua.php` | Biểu mẫu sửa tài khoản nhân viên với đúng năm vai trò nội bộ | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/ChiNhanh/DanhSach.php` | Danh sách chi nhánh phục vụ; kho tổng được phân biệt trong giao diện | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/ChiNhanh/ChiTiet.php` | Chi tiết chi nhánh phục vụ; kho tổng được phân biệt trong giao diện | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/ChiNhanh/Them.php` | Biểu mẫu thêm chi nhánh phục vụ; kho tổng được phân biệt trong giao diện | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/ChiNhanh/Sua.php` | Biểu mẫu sửa chi nhánh phục vụ; kho tổng được phân biệt trong giao diện | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/TaiKhoanNhanVien/PhanQuyen.php` | Vị trí giao diện phân quyền; chưa xác lập quyền chi tiết cho bất kỳ vai trò nào | Quản lý tổng chi nhánh; các quyền được phép ủy quyền cần chốt |
| `app/Views/Operations/Kho/TonKho.php` | Tồn kho theo kho tổng/chi nhánh | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/LichSuBienDong.php` | Lịch sử biến động tồn kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/NhapKho/DanhSach.php` | Danh sách phiếu nhập kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/NhapKho/ChiTiet.php` | Chi tiết phiếu nhập kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/NhapKho/Forms.php` | Biểu mẫu lập phiếu nhập kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/XuatKho/DanhSach.php` | Danh sách phiếu xuất kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/XuatKho/ChiTiet.php` | Chi tiết phiếu xuất kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/Kho/XuatKho/Forms.php` | Biểu mẫu lập phiếu xuất kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/DieuChuyenKho/DanhSach.php` | Danh sách phiếu điều chuyển kho tổng–chi nhánh | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/DieuChuyenKho/ChiTiet.php` | Chi tiết phiếu điều chuyển kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/DieuChuyenKho/Forms.php` | Biểu mẫu lập phiếu điều chuyển kho | Nhân viên kho; quản lý theo phạm vi được cấp |
| `app/Views/Operations/ThanhToan/DanhSach.php` | Danh sách khoản thu/giao dịch theo quyền | Nhân viên được giao quyền; quản lý theo phạm vi được cấp |
| `app/Views/Operations/ThanhToan/ChiTiet.php` | Chi tiết khoản thu/giao dịch theo quyền | Nhân viên được giao quyền; quản lý theo phạm vi được cấp |
| `app/Views/Operations/ThanhToan/HoaDon.php` | Vị trí xem/in hóa đơn vận hành | Nhân viên được giao quyền; quản lý theo phạm vi được cấp |
| `app/Views/Operations/QuyenGop/DanhSach.php` | Danh sách quyên góp để theo dõi theo quyền | Nhân viên được giao quyền; quản lý theo phạm vi được cấp |
| `app/Views/Operations/QuyenGop/ChiTiet.php` | Chi tiết quyên góp; không quản trị chiến dịch/tổ chức | Nhân viên được giao quyền; quản lý theo phạm vi được cấp |
| `app/Views/Operations/BaoCao/DonHang.php` | Báo cáo đơn hàng; phạm vi chi nhánh/tổng hợp | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/BaoCao/DatLich.php` | Báo cáo đặt lịch dịch vụ/lưu trú; phạm vi chi nhánh/tổng hợp | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/BaoCao/ThanhToan.php` | Báo cáo thanh toán; phạm vi chi nhánh/tổng hợp | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `app/Views/Operations/BaoCao/TonKho.php` | Báo cáo tồn kho; phạm vi chi nhánh/tổng hợp | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `public/js/GioHang.js` | Tương tác giỏ hàng; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng |
| `public/js/DatHang.js` | Tương tác biểu mẫu đặt đơn/kết quả tạo đơn; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng |
| `public/js/DatLich.js` | Tương tác chọn thú cưng/chi nhánh, dịch vụ, lưu trú và chi phí; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng |
| `public/js/ThanhToan.js` | Tương tác thông tin/kết quả thanh toán dùng chung theo đối tượng; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng; người dùng vận hành được cấp quyền |
| `public/js/QuyenGop.js` | Tương tác thông tin/biểu mẫu/lịch sử quyên góp; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng; người dùng vận hành được cấp quyền |
| `public/js/XacThuc.js` | Tương tác đăng nhập/đăng ký/đổi mật khẩu; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng |
| `public/js/TaiKhoan.js` | Tương tác hồ sơ, địa chỉ mặc định và hồ sơ thú cưng; chỉ tạo file rỗng, chưa có xử lý | Khách hàng |
| `public/js/DonHang.js` | Tương tác danh sách/chi tiết/theo dõi giao sản phẩm; chỉ tạo file rỗng, chưa có xử lý | Khách hàng; nhân viên được giao quyền |
| `public/js/LichDat.js` | Tương tác lịch đã đặt/được giao, tiến độ và nhật ký; chỉ tạo file rỗng, chưa có xử lý | Khách hàng; Nhân viên lễ tân; Nhân viên chăm sóc; quản lý theo quyền |
| `public/js/SanPham.js` | Tương tác danh mục sản phẩm theo khu vực sử dụng; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng; Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `public/js/DichVu.js` | Tương tác danh mục dịch vụ và áp dụng tại chi nhánh; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng; Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `public/js/LuuTru.js` | Tương tác danh mục phòng và hiển thị trạng thái; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng; Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `public/js/TaiKhoanNhanVien.js` | Tương tác biểu mẫu tài khoản nhân viên/phân quyền; chỉ tạo file rỗng, chưa có xử lý | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `public/js/ChiNhanh.js` | Tương tác danh mục chi nhánh theo khu vực sử dụng; chỉ tạo file rỗng, chưa có xử lý | Khách truy cập/khách hàng; Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `public/js/Kho.js` | Tương tác tồn kho, nhập/xuất và lịch sử biến động; chỉ tạo file rỗng, chưa có xử lý | Nhân viên kho; quản lý theo phạm vi được cấp |
| `public/js/DieuChuyenKho.js` | Tương tác phiếu điều chuyển kho; chỉ tạo file rỗng, chưa có xử lý | Nhân viên kho; quản lý theo phạm vi được cấp |
| `public/js/BaoCao.js` | Tương tác bộ lọc báo cáo theo phạm vi; chỉ tạo file rỗng, chưa có xử lý | Quản lý chi nhánh; Quản lý tổng chi nhánh (phạm vi và thao tác cần đặc tả) |
| `docs/KiemKeCauTrucGiaoDien.md` | Báo cáo kiểm kê, đối chiếu và kết quả xác minh; đây là file duy nhất có nội dung | Nhóm phát triển 4 người |

Không cần bổ sung CSS: Base.css, Components.css, Khachhang.css, Account.css và Operations.css đã có tại public/tainguyen. Giữ đúng tên và chữ hoa/thường. Chỉ bổ sung JavaScript cho những nhóm giao diện đã xác định; mọi file vẫn rỗng. Base.js dùng lại làm vị trí JavaScript chung. Không có file .ajax hoặc lời gọi AJAX được viết.

DatLich.js dành cho biểu mẫu đặt lịch phía khách; LichDat.js dành cho tra cứu lịch đã đặt/được giao và nhật ký. Đây là hai nhiệm vụ khác nhau trong các nhóm Customers/DatLich, TaiKhoan/LichDat và Operations/LichDat. Các module còn lại được dùng chung theo nghiệp vụ khi thích hợp, không nhân bản JavaScript theo từng vai trò.

### Thư mục mới

- `app/Views/Errors`
- `app/Views/Operations/BaoCao`
- `app/Views/Operations/ChiNhanh`
- `app/Views/Operations/DichVu`
- `app/Views/Operations/DieuChuyenKho`
- `app/Views/Operations/Kho`
- `app/Views/Operations/LuuTru`
- `app/Views/Operations/QuyenGop`
- `app/Views/Operations/SanPham`
- `app/Views/Operations/TaiKhoanNhanVien`
- `app/Views/Operations/ThanhToan`
- `app/Views/Operations/Kho/NhapKho`
- `app/Views/Operations/Kho/XuatKho`

## 4. Tên thực tế được nhận diện và giữ nguyên

Không có lịch sử Git hoặc nội dung file để kết luận một tên từng được đổi từ tên nào. Các đối chiếu dưới đây chỉ mô tả cấu trúc quan sát được; không khẳng định lịch sử đổi tên:

| Tên thực tế | Nhiệm vụ nhận diện / cách xử lý | Căn cứ |
| --- | --- | --- |
| `app/Views/Customers/` | Khu vực khách truy cập/khách hàng; không tạo storefront hoặc KhachHang song song | Các nhóm SanPham, DichVu, LuuTru, DatLich, DatHang, GioHang, ThanhToan và QuyenGop |
| `app/Views/TaiKhoan/` | Các trang dữ liệu cá nhân, hồ sơ và lịch sử | Tên nhóm con HoSo, DiaChi, ThuCung, DonHang, LichDat, GiaoDich, QuyenGop |
| `app/Views/Operations/` | Khu vực vận hành dùng chung theo vai trò/phạm vi | Các nhóm LichDat, DonHang.php, TongQuan.php có sẵn |
| `app/Views/layouts/Components.php` | Khung tài khoản; không tạo thêm layout TaiKhoan hoặc Account | **Người dùng xác nhận trong lượt làm việc này** |
| `app/Views/Customers/DatLich/Forms_Informations.php` | Trang xem lại thông tin đặt lịch; không tạo thêm XemLai.php | **Người dùng xác nhận trong lượt làm việc này** |
| `ChiTietSP.php`, `ChiTietDV.php`, `ChiTietLT.php` | Chi tiết sản phẩm, dịch vụ, lưu trú phía khách; không tạo ChiTiet.php tương đương trong cùng nhóm | Tên file và thư mục chứa tương ứng |
| `app/Views/Customers/LuuTru/` | Khu vực xem phòng/loại phòng. Dùng cùng tên LuuTru cho nhóm quản lý mới; không thêm nhóm Phong song song | Tên nhóm khách hiện có và yêu cầu danh mục phòng |
| `app/Views/Operations/DonHang.php/` | Đây là **thư mục**, chứa DanhSach.php và ChiTiet.php; không đổi tên hoặc tạo Operations/DonHang khác | Kiểm kê loại đường dẫn thực tế |
| `app/Views/Operations/TongQuan.php/TrangChinh.php` | TongQuan.php là **thư mục**, TrangChinh.php là file tổng quan; giữ nguyên | Kiểm kê loại đường dẫn thực tế |
| `app/Views/XacThuc/DoiMatKhaui.php` | Nhận diện là sườn đổi mật khẩu; giữ đúng tên hiện có, không thêm DoiMatKhau.php | Ngữ cảnh nhóm XacThuc và tên file; file không có nội dung để kiểm chứng hành vi |
| `app/Views/Operations/LichDat/FormNhatKy.php` | Biểu mẫu nhật ký chăm sóc; không tạo thêm biểu mẫu nhật ký thứ hai | Tên file và nhóm LichDat hiện có |
| `Forms.php`, `Them.php`, `Sua.php` | Giữ cả hai quy ước đã có: Forms cho biểu mẫu theo luồng, Them/Sua cho CRUD như nhóm ThuCung, DiaChi | Cấu trúc hiện hữu; không tạo thêm BieuMau cho cùng nhiệm vụ |
| `public/tainguyen/` | Thư mục tài nguyên/CSS hiện có; không tạo public/css song song | Năm file CSS có sẵn |
| `public/tainguyen/images/{banners,logo,placeholders,products,rooms,services}` | Sáu **file 0 byte**, không phải thư mục, không phải ảnh hợp lệ; không thể đặt file con trong chúng. Giữ nguyên cả sáu, không đổi/xóa hoặc tạo bộ tên thay thế | Loại đường dẫn và dung lượng kiểm kê thực tế |

## 5. Liên kết giao diện dự kiến giữa các nhóm

Hiện chưa có link, include, menu hoặc route nào được lập trình vì tất cả source đều rỗng. Các mối nối sau là hướng bàn giao để nhóm triển khai, không phải liên kết đã hoạt động:

1. **Mua hàng:** Customers/SanPham → Customers/GioHang/DanhSach.php → Customers/DatHang/Forms.php → Customers/DatHang/KetQua.php. Mua ngay đi vào bước đặt đơn với sản phẩm đã chọn. Đơn sau đó được xem tại TaiKhoan/DonHang và xử lý theo quyền tại Operations/DonHang.php. Theo dõi giao sản phẩm nằm trong ChiTiet.php của đơn, không tạo nghiệp vụ vận chuyển thú cưng.
2. **Thanh toán và COD:** Customers/ThanhToan/ThongTin.php và KetQua.php là vị trí dùng chung theo đối tượng khi cần thanh toán. Thanh toán trước và khi nhận hàng đều nằm trong phạm vi; đơn COD không bị ép đi qua thanh toán trực tuyến. TaiKhoan/GiaoDich dùng cho lịch sử/chi tiết/hóa đơn của khách; Operations/ThanhToan cho khoản thu/hóa đơn vận hành. Không trùng nhiệm vụ chỉ vì cùng đối tượng giao dịch: mỗi khu vực có phạm vi dữ liệu riêng cần kiểm tra quyền.
3. **Đặt lịch:** Customers/DichVu hoặc Customers/LuuTru → Customers/DatLich/Forms.php cùng bốn thành phần ChonThuCungChiNhanh, ChonDichVu, ChonLuuTru, TongHopChiPhi → Forms_Informations.php (xem lại, đã xác nhận) → KetQua.php. Một lần đặt có thể gồm dịch vụ, lưu trú hoặc cả hai; cần thể hiện riêng thời gian, thông tin và chi phí khi triển khai.
4. **Theo dõi và chăm sóc:** TaiKhoan/LichDat/DanhSach.php, ChiTiet.php, NhatKy.php để khách theo dõi. Operations/LichDat/DanhSach.php, ChiTiet.php và FormNhatKy.php là vị trí tiếp nhận/tra cứu, nhận/trả lưu trú, xem thông tin khách/thú cưng cần thiết, lịch được giao, tiến độ và nhập nhật ký theo quyền. Không tạo riêng website cho lễ tân và nhân viên chăm sóc.
5. **Quyên góp:** Customers/QuyenGop/ThongTin.php → Forms.php → KetQua.php; TaiKhoan/QuyenGop lưu vị trí xem lịch sử/chi tiết và Operations/QuyenGop lưu vị trí theo dõi theo quyền. Có thể liên kết bố cục thanh toán dùng chung khi đặc tả đối tượng yêu cầu; chưa tự quyết định quy tắc tài chính, chiến dịch hay đăng ký tổ chức.
6. **Danh mục và kho:** Các nhóm SanPham, DichVu, LuuTru, ChiNhanh ở Customers là khu vực giới thiệu/chọn; các nhóm tương ứng ở Operations là quản lý. Kho/TonKho, NhapKho, XuatKho, LichSuBienDong và DieuChuyenKho phục vụ hàng hóa tại kho tổng–chi nhánh. Kho tổng không xuất hiện như một địa điểm đặt dịch vụ/lưu trú.
7. **Khung và tài nguyên:** KhungCustomers.php, Components.php (khung tài khoản) và Operations.php dự kiến ghép các trang với Headers, Footers, MenuTaiKhoan, MenuOperations cùng các thành phần dùng chung. TrangChu.php tự chứa vùng banner khi triển khai. Menu và dữ liệu vận hành thay đổi theo vai trò/phạm vi; việc chia View không thay thế kiểm tra quyền phía backend.

Không cần thêm trang PHP cho từng nút xóa, hủy, duyệt, xác nhận, chọn mặc định, áp dụng dịch vụ tại chi nhánh hoặc hiển thị trạng thái. Các vùng này được dự kiến trong danh sách/chi tiết/biểu mẫu thích hợp đã kiểm kê, chưa được viết.

## 6. Phạm vi, điểm cần đặc tả tiếp và các mục ngoài phạm vi

| Điểm cần chốt sau | Trạng thái / cách xử lý lần này |
| --- | --- |
| Quyền theo vai trò, chi nhánh và dữ liệu được giao | **Cần làm rõ** bằng ma trận quyền. Giữ đúng năm vai trò; chưa quyết định ai được hoàn tiền, xóa giao dịch, chỉnh giá, duyệt đơn hoặc cấp quyền nhân viên. |
| Trạng thái đơn, lịch, phòng, khoản thu và điều chuyển | **Cần làm rõ** các trạng thái và chuyển trạng thái hợp lệ. Chỉ bố trí DanhSach/ChiTiet, nhãn trạng thái và biểu mẫu liên quan; không lập trình quy tắc. |
| Đặt lịch kết hợp dịch vụ/lưu trú | Phạm vi đã chốt; chi tiết nhiều thú cưng, thời gian, nhân viên được giao và dữ liệu cần hiển thị còn cần đặc tả/ERD. Không tự bổ sung quy tắc. |
| Giỏ hàng và xác nhận đơn | Quy tắc đã chốt: lưu 48 giờ, không giữ hàng khi thêm giỏ; backend tương lai kiểm tra lại rồi tạo đơn/giữ hàng trong cùng giao tác. Lần này không lập trình, không tạo service. |
| Thanh toán và hóa đơn | Hỗ trợ trả trước hoặc COD cho sản phẩm. Chưa chốt quy tắc/cổng thanh toán/hoàn tiền/hóa đơn chi tiết; chỉ để sườn dùng chung theo đối tượng. Không yêu cầu COD thanh toán online. |
| Quyên góp | Chỉ thông tin tiếp nhận, biểu mẫu, kết quả, lịch sử và theo dõi theo quyền. Chưa có căn cứ cho cơ chế chiến dịch, đăng ký tổ chức hoặc quy tắc tài chính khác. |
| Bốn chi nhánh TP.HCM và một kho tổng | Phạm vi đã chốt; danh mục dữ liệu, địa chỉ, tồn và khả năng phục vụ còn cần đặc tả. Không tạo dữ liệu mẫu; kho tổng tách khỏi địa điểm đặt dịch vụ/lưu trú. |
| Sáu file trong images | Giữ nguyên vì yêu cầu không xóa/đổi/di chuyển file cũ. Thư mục images hiện có vẫn dùng làm nơi chứa ảnh chung; nếu muốn sáu mục con là thư mục thì cần yêu cầu thay đổi riêng. |

Không phát hiện tên file hoặc tài liệu cũ về vận chuyển thú cưng trong phạm vi đã kiểm kê; toàn bộ file cũ đều rỗng nên không có nội dung ẩn để đối chiếu. Không tạo mới trang, thành phần, JavaScript, controller hoặc service vận chuyển thú cưng. Giao sản phẩm trong đơn hàng và điều chuyển hàng hóa kho vẫn thuộc phạm vi; không kết nối hãng giao hàng bên ngoài.

Không thay đổi route, cấu hình server, file chạy hay bất kỳ file cũ nào. Không tạo backend/controller/service/model/SQL/migration, .env, dependency, ảnh tải về, file sao lưu hoặc .gitkeep.

## 7. Kết quả xác minh và số lượng bàn giao

| Hạng mục | Kết quả |
| --- | --- |
| Thư mục mới | **13**; tất cả nằm trong workspace đã xác định |
| File source mới | **64**, gồm **47 PHP + 17 JavaScript**, đều **0 byte**, không có BOM/PHP tag/chú thích/HTML/dữ liệu |
| CSS mới | **0**; dùng lại đủ 5 file CSS hiện hữu |
| Báo cáo Markdown mới | **1**; file mới duy nhất có nội dung |
| Tổng số file mới tính cả báo cáo | **65** |
| File source được dùng lại | **67** = 61 PHP + 5 CSS + 1 JavaScript; đây là các file sườn rỗng, chưa có hành vi |
| File ảnh giữ chỗ được bảo toàn riêng | **6** file không phần mở rộng; không tính là ảnh hoạt động hoặc source được dùng lại |
| File cũ đối chiếu trước/sau | **73/73** cùng đường dẫn, loại, dung lượng và SHA-256; không có file cũ bị sửa hoặc mất |
| SHA-256 chung của 73 file cũ | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` (tất cả ban đầu 0 byte) |
| Thư mục cũ | **38/38** còn nguyên tên và loại đường dẫn; có thêm mục con tại các vị trí được phép |
| Thay đổi đồng thời từ bên ngoài | Không phát hiện khi đối chiếu nội dung/hash, dung lượng, loại và đường dẫn trước/sau |
| Trùng đường dẫn do chữ hoa/thường | **0**, đã so sánh đường dẫn không phân biệt hoa/thường |
| Trùng nhiệm vụ do đổi ngôn ngữ/tên gọi | Không thêm storefront/KhachHang thay Customers, Phong thay LuuTru, layout tài khoản hoặc trang xem lại thứ hai, DoiMatKhau thay DoiMatKhaui, Operations/DonHang hoặc TongQuan thay các thư mục có hậu tố .php. Các View khách/vận hành khác nhiệm vụ/phạm vi sử dụng. |
| Ngoài kế hoạch | Không có file source phát sinh ngoài danh sách; không tạo vận chuyển thú cưng hoặc .ajax |
| Tổng sau bổ sung và báo cáo | **51 thư mục, 138 file** (nếu không có thay đổi từ người dùng sau thời điểm kiểm tra) |

Đã kiểm tra dung lượng và hash trực tiếp trên filesystem. Không chạy test chức năng hay lint để chứng minh ứng dụng chạy, vì lần này chỉ tạo file rỗng và không có chương trình được triển khai. Không cần cài package hay chạy server để xác minh sườn.

Các thư mục rỗng config, database, routes, storage, test và những thư mục trống khác được giữ nguyên. Git không theo dõi riêng thư mục rỗng nếu dự án được đưa vào Git sau này; không tạo .gitkeep trong lần này.

## 8. Gợi ý chia việc cho nhóm 4 người

Đây là gợi ý phân công phát triển, không phải bốn vai trò sử dụng hệ thống; năm vai trò nội bộ vẫn giữ nguyên như trên.

| Thành viên | Phạm vi gợi ý | Điểm cần thống nhất với thành viên khác |
| --- | --- | --- |
| 1 | Layout, Components, Errors, CSS/JS chung, xác thực, hồ sơ/địa chỉ/thú cưng cá nhân | Quy ước ghép khung, menu, lỗi nhập liệu, thành phần và tài nguyên dùng chung |
| 2 | Danh mục phía khách, trang chủ/chi nhánh, đặt lịch, lịch đặt/nhật ký của khách và vận hành | Thời gian/chi phí dịch vụ và lưu trú; dữ liệu thú cưng; phần thanh toán dùng chung với thành viên 3 |
| 3 | Sản phẩm/giỏ/đặt đơn, đơn hàng hai khu vực, thanh toán/giao dịch/hóa đơn, quyên góp và lịch sử/theo dõi | COD, cách tham chiếu đối tượng thanh toán, dữ liệu tồn kho với thành viên 4 |
| 4 | Danh mục vận hành, tài khoản nhân viên/chi nhánh, kho/phiếu/điều chuyển, tổng quan và báo cáo | Phạm vi chi nhánh và quyền; trạng thái/phòng với thành viên 2; báo cáo/đơn/thu với thành viên 3 |

Các phần giao nhau dùng cùng file đã kiểm kê; cần thống nhất người phụ trách trước khi bắt đầu viết nội dung. Việc triển khai giao diện và backend là công việc tiếp theo, không nằm trong thay đổi lần này.

