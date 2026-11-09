# Nhật ký hoàn thiện PawNest — Minh

## Ngày 09/11/2026 — Khảo sát và nhóm 1: khung chung

- Đã đọc 126 tệp PHP/JavaScript và toàn bộ CSS hiện có; không tìm thấy AGENTS.md áp dụng, không có Git. Các View ngoài header/footer/layout và toàn bộ JS đều chỉ là sườn chú thích. Giữ nguyên khu vực VanHanh.
- Tên tham chiếu thực tế: `PawNest — Nhà nhỏ, yêu thương lớn.html`, `.zip`, và `_files`. Đã liệt kê ZIP trước khi xử lý: ZIP là bản lưu trình duyệt, gồm HTML, style.css, app.js, ux.js, 9 ảnh/2 SVG; không phải mã nguồn PHP. Không sửa thư mục test.
- Đọc website gốc thành công. app.js, ux.js, style.css trên website có SHA-256 trùng bản lưu. Tải đúng 9 ảnh còn thiếu và 3 SVG gốc vào docs/ThamChieuPawNest rồi chép vào thư mục ảnh tương ứng. Không dùng ảnh thay thế. Không có khác biệt thiết kế cần chọn giữa hai nguồn.
- Sửa `public/index.php`: Router theo whitelist, kiểm tra tham số chuỗi, dữ liệu demo và helper URL/escape/ảnh, đăng ký các route khách hàng. Không có DB/API/xác thực/thanh toán thật.
- Sửa Components/DauTrang.php, ChanTrang.php, MenuTaiKhoan.php, layouts/KhungCuaHang.php, KhungTaiKhoan.php và Errors/KhongTimThay.php, LoiServer.php. Sửa lỗi hai thẻ mở PHP trong footer; liên kết hash đổi sang Router. Banner và mascot đúng nguồn, menu phủ lên banner.
- Tách quy tắc style.css vào Chung.css, ThanhPhan.css, CuaHang.css, TaiKhoan.css; cập nhật URL ảnh. Kiểm tra hiển thị và kiểm tra cú pháp sẽ ghi khi chạy thực tế.
- Môi trường: PHP 8.2.12 tại C:/xampp/php/php.exe. Apache hiện cấu hình DocumentRoot C:/xampp/htdocs, không trỏ dự án D:. Dùng PHP built-in server `C:\xampp\php\php.exe -S 127.0.0.1:8080 -t public` từ Code để kiểm tra.
- Còn lại: lần lượt hoàn thiện nhóm 2–7, rồi kiểm tra trình duyệt 1440/390, luồng demo và tài nguyên.

## Nhóm 2 — Trang chủ

- Sửa `app/Views/CuaHang/TrangChu.php`: giữ ảnh Golden, slogan duy nhất, trust bar, hai thẻ dịch vụ, bốn sản phẩm nổi bật và chương trình quyên góp đúng home() của bản gốc; thêm đúng mascot từ ux.js.
- Đối chiếu source HTML đã chuyển hash sang Router PHP; kiểm tra PHP syntax thành công. Đang so sánh ảnh chụp 1440/390 với website gốc.

## Nhóm 3 — Sản phẩm

- Sửa `SanPham/DanhSach.php`, `ChiTietSP.php`, `public/js/SanPham.js`, dữ liệu/route trong `public/index.php`.
- Danh mục, nhóm/loại, thương hiệu, khoảng giá, thứ tự, ảnh, giá, biến thể và sản phẩm liên quan lấy nguyên từ tham chiếu. Danh sách và chi tiết được PHP dựng; bộ lọc sử dụng GET để giữ đúng trạng thái khi tải lại/chuyển liên kết. Các chuỗi URL được escape trước khi xuất HTML.
- Tìm kiếm chung trong modal; phân biệt DOG/CAT chỉ ở sản phẩm. Kiểm tra PHP và JS syntax thành công; HTTP trang sản phẩm thực tế trả 200.
- Khi PHP thiếu intl, thứ tự tên dùng strnatcasecmp dự phòng; còn cần kiểm tra thứ tự tiếng Việt trên trình duyệt.

## Nhóm 4 — Giỏ hàng, đặt hàng, kết quả

