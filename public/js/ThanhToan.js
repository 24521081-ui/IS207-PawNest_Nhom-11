'use strict';
function recordDetail(type, item) {
    let body = '';
    if (type === 'order') {
        body = `<p class="hint">${esc(item.name)} · ${esc(item.phone)}<br>${esc(item.address)}<br>${esc(item.payment)} · ${esc(item.status)}</p>`;
        body += (item.items || []).map(line => { const p = products.find(p => p.id === line.id); return `<div class="row small"><span>${esc(p?.name || 'Sản phẩm không còn trong dữ liệu mẫu')} × ${Number(line.qty) || 0}</span><b>${money((p?.price || 0) * (Number(line.qty) || 0))}</b></div>`; }).join('');
        body += `<div class="row small"><span>Phí giao hàng</span><b>${money(item.ship || 0)}</b></div>`;
        if (item.note)
            body += `<p class="hint">Lời nhắn: ${esc(item.note)}</p>`;
    }
    else if (type === 'booking') {
        body = `<p>${esc(item.branch)}<br>${esc(item.pet)} · ${esc(item.petWeight)} kg</p>`;
        if (item.stay)
            body += `<div class="row small"><span>${esc(item.room)}<br>${esc(item.checkin)} → ${esc(item.checkout)}<br>${esc(item.nights)} đêm</span><b>${money(item.roomFee)}</b></div>`;
        if (item.spa)
            body += `<div class="row small"><span>${esc(item.service)}<br>${esc(item.spaDate)} · ${esc(item.slot)}</span><b>${money(item.spaFee)}</b></div>`;
    }
    else
        body = `<p>${item.anonymous ? 'Người bạn ẩn danh' : esc(item.name)} · ${esc(item.date)}</p>`;
    return `<div class="panel"><div class="row"><b>Mã ${type === 'order' ? 'đơn hàng' : type === 'booking' ? 'đặt lịch' : 'quyên góp'}</b><b>${esc(item.id)}</b></div>${body}<div class="row total"><span>${type === 'donation' ? 'Số tiền minh họa' : 'Tổng cộng'}</span><span>${money(item.total ?? item.amount ?? 0)}</span></div></div>`;
}
P.history = function (type) {
    const config = { order: { key: 'orders', page: 'tai-khoan-don-hang', title: 'Đơn hàng' }, booking: { key: 'bookings', page: 'tai-khoan-lich-dat', title: 'Lịch đặt' }, donation: { key: 'donations', page: 'tai-khoan-quyen-gop', title: 'Lịch sử quyên góp' } }[type];
    const id = new URLSearchParams(location.search).get('id');
    const isDetail = P.page.includes('chi-tiet');
    if (isDetail) {
        const item = state[config.key].find(x => x.id === id);
        P.mount('#history-view', `<a class="link" href="${P.url(config.page)}">← Quay lại danh sách</a><div style="height:20px"></div>${item ? recordDetail(type, item) : empty('Không tìm thấy bản ghi')}`);
        return;
    }
    P.mount('#history-view', `<div class="panel"><h2>${config.title}</h2>${state[config.key].length ? state[config.key].map(item => `<div class="history-item"><a class="link" href="${P.url(config.page.replace('tai-khoan-', 'tai-khoan-chi-tiet-'), { id: item.id })}">Xem chi tiết</a><b>${esc(item.id)}</b><p class="hint" style="margin:10px 0">${type === 'order' ? esc(item.date) + ' · ' + (item.items?.length || 0) + ' sản phẩm' : type === 'booking' ? esc(item.pet) + ' · ' + esc(item.branch) : esc(item.date) + ' · ' + (item.anonymous ? 'Ẩn danh' : esc(item.name))}</p><div class="row" style="margin-bottom:0"><span class="pill">${esc(item.status || 'Đã ghi nhận demo')}</span><b>${money(item.total ?? item.amount ?? 0)}</b></div></div>`).join('') : empty('Chưa có lịch sử', 'Các thao tác demo mới sẽ được lưu tại đây.')}</div>`);
};
if ($('#result-view')) {
    const type = P.page.includes('lich') ? 'booking' : P.page.includes('quyen-gop') ? 'donation' : 'order';
    const key = { order: 'orders', booking: 'bookings', donation: 'donations' }[type];
    const item = state[key].find(x => x.id === new URLSearchParams(location.search).get('id'));
    P.mount('#result-view', item ? `<div class="result"><div class="success-icon">${icon('check')}</div><div class="eyebrow" style="justify-content:center">CẢM ƠN BẠN ĐÃ CHỌN PAWNEST</div><h2>${type === 'order' ? 'Đã tạo đơn hàng demo!' : type === 'booking' ? 'Đặt lịch thành công!' : 'Đã ghi nhận quyên góp demo'}</h2><p>Thông tin đã được lưu vào lịch sử demo trong trình duyệt của bạn.</p>${recordDetail(type, item)}<div class="notice">Đây là kết quả minh họa. Không thu tiền, không giữ chỗ và không gửi email thật.</div><div class="button-row" style="justify-content:center"><a class="btn" href="${P.url({ order: 'tai-khoan-don-hang', booking: 'tai-khoan-lich-dat', donation: 'tai-khoan-quyen-gop' }[type])}">Xem lịch sử ${icon('arrow')}</a><a class="btn outline" href="${P.url('trang-chu')}">Về trang chủ</a></div></div>` : empty('Không tìm thấy thông tin', 'Mã này không có trong dữ liệu demo của trình duyệt hiện tại.'));
}
