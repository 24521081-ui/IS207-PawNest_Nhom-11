'use strict';
// Chỉ mô phỏng đăng nhập; không đọc hoặc lưu mật khẩu người dùng nhập.
function auth(mode = 'login') { modal(`<a class="logo" href="#home" onclick="closeModal()">${icon('paw')} PawNest</a><h2 style="margin-top:28px;margin-bottom:10px">${mode === 'forgot' ? 'Quên mật khẩu' : 'Tài khoản PawNest'}</h2><p>Đăng nhập hoặc đăng ký tài khoản demo.</p>${mode === 'forgot' ? `<form onsubmit="event.preventDefault();notify('Đây là demo, chưa gửi email khôi phục. Hãy dùng tài khoản mẫu.');auth()"><label class="field">Email<input type="email" required></label><button class="btn wide">Xem phản hồi khôi phục</button></form><button class="link" style="margin-top:20px" onclick="auth()">Quay lại đăng nhập</button>` : `<div class="tabs"><button class="${mode === 'login' ? 'active' : ''}" onclick="auth('login')">Đăng nhập</button><button class="${mode === 'register' ? 'active' : ''}" onclick="auth('register')">Đăng ký</button></div><form onsubmit="event.preventDefault();loginDemo()">${mode === 'register' ? '<label class="field">Tên hiển thị<input placeholder="Tên của bạn" required></label>' : ''}<label class="field">Email<input type="email" autocomplete="off" placeholder="ban@example.com" required></label><label class="field">Mật khẩu<div class="password"><input id="password" type="password" autocomplete="new-password" minlength="6" placeholder="Chỉ dùng thông tin thử nghiệm" required><button type="button" aria-label="Hiện hoặc ẩn mật khẩu" onclick="$('#password').type=$('#password').type==='password'?'text':'password'">${icon('eye')}</button></div></label>${mode === 'login' ? '<button type="button" class="link" style="display:block;margin:0 0 22px auto" onclick="auth(\'forgot\')">Quên mật khẩu?</button>' : ''}<button class="btn wide">${mode === 'login' ? 'Đăng nhập demo' : 'Đăng ký demo'}</button></form><button class="btn outline wide" style="margin-top:12px" onclick="loginDemo()">Trải nghiệm tài khoản mẫu</button><p class="hint" style="margin:18px 0 0;text-align:center">Chỉ mô phỏng, không xác thực thật.<br>PawNest không lưu mật khẩu bạn nhập.</p>`}`, true); }
function loginDemo() {
    state.user = true;
    if (!save())
        return;
    closeModal();
    notify('Chào mừng bạn đến với tài khoản mẫu PawNest');
    if (P.page.startsWith('dang-'))
        go('account');
}
function accountMenu() {
    if (!state.user) {
        auth();
        return;
    }
    if ($('.account-pop')) {
        $('.account-pop').remove();
        return;
    }
    const div = document.createElement('div');
    div.className = 'account-pop';
    div.innerHTML = `<a href="${P.url('tai-khoan')}">${icon('user')} Tài khoản của tôi</a><a href="${P.url('tai-khoan-lich-dat')}">Lịch đặt của tôi</a><button type="button" onclick="logoutDemo()">Đăng xuất</button>`;
    $('#header').appendChild(div);
}
function logoutDemo() { state.user = false; save(); $('.account-pop')?.remove(); notify('Đã đăng xuất tài khoản mẫu'); }
function searchModal() {
    modal('<h2>Tìm kiếm sản phẩm</h2><input class="search" placeholder="Thử “bát”, “hạt”, “vòng cổ”..." aria-label="Tìm sản phẩm" oninput="searchResults(this.value)"><div class="search-results" id="search-results"><p class="hint">Nhập tên sản phẩm để tìm trong cửa hàng mẫu.</p></div>');
    $('.search').focus();
}
function searchResults(query) {
    const list = query.trim() ? products.filter(p => p.name.toLocaleLowerCase('vi').includes(query.trim().toLocaleLowerCase('vi'))) : [];
    P.mount('#search-results', list.length ? list.map(p => `<a class="search-result" href="${P.url('chi-tiet-san-pham', { id: p.id })}"><img src="${P.img(p.img)}" alt="${esc(p.name)}"><div><b>${esc(p.name)}</b>${money(p.price)}</div></a>`).join('') : empty(query ? 'Chưa tìm thấy sản phẩm' : 'Nhập tên sản phẩm'));
}
if ($('#auth-page')) {
    auth(P.page === 'dang-ky' ? 'register' : P.page === 'quen-mat-khau' ? 'forgot' : 'login');
    // Trang đăng nhập trực tiếp vẫn có thể mở lại biểu mẫu sau khi đóng.
}
