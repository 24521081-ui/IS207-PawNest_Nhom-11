'use strict';
// Giữ ảnh chụp các món đã chọn trong trang thanh toán; không tính lại theo giỏ thay đổi giữa chừng.
let checkoutItems = [];
if (Array.isArray(buyNow))
    checkoutItems = buyNow.filter(x => x && products.some(p => p.id === x.id) && Number.isInteger(x.qty) && x.qty >= 1 && x.qty <= 20).map(x => ({ id: x.id, qty: x.qty, variant: products.find(p => p.id === x.id).variant }));
else
    checkoutItems = state.cart.filter(x => x.selected).map(x => ({ ...x }));
const checkoutSubtotal = checkoutItems.reduce((sum, x) => sum + products.find(p => p.id === x.id).price * x.qty, 0);
if (!checkoutItems.length) {
    $('#checkout-form').hidden = true;
    $('#checkout-empty').hidden = false;
}
else {
    for (const key of ['name', 'phone', 'address'])
        $('#checkout-form').elements[key].value = state.profile[key];
    P.mount('#checkout-items', checkoutItems.map(item => { const p = products.find(p => p.id === item.id); return `<div class="row small"><span>${esc(p.name)} × ${item.qty}</span><b>${money(p.price * item.qty)}</b></div>`; }).join(''));
    $('#checkout-subtotal').textContent = money(checkoutSubtotal);
    $('#checkout-total').textContent = money(checkoutSubtotal + 30000);
}
$('#checkout-form').addEventListener('submit', event => {
    event.preventDefault();
    const form = event.currentTarget;
    if (!form.reportValidity() || !checkoutItems.length || form.dataset.submitting)
        return;
    const values = Object.fromEntries(new FormData(form));
    if (!values.name.trim() || !values.address.trim()) {
        notify('Vui lòng nhập tên và địa chỉ nhận hàng.');
        return;
    }
    if (!['COD', 'Thanh toán trước'].includes(values.payment))
        return;
    const id = P.id('PN'), order = { id, name: values.name.trim(), phone: values.phone, address: values.address.trim(), note: values.note, payment: values.payment, items: checkoutItems, subtotal: checkoutSubtotal, ship: 30000, total: checkoutSubtotal + 30000, date: P.date(), status: values.payment === 'COD' ? 'Chuẩn bị giao' : 'Chờ thanh toán (demo)' };
    const previousCart = state.cart;
    state.orders.unshift(order);
    if (!buyNow)
        state.cart = state.cart.filter(x => !checkoutItems.some(item => item.id === x.id));
    if (!save()) {
        state.orders.shift();
        state.cart = previousCart;
        return;
    }
    form.dataset.submitting = 'true';
    form.querySelector('[type="submit"]').disabled = true;
    try {
        sessionStorage.removeItem('pawnest-buy-now');
    }
    catch { }
    go('result/order/' + id);
});