- Sửa View `GioHang/DanhSach.php`, `DatHang/Forms.php`, `KetQua.php`, `ThanhToan/ThongTin.php`, `KetQua.php`; JS Chung, GioHang, DatHang, ThanhToan, DonHang.
- Dữ liệu giỏ dùng localStorage; mua ngay dùng sessionStorage để không mất khi chuyển trang PHP. Có chọn món, chọn tất cả, số lượng 1–20, xóa, phí giao mẫu 30.000đ, COD/trả trước minh họa. Chỉ xóa các món đã đặt khỏi giỏ.
- Cùng một hàm hiển thị chi tiết được dùng cho kết quả và lịch sử, tránh hai nơi tính khác nhau. Lưu thành công rồi mới chuyển trang; chặn bấm xác nhận lặp. Không có giao dịch thật.
- PHP và JS đã kiểm tra cú pháp; kiểm thử tương tác sẽ ghi riêng sau khi chạy Chrome.

## Nhóm 5 — Dịch vụ, lưu trú và đặt lịch

- Sửa View DichVu/DanhSach, ChiTietDV, LuuTru/DanhSach, ChiTietLT, DatLich/Forms, KetQua và bốn Components có sẵn; JS DatLich và TaiKhoan.
- Nội dung/ảnh/bảng giá đúng servicePage() gốc; hai route chi tiết tái sử dụng trang thông tin gốc vì tham chiếu không có thiết kế chi tiết riêng cho từng dịch vụ/phòng.
- Đặt lịch được ghép bằng PHP trên một trang. JS chỉ cập nhật các vùng chọn chi nhánh/thú cưng/phòng/giờ và tổng phí. Nhu cầu lưu trú/spa độc lập; không tự chọn phòng. Quy tắc phòng/giờ giả lập lấy nguyên từ app.js.
- Bổ sung kiểm tra ngày theo múi giờ Việt Nam, khoảng lưu trú dương, cân nặng, phòng đã chọn còn hợp lệ và spa trong kỳ nghỉ. Ngày nhận từ 14h; ngày trả phải kết thúc trước 12h. Đổi chi nhánh/ngày/thú cưng làm mất lựa chọn phòng cũ. Bỏ nhu cầu bỏ phí tương ứng. Bản nháp lưu sessionStorage, lịch đã xác nhận lưu localStorage cùng lịch sử.
- Đang chạy kiểm thử tự động qua Chrome thật; kết quả cuối ghi ở phần kiểm thử.

## Nhóm 6 — Chi nhánh, liên hệ và quyên góp

- Sửa ChiNhanh/DanhSach, ChiTiet, QuyenGop/ThongTin, Forms, KetQua; JS ChiNhanh, QuyenGop.
- Giữ nguyên bốn thẻ chi nhánh, modal, sơ đồ SVG và thời gian giả lập của ux.js. Lệnh tìm đường chỉ trì hoãn tại trình duyệt, không gọi API, không lấy vị trí; đổi đầu vào hoặc đóng modal hủy kết quả đang chờ. Đặt lịch mang đúng chi nhánh.
- Form lời nhắn chỉ phản hồi tại chỗ; quyên góp có mức tiền mẫu, nhập tiền, ẩn danh, kết quả và lịch sử dùng chung. Không gửi email/thu tiền.

## Nhóm 7 — Đăng nhập demo và tài khoản

- Sửa XacThuc/DangNhap, DangKy, DoiMatKhau; TaiKhoan/HoSo, ThuCung/DanhSach/Them/Sua, DonHang/DanhSach/ChiTiet, LichDat/DanhSach/ChiTiet, QuyenGop/DanhSach/ChiTiet; JS XacThuc, TaiKhoan, DonHang, LichDat, QuyenGop, ThanhToan.
- Modal đăng nhập/đăng ký/quên mật khẩu, hiện/ẩn mật khẩu, tài khoản mẫu và đăng xuất theo bản gốc. Không đọc hoặc lưu mật khẩu. Thêm focus trap, trả focus khi đóng và Escape cho modal/menu.
- Hồ sơ/địa chỉ mặc định, thêm/sửa thú cưng, tổng quan, các lịch sử và chi tiết đọc cùng nguồn dữ liệu. Người chưa đăng nhập có thể xem trước tài khoản mẫu như bản gốc.
- Các phần sườn DiaChi riêng, GiaoDich, ThuCung/ChiTiet, LichDat/NhatKy và Forms_Informations chưa có thiết kế/tương tác riêng trong nguồn tham chiếu; giữ nguyên sườn, không đoán nội dung, không đăng ký route riêng. Quên mật khẩu dùng file XacThuc/DoiMatKhau có sẵn để phản hồi demo, không đổi mật khẩu thật.

