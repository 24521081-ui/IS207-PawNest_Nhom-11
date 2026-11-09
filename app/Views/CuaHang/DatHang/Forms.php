<div class="container">
    <div class="breadcrumb"><a href="<?= h(url('trang-chu')) ?>">Trang chủ</a> / Thanh toán</div>
    <div id="checkout-empty" class="section" hidden><div class="empty"><h3>Chưa có sản phẩm được chọn</h3><a class="btn" href="<?= h(url('gio-hang')) ?>">Về giỏ hàng</a></div></div>
    <form id="checkout-form" class="layout">
        <div>
            <div class="panel"><img class="form-decoration cartoon-peek" src="<?= h(anh('art/dog.svg')) ?>" alt=""><h2>Thông tin nhận hàng</h2>
                <div class="two"><label class="field">Họ và tên<input name="name" required maxlength="100" autocomplete="name"></label><label class="field">Số điện thoại<input name="phone" required pattern="[0-9 +]{9,14}" autocomplete="tel"></label></div>
                <label class="field">Thành phố<input value="TP. Hồ Chí Minh" readonly></label>
                <label class="field">Địa chỉ nhận hàng tại TP.HCM<input name="address" required maxlength="250" placeholder="Số nhà, tên đường, phường / xã" autocomplete="street-address"></label>
                <label class="field">Lời nhắn<textarea name="note" maxlength="1000" placeholder="Điều bạn muốn PawNest lưu ý..."></textarea></label>
            </div>
            <div class="panel"><h2>Phương thức thanh toán</h2>
                <label class="row"><span>Thanh toán khi nhận hàng (COD)</span><input type="radio" name="payment" value="COD" checked onchange="document.getElementById('prepay').hidden=true"></label>
                <label class="row"><span>Thanh toán trước</span><input type="radio" name="payment" value="Thanh toán trước" onchange="document.getElementById('prepay').hidden=false"></label>
                <div id="prepay" class="notice" hidden><b>Minh họa thanh toán trước</b><br>Khi triển khai chính thức, thông tin thanh toán sẽ xuất hiện ở đây. Demo không cung cấp tài khoản chuyển tiền, không thu tiền và không xác nhận đã thanh toán.</div>
            </div>
        </div>
        <aside class="summary"><h2>Đơn hàng của bạn</h2><div id="checkout-items"></div><div class="row small"><span>Tạm tính</span><span id="checkout-subtotal">0 ₫</span></div><div class="row small"><span>Giao hàng TP.HCM (mẫu)</span><span>30.000 ₫</span></div><div class="row total"><span>Tổng cộng</span><span id="checkout-total">0 ₫</span></div><button class="btn wide" type="submit">Xác nhận đơn demo</button><p class="hint" style="margin:15px 0 0">Chỉ minh họa thao tác. Không thu tiền, gửi email hay tạo đơn giao hàng thật.</p></aside>
    </form>
</div>
