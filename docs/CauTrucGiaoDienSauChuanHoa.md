# Cấu trúc giao diện sau chuẩn hóa

- Ngày: **03/11/2026**, múi giờ Asia/Saigon.
- Workspace thực tế: `D:\Đồ án lập trình web\Code`.
- Kết quả: **17 mục đổi tên**, **6 file ảnh giữ chỗ chuyển thành thư mục**, **131 file source được thêm chú thích** (108 PHP, 5 CSS, 18 JavaScript).
- Sau khi thêm báo cáo này: **57 thư mục, 133 file**. Đây là số đo từ lần khảo sát và thay đổi hiện tại, không lấy số liệu báo cáo cũ thay cho kiểm tra.

Đã chuẩn hóa đúng các đường dẫn được người dùng cho phép và ghi chú nhiệm vụ để chia việc thiết kế. Đây là sườn có chú thích, **chưa có giao diện hay backend hoạt động**. Tiêu chí là rõ nhiệm vụ, hạn chế trùng lặp và dễ nối backend PHP sau này; không khẳng định đây là cấu trúc tối ưu tuyệt đối.

Báo cáo [KiemKeCauTrucGiaoDien.md](KiemKeCauTrucGiaoDien.md) được giữ nguyên làm lịch sử. Những tên cũ, nhận định file rỗng và số lượng trong tài liệu đó phản ánh thời điểm trước chuẩn hóa; không chỉnh sửa lại lịch sử.

## 1. Căn cứ khảo sát

Khảo sát trực tiếp trước khi sửa có **51 thư mục và 138 file**: 108 PHP, 5 CSS, 18 JavaScript, 6 file không phần mở rộng trong images và 1 báo cáo Markdown. Tất cả **131 source PHP/CSS/JS đều 0 byte**; sáu mục ảnh cũng 0 byte. Không phát hiện source chứa code, chú thích cũ hoặc nội dung cần giữ ngoài báo cáo Markdown.

Đã đọc yêu cầu mới và báo cáo kiểm kê hiện có, kiểm tra chỉ dẫn dự án, loại đường dẫn, dung lượng, nội dung source và SHA-256. Không tìm thấy AGENTS.md hoặc README trong dự án. Đã lập manifest trước sửa trong bộ nhớ, giữ ánh xạ cũ → mới cho mọi mục và chép kết quả đối chiếu vào các bảng bên dưới. Chưa có repository Git tại workspace: git status báo không phải repository; không init, reset, đổi nhánh, commit hoặc push.

Không có include/require, link tài nguyên hoặc ánh xạ route trong source ban đầu vì source đều rỗng và routes chưa có file. Vì vậy không có tham chiếu thực thi cần cập nhật; không sửa logic hoặc tạo router. Các đường dẫn trong chú thích mới đã dùng tên hiện tại và được kiểm tra tồn tại. Tên cũ vẫn xuất hiện có chủ ý trong tài liệu lịch sử và bảng ánh xạ, không tìm/thay thế toàn cục tài liệu.

Không đọc hoặc in nội dung bí mật/.env, không kết nối MySQL hay dịch vụ ngoài, không cài package/công cụ, không chạy server.

## 2. Các mục đổi tên được phép và kết quả thực tế

| Nguồn trước sửa | Đích cuối cùng | Loại / phạm vi | Kết quả và lý do |
| --- | --- | --- | --- |
| `app/Views/Customers` | `app/Views/CuaHang` | Thư mục; 35 mục trong manifest | Khu vực xem danh mục, mua và đặt; đã đổi tên |
| `app/Views/Operations` | `app/Views/VanHanh` | Thư mục; 63 mục trong manifest | Khu vực công việc nội bộ; đã đổi tên |
| `app/Views/Operations/DonHang.php` | `app/Views/VanHanh/DonHang` | Thư mục; 3 mục trong manifest | Bỏ đuôi .php của thư mục đơn hàng; đã đổi tên |
| `app/Views/Operations/TongQuan.php` | `app/Views/VanHanh/TongQuan` | Thư mục; 2 mục trong manifest | Bỏ đuôi .php của thư mục tổng quan; đã đổi tên |
| `app/Views/layouts/KhungCustomers.php` | `app/Views/layouts/KhungCuaHang.php` | File; 1 mục trong manifest | Khung cửa hàng; đã đổi tên |
| `app/Views/layouts/Components.php` | `app/Views/layouts/KhungTaiKhoan.php` | File; 1 mục trong manifest | Khung tài khoản đã được xác nhận; đã đổi tên |
| `app/Views/layouts/Operations.php` | `app/Views/layouts/KhungVanHanh.php` | File; 1 mục trong manifest | Khung vận hành; đã đổi tên |
| `app/Views/Components/Headers.php` | `app/Views/Components/DauTrang.php` | File; 1 mục trong manifest | Đầu trang dùng chung; đã đổi tên |
| `app/Views/Components/Footers.php` | `app/Views/Components/ChanTrang.php` | File; 1 mục trong manifest | Chân trang dùng chung; đã đổi tên |
| `app/Views/Components/MenuOperations.php` | `app/Views/Components/MenuVanHanh.php` | File; 1 mục trong manifest | Menu vận hành; đã đổi tên |
| `app/Views/XacThuc/DoiMatKhaui.php` | `app/Views/XacThuc/DoiMatKhau.php` | File; 1 mục trong manifest | Sửa lỗi gõ tên đổi mật khẩu; đã đổi tên |
| `public/tainguyen/Base.css` | `public/tainguyen/Chung.css` | File; 1 mục trong manifest | CSS nền; đã đổi tên |
| `public/tainguyen/Components.css` | `public/tainguyen/ThanhPhan.css` | File; 1 mục trong manifest | CSS thành phần; đã đổi tên |
| `public/tainguyen/Khachhang.css` | `public/tainguyen/CuaHang.css` | File; 1 mục trong manifest | CSS cửa hàng; đã đổi tên |
| `public/tainguyen/Account.css` | `public/tainguyen/TaiKhoan.css` | File; 1 mục trong manifest | CSS tài khoản; đã đổi tên |
| `public/tainguyen/Operations.css` | `public/tainguyen/VanHanh.css` | File; 1 mục trong manifest | CSS vận hành; đã đổi tên |
| `public/js/Base.js` | `public/js/Chung.js` | File; 1 mục trong manifest | JavaScript dùng chung; đã đổi tên |

Cách xử lý cha/con: đổi Customers → CuaHang, Operations → VanHanh trước, sau đó đổi DonHang.php → DonHang và TongQuan.php → TongQuan trong VanHanh. Bảng trên luôn ghi nguồn theo manifest ban đầu và đích cuối cùng. Mọi file con được đối chiếu ở đích sau đổi tên; không có thao tác gộp hoặc ghi đè thư mục.

Cả 17 nguồn ban đầu đều có và đích chưa tồn tại; không gặp tình huống nguồn mất nhưng đích đã có, hoặc nguồn/đích xung đột. Thao tác kiểm tra đường dẫn tuyệt đối nằm trong workspace và dùng Rename-Item trong cùng thư mục cha. Không đổi các tên khác ngoài bảng.

Giữ nguyên Views, layouts, Components; các tên Forms.php, Forms_Informations.php, ChiTietSP.php, ChiTietDV.php, ChiTietLT.php, FormNhatKy.php và các tên nghiệp vụ khác. Không đổi folder gốc public, app, routes, config, database, storage, docs và **test** (tên thực tế là test). CSS vẫn ở public/tainguyen, JavaScript ở public/js, ảnh ở public/tainguyen/images; không tạo assets.

## 3. Trách nhiệm các khu vực hiện tại

| Thư mục | Trách nhiệm và người dùng |
| --- | --- |
| `app/Views/CuaHang` | Trang chủ, danh mục sản phẩm/dịch vụ/phòng, giỏ, đặt đơn, đặt lịch, thanh toán, chi nhánh và quyên góp. Khách truy cập/khách hàng theo điều kiện truy cập từng luồng. |
| `app/Views/TaiKhoan` | Hồ sơ, địa chỉ, thú cưng và lịch sử đơn/lịch/giao dịch/quyên góp của khách hàng đã đăng nhập; dữ liệu thuộc tài khoản của mình. |
| `app/Views/VanHanh` | Công việc nội bộ theo vai trò, chi nhánh, nhiệm vụ được giao và quyền. Cùng khu vực dùng cho năm vai trò, không tạo năm bộ website. |
| `app/Views/XacThuc` | Biểu mẫu đăng nhập cho khách hàng và nội bộ, đăng ký tài khoản khách, đổi mật khẩu tài khoản đang đăng nhập. Đăng ký khách không cho tự chọn vai trò nội bộ. |
| `app/Views/layouts` | Ghép bố cục, thành phần và nội dung bằng KhungCuaHang.php, KhungTaiKhoan.php, KhungVanHanh.php. |
| `app/Views/Components` | Các mảnh hiển thị dùng lại; không phải trang nghiệp vụ độc lập. |
| `app/Views/Errors` | Thông báo không có quyền, không tìm thấy và lỗi máy chủ. |

TaiKhoan/ThuCung vẫn là nơi quản lý hồ sơ thú cưng cá nhân. CuaHang/DatLich chỉ chọn hồ sơ sẵn có; VanHanh/LichDat trình bày phần thông tin cần thiết cho công việc. Không di chuyển hay nhân bản hồ sơ, không nhân bản cơ sở dữ liệu theo View. Forms_Informations.php là **bước xem lại lịch đặt**, không phải biểu mẫu nhập thứ hai. Folder và menu không tự thực hiện phân quyền.

