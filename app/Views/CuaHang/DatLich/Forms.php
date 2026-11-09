<div class="container">
    <div class="breadcrumb"><a href="<?= h(url('trang-chu')) ?>">Trang chủ</a> / Đặt lịch</div>
    <div class="layout">
        <div>
            <?php require __DIR__ . '/Components/ChonThuCungChiNhanh.php'; ?>
            <section class="panel"><h2><span class="booking-step">3</span>Bé cần chăm sóc gì?</h2><div class="needs"><label><input type="checkbox" id="need-stay"><?= icon('home') ?> Lưu trú</label><label><input type="checkbox" id="need-spa"><?= icon('paw') ?> Spa &amp; Grooming</label></div><p class="hint" style="margin:15px 0 0">Bạn có thể chọn một hoặc cả hai nhu cầu trong cùng một lịch đặt.</p></section>
            <?php require __DIR__ . '/Components/ChonLuuTru.php'; ?>
            <?php require __DIR__ . '/Components/ChonDichVu.php'; ?>
        </div>
        <?php require __DIR__ . '/Components/TongHopChiPhi.php'; ?>
    </div>
</div>
