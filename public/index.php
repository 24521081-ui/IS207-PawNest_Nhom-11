<?php
/** Router PHP theo danh sách cho phép. Dữ liệu dưới đây lấy từ bản demo gốc. */
declare(strict_types=1);
define('THU_MUC_GOC', dirname(__DIR__));
define('THU_MUC_VIEWS', THU_MUC_GOC . '/app/Views');
header('Content-Type: text/html; charset=UTF-8');
function h($value): string { return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); }
function thamSo(string $key, string $default = ''): string {
    return isset($_GET[$key]) && is_string($_GET[$key]) ? $_GET[$key] : $default;
}
function url(string $page, array $params = []): string {
    return 'index.php?' . http_build_query(array_merge(['trang' => $page], $params), '', '&', PHP_QUERY_RFC3986);
}
function tien($value): string { return number_format((float) $value, 0, ',', '.') . ' ₫'; }
$products = [
    [
        'id' => 1,
        'name' => 'Hạt ANF Fresh Meat cho chó',
        'price' => 215000,
        'species' => 'dog',
        'group' => 'Thức ăn',
        'type' => 'Thức ăn hạt',
        'brand' => 'ANF',
        'img' => 'food-dog.jpg',
        'variant' => '2 kg',
    ],
    [
        'id' => 2,
        'name' => 'Hạt dinh dưỡng cho mèo Indoor',
        'price' => 285000,
        'species' => 'cat',
        'group' => 'Thức ăn',
        'type' => 'Thức ăn hạt',
        'brand' => 'Royal Canin',
        'img' => 'food-cat.jpg',
        'variant' => '2 kg',
    ],
    [
        'id' => 3,
        'name' => 'Pate King’s Pet cá hỗn hợp',
        'price' => 45000,
        'species' => 'cat',
        'group' => 'Thức ăn',
        'type' => 'Pate / thức ăn ướt',
        'brand' => 'King’s Pet',
        'img' => 'pate.jpg',
        'variant' => '380 g',
    ],
    [
        'id' => 4,
        'name' => 'Pate King’s Pet cho mèo',
        'price' => 65000,
        'species' => 'cat',
        'group' => 'Thức ăn',
        'type' => 'Pate / thức ăn ướt',
        'brand' => 'King’s Pet',
        'img' => 'pate-dog.jpg',
        'variant' => '380 g',
    ],
    [
        'id' => 5,
        'name' => 'Vòng cổ bông mềm cho bé',
        'price' => 125000,
        'species' => 'both',
        'group' => 'Phụ kiện',
        'type' => 'Vòng cổ',
        'brand' => 'PawNest',
        'img' => 'collar.jpg',
        'variant' => 'Size M',
    ],
    [
        'id' => 6,
        'name' => 'Dây dắt tự động Hipi Dog',
        'price' => 185000,
        'species' => 'dog',
        'group' => 'Phụ kiện',
        'type' => 'Dây dắt',
        'brand' => 'PawNest',
        'img' => 'leash.jpg',
        'variant' => '1,5 m',
    ],
    [
        'id' => 7,
        'name' => 'Xương gặm chút chít GiGwi',
        'price' => 95000,
        'species' => 'dog',
        'group' => 'Phụ kiện',
        'type' => 'Đồ chơi',
        'brand' => 'GiGwi',
        'img' => 'toy.jpg',
        'variant' => 'Một kích cỡ',
    ],
    [
        'id' => 8,
        'name' => 'Cần câu co giãn FOFOS cho mèo',
        'price' => 79000,
        'species' => 'cat',
        'group' => 'Phụ kiện',
        'type' => 'Đồ chơi',
        'brand' => 'PawNest',
        'img' => 'cat-toy.jpg',
        'variant' => 'Một kích cỡ',
    ],
    [
        'id' => 9,
        'name' => 'Bát sứ ăn uống tối giản',
        'price' => 165000,
        'species' => 'both',
        'group' => 'Đồ dùng hằng ngày',
        'type' => 'Bát ăn / bình nước',
        'brand' => 'PawNest',
        'img' => 'bowl.jpg',
        'variant' => '450 ml',
    ],
    [
        'id' => 10,
        'name' => 'Đệm Kimpet êm ái cho bé',
        'price' => 450000,
        'species' => 'both',
        'group' => 'Đồ dùng hằng ngày',
        'type' => 'Đệm nằm',
        'brand' => 'PawNest',
        'img' => 'bed.jpg',
        'variant' => 'Size M',
    ],
    [
        'id' => 11,
        'name' => 'Bàn chải tắm cao su Doggyman',
        'price' => 115000,
        'species' => 'both',
        'group' => 'Đồ dùng hằng ngày',
        'type' => 'Dụng cụ vệ sinh',
        'brand' => 'PawNest',
        'img' => 'brush.jpg',
        'variant' => 'Một kích cỡ',
    ],
    [
        'id' => 12,
        'name' => 'Cát vệ sinh đậu nành',
        'price' => 145000,
        'species' => 'cat',
        'group' => 'Đồ dùng hằng ngày',
        'type' => 'Dụng cụ vệ sinh',
        'brand' => 'Cature',
        'img' => 'litter.jpg',
        'variant' => '6 L',
    ],
    [
        'id' => 13,
        'name' => 'Hạt Royal Canin Indoor cho mèo',
        'price' => 320000,
        'species' => 'cat',
        'group' => 'Thức ăn',
        'type' => 'Thức ăn hạt',
        'brand' => 'Royal Canin',
        'img' => 'food-cat.jpg',
        'variant' => '2 kg',
    ],
    [
        'id' => 14,
        'name' => 'Hạt ANF Fresh Meat cho cún',
        'price' => 195000,
        'species' => 'dog',
        'group' => 'Thức ăn',
        'type' => 'Thức ăn hạt',
        'brand' => 'ANF',
        'img' => 'food-dog.jpg',
        'variant' => '2 kg',
    ],
    [
        'id' => 15,
        'name' => 'Vòng cổ bông cho mèo',
        'price' => 89000,
        'species' => 'cat',
        'group' => 'Phụ kiện',
        'type' => 'Vòng cổ',
        'brand' => 'PawNest',
        'img' => 'collar.jpg',
        'variant' => 'Size S',
    ],
    [
        'id' => 16,
        'name' => 'Đệm Kimpet cho cún lớn',
        'price' => 650000,
        'species' => 'dog',
        'group' => 'Đồ dùng hằng ngày',
        'type' => 'Đệm nằm',
        'brand' => 'PawNest',
        'img' => 'bed.jpg',
        'variant' => 'Size L',
    ],
];
$groups = ['Thức ăn' => ['Thức ăn hạt', 'Pate / thức ăn ướt'], 'Phụ kiện' => ['Vòng cổ', 'Dây dắt', 'Đồ chơi'], 'Đồ dùng hằng ngày' => ['Bát ăn / bình nước', 'Đệm nằm', 'Dụng cụ vệ sinh']];
$branches = ['PawNest Thảo Điền', 'PawNest Phú Nhuận', 'PawNest Quận 7', 'PawNest Bình Thạnh'];
$addresses = ['12 Đường số 8, khu vực Thảo Điền, TP.HCM', '28 Hoa Sứ, khu vực Phú Nhuận, TP.HCM', '56 Đường số 9, khu vực Quận 7, TP.HCM', '18 Nguyễn Gia Trí, khu vực Bình Thạnh, TP.HCM'];
$services = [['id' => 'bath', 'name' => 'Tắm & vệ sinh cơ bản', 'price' => 180000, 'time' => 60], ['id' => 'groom', 'name' => 'Tắm & cắt tỉa tạo kiểu', 'price' => 350000, 'time' => 90], ['id' => 'spa', 'name' => 'Spa thư giãn toàn diện', 'price' => 450000, 'time' => 120]];
$rooms = [['id' => 'cozy', 'name' => 'Phòng Cozy', 'max' => 5, 'price' => 180000, 'img' => 'room.jpg'], ['id' => 'nest', 'name' => 'Phòng Happy Nest', 'max' => 15, 'price' => 280000, 'img' => 'room.jpg'], ['id' => 'suite', 'name' => 'Phòng Garden Suite', 'max' => 35, 'price' => 420000, 'img' => 'room.jpg']];
$paths = ['paw' => 'M12 13c-3 0-6 3-6 5s3 3 6 1c3 2 6 1 6-1s-3-5-6-5Z M5 12c-3 0-3-5-1-5s3 5 1 5Z M9 8c-2 0-3-6-1-6s3 6 1 6Z M15 8c-2 0-1-6 1-6s1 6-1 6Z M19 12c-2 0-1-5 1-5s2 5-1 5Z', 'search' => 'm21 21-5-5 M10.5 18a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15', 'user' => 'M20 21v-2a7 7 0 0 0-14 0v2 M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10', 'cart' => 'M3 3h2l3 13h11l2-9H6 M9 21h.01 M18 21h.01', 'arrow' => 'M4 12h16m-6-6 6 6-6 6', 'chevron' => 'm9 5 7 7-7 7', 'check' => 'm5 12 4 4L19 6', 'close' => 'm6 6 12 12M6 18 18 6', 'heart' => 'M20 5c-3-3-7-1-8 1-1-2-5-4-8-1-4 4 1 9 8 15 7-6 12-11 8-15Z', 'shield' => 'm12 2 8 4v6c0 5-8 10-8 10S4 17 4 12V6Z m-4 10 3 3 5-6', 'truck' => 'M2 5h12v12H2Z M14 10h5l3 4v3h-8 M7 21a2 2 0 1 0 0-4 2 2 0 0 0 0 4 M18 21a2 2 0 1 0 0-4 2 2 0 0 0 0 4', 'clock' => 'M12 8v5l3 2 M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20', 'plus' => 'M12 5v14M5 12h14', 'trash' => 'M3 6h18M9 6V3h6v3M6 6l1 15h10l1-15M10 10v7M14 10v7', 'menu' => 'M3 6h18M3 12h18M3 18h18', 'eye' => 'M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12Z M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6', 'home' => 'm3 10 9-8 9 8v12h-7v-8h-4v8H3Z', 'pin' => 'M20 9c0 6-8 13-8 13S4 15 4 9a8 8 0 0 1 16 0Z M12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6'];
$duLieuBanDau = [
    'user' => false,
    'profile' => [
        'name' => 'Minh Nguyễn',
        'email' => 'minh.demo@example.com',
        'phone' => '0900000000',
        'address' => '12 Đường số 8, TP.HCM',
    ],
    'pets' => [
        ['id' => 1, 'name' => 'Bông', 'species' => 'Chó', 'weight' => 8, 'img' => 'dog.jpg'],
        ['id' => 2, 'name' => 'Mochi', 'species' => 'Mèo', 'weight' => 4, 'img' => 'cat.jpg'],
    ],
    'cart' => [],
    'orders' => [
        [
            'id' => 'PN-1001',
            'date' => '01/11/2026',
            'name' => 'Minh Nguyễn',
            'address' => '12 Đường số 8, TP.HCM',
            'phone' => '0900000000',
            'items' => [['id' => 9, 'qty' => 1, 'variant' => '450 ml']],
            'subtotal' => 165000,
            'ship' => 30000,
            'total' => 195000,
            'payment' => 'COD',
            'status' => 'Đã giao',
        ],
    ],
    'bookings' => [
        [
            'id' => 'DL-1001',
            'branch' => 'PawNest Thảo Điền',
            'pet' => 'Bông',
            'petWeight' => 8,
            'stay' => false,
            'spa' => true,
            'service' => 'Tắm & vệ sinh cơ bản',
            'spaDate' => '2026-11-10',
            'slot' => '09:00',
            'roomFee' => 0,
            'spaFee' => 180000,
            'total' => 180000,
            'status' => 'Đã xác nhận',
        ],
    ],
    'donations' => [
        [
            'id' => 'QG-1001',
            'amount' => 100000,
            'date' => '01/11/2026',
            'name' => 'Minh Nguyễn',
            'anonymous' => false,
        ],
    ],
];