Nội bộ giữ đúng năm vai trò: **Nhân viên lễ tân, Nhân viên kho, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh**. Các mô tả người dùng bên dưới là định hướng giao diện, không phải cấp quyền backend. Không mặc định quản lý chi nhánh được thêm chi nhánh hoặc phân mọi vai trò; không tự cấp quyền hoàn tiền, xóa giao dịch, chỉnh giá hoặc duyệt mọi đơn.

## 4. Manifest file source, nhiệm vụ và đối tượng sử dụng

Từng dòng là một file có trong manifest trước sửa, với đường dẫn cũ → hiện tại, loại, dung lượng và hash trước/sau. Tất cả source trước sửa có **H0 = `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855`**, SHA-256 của file 0 byte; H0 trong bảng luôn là giá trị đầy đủ này. SHA-256 sau sửa được ghi đủ 64 ký tự để có thể đối chiếu lại. Những dòng giữ đường dẫn vẫn có nội dung thay đổi vì đã thêm chú thích.

Mỗi file hiện có bốn dòng mô tả riêng: Mục đích, Người dùng, Liên quan, Hiện trạng. PHP chỉ có opening tag và một PHPDoc, không có closing tag, HTML hoặc logic. CSS/JS chỉ có một block comment, không có quy tắc CSS hoặc JavaScript thực thi. UTF-8 không BOM được kiểm tra trên byte thực tế. Dòng Liên quan trong source dùng đường dẫn hiện tại; toàn bộ đường dẫn rõ ràng trong dòng này đã được kiểm tra tồn tại.

