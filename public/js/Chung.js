'use strict';
// Dữ liệu mẫu được PHP xuất một lần. Chỉ lưu thông tin demo, tuyệt đối không lưu mật khẩu.
const source = JSON.parse(document.getElementById('pawnest-data').textContent);
const { products, groups, branches, addresses, services, rooms, paths } = source;
const $ = selector => document.querySelector(selector);
const money = n => new Intl.NumberFormat('vi-VN').format(n) + ' ₫';
const esc = value => String(value ?? '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
const initial = () => structuredClone(source.initial);
const STORAGE_KEY = 'pawnest-demo-v1';
let state = initial();
try {
    const stored = JSON.parse(localStorage.getItem(STORAGE_KEY));
    if (stored && typeof stored === 'object') {
        state.user = stored.user === true;
        for (const key of ['name', 'email', 'phone', 'address']) {
            if (typeof stored.profile?.[key] === 'string')
                state.profile[key] = stored.profile[key];
        }
        for (const key of ['pets', 'orders', 'bookings', 'donations']) {
            if (Array.isArray(stored[key]))
                state[key] = stored[key].filter(x => x && typeof x === 'object' && x.id != null);
        }
        state.pets = state.pets.filter(p => ['Chó', 'Mèo'].includes(p.species) && Number.isFinite(Number(p.weight)) && p.weight > 0 && p.weight <= 100 && typeof p.name === 'string').map(p => ({ id: p.id, name: p.name, species: p.species, weight: Number(p.weight), img: p.species === 'Chó' ? 'dog.jpg' : 'cat.jpg' }));
        state.cart = Array.isArray(stored.cart) ? stored.cart.filter(x => x && products.some(p => p.id === x.id)).map(x => ({ id: x.id, qty: Math.max(1, Math.min(20, Math.floor(Number(x.qty) || 1))), selected: x.selected !== false, variant: products.find(p => p.id === x.id).variant })) : [];
    }
}
catch { /* JSON hỏng hoặc trình duyệt chặn lưu trữ: vẫn mở được dữ liệu mẫu. */ }
let quantity = 1, buyNow = null;
let booking = { branch: 0, pet: state.pets[0]?.id ?? 0, stay: false, spa: false, checkin: '', checkout: '', room: '', service: '', spaDate: '', slot: '' };
try {
    const draft = JSON.parse(sessionStorage.getItem('pawnest-booking-draft'));
    if (draft && typeof draft === 'object')
        for (const key of Object.keys(booking))
            if (key in draft)
                booking[key] = draft[key];
    buyNow = JSON.parse(sessionStorage.getItem('pawnest-buy-now'));
}
catch { /* Bản nháp không bắt buộc. */ }
if (!Number.isInteger(Number(booking.branch)) || booking.branch < 0 || booking.branch >= branches.length)
    booking.branch = 0;
if (!state.pets.some(p => p.id == booking.pet))
    booking.pet = state.pets[0]?.id ?? 0;
function icon(name) { return `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="${paths[name] || paths.paw}"></path></svg>`; }
function notify(message) {
    $('#toast').textContent = message;
    $('#toast').classList.add('show');
    clearTimeout(window.toastTimer);
    window.toastTimer = setTimeout(() => $('#toast').classList.remove('show'), 3200);
}
function updateHeader() {
    const badge = $('#header .badge');
    if (badge)
        badge.textContent = state.cart.reduce((sum, x) => sum + x.qty, 0);
}
function save() {
    try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
        updateHeader();
        return true;
    }
    catch {
        notify('Trình duyệt chưa cho phép lưu dữ liệu demo. Hãy bật lưu trữ để tiếp tục.');
        return false;
    }
}
const P = {
    page: source.page,
    url(page, params = {}) { return 'index.php?' + new URLSearchParams({ trang: page, ...params }); },
    img(file) {
        if (file.startsWith('tainguyen/'))
            return file;
        const folder = file.startsWith('art/') ? 'logo' : ({ 'dog.jpg': 'banners', 'cat.jpg': 'banners', 'spa.jpg': 'services', 'rescue.jpg': 'banners', 'room.jpg': 'rooms' }[file] || 'products');
        return 'tainguyen/images/' + folder + '/' + file.split('/').pop();
    },
    id(prefix) { return prefix + '-' + crypto.randomUUID().slice(0, 8).toUpperCase(); },
    date() { return new Date().toLocaleDateString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh' }); },
    draft() {
        try {
            sessionStorage.setItem('pawnest-booking-draft', JSON.stringify(booking));
        }
        catch { }
    },
    pageRender: null,
    html(html) {
        // Chỉ chuyển URL của nội dung do các module tạo; dữ liệu người dùng đã qua esc().
        const template = document.createElement('template');
        template.innerHTML = html;
        template.content.querySelectorAll('a[href^="#"]').forEach(a => { a.setAttribute('href', routeURL(a.getAttribute('href').slice(1))); });
        template.content.querySelectorAll('img[src]').forEach(img => {
            if (!/^(?:https?:|data:|tainguyen\/)/.test(img.getAttribute('src')))
                img.setAttribute('src', P.img(img.getAttribute('src')));
        });
        return template.innerHTML;
    },
    mount(selector, html) {
        const target = $(selector);
        if (target)
            target.innerHTML = P.html(html);
    },
};
function routeURL(route) {
    const [path, query = ''] = route.split('?'), [kind, a = '', id = ''] = path.split('/');
    let page, params = {};
    const pages = { home: 'trang-chu', cart: 'gio-hang', checkout: 'dat-hang', booking: 'dat-lich', donation: 'quyen-gop', contact: 'chi-nhanh' };
    if (kind === 'products') {
        page = 'san-pham';
        params['thu-cung'] = a === 'cat' ? 'meo' : 'cho';
    }
    else if (kind === 'product') {
        page = 'chi-tiet-san-pham';
        params.id = a;
    }
    else if (kind === 'service')
        page = a === 'stay' ? 'luu-tru' : 'dich-vu';
    else if (kind === 'result') {
        page = { order: 'ket-qua-dat-hang', booking: 'ket-qua-dat-lich', donation: 'ket-qua-quyen-gop' }[a];
        params.id = id;
    }
    else if (kind === 'account') {
        page = { overview: 'tai-khoan', profile: 'tai-khoan-ho-so', pets: 'tai-khoan-thu-cung', orders: 'tai-khoan-don-hang', bookings: 'tai-khoan-lich-dat', donations: 'tai-khoan-quyen-gop', '': 'tai-khoan' }[a];
        if (id) {
            page = page.replace('tai-khoan-', 'tai-khoan-chi-tiet-');
            params.id = id;
        }
    }
    else
        page = pages[kind];
    if (kind === 'booking' && a)
        params['dich-vu'] = a === 'stay' ? 'luu-tru' : 'spa';
    for (const [key, value] of new URLSearchParams(query))
        params[{ group: 'nhom', type: 'loai-sp' }[key] || key] = value;
    return P.url(page || 'trang-chu', params);
}
function go(route) { P.draft(); location.assign(routeURL(route)); }
function render() {
    if (P.pageRender)
        P.pageRender();
}
function addCart(id, qty = 1) {
    const product = products.find(p => p.id === id);
    if (!product)
        return;
    qty = Math.max(1, Math.min(20, Math.floor(Number(qty) || 1)));
    const item = state.cart.find(x => x.id === id);
    if (item) {
        item.qty = Math.min(20, item.qty + qty);
        item.selected = true;
    }
    else
        state.cart.push({ id, qty, selected: true, variant: product.variant });
    if (save())
        notify('Đã thêm vào giỏ hàng của bạn');
}
function toggleMenu(button) {
    const open = $('#header nav').classList.toggle('mobile-open');
    button.setAttribute('aria-expanded', String(open));
}
function toggleSubmenu(button) {
    const open = button.parentElement.classList.toggle('open');
    button.setAttribute('aria-expanded', String(open));
}
let modalOpener = null, modalCleanup = null;
function modal(html, authBackground = false) {
    if (!$('#modal').firstElementChild)
        modalOpener = document.activeElement;
    if (modalCleanup) {
        modalCleanup();
        modalCleanup = null;
    }
    $('#modal').innerHTML = P.html(`<div class="modal-backdrop ${authBackground ? 'auth-bg' : ''}"><section class="modal-box ${authBackground ? 'auth' : ''}" role="dialog" aria-modal="true" aria-label="Hộp thoại PawNest" tabindex="-1"><button type="button" class="close iconbtn" aria-label="Đóng" onclick="closeModal()">${icon('close')}</button>${html}</section></div>`);
    document.body.style.overflow = 'hidden';
    $('.modal-backdrop').addEventListener('click', e => {
        if (e.target === e.currentTarget)
            closeModal();
    });
    $('.modal-box').focus();
}
function closeModal() {
    if (modalCleanup) {
        modalCleanup();
        modalCleanup = null;
    }
    $('#modal').replaceChildren();
    document.body.style.overflow = '';
    if (modalOpener?.isConnected)
        modalOpener.focus();
    modalOpener = null;
}
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        closeModal();
        $('.account-pop')?.remove();
        $('#header nav').classList.remove('mobile-open');
        $('#header .menu-toggle').setAttribute('aria-expanded', 'false');
        $('#header').querySelectorAll('.navitem.open').forEach(item => { item.classList.remove('open'); item.querySelector('.mobile-expand')?.setAttribute('aria-expanded', 'false'); });
    }
    if (e.key === 'Tab' && $('.modal-box')) {
        const nodes = [...$('.modal-box').querySelectorAll('button:not(:disabled),a[href],input:not(:disabled),select,textarea,[tabindex="0"]')].filter(x => x.getClientRects().length);
        const first = nodes[0], last = nodes.at(-1);
        if (e.shiftKey && (document.activeElement === first || document.activeElement === $('.modal-box'))) {
            e.preventDefault();
            last?.focus();
        }
        else if (!e.shiftKey && (document.activeElement === last || document.activeElement === $('.modal-box'))) {
            e.preventDefault();
            first?.focus();
        }
    }
});
document.addEventListener('click', e => {
    if (!e.target.closest('.account-pop') && !e.target.closest('[aria-label="Tài khoản"]'))
        $('.account-pop')?.remove();
});
window.addEventListener('storage', e => {
    if (e.key === STORAGE_KEY)
        location.reload();
});
function empty(title, description = '') { return `<div class="empty"><img class="empty-cartoon" src="${P.img('art/cat.svg')}" alt=""><h3>${esc(title)}</h3><p>${esc(description)}</p></div>`; }
const crumb = title => `<div class="breadcrumb"><a href="${P.url('trang-chu')}">Trang chủ</a> / ${title}</div>`;
const title = (name, description = '') => `<div class="page-title"><h1>${esc(name)}</h1><p>${esc(description)}</p></div>`;
function resetDemo() {
    modal('<h2>Bắt đầu lại một bản demo mới?</h2><p>Giỏ hàng, lịch đặt, đơn hàng và thông tin bạn đã thử trong trình duyệt này sẽ trở về dữ liệu mẫu ban đầu.</p><div class="button-row"><button class="btn" onclick="confirmResetDemo()">Đặt lại dữ liệu</button><button class="btn outline" onclick="closeModal()">Giữ lại</button></div>');
}
function confirmResetDemo() {
    const previous = state;
    state = initial();
    if (!save()) {
        state = previous;
        return;
    }
    try {
        sessionStorage.removeItem('pawnest-booking-draft');
        sessionStorage.removeItem('pawnest-buy-now');
    }
    catch { }
    location.assign(P.url('trang-chu'));
}
updateHeader();
if ($('#account-notice') && state.user)
    $('#account-notice').textContent = 'Bạn đang sử dụng tài khoản mẫu PawNest. Mọi dữ liệu chỉ lưu trong trình duyệt hiện tại.';