function anh(string $file): string {
    if (str_starts_with($file, 'art/')) return 'tainguyen/images/logo/' . basename($file);
    $folders = ['dog.jpg'=>'banners', 'cat.jpg'=>'banners', 'spa.jpg'=>'services', 'rescue.jpg'=>'banners', 'room.jpg'=>'rooms'];
    return 'tainguyen/images/' . ($folders[$file] ?? 'products') . '/' . basename($file);
}
function icon(string $name): string {
    global $paths;
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="' . h($paths[$name] ?? $paths['paw']) . '"></path></svg>';
}
function theSanPham(array $p): void { ?>
<article class="product">
    <div class="product-image">
        <a href="<?= h(url('chi-tiet-san-pham', ['id'=>$p['id']])) ?>"><img src="<?= h(anh($p['img'])) ?>" alt="<?= h($p['name']) ?>" loading="lazy"></a>
        <?php if ($p['id'] < 5): ?><span class="tag">ĐƯỢC YÊU THÍCH</span><?php endif; ?>
        <button class="quick" type="button" aria-label="Thêm <?= h($p['name']) ?> vào giỏ" onclick="addCart(<?= $p['id'] ?>)"><?= icon('plus') ?></button>
    </div>
    <div class="brand"><?= h($p['brand']) ?></div>
    <a href="<?= h(url('chi-tiet-san-pham', ['id'=>$p['id']])) ?>"><h3><?= h($p['name']) ?></h3></a>
    <div class="price"><?= tien($p['price']) ?></div>
</article>
<?php }
$danhSachTrang = [
'trang-chu' => ['ten' => 'Trang chủ', 'file' => 'CuaHang/TrangChu.php', 'js' => []],
'san-pham' => ['ten' => 'Sản phẩm cho chó', 'file' => 'CuaHang/SanPham/DanhSach.php', 'js' => ['SanPham']],
'chi-tiet-san-pham' => ['ten' => 'Chi tiết sản phẩm', 'file' => 'CuaHang/SanPham/ChiTietSP.php', 'js' => ['SanPham']],
'gio-hang' => ['ten' => 'Giỏ hàng', 'file' => 'CuaHang/GioHang/DanhSach.php', 'js' => ['GioHang']],
'dat-hang' => ['ten' => 'Thanh toán', 'file' => 'CuaHang/DatHang/Forms.php', 'js' => ['DatHang']],
'ket-qua-dat-hang' => ['ten' => 'Kết quả xác nhận', 'file' => 'CuaHang/DatHang/KetQua.php', 'js' => ['ThanhToan']],
'thanh-toan' => ['ten' => 'Thanh toán', 'file' => 'CuaHang/ThanhToan/ThongTin.php', 'js' => ['DatHang']],
'ket-qua-thanh-toan' => ['ten' => 'Kết quả xác nhận', 'file' => 'CuaHang/ThanhToan/KetQua.php', 'js' => ['ThanhToan']],
'dich-vu' => ['ten' => 'Spa & Grooming', 'file' => 'CuaHang/DichVu/DanhSach.php', 'js' => []],
'chi-tiet-dich-vu' => ['ten' => 'Spa & Grooming', 'file' => 'CuaHang/DichVu/ChiTietDV.php', 'js' => []],
'luu-tru' => ['ten' => 'Lưu trú thú cưng', 'file' => 'CuaHang/LuuTru/DanhSach.php', 'js' => []],
'chi-tiet-luu-tru' => ['ten' => 'Lưu trú thú cưng', 'file' => 'CuaHang/LuuTru/ChiTietLT.php', 'js' => []],
'dat-lich' => ['ten' => 'Đặt lịch dịch vụ', 'file' => 'CuaHang/DatLich/Forms.php', 'js' => ['TaiKhoan', 'DatLich']],
'ket-qua-dat-lich' => ['ten' => 'Kết quả xác nhận', 'file' => 'CuaHang/DatLich/KetQua.php', 'js' => ['ThanhToan']],
'chi-nhanh' => ['ten' => 'Liên hệ & chi nhánh', 'file' => 'CuaHang/ChiNhanh/DanhSach.php', 'js' => ['ChiNhanh']],
'chi-tiet-chi-nhanh' => ['ten' => 'Liên hệ & chi nhánh', 'file' => 'CuaHang/ChiNhanh/ChiTiet.php', 'js' => ['ChiNhanh']],
'quyen-gop' => ['ten' => 'Quyên góp', 'file' => 'CuaHang/QuyenGop/ThongTin.php', 'js' => ['QuyenGop']],
'quyen-gop-thong-tin' => ['ten' => 'Quyên góp', 'file' => 'CuaHang/QuyenGop/Forms.php', 'js' => ['QuyenGop']],
'ket-qua-quyen-gop' => ['ten' => 'Kết quả xác nhận', 'file' => 'CuaHang/QuyenGop/KetQua.php', 'js' => ['ThanhToan']],
'dang-nhap' => ['ten' => 'Tài khoản PawNest', 'file' => 'XacThuc/DangNhap.php', 'js' => []],
'dang-ky' => ['ten' => 'Tài khoản PawNest', 'file' => 'XacThuc/DangKy.php', 'js' => []],
'quen-mat-khau' => ['ten' => 'Quên mật khẩu', 'file' => 'XacThuc/DoiMatKhau.php', 'js' => []],
'tai-khoan' => ['ten' => 'Tài khoản khách hàng', 'file' => 'TaiKhoan/HoSo/ChiTiet.php', 'js' => ['TaiKhoan']],
'tai-khoan-ho-so' => ['ten' => 'Thông tin & địa chỉ', 'file' => 'TaiKhoan/HoSo/Sua.php', 'js' => ['TaiKhoan']],
'tai-khoan-thu-cung' => ['ten' => 'Thú cưng của tôi', 'file' => 'TaiKhoan/ThuCung/DanhSach.php', 'js' => ['TaiKhoan']],
'tai-khoan-them-thu-cung' => ['ten' => 'Thú cưng của tôi', 'file' => 'TaiKhoan/ThuCung/Them.php', 'js' => ['TaiKhoan']],
'tai-khoan-sua-thu-cung' => ['ten' => 'Thú cưng của tôi', 'file' => 'TaiKhoan/ThuCung/Sua.php', 'js' => ['TaiKhoan']],
'tai-khoan-don-hang' => ['ten' => 'Đơn hàng', 'file' => 'TaiKhoan/DonHang/DanhSach.php', 'js' => ['ThanhToan', 'DonHang']],
'tai-khoan-chi-tiet-don-hang' => ['ten' => 'Đơn hàng', 'file' => 'TaiKhoan/DonHang/ChiTiet.php', 'js' => ['ThanhToan', 'DonHang']],
'tai-khoan-lich-dat' => ['ten' => 'Lịch đặt', 'file' => 'TaiKhoan/LichDat/DanhSach.php', 'js' => ['ThanhToan', 'LichDat']],
'tai-khoan-chi-tiet-lich-dat' => ['ten' => 'Lịch đặt', 'file' => 'TaiKhoan/LichDat/ChiTiet.php', 'js' => ['ThanhToan', 'LichDat']],
'tai-khoan-quyen-gop' => ['ten' => 'Lịch sử quyên góp', 'file' => 'TaiKhoan/QuyenGop/DanhSach.php', 'js' => ['ThanhToan', 'QuyenGop']],
'tai-khoan-chi-tiet-quyen-gop' => ['ten' => 'Lịch sử quyên góp', 'file' => 'TaiKhoan/QuyenGop/ChiTiet.php', 'js' => ['ThanhToan', 'QuyenGop']],
];