| Đường dẫn trước → hiện tại | Loại; byte trước → sau | Mục đích | Người dùng dự kiến, theo quyền/điều kiện truy cập | SHA-256 trước → sau |
| --- | --- | --- | --- | --- |
| `app/Views/Components/Footers.php`<br>→ `app/Views/Components/ChanTrang.php` | File PHP; 0 → 425 | Mảnh chân trang hiển thị thông tin chung ở cuối bố cục. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `C37FD93838F56A30854D3C2788E73BEC6CDDA3256FCD129DF1B867A706A868D4` |
| `app/Views/Components/Headers.php`<br>→ `app/Views/Components/DauTrang.php` | File PHP; 0 → 434 | Mảnh đầu trang hiển thị nhận diện và điều hướng dùng chung. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `CC3B6E97D830152D80500EFBE30A5B7217E6F76B94D37CD90B016C34332791E0` |
| `app/Views/Components/LoiNhapLieu.php` (giữ đường dẫn) | File PHP; 0 → 388 | Mảnh hiển thị thông báo lỗi cho trường nhập và biểu mẫu. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `59AB3CFE91F344E4DF0E818D3FA87BCE19BCFECC5EF47555D8F81ABEB1F4C0AF` |
| `app/Views/Components/MenuOperations.php`<br>→ `app/Views/Components/MenuVanHanh.php` | File PHP; 0 → 454 | Mảnh điều hướng các nhóm công việc nội bộ theo phạm vi được cấp. | Nhân viên lễ tân, Nhân viên kho, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh trên trang được cấp quyền. | H0 → `0D43910F458E6943FD78CB7715A5C8CD51284D8C90ADEE74032A702E67BDCF3F` |
| `app/Views/Components/MenuTaiKhoan.php` (giữ đường dẫn) | File PHP; 0 → 387 | Mảnh điều hướng đến hồ sơ, thú cưng và lịch sử của tài khoản. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `C26CC056909686D258E881DA9C568B466DE50F9CAAADFB22C53B7461FCC07598` |
| `app/Views/Components/NhanTrangThai.php` (giữ đường dẫn) | File PHP; 0 → 403 | Mảnh hiển thị tên và kiểu nhãn trạng thái do trang cung cấp. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `CB6BE944E31195CD417BB96B37E098B86ABCAB62DB11DE48FE512FF43CBF815D` |
| `app/Views/Components/PhanTrang.php` (giữ đường dẫn) | File PHP; 0 → 382 | Mảnh điều hướng giữa các trang của một danh sách. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `0624391EC1CAE1BD62FC67E4FD6F9874F4A0EC8DF3B79ECEF86635D3CE792793` |
| `app/Views/Components/ThongBao.php` (giữ đường dẫn) | File PHP; 0 → 390 | Mảnh hiển thị thông báo kết quả thao tác do trang cung cấp. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `96B0A98EC5C617FEF302F671BA425C3BF68D8B7A0598065B55B62210F6C96055` |
| `app/Views/Components/XacNhanThaoTac.php` (giữ đường dẫn) | File PHP; 0 → 415 | Mảnh hộp xác nhận thao tác từ danh sách, chi tiết hoặc biểu mẫu. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `53F30F9CB1594F3BFAB62C27FAA6CAA5D0A6517D3D2A5C79A82BB8A50A93A036` |
| `app/Views/Customers/ChiNhanh/ChiTiet.php`<br>→ `app/Views/CuaHang/ChiNhanh/ChiTiet.php` | File PHP; 0 → 402 | Hiển thị thông tin chi nhánh phục vụ được chọn, không dùng kho tổng để đặt lịch. | Khách truy cập, khách hàng. | H0 → `BFA649343D9F542FD11E60B2392E8F7C8F3B6AE8AE83369F0615C2EFBFC95E1D` |
| `app/Views/Customers/ChiNhanh/DanhSach.php`<br>→ `app/Views/CuaHang/ChiNhanh/DanhSach.php` | File PHP; 0 → 353 | Hiển thị bốn chi nhánh phục vụ tại TP.HCM, phân biệt với kho tổng. | Khách truy cập, khách hàng. | H0 → `2BEBD53C8AFA8846E34A08205B5F9A1ADCFC21E5CFC08C51BEE5630CDBCBF0EB` |
| `app/Views/Customers/DatHang/Forms.php`<br>→ `app/Views/CuaHang/DatHang/Forms.php` | File PHP; 0 → 472 | Trình bày biểu mẫu đặt sản phẩm, địa chỉ nhận và lựa chọn trả trước hoặc COD. | Khách mua sản phẩm; yêu cầu đăng nhập theo quy trình chốt sau. | H0 → `E10546EF0087D104AFCC7282253EAFD216D20098CE06613CC584F725D3F6588F` |
| `app/Views/Customers/DatHang/KetQua.php`<br>→ `app/Views/CuaHang/DatHang/KetQua.php` | File PHP; 0 → 450 | Hiển thị kết quả tạo đơn sản phẩm và thông tin chuyển sang theo dõi đơn. | Khách mua sản phẩm; yêu cầu đăng nhập theo quy trình chốt sau. | H0 → `5207EABB969E998A2BAA4357C2A8AA87CF57ADD48D0106C26D49F6A9B10BE46D` |
| `app/Views/Customers/DatLich/Components/ChonDichVu.php`<br>→ `app/Views/CuaHang/DatLich/Components/ChonDichVu.php` | File PHP; 0 → 459 | Mảnh chọn dịch vụ và thời gian sử dụng trong cùng lần đặt lịch. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `9E4C12917F4D3C1DA2A0769CDC2D2682A44FCF0C70B39C3A8221CDD85834C743` |
| `app/Views/Customers/DatLich/Components/ChonLuuTru.php`<br>→ `app/Views/CuaHang/DatLich/Components/ChonLuuTru.php` | File PHP; 0 → 467 | Mảnh chọn phòng hoặc loại phòng và thời gian lưu trú trong lần đặt lịch. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `6F4E9A282F7172EC44AAF9F8A80816D3CA77390011849EB26B5A604640A8B019` |
| `app/Views/Customers/DatLich/Components/ChonThuCungChiNhanh.php`<br>→ `app/Views/CuaHang/DatLich/Components/ChonThuCungChiNhanh.php` | File PHP; 0 → 455 | Mảnh chọn hồ sơ thú cưng sẵn có và chi nhánh phục vụ cho lần đặt lịch. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `B60BA8C57FB7362349CD17D81BA05CBFD111C3EE72F3B4A37622C63A7560C372` |
| `app/Views/Customers/DatLich/Components/TongHopChiPhi.php`<br>→ `app/Views/CuaHang/DatLich/Components/TongHopChiPhi.php` | File PHP; 0 → 482 | Mảnh hiển thị riêng chi phí dịch vụ, lưu trú và tổng hợp do backend cung cấp. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `729BBF1441D8DFDFE4C71E220A4842F5938595262266D2496B65D470F8BEE642` |
| `app/Views/Customers/DatLich/Forms.php`<br>→ `app/Views/CuaHang/DatLich/Forms.php` | File PHP; 0 → 458 | Trình bày biểu mẫu đặt dịch vụ, lưu trú hoặc cả hai, tách rõ thời gian và chi phí. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `20EE03EA2EDBC2345A1008D0AA1458688CBAC53C2AFE38F942E1060EAEA3AAC5` |
| `app/Views/Customers/DatLich/Forms_Informations.php`<br>→ `app/Views/CuaHang/DatLich/Forms_Informations.php` | File PHP; 0 → 416 | Hiển thị bước xem lại thú cưng, chi nhánh, thời gian và chi phí của lịch đặt. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `3683117C5BED7BB0DBBEA8C656B7AA883F48EB536E50C75CD02827BF3CCB84F2` |
| `app/Views/Customers/DatLich/KetQua.php`<br>→ `app/Views/CuaHang/DatLich/KetQua.php` | File PHP; 0 → 475 | Hiển thị kết quả đặt lịch và thông tin chuyển sang tra cứu yêu cầu của khách. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `703EE5A57CD7EFFAE08CB2F228FE60A4045F83DED9AA03386BAC0C2502E1428F` |
| `app/Views/Customers/DichVu/ChiTietDV.php`<br>→ `app/Views/CuaHang/DichVu/ChiTietDV.php` | File PHP; 0 → 346 | Hiển thị thông tin một dịch vụ và lối vào bước đặt lịch. | Khách truy cập, khách hàng. | H0 → `531FD77E498D15F6F66DBABB8F00DDAFF7200D6E29AA889B93A55286635570D8` |
| `app/Views/Customers/DichVu/DanhSach.php`<br>→ `app/Views/CuaHang/DichVu/DanhSach.php` | File PHP; 0 → 355 | Hiển thị danh sách dịch vụ để khách tìm hiểu trước khi đặt lịch. | Khách truy cập, khách hàng. | H0 → `75A67AEACA27B1618886956251313A6447232FD6086C2ED72743534E9B7E88DA` |
| `app/Views/Customers/GioHang/DanhSach.php`<br>→ `app/Views/CuaHang/GioHang/DanhSach.php` | File PHP; 0 → 433 | Hiển thị sản phẩm và số lượng trong giỏ; giỏ có thời hạn 48 giờ và chưa giữ hàng. | Khách mua sản phẩm; yêu cầu đăng nhập theo quy trình chốt sau. | H0 → `EB42BF293B645A7233CB22514F06048DD5C006AC70171E4FB01640B4B83D8DEC` |
| `app/Views/Customers/LuuTru/ChiTietLT.php`<br>→ `app/Views/CuaHang/LuuTru/ChiTietLT.php` | File PHP; 0 → 351 | Hiển thị thông tin phòng hoặc loại phòng và lối vào đặt lưu trú. | Khách truy cập, khách hàng. | H0 → `9321F24475D7478A5A55D9429848934B6AECE8A53B8DDBF5DC2300BC10926251` |
| `app/Views/Customers/LuuTru/DanhSach.php`<br>→ `app/Views/CuaHang/LuuTru/DanhSach.php` | File PHP; 0 → 341 | Hiển thị danh sách phòng hoặc loại phòng phục vụ lưu trú. | Khách truy cập, khách hàng. | H0 → `44994480BE0B70E36702F1DDB10FA32ABE9F1BA44090874268FB54EBC8505B44` |
| `app/Views/Customers/QuyenGop/Forms.php`<br>→ `app/Views/CuaHang/QuyenGop/Forms.php` | File PHP; 0 → 429 | Trình bày biểu mẫu thông tin quyên góp cho tổ chức tiếp nhận. | Khách truy cập, khách hàng thực hiện quyên góp theo điều kiện truy cập. | H0 → `F7A08180C8A0894C997D996D35E5B6C5AB3AEA68D942E363A62F4BE4AECC8D3B` |
| `app/Views/Customers/QuyenGop/KetQua.php`<br>→ `app/Views/CuaHang/QuyenGop/KetQua.php` | File PHP; 0 → 438 | Hiển thị kết quả quyên góp và thông tin tra cứu lịch sử liên quan. | Khách truy cập, khách hàng xem kết quả yêu cầu quyên góp của mình theo điều kiện truy cập. | H0 → `6475181939EA8A8A3C319D66F3F8DD6DC11F405F3F8A0595699867176B5D07ED` |
| `app/Views/Customers/QuyenGop/ThongTin.php`<br>→ `app/Views/CuaHang/QuyenGop/ThongTin.php` | File PHP; 0 → 346 | Hiển thị thông tin tổ chức tiếp nhận và hướng dẫn quyên góp. | Khách truy cập, khách hàng. | H0 → `D13F76E638519D65596B19609E7FC459BC0DE0D37EE79DC612ED88178D692BE4` |
| `app/Views/Customers/SanPham/ChiTietSP.php`<br>→ `app/Views/CuaHang/SanPham/ChiTietSP.php` | File PHP; 0 → 396 | Hiển thị thông tin một sản phẩm và lựa chọn thêm giỏ hoặc mua ngay. | Khách truy cập, khách hàng. | H0 → `4ACDFBCBBF03AF1CDB058BE8F55127F0902EAA560F4470A3B74AACD56718F520` |
| `app/Views/Customers/SanPham/DanhSach.php`<br>→ `app/Views/CuaHang/SanPham/DanhSach.php` | File PHP; 0 → 330 | Hiển thị danh sách sản phẩm để xem và chọn mua. | Khách truy cập, khách hàng. | H0 → `53404B136478EF432BD9597DF65E05A1D04BF6415676A4C77593724CE11C4567` |
| `app/Views/Customers/ThanhToan/KetQua.php`<br>→ `app/Views/CuaHang/ThanhToan/KetQua.php` | File PHP; 0 → 442 | Hiển thị kết quả thanh toán của đối tượng yêu cầu và thông tin tra cứu liên quan. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `B4DA364CBA37AF80BE6913B51A45EB11678521D83BEB5EA2C7273DF5528CA889` |
| `app/Views/Customers/ThanhToan/ThongTin.php`<br>→ `app/Views/CuaHang/ThanhToan/ThongTin.php` | File PHP; 0 → 485 | Hiển thị thông tin và hướng dẫn thanh toán theo đối tượng; COD không bắt buộc trả trực tuyến. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `5D448D3BC3C758495C3307A2E1999814945B4781B51948843584AB54A4E3A39B` |
| `app/Views/Customers/TrangChu.php`<br>→ `app/Views/CuaHang/TrangChu.php` | File PHP; 0 → 399 | Hiển thị nội dung trang chủ, vùng banner và lối vào các luồng cửa hàng. | Khách truy cập, khách hàng. | H0 → `349D65A3CA7779754465A7B3413DAEF9B34D0684704B4CFABB35717793105895` |
| `app/Views/Errors/KhongCoQuyen.php` (giữ đường dẫn) | File PHP; 0 → 403 | Hiển thị thông báo truy cập ngoài phạm vi quyền được cấp. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `86B060347C82F9013B7489E234EC8CE0E0FB7481FE848C2660B4B84E41BD061F` |
| `app/Views/Errors/KhongTimThay.php` (giữ đường dẫn) | File PHP; 0 → 411 | Hiển thị thông báo trang hoặc đối tượng yêu cầu không tìm thấy. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `F05284CD4789D1733631C3AC9EC4F437179F09A5AA811588655876077B344487` |
| `app/Views/Errors/LoiServer.php` (giữ đường dẫn) | File PHP; 0 → 409 | Hiển thị thông báo lỗi máy chủ khi không thể hoàn tất yêu cầu. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `9C747E6DDC89DA21C8DE1A727652E3C76F4D933298E7D75783A89EBB8BA3B2D5` |
| `app/Views/layouts/Components.php`<br>→ `app/Views/layouts/KhungTaiKhoan.php` | File PHP; 0 → 405 | Ghép menu tài khoản và nội dung các trang dữ liệu cá nhân. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `AD4B06536587C7A3038B8D5E72EA8DCA96264E77642B1DAF39BE4BC8A8C34B04` |
| `app/Views/layouts/KhungCustomers.php`<br>→ `app/Views/layouts/KhungCuaHang.php` | File PHP; 0 → 392 | Ghép đầu trang, chân trang và vùng nội dung của khu vực cửa hàng. | Khách truy cập, khách hàng. | H0 → `05912323AEFA6F55F465DB07647F52C5D18A8BE0B48FAEF84EF759093C10187C` |
| `app/Views/layouts/Operations.php`<br>→ `app/Views/layouts/KhungVanHanh.php` | File PHP; 0 → 474 | Ghép menu, thanh đầu và vùng nội dung công việc nội bộ. | Nhân viên lễ tân, Nhân viên kho, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền, chi nhánh và nhiệm vụ. | H0 → `348DD9F254F4A77C9ED1908FBE1E742E186FC44F82186CD1C9DF738B752148F4` |
| `app/Views/Operations/BaoCao/DatLich.php`<br>→ `app/Views/VanHanh/BaoCao/DatLich.php` | File PHP; 0 → 454 | Hiển thị báo cáo lịch dịch vụ và lưu trú theo chi nhánh hoặc tổng hợp được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `59186162AF571C986D11DC09AEA77F278D106E519F6C5B0754D24E4D02D366B2` |
| `app/Views/Operations/BaoCao/DonHang.php`<br>→ `app/Views/VanHanh/BaoCao/DonHang.php` | File PHP; 0 → 444 | Hiển thị báo cáo đơn mua sản phẩm theo chi nhánh hoặc tổng hợp được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `1CAE31AD5E359A6235279B330202CBC0ECF06495362FDABD74D0A4760BB17549` |
| `app/Views/Operations/BaoCao/ThanhToan.php`<br>→ `app/Views/VanHanh/BaoCao/ThanhToan.php` | File PHP; 0 → 451 | Hiển thị báo cáo khoản thu và thanh toán theo chi nhánh hoặc tổng hợp được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `03638D0D8DA6CD0A7DF05F31C8A19C79714DFBE43263C959DF8E317A4B7F2DCF` |
| `app/Views/Operations/BaoCao/TonKho.php`<br>→ `app/Views/VanHanh/BaoCao/TonKho.php` | File PHP; 0 → 471 | Hiển thị báo cáo tồn hàng hóa kho tổng và chi nhánh theo chi nhánh hoặc tổng hợp được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `BD61EE97128591595EAB44EE80D84C884EA0EB96310496E6A2980E2D172F37E3` |
| `app/Views/Operations/ChiNhanh/ChiTiet.php`<br>→ `app/Views/VanHanh/ChiNhanh/ChiTiet.php` | File PHP; 0 → 488 | Hiển thị thông tin chi nhánh và vùng thao tác quản lý trong phạm vi được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `F3BD9641F77AB1FFCD456017087CE0458A0DDD62C8CA8ABC268AD00EC71CE677` |
| `app/Views/Operations/ChiNhanh/DanhSach.php`<br>→ `app/Views/VanHanh/ChiNhanh/DanhSach.php` | File PHP; 0 → 492 | Hiển thị danh sách chi nhánh phục vụ; kho tổng được quản lý riêng trong nhóm kho. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `17CBD3AD1B1401E69C6EFBE2B445032CF3794F5C7B4D153F22ECCF3239BD9907` |
| `app/Views/Operations/ChiNhanh/Sua.php`<br>→ `app/Views/VanHanh/ChiNhanh/Sua.php` | File PHP; 0 → 465 | Trình bày biểu mẫu chỉnh sửa thông tin chi nhánh theo quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `6D2ABEDA8DAE476FB9B99F7D089C7908FBEDC514F1790A0D230543CF33C8A2AE` |
| `app/Views/Operations/ChiNhanh/Them.php`<br>→ `app/Views/VanHanh/ChiNhanh/Them.php` | File PHP; 0 → 476 | Trình bày biểu mẫu thông tin chi nhánh khi được phép thêm. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; chưa mặc định cấp quyền thêm chi nhánh. | H0 → `5EAEF1A250D92B5A999EBD4778DE672B88AFEB3F777803F14569090AE7DF3022` |
| `app/Views/Operations/DichVu/ChiTiet.php`<br>→ `app/Views/VanHanh/DichVu/ChiTiet.php` | File PHP; 0 → 476 | Hiển thị chi tiết dịch vụ và các chi nhánh áp dụng trong phạm vi quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `64359D7C45772D88CC4AEC5272C43E32CEC071F57670484AC92C7CEC9B00E243` |
| `app/Views/Operations/DichVu/DanhSach.php`<br>→ `app/Views/VanHanh/DichVu/DanhSach.php` | File PHP; 0 → 468 | Hiển thị danh mục dịch vụ và thông tin áp dụng tại các chi nhánh. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `00C005EF55E3B677A1982438C3C30C7C2186651BB7018D4EC76E46B32C69DC7C` |
| `app/Views/Operations/DichVu/Sua.php`<br>→ `app/Views/VanHanh/DichVu/Sua.php` | File PHP; 0 → 471 | Trình bày biểu mẫu sửa dịch vụ và thông tin áp dụng tại chi nhánh. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `761EA42F4C8290948169570BBDBD19B42137E48E388A6B39BF66D3027A8D9ADB` |
| `app/Views/Operations/DichVu/Them.php`<br>→ `app/Views/VanHanh/DichVu/Them.php` | File PHP; 0 → 471 | Trình bày biểu mẫu thêm dịch vụ và thông tin áp dụng tại chi nhánh. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `C198313ABA02081B5121F8657596A0E75AA323AD20693D868DD03F900D21D668` |
| `app/Views/Operations/DieuChuyenKho/ChiTiet.php`<br>→ `app/Views/VanHanh/DieuChuyenKho/ChiTiet.php` | File PHP; 0 → 435 | Hiển thị kho nguồn, kho nhận và các dòng hàng của phiếu điều chuyển. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `E6C7453656D893AC7717C65AF8A1E611AD11494B836CAADC340C333C000861CF` |
| `app/Views/Operations/DieuChuyenKho/DanhSach.php`<br>→ `app/Views/VanHanh/DieuChuyenKho/DanhSach.php` | File PHP; 0 → 439 | Hiển thị danh sách phiếu điều chuyển hàng hóa giữa kho tổng và chi nhánh. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `5523F7CBFB594ADF2F49E968AC26226A2926857EBE08D864BF4EA249B5B547C2` |
| `app/Views/Operations/DieuChuyenKho/Forms.php`<br>→ `app/Views/VanHanh/DieuChuyenKho/Forms.php` | File PHP; 0 → 437 | Trình bày biểu mẫu lập phiếu điều chuyển hàng hóa kho tổng–chi nhánh. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `E6A40D10830920E669979C58805CF6293CE46A604478815B7302DBCC60F36A12` |
| `app/Views/Operations/DonHang.php/ChiTiet.php`<br>→ `app/Views/VanHanh/DonHang/ChiTiet.php` | File PHP; 0 → 457 | Hiển thị chi tiết đơn, tiến độ giao sản phẩm và vùng thao tác theo quyền. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `151F531FFDC5315C64F3792F4C76DE5F41B76171A4D44615D0B8117B723FC2C3` |
| `app/Views/Operations/DonHang.php/DanhSach.php`<br>→ `app/Views/VanHanh/DonHang/DanhSach.php` | File PHP; 0 → 459 | Hiển thị danh sách đơn sản phẩm trong phạm vi xử lý và tra cứu được cấp. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `5E09FE6C81797A80186B79FA0AFD4D02C324EB8EFE0819E1438479680AE529CB` |
| `app/Views/Operations/Kho/NhapKho/ChiTiet.php`<br>→ `app/Views/VanHanh/Kho/NhapKho/ChiTiet.php` | File PHP; 0 → 415 | Hiển thị thông tin và các dòng hàng hóa của một phiếu nhập kho. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `26AC9C29B24A2B88CA9A77B6A542CD754E35F002F9991E71421F8822754D3E58` |
| `app/Views/Operations/Kho/NhapKho/DanhSach.php`<br>→ `app/Views/VanHanh/Kho/NhapKho/DanhSach.php` | File PHP; 0 → 423 | Hiển thị danh sách phiếu nhập kho hàng hóa trong phạm vi kho được cấp. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `467895DEF63542389AD5E83F2AEC6185ACB8E05702EE84E608CF343AFBC841ED` |
| `app/Views/Operations/Kho/NhapKho/Forms.php`<br>→ `app/Views/VanHanh/Kho/NhapKho/Forms.php` | File PHP; 0 → 420 | Trình bày biểu mẫu lập phiếu nhập kho với kho và các dòng hàng hóa. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `3ACFA16D1D150C49962025F4DF8AD12A33EDE1200D4804B696647C8E04D85C02` |
| `app/Views/Operations/Kho/XuatKho/ChiTiet.php`<br>→ `app/Views/VanHanh/Kho/XuatKho/ChiTiet.php` | File PHP; 0 → 415 | Hiển thị thông tin và các dòng hàng hóa của một phiếu xuất kho. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `2DC55CEE677192BB5799072CEF5471648A4190A034AEAEB917F7194E77C54278` |
| `app/Views/Operations/Kho/XuatKho/DanhSach.php`<br>→ `app/Views/VanHanh/Kho/XuatKho/DanhSach.php` | File PHP; 0 → 423 | Hiển thị danh sách phiếu xuất kho hàng hóa trong phạm vi kho được cấp. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `0EDF6096777602884340ADF5839F42745EEB35C06B3F4CA050947B01FBD99666` |
| `app/Views/Operations/Kho/XuatKho/Forms.php`<br>→ `app/Views/VanHanh/Kho/XuatKho/Forms.php` | File PHP; 0 → 420 | Trình bày biểu mẫu lập phiếu xuất kho với kho và các dòng hàng hóa. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `D63F1CA1B9B7226DCF0D4B4F0917B5AD4A20DDA2A1D4C3A8932399A41778F6E7` |
| `app/Views/Operations/Kho/LichSuBienDong.php`<br>→ `app/Views/VanHanh/Kho/LichSuBienDong.php` | File PHP; 0 → 478 | Hiển thị lịch sử nhập, xuất và điều chuyển làm biến động tồn hàng hóa. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `3AA15F4B13545FFACF0E12387879221F5354DCE2850373B2233C366B1DC64264` |
| `app/Views/Operations/Kho/TonKho.php`<br>→ `app/Views/VanHanh/Kho/TonKho.php` | File PHP; 0 → 486 | Hiển thị số lượng tồn hàng hóa theo kho tổng và chi nhánh trong phạm vi được cấp. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `319F36E7B201E21E87A009EC7AC67AB012C0EA4D076D7DE3C9798AB53305C270` |
| `app/Views/Operations/LichDat/ChiTiet.php`<br>→ `app/Views/VanHanh/LichDat/ChiTiet.php` | File PHP; 0 → 519 | Hiển thị thông tin khách/thú cưng cần thiết, nhận/trả lưu trú và tiến độ chăm sóc theo quyền. | Nhân viên lễ tân, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh theo nhiệm vụ và quyền. | H0 → `D9051A8236A6F18F388ADD60C26631AB38F60C771560436353307CAEFE80AFDB` |
| `app/Views/Operations/LichDat/DanhSach.php`<br>→ `app/Views/VanHanh/LichDat/DanhSach.php` | File PHP; 0 → 496 | Hiển thị lịch dịch vụ/lưu trú để tiếp nhận, tra cứu hoặc xem nhiệm vụ được giao. | Nhân viên lễ tân, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh theo nhiệm vụ và quyền. | H0 → `0E2E3088963984B537A3EDD228FAF12D9E6BFC22534E67E394547ECF006DA584` |
| `app/Views/Operations/LichDat/FormNhatKy.php`<br>→ `app/Views/VanHanh/LichDat/FormNhatKy.php` | File PHP; 0 → 452 | Trình bày biểu mẫu ghi nhật ký lưu trú và tiến độ chăm sóc được giao. | Nhân viên chăm sóc với nhật ký được giao; quyền xem/giám sát khác theo đặc tả. | H0 → `3925CE605000D50B62D2B8192E0D2B36C5C9EEE7AF959D6DF88441FB939A58C4` |
| `app/Views/Operations/LuuTru/ChiTiet.php`<br>→ `app/Views/VanHanh/LuuTru/ChiTiet.php` | File PHP; 0 → 480 | Hiển thị thông tin phòng/loại phòng, chi nhánh và trạng thái được cung cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `048AC408CA353DB274F88E32967FF51578913EF3A605A91DC654CC87FDB079EA` |
| `app/Views/Operations/LuuTru/DanhSach.php`<br>→ `app/Views/VanHanh/LuuTru/DanhSach.php` | File PHP; 0 → 480 | Hiển thị danh mục phòng/loại phòng và vị trí trạng thái phòng theo chi nhánh. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `B5830A116B5479393FB61B01C7A38273A978137925AA7E669714147A37BC3D40` |
| `app/Views/Operations/LuuTru/Sua.php`<br>→ `app/Views/VanHanh/LuuTru/Sua.php` | File PHP; 0 → 476 | Trình bày biểu mẫu chỉnh sửa thông tin phòng hoặc loại phòng theo quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `7A5CCF7AE05A2403957E57390489069EA594B7153A5B02707A4096189FECC1E8` |
| `app/Views/Operations/LuuTru/Them.php`<br>→ `app/Views/VanHanh/LuuTru/Them.php` | File PHP; 0 → 468 | Trình bày biểu mẫu thêm thông tin phòng hoặc loại phòng theo quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `0638DDF21DD2CB8787160F569CBC1D65AEE36E946DEBC284E102A850D18D0297` |
| `app/Views/Operations/QuyenGop/ChiTiet.php`<br>→ `app/Views/VanHanh/QuyenGop/ChiTiet.php` | File PHP; 0 → 457 | Hiển thị thông tin lần quyên góp và bên tiếp nhận để theo dõi theo quyền. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `45EA8E6B25DB273A47F5A540D3C728009CB838FCDE25951AEE438D542275745E` |
| `app/Views/Operations/QuyenGop/DanhSach.php`<br>→ `app/Views/VanHanh/QuyenGop/DanhSach.php` | File PHP; 0 → 439 | Hiển thị danh sách quyên góp để theo dõi trong phạm vi quyền. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `0D46EF3B6C5725CC6E849FF9E5C0B627FA5116EEFC21CB5674EE1EDC620791D7` |
| `app/Views/Operations/SanPham/ChiTiet.php`<br>→ `app/Views/VanHanh/SanPham/ChiTiet.php` | File PHP; 0 → 471 | Hiển thị thông tin sản phẩm và vùng thao tác quản lý được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `B604FA0D13413E00E76BD1FD9408B96434028507B5F5222A0AACD41AD5CF07E8` |
| `app/Views/Operations/SanPham/DanhSach.php`<br>→ `app/Views/VanHanh/SanPham/DanhSach.php` | File PHP; 0 → 468 | Hiển thị danh mục sản phẩm được quản lý trong phạm vi quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `B41B831C5EC3221A0CF65FA70E020A39266A7F27878C9AECDB9849EE841044D6` |
| `app/Views/Operations/SanPham/Sua.php`<br>→ `app/Views/VanHanh/SanPham/Sua.php` | File PHP; 0 → 464 | Trình bày biểu mẫu chỉnh sửa thông tin sản phẩm theo quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `F092662EED85E8A06808B177B3201A0D0D0B65D763BDFA7F0C1A125D969D6E37` |
| `app/Views/Operations/SanPham/Them.php`<br>→ `app/Views/VanHanh/SanPham/Them.php` | File PHP; 0 → 470 | Trình bày biểu mẫu thông tin thêm sản phẩm khi được cấp quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `227C30E6B39A969CF44F102CB20CAEC4B83C23EEBE6E7A0BFC6E1A9FC9B497D1` |
| `app/Views/Operations/TaiKhoanNhanVien/ChiTiet.php`<br>→ `app/Views/VanHanh/TaiKhoanNhanVien/ChiTiet.php` | File PHP; 0 → 465 | Hiển thị thông tin tài khoản, vai trò và phạm vi nhân viên theo quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `669C3BBF273D75A7ABDB45E7AA6ECEECDEF150B6BCE77FD944BB4F349DCDD74C` |
| `app/Views/Operations/TaiKhoanNhanVien/DanhSach.php`<br>→ `app/Views/VanHanh/TaiKhoanNhanVien/DanhSach.php` | File PHP; 0 → 465 | Hiển thị tài khoản nhân viên trong chi nhánh hoặc phạm vi được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `1098ED34790591E8030A39296EBA207865CDFC313BBABDFE74F58F4A793CEE63` |
| `app/Views/Operations/TaiKhoanNhanVien/PhanQuyen.php`<br>→ `app/Views/VanHanh/TaiKhoanNhanVien/PhanQuyen.php` | File PHP; 0 → 490 | Trình bày vai trò và phạm vi quyền để cấu hình theo đặc tả được phê duyệt. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; chưa mặc định quyền phân mọi vai trò. | H0 → `0698AE2238F42B71EED687A4D44FD66042DDECE6C79358D09EADE8D1FA0B2237` |
| `app/Views/Operations/TaiKhoanNhanVien/Sua.php`<br>→ `app/Views/VanHanh/TaiKhoanNhanVien/Sua.php` | File PHP; 0 → 461 | Trình bày biểu mẫu chỉnh thông tin tài khoản nhân viên theo quyền. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `2100708634223F0D1870B10B91002A22070ECE8126379E689AD4517C3571C6D4` |
| `app/Views/Operations/TaiKhoanNhanVien/Them.php`<br>→ `app/Views/VanHanh/TaiKhoanNhanVien/Them.php` | File PHP; 0 → 477 | Trình bày biểu mẫu thông tin tạo tài khoản nhân viên trong phạm vi được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `88E3FAB8A2D25035501817180D47654C6706C081094C02F7F1C3D112A3E6CE5E` |
| `app/Views/Operations/ThanhToan/ChiTiet.php`<br>→ `app/Views/VanHanh/ThanhToan/ChiTiet.php` | File PHP; 0 → 492 | Hiển thị đối tượng, số tiền, trạng thái khoản thu và vùng thao tác theo quyền. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `7423DFE89D185A7CD5EAB3760E121D3E410CBB3495B22F840E8EE8B32D19655E` |
| `app/Views/Operations/ThanhToan/DanhSach.php`<br>→ `app/Views/VanHanh/ThanhToan/DanhSach.php` | File PHP; 0 → 479 | Hiển thị danh sách khoản thu/giao dịch trong phạm vi theo dõi được cấp. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `652A816BB3A889905A24A4A9A5C195FF66E0F604B00478DC05A13DC37538C2C7` |
| `app/Views/Operations/ThanhToan/HoaDon.php`<br>→ `app/Views/VanHanh/ThanhToan/HoaDon.php` | File PHP; 0 → 483 | Hiển thị bản hóa đơn vận hành để xem hoặc in trong phạm vi được cấp. | Nhân viên/Quản lý được phân quyền; phạm vi xem và thao tác cần chốt. | H0 → `258000132DA9CC2EB9EDD9568DC7E3DCB1DA8FA21881F1F67B024F69FD9EE11B` |
| `app/Views/Operations/TongQuan.php/TrangChinh.php`<br>→ `app/Views/VanHanh/TongQuan/TrangChinh.php` | File PHP; 0 → 495 | Hiển thị tổng quan công việc theo vai trò, chi nhánh và nhiệm vụ được giao. | Nhân viên lễ tân, Nhân viên kho, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh; nội dung theo quyền. | H0 → `1B541B0434EF0F9821BA6B6F1CA32F4C7879C0AD0D217C61B4247252FA506DA5` |
| `app/Views/TaiKhoan/DiaChi/DanhSach.php` (giữ đường dẫn) | File PHP; 0 → 480 | Hiển thị danh sách địa chỉ nhận hàng cá nhân và lựa chọn địa chỉ mặc định. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `B23D83F7B7E8069E2B6A5063C3A4DB75F638EAC7F37B2EF1A14C002EE7F422A1` |
| `app/Views/TaiKhoan/DiaChi/Sua.php` (giữ đường dẫn) | File PHP; 0 → 487 | Trình bày biểu mẫu sửa địa chỉ nhận hàng và lựa chọn mặc định của tài khoản. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `46853A40FF08E47AC76CEF11D1DA47EECC882BA323104D4B8539C9862D2C88E2` |
| `app/Views/TaiKhoan/DiaChi/Them.php` (giữ đường dẫn) | File PHP; 0 → 466 | Trình bày biểu mẫu thêm địa chỉ nhận hàng cho tài khoản của mình. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `AD3E57767C38D84833BC77A4814BC19F4C51B90BCD68A6B9E2A6EDA073455963` |
| `app/Views/TaiKhoan/DonHang/ChiTiet.php` (giữ đường dẫn) | File PHP; 0 → 507 | Hiển thị sản phẩm, trạng thái thanh toán và tiến độ giao sản phẩm của đơn cá nhân. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `1370F09635F1F605C280F6EE9F1AD4E9D7930FA4D0D4E6A17671A057516A8D87` |
| `app/Views/TaiKhoan/DonHang/DanhSach.php` (giữ đường dẫn) | File PHP; 0 → 482 | Hiển thị danh sách đơn mua sản phẩm của tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `E9A5F3B184D82A64E216C55BD701F621365604C51EC001E4ADA6B35B49D2F163` |
| `app/Views/TaiKhoan/GiaoDich/ChiTiet.php` (giữ đường dẫn) | File PHP; 0 → 467 | Hiển thị đối tượng, số tiền và kết quả của một giao dịch cá nhân. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `F272EE403C8B83EFBC4C9CA32A9006E83888C14179B3C4249BB4F711D16627C2` |
| `app/Views/TaiKhoan/GiaoDich/DanhSach.php` (giữ đường dẫn) | File PHP; 0 → 463 | Hiển thị danh sách giao dịch thanh toán thuộc tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `8BDD5B63DFE830C47DC09798590A45C017A232D5C7423B0E4C6EAE359DBBAA31` |
| `app/Views/TaiKhoan/GiaoDich/HoaDon.php` (giữ đường dẫn) | File PHP; 0 → 453 | Hiển thị bản hóa đơn của giao dịch cá nhân để xem hoặc in. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `3F8AEA172A4003ADB9C86622819D795F39F49D47BF71B217968C4AD8E7D0F580` |
| `app/Views/TaiKhoan/HoSo/ChiTiet.php` (giữ đường dẫn) | File PHP; 0 → 418 | Hiển thị thông tin hồ sơ cá nhân của tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `5A4B6916ED9DFF4B46DADB889D775C37261956E1ECADD752F97FCF8B8FA540A2` |
| `app/Views/TaiKhoan/HoSo/Sua.php` (giữ đường dẫn) | File PHP; 0 → 437 | Trình bày biểu mẫu chỉnh sửa hồ sơ cá nhân của tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `126ACB0DC1A0D54F77217C8702626107B575561EB3D6BE66E9B6DA7820A28B8E` |
| `app/Views/TaiKhoan/LichDat/ChiTiet.php` (giữ đường dẫn) | File PHP; 0 → 506 | Hiển thị thú cưng, thời gian và chi phí từng phần dịch vụ/lưu trú của lịch cá nhân. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `B5BFC98D0CAFC62C20EFDC652F61C0A2757C6227E526BDCD881F8409ABB06385` |
| `app/Views/TaiKhoan/LichDat/DanhSach.php` (giữ đường dẫn) | File PHP; 0 → 492 | Hiển thị danh sách lịch dịch vụ và lưu trú của tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `979C8C2058359B8C6B2DF726F5AA648AF102B63FB6400D48BC57784F6F0E2BE2` |
| `app/Views/TaiKhoan/LichDat/NhatKy.php` (giữ đường dẫn) | File PHP; 0 → 496 | Hiển thị nhật ký lưu trú và chăm sóc được ghi cho lịch đặt của tài khoản. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `A887E048664F9F9A84840B7944A854812B587E3CCA1C2249B685509EEE15B12E` |
| `app/Views/TaiKhoan/QuyenGop/ChiTiet.php` (giữ đường dẫn) | File PHP; 0 → 468 | Hiển thị chi tiết lần quyên góp và thông tin bên tiếp nhận của tài khoản. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `5586998836FE4F9312D0E59B6DECC351A8C3B22CEC3683BD9B89E7FCF2888B1C` |
| `app/Views/TaiKhoan/QuyenGop/DanhSach.php` (giữ đường dẫn) | File PHP; 0 → 450 | Hiển thị lịch sử quyên góp thuộc tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `A61E884E5A83338A93BBEE18526813A854D8AD6A796C33730040F39736DD8CBD` |
| `app/Views/TaiKhoan/ThuCung/ChiTiet.php` (giữ đường dẫn) | File PHP; 0 → 489 | Hiển thị chi tiết một hồ sơ thú cưng thuộc tài khoản của mình. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `BBD5258E6D53B4D5DAFF3B50EF419C09A649C1B79E5151D56A2E450EBC5F7A59` |
| `app/Views/TaiKhoan/ThuCung/DanhSach.php` (giữ đường dẫn) | File PHP; 0 → 488 | Hiển thị danh sách hồ sơ thú cưng của tài khoản đang đăng nhập. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `B57F75009C4C40A37CEA84705A2D2E034EF5D62E47A7B8C0C84F72B210BFD9AA` |
| `app/Views/TaiKhoan/ThuCung/Sua.php` (giữ đường dẫn) | File PHP; 0 → 498 | Trình bày biểu mẫu chỉnh sửa hồ sơ thú cưng thuộc tài khoản của mình. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `142168397FADDEFD2CDAD903B24798772BC5D71CC05D76C28FF323AEF029ABE5` |
| `app/Views/TaiKhoan/ThuCung/Them.php` (giữ đường dẫn) | File PHP; 0 → 487 | Trình bày biểu mẫu thêm hồ sơ thú cưng vào tài khoản của mình. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `BBBB4D968FE98E7E0421D8D22E800CE88A7D527BF6A00343C84A5DB6B065B5C6` |
| `app/Views/XacThuc/DangKy.php` (giữ đường dẫn) | File PHP; 0 → 395 | Trình bày biểu mẫu đăng ký tài khoản khách hàng. | Khách đăng ký tài khoản khách hàng; không tự chọn vai trò nội bộ. | H0 → `E5D938DAD3063251813B5697886DF1E909737A57418B8101399BBE9FE7740164` |
| `app/Views/XacThuc/DangNhap.php` (giữ đường dẫn) | File PHP; 0 → 459 | Trình bày biểu mẫu đăng nhập cho tài khoản khách hàng và nội bộ. | Khách hàng; Nhân viên lễ tân, Nhân viên kho, Nhân viên chăm sóc, Quản lý chi nhánh, Quản lý tổng chi nhánh. | H0 → `ECDED117C8C2A261D495165F261CBAEABADE0EF0C643892B1DEE4C30468714F4` |
| `app/Views/XacThuc/DoiMatKhaui.php`<br>→ `app/Views/XacThuc/DoiMatKhau.php` | File PHP; 0 → 377 | Trình bày biểu mẫu đổi mật khẩu của tài khoản đang đăng nhập. | Người dùng đã đăng nhập, đổi mật khẩu tài khoản của mình. | H0 → `F55A50C910E791C36733CD5942D29CD5BA84CC028691AE94EED3F1B245DE2FFE` |
| `public/js/BaoCao.js` (giữ đường dẫn) | File JS; 0 → 523 | Điều khiển bộ lọc thời gian và phạm vi chi nhánh/tổng hợp của các báo cáo. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `9892506933C4DCA942F29EF3CC58EDF9FD2CD175A986E2E97E50CC05346482EB` |
| `public/js/Base.js`<br>→ `public/js/Chung.js` | File JS; 0 → 436 | Điều khiển tương tác menu, thông báo và xác nhận trên trang sử dụng. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `D6FD87C3ADB4E7D9143687296262CCA148AC237FFA05825987330C95CCFDDE80` |
| `public/js/ChiNhanh.js` (giữ đường dẫn) | File JS; 0 → 473 | Điều khiển xem chi nhánh tại CuaHang và biểu mẫu thông tin chi nhánh tại VanHanh. | CuaHang: khách truy cập, khách hàng; VanHanh: Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền, chưa mặc định quyền thêm. | H0 → `03FC253E7BC45A3E6D7FB503890044A4350A3B66923B6072C331E93602D83A35` |
| `public/js/DatHang.js` (giữ đường dẫn) | File JS; 0 → 401 | Điều khiển biểu mẫu nhận hàng và lựa chọn trả trước hoặc COD khi đặt đơn. | Khách mua sản phẩm; yêu cầu đăng nhập theo quy trình chốt sau. | H0 → `7BD2834D0930B9E832440A08E9FB2985D7805DAF1BF886585630C078349B9174` |
| `public/js/DatLich.js` (giữ đường dẫn) | File JS; 0 → 449 | Điều khiển lựa chọn dịch vụ, lưu trú hoặc cả hai và chuyển bước xem lại lịch. | Khách hàng thực hiện yêu cầu của mình, theo điều kiện truy cập. | H0 → `B8DFD1EB704EDDC1218A50209962A02AFFCC39232D5533F4EB908C663F38988D` |
| `public/js/DichVu.js` (giữ đường dẫn) | File JS; 0 → 438 | Điều khiển danh mục dịch vụ ở CuaHang và biểu mẫu/chi nhánh áp dụng ở VanHanh. | CuaHang: khách truy cập, khách hàng; VanHanh: Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền. | H0 → `13897D51F3EF5AAE27FC8E258A5A571E7180D945D774842E5FE88CF40F3F93B0` |
| `public/js/DieuChuyenKho.js` (giữ đường dẫn) | File JS; 0 → 427 | Điều khiển lựa chọn kho nguồn, kho nhận và dòng hàng trên phiếu điều chuyển. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `0A343A1084D0E098E72857EEE5D61C972C6BFB39D3686B6909BA51427CB8DC39` |
| `public/js/DonHang.js` (giữ đường dẫn) | File JS; 0 → 449 | Điều khiển tra cứu/theo dõi đơn ở TaiKhoan và vùng thao tác đơn được cấp tại VanHanh. | TaiKhoan: khách đã đăng nhập với đơn của mình; VanHanh: Nhân viên/Quản lý được phân quyền. | H0 → `01F7A53376C5C17213C9D15303D245B605FFED343C0F0DF581904D2E26309720` |
| `public/js/GioHang.js` (giữ đường dẫn) | File JS; 0 → 430 | Điều khiển lựa chọn sản phẩm và số lượng trên giỏ; không giữ hàng khi thêm giỏ. | Khách mua sản phẩm; yêu cầu đăng nhập theo quy trình chốt sau. | H0 → `BDE2194863FAD522AEDC9AD61E3732B35E299CA29CA3AE37211217EEA7F59164` |
| `public/js/Kho.js` (giữ đường dẫn) | File JS; 0 → 501 | Điều khiển bộ lọc tồn/lịch sử và các dòng hàng trên biểu mẫu nhập/xuất kho. | Nhân viên kho; Quản lý chi nhánh, Quản lý tổng chi nhánh theo phạm vi quyền. | H0 → `7DAC7F11E6CD5B32AA70CA08CF7B5090BECF4A51CE67F15FDFCDF4A56B3ACB8D` |
| `public/js/LichDat.js` (giữ đường dẫn) | File JS; 0 → 577 | Điều khiển lịch/nhật ký cá nhân tại TaiKhoan và tra cứu, tiến độ, biểu mẫu nhật ký ở VanHanh. | TaiKhoan: khách đã đăng nhập với lịch của mình; VanHanh: lễ tân, chăm sóc, quản lý theo nhiệm vụ/quyền; nhập nhật ký: Nhân viên chăm sóc được giao. | H0 → `4556EE840CBA4DA50FC2BAC9FC97E3795FDAA3B789FC2D62882DE082F1D6765E` |
| `public/js/LuuTru.js` (giữ đường dẫn) | File JS; 0 → 438 | Điều khiển xem phòng ở CuaHang và biểu mẫu/thể hiện trạng thái phòng ở VanHanh. | CuaHang: khách truy cập, khách hàng; VanHanh: Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền. | H0 → `6142577E13DAB2D1E35E6B0E132F6790120D4D49A005D1F7917EB81EF83EEC14` |
| `public/js/QuyenGop.js` (giữ đường dẫn) | File JS; 0 → 546 | Điều khiển biểu mẫu quyên góp ở CuaHang, lịch sử cá nhân và tra cứu nội bộ theo quyền. | CuaHang: người quyên góp theo điều kiện truy cập; TaiKhoan: khách đã đăng nhập với dữ liệu riêng; VanHanh: Nhân viên/Quản lý được phân quyền. | H0 → `F6E88BF520F5A4405064E35DEAF0AD506453567E6453DD90D926C86F7D078C7C` |
| `public/js/SanPham.js` (giữ đường dẫn) | File JS; 0 → 437 | Điều khiển danh mục/chọn sản phẩm ở CuaHang và biểu mẫu danh mục ở VanHanh. | CuaHang: khách truy cập, khách hàng; VanHanh: Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền. | H0 → `77AEDDC22D533B2A3EBA177F8FDEADAEE136E11183D822D5756D9C087142DE1B` |
| `public/js/TaiKhoan.js` (giữ đường dẫn) | File JS; 0 → 432 | Điều khiển biểu mẫu hồ sơ, địa chỉ mặc định và hồ sơ thú cưng cá nhân. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `DE5E6BFAF33882DFED2A96FF70B8994F761A4AE4DF5749507365F42CA959FBCA` |
| `public/js/TaiKhoanNhanVien.js` (giữ đường dẫn) | File JS; 0 → 475 | Điều khiển biểu mẫu tài khoản nhân viên và giao diện vai trò/quyền theo phạm vi được cấp. | Quản lý chi nhánh, Quản lý tổng chi nhánh theo quyền; phạm vi thao tác cần đặc tả. | H0 → `FD26D5149D6D2AFF3CC4236FCD27CFD29517BD0FCF3135AF43E41B03DBB87807` |
| `public/js/ThanhToan.js` (giữ đường dẫn) | File JS; 0 → 538 | Điều khiển thông tin/kết quả thanh toán ở CuaHang và tra cứu giao dịch tại TaiKhoan/VanHanh. | CuaHang: khách thực hiện yêu cầu của mình; TaiKhoan: khách đã đăng nhập với dữ liệu riêng; VanHanh: Nhân viên/Quản lý được phân quyền. | H0 → `59CC2258A765123AFD6B644DA7091982B0B0EC6844A7364CE83FF9900BE76069` |
| `public/js/XacThuc.js` (giữ đường dẫn) | File JS; 0 → 520 | Điều khiển biểu mẫu đăng nhập, đăng ký khách hàng và đổi mật khẩu tài khoản của mình. | Đăng nhập: khách hàng và năm vai trò nội bộ; đăng ký: khách hàng; đổi mật khẩu: người dùng đã đăng nhập. | H0 → `DA72D798BA328C3F4A1487DCF5D5D9260785FC7D6735CF69EC17D9484E88BB15` |
| `public/tainguyen/Account.css`<br>→ `public/tainguyen/TaiKhoan.css` | File CSS; 0 → 386 | Định dạng bố cục cá nhân, danh sách dữ liệu riêng và các biểu mẫu tài khoản. | Khách hàng đã đăng nhập, chỉ dữ liệu thuộc tài khoản của mình. | H0 → `1588940D26D595093C7E0941AC994BB190A10474E81340233698A9651DB15022` |
| `public/tainguyen/Base.css`<br>→ `public/tainguyen/Chung.css` | File CSS; 0 → 344 | Định dạng nền, chữ và các quy ước trình bày chung cho các khu vực. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `81FE63B59B803C8BF620CACF7FBC5738C0542875CC190076C5418E4D15F2E385` |
| `public/tainguyen/Components.css`<br>→ `public/tainguyen/ThanhPhan.css` | File CSS; 0 → 345 | Định dạng đầu/chân trang, menu, thông báo, phân trang, nhãn và hộp xác nhận. | Các nhóm sử dụng trang liên quan, theo khu vực và điều kiện truy cập. | H0 → `BD36B5DCC13BDBD73928615AA053A3B05193A384176FF794B643DC0EBE44F29D` |
| `public/tainguyen/Khachhang.css`<br>→ `public/tainguyen/CuaHang.css` | File CSS; 0 → 315 | Định dạng trang chủ, danh mục và các bước mua, đặt lịch, quyên góp. | Các nhóm sử dụng trang CuaHang theo điều kiện truy cập. | H0 → `4DD2B5B05A2A9C12ED0DDBBD667B2DED79AEAA16170961DB2D85A614B1BE60ED` |
| `public/tainguyen/Operations.css`<br>→ `public/tainguyen/VanHanh.css` | File CSS; 0 → 349 | Định dạng menu bên trái, thanh trên và vùng nội dung khu vực vận hành. | Các vai trò nội bộ trên màn hình được cấp quyền. | H0 → `B0F1DC5B0BB92103E497083674FD037DD738C20CE9EE2C1DDEAFC4BB1D94809A` |

