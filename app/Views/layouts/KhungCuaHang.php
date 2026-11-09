<?php
/** Khung dùng chung: banner, Components, View PHP, và chỉ module JS của trang. */
$meo = thamSo('thu-cung') === 'meo' || str_contains($trang, 'thu-cung') || $trang === 'quyen-gop';
$banner = $trang === 'dich-vu' ? 'spa.jpg' : ($meo ? 'cat.jpg' : 'dog.jpg');
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($tieuDeTrang) ?></title>
    <link rel="icon" href="tainguyen/images/logo/dog.svg" type="image/svg+xml">
    <link rel="icon" href="tainguyen/images/logo/dog.svg" type="image/svg+xml">
    <meta name="description" content="PawNest – sản phẩm, spa và nơi lưu trú dành cho người bạn nhỏ. Prototype tương tác.">
    <link rel="stylesheet" href="tainguyen/Chung.css">
    <link rel="stylesheet" href="tainguyen/ThanhPhan.css">
    <link rel="stylesheet" href="tainguyen/CuaHang.css">
    <?php if ($laTaiKhoan): ?><link rel="stylesheet" href="tainguyen/TaiKhoan.css"><?php endif; ?>
</head>
<body>
    <a class="skip-link" href="#noi-dung-chinh">Đến nội dung chính</a>
    <?php require THU_MUC_VIEWS . '/Components/DauTrang.php'; ?>
    <main id="noi-dung-chinh" class="<?= $trang !== 'trang-chu' ? 'has-page-banner' : '' ?>">
        <?php if ($trang !== 'trang-chu'): ?>
        <section class="page-banner" aria-label="<?= h($tenTrang) ?>">
            <img class="page-banner-photo" src="<?= h(anh($banner)) ?>" alt="" fetchpriority="high">
            <div class="page-banner-inner"><h1><?= h($tenTrang) ?></h1><div class="banner-cartoon" aria-hidden="true"><img src="<?= h(anh('art/' . ($meo?'cat':'dog') . '.svg')) ?>" alt=""></div></div>
        </section>
        <?php endif; ?>
        <?php if ($laTaiKhoan): ?>
        <div class="container">
            <div class="breadcrumb"><a href="<?= h(url('trang-chu')) ?>">Trang chủ</a> / Tài khoản</div>
            <div class="notice" id="account-notice">Bạn đang xem trước tài khoản mẫu. Mọi dữ liệu chỉ lưu trong trình duyệt hiện tại.</div>
            <div class="account-layout">
                <?php require THU_MUC_VIEWS . '/Components/MenuTaiKhoan.php'; ?>
                <div><?php require $fileNoiDung; ?></div>
            </div>
        </div>
        <?php else: require $fileNoiDung; endif; ?>
    </main>
    <?php require THU_MUC_VIEWS . '/Components/ChanTrang.php'; ?>
    <div id="modal"></div><div id="toast" role="status" aria-live="polite"></div>
    <script id="pawnest-data" type="application/json"><?= json_encode(['products'=>$products,'groups'=>$groups,'branches'=>$branches,'addresses'=>$addresses,'services'=>$services,'rooms'=>$rooms,'initial'=>$duLieuBanDau,'paths'=>$paths,'page'=>$trang], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
    <script src="js/Chung.js" defer></script>
    <script src="js/XacThuc.js" defer></script>
    <?php foreach ($cauHinh['js'] as $module): ?><script src="js/<?= h($module) ?>.js" defer></script><?php endforeach; ?>
    <noscript><p class="container notice">Bật JavaScript để sử dụng giỏ hàng, đặt lịch và dữ liệu demo lưu trong trình duyệt.</p></noscript>
</body>
</html>