## Kiểm tra thực tế và bàn giao — 09/11/2026

### Kết quả cuối

- Toàn bộ **109 tệp PHP** qua `php -l`; **18 tệp JavaScript** được phân tích cú pháp bằng Node v24.22.1 có sẵn trong VS Code. PHP có mbstring; truy vấn GET tìm `hạt` trả HTTP 200. Máy hiện chưa bật PHP intl, nên sắp xếp tên được hoàn tất bằng `localeCompare('vi')` trong module SanPham; không có JavaScript thì dùng thứ tự dự phòng PHP.
- **33 route đã đăng ký trả HTTP 200** khi cung cấp mã sản phẩm/chi nhánh hợp lệ. Route lạ, chuỗi traversal, tham số trang dạng mảng và mã sản phẩm không tồn tại đều trả **404**. Không phát hiện PHP Warning/Fatal trong phản hồi.
- **58 mục kiểm tra luồng chính + 23 mục bổ sung đạt** qua Chrome 156 headless. Báo cáo: `docs/ThamChieuPawNest/KetQuaKiemThu.json` và `KiemThuBoSung.json`. Hai lượt hoàn tất không có JavaScript exception hoặc request tài nguyên thất bại.
- Đã thao tác: menu desktop hai cấp và mobile; tìm kiếm; lọc nhóm/loại/thương hiệu/giá và sắp xếp giá/tên; chi tiết, số lượng tối đa 20, cộng/giảm/xóa/chọn món/chọn tất cả trong giỏ; COD, mua ngay qua tải lại, trả trước minh họa, kết quả và lịch sử.
- Đã thao tác: đăng nhập/đăng ký mẫu, hiện/ẩn mật khẩu, Escape/trả focus, đăng xuất; kiểm tra mật khẩu không xuất hiện trong localStorage; sửa hồ sơ, thêm/sửa thú cưng và escape tên chứa ký tự HTML; dữ liệu đồng bộ sang đặt lịch.
- Đã tạo đủ ba loại lịch: chỉ lưu trú, chỉ spa và kết hợp; kiểm tra lọc phòng theo cân nặng (bao gồm đúng giới hạn), không tự chọn phòng, không có phòng phù hợp, ngày trả bằng ngày nhận, spa ngoài kỳ lưu trú, giới hạn giờ nhận/trả, dịch vụ 120 phút, bỏ spa/lưu trú bỏ phí, bản nháp sau tải lại, kết quả vào lịch sử.
- Đã thao tác chi nhánh Quận 7, đường đi giả lập, đổi điểm xuất phát/đóng modal khi đang tải để hủy kết quả cũ, đặt lịch mang đúng chi nhánh; form liên hệ phản hồi tại chỗ; quyên góp ẩn danh, chặn tiền dưới tối thiểu, kết quả/lịch sử; phục hồi từ JSON lưu trữ hỏng và đặt lại toàn bộ dữ liệu mẫu.

### Đối chiếu giao diện