JavaScript dùng cho nhiều khu vực mô tả riêng CuaHang, TaiKhoan hoặc VanHanh trong nội dung/đối tượng/liên quan; chỉ dự kiến tải ở trang cần thiết. DatLich.js phục vụ biểu mẫu đặt lịch cửa hàng, còn LichDat.js phục vụ tra cứu lịch và nhật ký cá nhân/vận hành. Không có lời gọi AJAX, thao tác CSDL, tự tính giá chính thức hoặc giữ tồn trong View/JS. CSS chỉ mô tả định dạng, không mô tả tự kiểm tra quyền.

## 5. Manifest các file khác và chuyển đổi sáu mục ảnh

| Đường dẫn trước | Đường dẫn hiện tại | Loại / dung lượng trước → sau | SHA-256 trước | SHA-256 sau | Xử lý |
| --- | --- | --- | --- | --- | --- |
| `docs/KiemKeCauTrucGiaoDien.md` | `docs/KiemKeCauTrucGiaoDien.md` | File (42787 byte) → File (42787 byte) | `5ACCC7F898BA9AA5B068210A9F0D002E6A9A0E065A931AA610B322C23C1295F8` | `5ACCC7F898BA9AA5B068210A9F0D002E6A9A0E065A931AA610B322C23C1295F8` | Giữ nguyên nội dung lịch sử |
| `public/tainguyen/images/banners` | `public/tainguyen/images/banners` | File (0 byte) → Thư mục | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` | — (thư mục không có hash nội dung file) | Xóa đúng file giữ chỗ 0 byte, tạo thư mục rỗng cùng tên |
| `public/tainguyen/images/logo` | `public/tainguyen/images/logo` | File (0 byte) → Thư mục | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` | — (thư mục không có hash nội dung file) | Xóa đúng file giữ chỗ 0 byte, tạo thư mục rỗng cùng tên |
| `public/tainguyen/images/placeholders` | `public/tainguyen/images/placeholders` | File (0 byte) → Thư mục | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` | — (thư mục không có hash nội dung file) | Xóa đúng file giữ chỗ 0 byte, tạo thư mục rỗng cùng tên |
| `public/tainguyen/images/products` | `public/tainguyen/images/products` | File (0 byte) → Thư mục | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` | — (thư mục không có hash nội dung file) | Xóa đúng file giữ chỗ 0 byte, tạo thư mục rỗng cùng tên |
| `public/tainguyen/images/rooms` | `public/tainguyen/images/rooms` | File (0 byte) → Thư mục | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` | — (thư mục không có hash nội dung file) | Xóa đúng file giữ chỗ 0 byte, tạo thư mục rỗng cùng tên |
| `public/tainguyen/images/services` | `public/tainguyen/images/services` | File (0 byte) → Thư mục | `E3B0C44298FC1C149AFBF4C8996FB92427AE41E4649B934CA495991B7852B855` | — (thư mục không có hash nội dung file) | Xóa đúng file giữ chỗ 0 byte, tạo thư mục rỗng cùng tên |

Chỉ sáu file giữ chỗ **banners, logo, placeholders, products, rooms, services** được xóa sau khi xác minh đúng file 0 byte và hash H0, rồi tạo thư mục cùng tên tại public/tainguyen/images. Không xóa file có nội dung. Cả sáu hiện là thư mục rỗng; không tạo ảnh hoặc .gitkeep. Git không theo dõi riêng thư mục rỗng nếu dự án được đưa vào Git sau này.

## 6. Manifest thư mục trước → hiện tại

Các thư mục không có SHA-256 nội dung như file, nên ghi —. Cả 51 thư mục ban đầu vẫn có đích tương ứng đúng loại; sáu thư mục ảnh ở mục 5 là phần tăng thêm.

| Thư mục trước sửa | Thư mục hiện tại | Loại / hash |
| --- | --- | --- |
| `app` | `app` | Thư mục → Thư mục; SHA-256: — |
| `app/Views` | `app/Views` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Components` | `app/Views/Components` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers` | `app/Views/CuaHang` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/ChiNhanh` | `app/Views/CuaHang/ChiNhanh` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/DatHang` | `app/Views/CuaHang/DatHang` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/DatLich` | `app/Views/CuaHang/DatLich` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/DatLich/Components` | `app/Views/CuaHang/DatLich/Components` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/DichVu` | `app/Views/CuaHang/DichVu` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/GioHang` | `app/Views/CuaHang/GioHang` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/LuuTru` | `app/Views/CuaHang/LuuTru` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/QuyenGop` | `app/Views/CuaHang/QuyenGop` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/SanPham` | `app/Views/CuaHang/SanPham` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Customers/ThanhToan` | `app/Views/CuaHang/ThanhToan` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Errors` | `app/Views/Errors` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/layouts` | `app/Views/layouts` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations` | `app/Views/VanHanh` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/BaoCao` | `app/Views/VanHanh/BaoCao` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/ChiNhanh` | `app/Views/VanHanh/ChiNhanh` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/DichVu` | `app/Views/VanHanh/DichVu` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/DieuChuyenKho` | `app/Views/VanHanh/DieuChuyenKho` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/DonHang.php` | `app/Views/VanHanh/DonHang` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/Kho` | `app/Views/VanHanh/Kho` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/Kho/NhapKho` | `app/Views/VanHanh/Kho/NhapKho` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/Kho/XuatKho` | `app/Views/VanHanh/Kho/XuatKho` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/LichDat` | `app/Views/VanHanh/LichDat` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/LuuTru` | `app/Views/VanHanh/LuuTru` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/QuyenGop` | `app/Views/VanHanh/QuyenGop` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/SanPham` | `app/Views/VanHanh/SanPham` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/TaiKhoanNhanVien` | `app/Views/VanHanh/TaiKhoanNhanVien` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/ThanhToan` | `app/Views/VanHanh/ThanhToan` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/Operations/TongQuan.php` | `app/Views/VanHanh/TongQuan` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan` | `app/Views/TaiKhoan` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/DiaChi` | `app/Views/TaiKhoan/DiaChi` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/DonHang` | `app/Views/TaiKhoan/DonHang` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/GiaoDich` | `app/Views/TaiKhoan/GiaoDich` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/HoSo` | `app/Views/TaiKhoan/HoSo` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/LichDat` | `app/Views/TaiKhoan/LichDat` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/QuyenGop` | `app/Views/TaiKhoan/QuyenGop` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/TaiKhoan/ThuCung` | `app/Views/TaiKhoan/ThuCung` | Thư mục → Thư mục; SHA-256: — |
| `app/Views/XacThuc` | `app/Views/XacThuc` | Thư mục → Thư mục; SHA-256: — |
| `config` | `config` | Thư mục → Thư mục; SHA-256: — |
| `database` | `database` | Thư mục → Thư mục; SHA-256: — |
| `docs` | `docs` | Thư mục → Thư mục; SHA-256: — |
| `public` | `public` | Thư mục → Thư mục; SHA-256: — |
| `public/js` | `public/js` | Thư mục → Thư mục; SHA-256: — |
| `public/tainguyen` | `public/tainguyen` | Thư mục → Thư mục; SHA-256: — |
| `public/tainguyen/images` | `public/tainguyen/images` | Thư mục → Thư mục; SHA-256: — |
| `routes` | `routes` | Thư mục → Thư mục; SHA-256: — |
| `storage` | `storage` | Thư mục → Thư mục; SHA-256: — |
| `test` | `test` | Thư mục → Thư mục; SHA-256: — |

## 7. File có code, file được giữ và các điểm cần chốt

- **File source đã có code được giữ: 0.** Khảo sát thực tế cho thấy cả 131 source đều rỗng; không có code cần sửa đường dẫn hoặc giữ nguyên.
- **File source có chú thích sẵn đủ nghĩa được giữ: 0.** Tất cả chú thích trong 131 file được thêm ở lượt này.
- Báo cáo kiểm kê cũ là file có nội dung duy nhất trước sửa và đã được giữ nguyên hash như mục 5.
- **Xung đột nguồn/đích, file ảnh có nội dung hoặc nguồn không rõ mục đích: không có.** Không cần suy đoán nhiệm vụ ngoài yêu cầu.

| Điểm cần chốt khi triển khai | Cách giữ phạm vi lần này |
| --- | --- |
| Ma trận quyền theo vai trò, chi nhánh, nhiệm vụ | Chỉ chú thích theo phạm vi được cấp; chưa cấp quyền thao tác chi tiết cho bất kỳ vai trò nào. FormNhatKy dành cho Nhân viên chăm sóc với nhật ký được giao; quyền xem/giám sát khác theo đặc tả. |
| Điều kiện đăng nhập khi mua hàng | Giỏ/đặt đơn ghi khách mua sản phẩm; điều kiện đăng nhập theo quy trình chốt sau, không tự ép một quy trình mới. TaiKhoan luôn là dữ liệu của tài khoản đã đăng nhập. |
| Trạng thái và thao tác hợp lệ của đơn, lịch, phòng, phiếu, khoản thu | Để ở danh sách/chi tiết/biểu mẫu hiện có; chưa tự đặt trạng thái hoặc viết xử lý. |
| Chi tiết dữ liệu, thời gian/chi phí đặt lịch kết hợp | View chỉ mô tả trình bày thông tin, chọn thú cưng/chi nhánh và xem lại; chưa có ERD/backend để lưu hoặc tính dữ liệu. |
| Thanh toán, COD, hóa đơn và quyên góp | Có bố cục theo đối tượng; đơn COD không bắt buộc thanh toán trực tuyến. Chưa tự thêm quy tắc tài chính, chiến dịch hoặc đăng ký tổ chức. |

Ba luồng chính giữ nguyên: đặt dịch vụ/lưu trú/cả hai, quyên góp, mua sản phẩm. Có bốn chi nhánh TP.HCM và một kho tổng; kho tổng không phải nơi đặt dịch vụ/lưu trú. Giỏ có thời hạn 48 giờ, chưa giữ hàng; kiểm tra lại rồi tạo đơn/giữ hàng trong cùng giao tác là việc của backend tương lai.

Không có vận chuyển thú cưng. Giao sản phẩm và điều chuyển hàng hóa được giữ; không tích hợp hãng vận chuyển ngoài. Không có UI thật, dữ liệu demo, backend, SQL, API/AJAX, CSS thực thi, thư viện hoặc trang chức năng mới. Không tạo dự án thứ hai, đổi thương hiệu hoặc chỉnh sửa tài liệu yêu cầu cũ.

## 8. Kết quả kiểm tra

| Kiểm tra | Kết quả thực tế |
| --- | --- |
| Đối chiếu manifest | **189/189 mục ban đầu** có kết quả đúng ánh xạ: 131 source được chú thích, 6 file rỗng chuyển thành thư mục, 1 báo cáo cũ giữ hash, 51 thư mục được bảo toàn theo đích. |
| Mục đổi tên | **17/17** hoàn tất: 4 thư mục và 13 file; mọi file con được bảo toàn ở đích. |
| Chú thích theo loại | **108 PHP + 5 CSS + 18 JavaScript = 131 file**. Từng file có mục đích riêng; không có file nguồn còn rỗng. |
| Cú pháp và encoding chú thích | 131/131 đúng khung comment, đủ 4 dòng mô tả, UTF-8 hợp lệ và không BOM; PHP không có thẻ đóng hoặc HTML. |
| File có code thay đổi ngoài phạm vi | Không có source có code ban đầu; báo cáo cũ giữ nguyên SHA-256. |
| Tham chiếu hiện tại | Không có include/link/route thực thi ban đầu để cập nhật; **0** tham chiếu tên cũ trong source và **0** đường dẫn thiếu trong dòng Liên quan. |
| Folder trùng khu vực | Không còn Customers cạnh CuaHang hoặc Operations cạnh VanHanh; không có đường dẫn trùng do khác chữ hoa/thường. |
| Folder có đuôi .php | **0**; DonHang.php và TongQuan.php đã đổi đúng loại thư mục tại VanHanh. |
| Thư mục ảnh | **6/6** đúng là thư mục rỗng. Không mất file nào có nội dung. |
| PHP lint | **108/108 đạt**, chạy `C:\xampp\php\php.exe -n -l <file>`; PHP CLI **8.2.12** có sẵn. Không cài công cụ mới. |
| Ý nghĩa kiểm tra PHP | Lint chỉ xác minh cú pháp PHP, không phải kiểm thử nghiệp vụ hoặc chứng minh website đã chạy. |
| Ngoài manifest/kế hoạch | Không có thay đổi nội dung/đường dẫn ngoài các mục được phép và báo cáo mới. Không tạo vận chuyển thú cưng, .ajax hoặc .gitkeep. |
| Số lượng sau cùng | **57 thư mục, 133 file** = 131 source có chú thích + 1 báo cáo cũ + 1 báo cáo mới. Sáu file giữ chỗ ban đầu đã chuyển thành sáu thư mục. |

Đã kiểm tra byte/hash, loại đường dẫn và lint sau khi sửa; những con số này là tại thời điểm bàn giao. Không phát hiện thay đổi đồng thời ngoài kế hoạch.

## 9. Bàn giao để chia việc cho 4 người

| Phần việc gợi ý | Phạm vi hiện tại |
| --- | --- |
| Thành viên 1 | layouts, Components, Errors, tài nguyên chung, XacThuc và hồ sơ/địa chỉ/thú cưng của TaiKhoan. |
| Thành viên 2 | Danh mục cửa hàng, trang chủ/chi nhánh, đặt lịch, lịch/nhật ký của TaiKhoan và VanHanh. |
| Thành viên 3 | Giỏ/đặt đơn, đơn hàng, thanh toán/giao dịch/hóa đơn và quyên góp ở các khu vực liên quan. |
| Thành viên 4 | Danh mục VanHanh, nhân viên/chi nhánh, kho/phiếu/điều chuyển, tổng quan và báo cáo. |

Đây là phân công phát triển gợi ý, không phải bốn vai trò hệ thống. Các file module dùng chung cần thống nhất người phụ trách khi bắt đầu viết code. Sườn và chú thích đã sẵn sàng để chia việc thiết kế; chưa triển khai website hay backend.

