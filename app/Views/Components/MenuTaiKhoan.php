<?php
$menu = ['tai-khoan'=>'Tổng quan','tai-khoan-ho-so'=>'Thông tin & địa chỉ','tai-khoan-thu-cung'=>'Thú cưng của tôi','tai-khoan-don-hang'=>'Đơn hàng','tai-khoan-lich-dat'=>'Lịch đặt','tai-khoan-quyen-gop'=>'Lịch sử quyên góp'];
?>
<aside class="account-nav" aria-label="Tài khoản khách hàng">
<?php foreach ($menu as $key=>$label): ?>
<a href="<?= h(url($key)) ?>" class="<?= $trang === $key || str_replace('-chi-tiet-', '-', $trang) === $key ? 'active' : '' ?>"><?= h($label) ?></a>
<?php endforeach; ?>
</aside>