- Có ảnh chụp **gốc và localhost cùng trạng thái ở 1440 px và 390 px** trong `docs/ThamChieuPawNest`: trang chủ, danh mục, liên hệ, chi tiết sản phẩm, thanh toán có hàng, đặt lịch kết hợp, quyên góp, tài khoản; bổ sung cả Spa và lưu trú.
- Bản gốc và localhost khớp các số đo header/banner, chiều cao nội dung và khung tổng tiền trên các trang đối chiếu sau khi sửa. Desktop: header 92px, banner trang con 240px; mobile: 76px và 180px. Banner trang chủ 530px/450px. Ảnh/font tải đủ trong các lượt kiểm tra; không tràn ngang ở các trang đại diện và modal chi nhánh.
- Đã phát hiện/sửa đúng nguyên nhân: dòng @import chứa dấu chấm phẩy trong URL font bị tách sai; quy tắc mobile choice-grid đặt nhầm module khiến quy tắc hai cột ghi đè; đường dẫn mascot còn ở `art/` khi xóa lộ trình; quy tắc ẩn eyebrow trong service-hero bị loại nhầm khiến trang quyên góp mobile cao hơn 33px. **Báo cáo `DoiChieuCuoi.json` và ảnh quyen-gop cuối cùng thay thế số đo quyên góp cũ trong KiemThuBoSung.json.**
- CSS được trình duyệt phân tích và hiển thị thực tế; đã bỏ 9 khai báo trùng bị ghi đè và giữ thứ tự cascade. Không cài CSS linter riêng. Không thêm gradient/phát sáng.
- Sửa cấu trúc giỏ để toàn bộ markup ở View PHP và template dòng; JS chỉ ghép dữ liệu và tính tổng. Không dùng iframe hoặc chuyển Router thành SPA.
- Ảnh `LoiKiemThu.png` là ảnh chẩn đoán giữa quá trình; các ảnh mang tiền tố `local-`/`goc-` và báo cáo cuối là căn cứ bàn giao. Không tuyên bố giống 100%: chưa kiểm tra mọi trạng thái hover/focus/tổ hợp dữ liệu bằng pixel diff.

### Cách chạy

Từ thư mục `D:\Đồ án lập trình web\Code`, mở PowerShell và chạy:

```powershell
& 'C:\xampp\php\php.exe' -S 127.0.0.1:8080 -t public
```

Mở `http://127.0.0.1:8080/index.php?trang=trang-chu`. XAMPP Apache hiện trỏ `C:/xampp/htdocs`, nên không mặc định URL Apache cho dự án trên ổ D:. Không thay cấu hình XAMPP. Máy chủ và Chrome được mở để kiểm tra sẽ được đóng khi bàn giao; chạy lại lệnh trên khi muốn xem.

### Giới hạn và phần còn lại

- Những View sườn không có thiết kế riêng trong bản gốc (DiaChi riêng, GiaoDich, ThuCung/ChiTiet, LichDat/NhatKy, Forms_Informations) được giữ nguyên; không đoán giao diện. Các màn hình vận hành/JS/CSS vận hành không triển khai.
- Chỉ thử trên Chrome desktop/headless với viewport 1440/390, chưa thử Safari/Firefox hoặc điện thoại thật. Font Google Fonts vẫn theo nguồn gốc và cần mạng trong lần tải đầu; ảnh và mascot đã lưu tại dự án.
- Dữ liệu demo theo trình duyệt/origin; đổi host hoặc cổng sẽ có kho localStorage khác. Không có DB, tài khoản/xác thực/thanh toán/email/định vị/chỉ đường thật. Việc xác nhận không giữ phòng hoặc hàng thật.
- Không deploy, không push Git, không sửa website Sites đang chạy. Không tạo thêm file chức năng của ứng dụng ngoài cấu trúc đã có; chỉ bổ sung tài nguyên ảnh trong các thư mục hiện có, nhật ký và tài liệu/bằng chứng đối chiếu trong thư mục được cho phép.

### Xác nhận cuối và dọn môi trường kiểm tra

- Đã đọc console thực tế trên 19 trang bằng Chrome Runtime/Log: 0 console error/warning, 0 exception, 0 request lỗi. Báo cáo `docs/ThamChieuPawNest/KiemTraConsole.json`.
- Bổ sung kiểm tra bấm bộ lọc nhóm Thức ăn qua form GET và mở dropdown bằng focus bàn phím, đều đạt; báo cáo `KiemTraNhomFocus.json`.
- `DoiChieuCuoi.json` xác nhận Spa, lưu trú và quyên góp khớp số đo gốc/local cả 1440/390; lỗi chênh 33px ở quyên góp đã hết. Các báo cáo kiểm thử và ảnh cuối được giữ để đối chiếu.
- Đã đóng Chrome headless hồ sơ riêng sau kiểm tra. Máy chủ PHP kiểm tra sẽ dừng; người dùng chạy lại bằng lệnh trong phần Cách chạy. Không tác động phiên Chrome đang dùng của người dùng.

- Đã dừng máy chủ PHP kiểm tra sau khi hoàn tất; tổng cộng 83 mục kiểm tra hành vi đã đạt (58 chính, 23 bổ sung, 2 nhóm/focus), ngoài kiểm tra HTTP và đối chiếu ảnh.
