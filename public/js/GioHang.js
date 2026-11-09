'use strict';
// View giữ cấu trúc HTML; module chỉ ghép dữ liệu vào từng dòng và tính lại tổng.
const cartTotal = () => state.cart.filter(x => x.selected).reduce((sum, x) => sum + products.find(p => p.id === x.id).price * x.qty, 0);
function cartQty(id, delta) {
    const item = state.cart.find(x => x.id === id);
    if (!item)
        return;
    item.qty = Math.max(1, Math.min(20, item.qty + delta));
    save();
    render();
}
function removeCart(id) { state.cart = state.cart.filter(x => x.id !== id); save(); render(); notify('Đã xóa sản phẩm khỏi giỏ'); }
function checkoutFromCart() { try {
    sessionStorage.removeItem('pawnest-buy-now');
}
catch { } buyNow = null; go('checkout'); }
function renderCart() {
    $('#cart-panel').hidden = !state.cart.length;
    $('#cart-empty').hidden = !!state.cart.length;
    $('#cart-count').textContent = state.cart.length;
    $('#cart-all').checked = state.cart.length > 0 && state.cart.every(x => x.selected);
    $('#cart-all').indeterminate = state.cart.some(x => x.selected) && !state.cart.every(x => x.selected);
    const fragment = document.createDocumentFragment();
    for (const item of state.cart) {
        const product = products.find(p => p.id === item.id), row = $('#cart-row').content.firstElementChild.cloneNode(true);
        row.dataset.id = String(item.id);
        row.querySelector('[data-select]').checked = item.selected;
        row.querySelector('[data-select]').setAttribute('aria-label', 'Chọn ' + product.name);
        row.querySelectorAll('[data-product-link]').forEach(a => a.href = P.url('chi-tiet-san-pham', { id: item.id }));
        row.querySelector('img').src = P.img(product.img);
        row.querySelector('img').alt = product.name;
        row.querySelector('[data-product-name]').textContent = product.name;
        row.querySelector('[data-variant]').textContent = item.variant;
        row.querySelector('[data-price]').textContent = money(product.price);
        row.querySelector('[data-quantity]').textContent = item.qty;
        fragment.appendChild(row);
    }
    $('#cart-items').replaceChildren(fragment);
    $('#cart-selected-count').textContent = state.cart.filter(x => x.selected).reduce((sum, x) => sum + x.qty, 0);
    $('#cart-total').textContent = money(cartTotal());
    $('#cart-checkout').disabled = !cartTotal();
}
$('#cart-all').addEventListener('change', e => { state.cart.forEach(item => item.selected = e.target.checked); save(); render(); });
$('#cart-items').addEventListener('change', e => { if (!e.target.matches('[data-select]'))
    return; const item = state.cart.find(x => x.id === Number(e.target.closest('.cart-item').dataset.id)); if (item) {
    item.selected = e.target.checked;
    save();
    render();
} });
$('#cart-items').addEventListener('click', e => { const row = e.target.closest('.cart-item'); if (!row)
    return; const id = Number(row.dataset.id), qty = e.target.closest('[data-qty]'); if (qty)
    cartQty(id, Number(qty.dataset.qty)); if (e.target.closest('[data-remove]'))
    removeCart(id); });
$('#cart-checkout').addEventListener('click', checkoutFromCart);
P.pageRender = renderCart;
render();
