<div class="container">
    <div class="breadcrumb"><a href="<?= h(url('trang-chu')) ?>">Trang chủ</a> / Giỏ hàng</div>
    <div class="layout">
        <div>
            <div class="panel" id="cart-panel" hidden>
                <label class="hint"><input type="checkbox" id="cart-all"> Chọn tất cả (<span id="cart-count">0</span> sản phẩm)</label>
                <div id="cart-items"></div>
            </div>
            <div class="empty" id="cart-empty"><img class="empty-cartoon" src="<?= h(anh('art/cat.svg')) ?>" alt=""><h3>Giỏ hàng đang chờ bạn</h3><p>Khám phá những món xinh dành cho bé nhé.</p></div>
            <a href="<?= h(url('san-pham',['thu-cung'=>'cho'])) ?>" class="link">← Tiếp tục mua sắm</a>
        </div>
        <aside class="summary"><h2>Tóm tắt giỏ hàng</h2><div class="row small"><span>Sản phẩm đã chọn</span><b id="cart-selected-count">0</b></div><div class="row total"><span>Tạm tính</span><span id="cart-total">0 ₫</span></div><p class="hint">Phí giao hàng được tính ở bước thanh toán. Giỏ hàng không giữ tồn kho.</p><button class="btn wide" id="cart-checkout" type="button" disabled>Tiến hành thanh toán <?= icon('arrow') ?></button></aside>
    </div>
</div>
<template id="cart-row">
    <div class="cart-item">
        <input type="checkbox" data-select>
        <a data-product-link><img alt=""></a>
        <div class="info"><h3><a data-product-link data-product-name></a></h3><p class="hint" style="margin:0 0 8px" data-variant></p><span class="price" data-price></span></div>
        <div class="qty"><button type="button" aria-label="Giảm số lượng" data-qty="-1">−</button><span data-quantity></span><button type="button" aria-label="Tăng số lượng" data-qty="1">+</button></div>
        <button class="iconbtn" type="button" aria-label="Xóa sản phẩm" data-remove><?= icon('trash') ?></button>
    </div>
</template>