$trang = thamSo('trang', 'trang-chu');
$cauHinh = $danhSachTrang[$trang] ?? null;
if (!$cauHinh || (isset($_GET['trang']) && !is_string($_GET['trang']))) {
    http_response_code(404);
    $cauHinh = ['ten'=>'Không tìm thấy trang', 'file'=>'Errors/KhongTimThay.php', 'js'=>[]];
}
if ($trang === 'san-pham' && thamSo('thu-cung') === 'meo') $cauHinh['ten'] = 'Sản phẩm cho mèo';
if ($trang === 'chi-tiet-san-pham') {
    $sanPham = array_values(array_filter($products, fn($p) => (string) $p['id'] === thamSo('id')))[0] ?? null;
    if (!$sanPham) {
        http_response_code(404);
        $cauHinh = ['ten'=>'Không tìm thấy sản phẩm', 'file'=>'Errors/KhongTimThay.php', 'js'=>[]];
    }
}
$tenTrang = $cauHinh['ten'];
$tieuDeTrang = $tenTrang . ' | PawNest';
$fileNoiDung = THU_MUC_VIEWS . '/' . $cauHinh['file'];
$laTaiKhoan = str_starts_with($trang, 'tai-khoan');
$fileKhung = THU_MUC_VIEWS . '/layouts/' . ($laTaiKhoan ? 'KhungTaiKhoan.php' : 'KhungCuaHang.php');
if (!is_file($fileNoiDung) || !is_file($fileKhung)) {
    http_response_code(500);
    $tenTrang = 'Không thể tải trang';
    $fileNoiDung = THU_MUC_VIEWS . '/Errors/LoiServer.php';
}
require $fileKhung;
