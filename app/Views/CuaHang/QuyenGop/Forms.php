<form class="panel" id="donation-form">
<h2>Thông tin quyên góp</h2>
<div class="amounts">
<button type="button" class="" onclick="donateAmount=50000;$('#donation-amount').value=50000;document.querySelectorAll('.amounts button').forEach(b=>b.classList.remove('active'));this.classList.add('active')">50.000 ₫</button>
<button type="button" class="active" onclick="donateAmount=100000;$('#donation-amount').value=100000;document.querySelectorAll('.amounts button').forEach(b=>b.classList.remove('active'));this.classList.add('active')">100.000 ₫</button>
<button type="button" class="" onclick="donateAmount=200000;$('#donation-amount').value=200000;document.querySelectorAll('.amounts button').forEach(b=>b.classList.remove('active'));this.classList.add('active')">200.000 ₫</button>
</div>
<label class="field">Số tiền khác (VNĐ)<input id="donation-amount" name="amount" type="number" min="10000" max="100000000" step="1000" required value="100000">
</label>
<label class="field">Họ và tên<input name="name" required value="Minh Nguyễn">
</label>
<label class="field">Email (không bắt buộc)<input name="email" type="email" placeholder="ban@example.com">
</label>
<label class="row small" style="justify-content:flex-start">
<input name="anonymous" type="checkbox">Hiển thị ẩn danh</label>
<button class="btn wide" type="submit">Xác nhận quyên góp demo <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
<path d="M20 5c-3-3-7-1-8 1-1-2-5-4-8-1-4 4 1 9 8 15 7-6 12-11 8-15Z"/>
</svg>
</button>
</form>
