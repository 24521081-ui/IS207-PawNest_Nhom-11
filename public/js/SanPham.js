'use strict';
function changeQuantity(delta) { quantity = Math.max(1, Math.min(20, quantity + delta)); $('#q').textContent = quantity; }
function buyProduct(id) {
    const product = products.find(p => p.id === id);
    if (!product)
        return;
    buyNow = [{ id, qty: quantity, variant: product.variant }];
    try {
        sessionStorage.setItem('pawnest-buy-now', JSON.stringify(buyNow));
        go('checkout');
    }
    catch {
        notify('Cần bật lưu trữ trình duyệt để thử mua ngay.');
    }
}
const productFilters = $('#product-filters');
if (productFilters) {
    if ($('#product-sort').value === 'name') {
        const grid = $('.catalog .product-grid');
        if (grid)
            [...grid.children].sort((a, b) => a.querySelector('h3').textContent.localeCompare(b.querySelector('h3').textContent, 'vi')).forEach(card => grid.appendChild(card));
    }
    productFilters.addEventListener('change', event => {
        if (event.target.name === 'nhom')
            productFilters.elements['loai-sp'].value = '';
        if (event.target.name === 'loai-sp')
            productFilters.querySelectorAll('[name="nhom"]').forEach(input => input.checked = false);
        productFilters.requestSubmit();
    });
    $('#product-sort').addEventListener('change', event => { productFilters.elements.sort.value = event.target.value; productFilters.requestSubmit(); });
}
