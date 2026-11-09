<?php $p = $sanPham; ?>
<div class="container">
    <div class="breadcrumb"><a href="<?= h(url('trang-chu')) ?>">Trang chủ</a> / <a href="<?= h(url('san-pham',['thu-cung'=>$p['species']==='cat'?'meo':'cho'])) ?>">Cửa hàng</a> / <?= h($p['name']) ?></div>
    <div class="detail">
        <div class="detail-photo"><img src="<?= h(anh($p['img'])) ?>" alt="<?= h($p['name']) ?>"></div>
        <div>
            <div class="brand"><?= h($p['brand']) ?></div><h1><?= h($p['name']) ?></h1><span class="pill">Có sẵn · Dữ liệu mẫu</span>
            <div class="price"><?= tien($p['price']) ?></div>
            <p>Một lựa chọn <?= $p['group']==='Thức ăn'?'dinh dưỡng cho bữa ăn hằng ngày':'tiện dụng, dễ sử dụng và chăm chút từng chi tiết' ?> dành cho người bạn nhỏ. Sản phẩm minh họa trong bộ sưu tập PawNest.</p>
            <label class="field">Phân loại<select id="variant"><option><?= h($p['variant']) ?></option></select></label>
            <div class="row" style="justify-content:flex-start"><span>Số lượng</span><div class="qty"><button type="button" onclick="changeQuantity(-1)" aria-label="Giảm số lượng">−</button><span id="q">1</span><button type="button" onclick="changeQuantity(1)" aria-label="Tăng số lượng">+</button></div><span class="hint">Tối đa 20 sản phẩm / đơn demo</span></div>
            <div class="button-row" style="margin:25px 0"><button type="button" class="btn" onclick="addCart(<?= $p['id'] ?>,quantity)"><?= icon('cart') ?> Thêm vào giỏ</button><button type="button" class="btn outline" onclick="buyProduct(<?= $p['id'] ?>)">Mua ngay</button></div>
            <p class="hint"><?= icon('truck') ?> Giao hàng nội thành TP.HCM · Phí mẫu 30.000 ₫<br>Ảnh, giá và thông tin sản phẩm phục vụ minh họa giao diện.</p>
        </div>
    </div>
    <section class="section"><h2>Sản phẩm liên quan</h2><div class="product-grid"><?php $related=array_slice(array_values(array_filter($products,fn($x) => $x['id']!==$p['id'] && ($x['species']===$p['species'] || $x['species']==='both'))),0,4); foreach ($related as $item) theSanPham($item); ?></div></section>
</div>
