<?php /* Header giữ theo bản tham chiếu; điều hướng bằng Router PHP. */ ?>
<header id="header">
<div class="header-inner">
<button class="menu-toggle iconbtn" type="button" aria-expanded="false" aria-label="Mở menu" onclick="toggleMenu(this)">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="M3 6h18M3 12h18M3 18h18">
</path>
</svg>
</button>
<a href="index.php?trang=trang-chu" class="logo">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="M12 13c-3 0-6 3-6 5s3 3 6 1c3 2 6 1 6-1s-3-5-6-5Z M5 12c-3 0-3-5-1-5s3 5 1 5Z M9 8c-2 0-3-6-1-6s3 6 1 6Z M15 8c-2 0-1-6 1-6s1 6-1 6Z M19 12c-2 0-1-5 1-5s2 5-1 5Z">
</path>
</svg>
<span>PawNest<small>HOME FOR LITTLE PAWS</small>
</span>
</a>
<nav>
<div class="navitem">
<a href="index.php?trang=san-pham&amp;thu-cung=cho">CHO CHÓ | DOG</a>
<button class="mobile-expand" type="button" aria-expanded="false" aria-label="Mở danh mục" onclick="toggleSubmenu(this)">⌄</button>
<div class="drop">
<div class="drop-item">
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;nhom=Th%E1%BB%A9c+%C4%83n">Thức ăn <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=Th%E1%BB%A9c+%C4%83n+h%E1%BA%A1t">Thức ăn hạt</a>
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=Pate+%2F+th%E1%BB%A9c+%C4%83n+%C6%B0%E1%BB%9Bt">Pate / thức ăn ướt</a>
</div>
</div>
<div class="drop-item">
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;nhom=Ph%E1%BB%A5+ki%E1%BB%87n">Phụ kiện <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=V%C3%B2ng+c%E1%BB%95">Vòng cổ</a>
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=D%C3%A2y+d%E1%BA%AFt">Dây dắt</a>
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=%C4%90%E1%BB%93+ch%C6%A1i">Đồ chơi</a>
</div>
</div>
<div class="drop-item">
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;nhom=%C4%90%E1%BB%93+d%C3%B9ng+h%E1%BA%B1ng+ng%C3%A0y">Đồ dùng hằng ngày <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=B%C3%A1t+%C4%83n+%2F+b%C3%ACnh+n%C6%B0%E1%BB%9Bc">Bát ăn / bình nước</a>
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=%C4%90%E1%BB%87m+n%E1%BA%B1m">Đệm nằm</a>
<a href="index.php?trang=san-pham&amp;thu-cung=cho&amp;loai-sp=D%E1%BB%A5ng+c%E1%BB%A5+v%E1%BB%87+sinh">Dụng cụ vệ sinh</a>
</div>
</div>
</div>
</div>
<div class="navitem">
<a href="index.php?trang=san-pham&amp;thu-cung=meo">CHO MÈO | CAT</a>
<button class="mobile-expand" type="button" aria-expanded="false" aria-label="Mở danh mục" onclick="toggleSubmenu(this)">⌄</button>
<div class="drop">
<div class="drop-item">
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;nhom=Th%E1%BB%A9c+%C4%83n">Thức ăn <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=Th%E1%BB%A9c+%C4%83n+h%E1%BA%A1t">Thức ăn hạt</a>
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=Pate+%2F+th%E1%BB%A9c+%C4%83n+%C6%B0%E1%BB%9Bt">Pate / thức ăn ướt</a>
</div>
</div>
<div class="drop-item">
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;nhom=Ph%E1%BB%A5+ki%E1%BB%87n">Phụ kiện <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=V%C3%B2ng+c%E1%BB%95">Vòng cổ</a>
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=D%C3%A2y+d%E1%BA%AFt">Dây dắt</a>
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=%C4%90%E1%BB%93+ch%C6%A1i">Đồ chơi</a>
</div>
</div>
<div class="drop-item">
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;nhom=%C4%90%E1%BB%93+d%C3%B9ng+h%E1%BA%B1ng+ng%C3%A0y">Đồ dùng hằng ngày <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=B%C3%A1t+%C4%83n+%2F+b%C3%ACnh+n%C6%B0%E1%BB%9Bc">Bát ăn / bình nước</a>
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=%C4%90%E1%BB%87m+n%E1%BA%B1m">Đệm nằm</a>
<a href="index.php?trang=san-pham&amp;thu-cung=meo&amp;loai-sp=D%E1%BB%A5ng+c%E1%BB%A5+v%E1%BB%87+sinh">Dụng cụ vệ sinh</a>
</div>
</div>
</div>
</div>
<div class="navitem">
<a href="index.php?trang=dich-vu">SERVICES</a>
<button class="mobile-expand" type="button" aria-expanded="false" aria-label="Mở dịch vụ" onclick="toggleSubmenu(this)">⌄</button>
<div class="drop">
<div class="drop-item">
<a href="index.php?trang=dich-vu">Spa &amp; Grooming <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=dat-lich&amp;dich-vu=spa">Đặt lịch spa</a>
</div>
</div>
<div class="drop-item">
<a href="index.php?trang=luu-tru">Lưu trú thú cưng <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m9 5 7 7-7 7">
</path>
</svg>
</a>
<div class="sub">
<a href="index.php?trang=dat-lich&amp;dich-vu=luu-tru">Đặt lịch lưu trú</a>
</div>
</div>
</div>
</div>
<div class="navitem">
<a href="index.php?trang=quyen-gop">DONATION</a>
</div>
<div class="navitem">
<a href="index.php?trang=chi-nhanh">CONTACT</a>
</div>
</nav>
<div class="actions">
<button class="iconbtn" aria-label="Tìm kiếm" onclick="searchModal()">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="m21 21-5-5 M10.5 18a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15">
</path>
</svg>
</button>
<button class="iconbtn" aria-label="Tài khoản" onclick="accountMenu()">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="M20 21v-2a7 7 0 0 0-14 0v2 M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10">
</path>
</svg>
</button>
<a href="index.php?trang=gio-hang" class="iconbtn" aria-label="Giỏ hàng">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="M3 3h2l3 13h11l2-9H6 M9 21h.01 M18 21h.01">
</path>
</svg>
<span class="badge">0</span>
</a>
<a href="index.php?trang=dat-lich" class="btn">Đặt lịch dịch vụ</a>
</div>
</div>
</header>
