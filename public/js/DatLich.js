'use strict';
// Ngày dùng múi giờ Việt Nam. Số đêm tính bằng UTC để không lệch theo múi giờ máy.
const today = () => new Intl.DateTimeFormat('en-CA', { timeZone: 'Asia/Ho_Chi_Minh', year: 'numeric', month: '2-digit', day: '2-digit' }).format(new Date());
function days() {
    const nights = (Date.parse(booking.checkout + 'T00:00:00Z') - Date.parse(booking.checkin + 'T00:00:00Z')) / 86400000;
    return Number.isInteger(nights) && nights > 0 ? nights : 0;
}
function availableRooms() {
    const pet = state.pets.find(p => p.id == booking.pet);
    if (!pet || !days() || booking.checkin < today())
        return [];
    // Quy tắc còn phòng giả lập từ bản gốc; không giữ chỗ thật.
    return rooms.filter((r, index) => r.max >= pet.weight && (Number(booking.checkin.slice(-2)) + Number(booking.branch) + index) % 5 !== 0);
}
function validSlots() {
    const service = services.find(s => s.id === booking.service);
    if (!service || !booking.spaDate || booking.spaDate < today())
        return [];
    return ['09:00', '10:30', '13:00', '14:30', '16:00', '17:30'].filter((slot, index) => {
        if ((Number(booking.spaDate.slice(-2)) + Number(booking.branch) + index) % 4 === 0 || (service.time === 120 && slot === '17:30'))
            return false;
        if (!booking.stay)
            return true;
        if (!days() || booking.spaDate < booking.checkin || booking.spaDate > booking.checkout)
            return false;
        const [hour, minute] = slot.split(':').map(Number), start = hour * 60 + minute;
        return !(booking.spaDate === booking.checkin && start < 840) && !(booking.spaDate === booking.checkout && start + service.time > 720);
    });
}
function bchange(key, value) {
    booking[key] = value;
    if (['branch', 'checkin', 'checkout', 'pet'].includes(key))
        booking.room = '';
    if (['branch', 'service', 'spaDate', 'checkin', 'checkout', 'stay'].includes(key))
        booking.slot = '';
    if (key === 'stay' && !value)
        booking.room = '';
    if (key === 'spa' && !value) {
        booking.service = '';
        booking.spaDate = '';
        booking.slot = '';
    }
    if (booking.stay && booking.spa && (booking.spaDate < booking.checkin || booking.spaDate > booking.checkout)) {
        booking.spaDate = '';
        booking.slot = '';
    }
    P.draft();
    render();
}
function renderBooking() {
    const pet = state.pets.find(p => p.id == booking.pet), available = availableRooms();
    if (booking.room && !available.some(r => r.id === booking.room))
        booking.room = '';
    if (booking.slot && !validSlots().includes(booking.slot))
        booking.slot = '';
    document.querySelectorAll('#booking-branches [data-branch]').forEach(button => { const active = Number(button.dataset.branch) === Number(booking.branch); button.classList.toggle('active', active); button.setAttribute('aria-pressed', String(active)); });
    P.mount('#booking-pets', state.pets.length ? state.pets.map(p => `<button type="button" class="choice pet-choice ${p.id == booking.pet ? 'active' : ''}" data-pet="${esc(p.id)}" aria-pressed="${p.id == booking.pet}"><img src="${P.img(p.img)}" alt="${esc(p.name)}"><div><b>${esc(p.name)}</b><span>${esc(p.species)} · ${p.weight} kg</span></div></button>`).join('') : empty('Chưa có thú cưng', 'Thêm hồ sơ để đặt lịch cho bé.'));
    $('#need-stay').checked = !!booking.stay;
    $('#need-spa').checked = !!booking.spa;
    $('#stay-section').hidden = !booking.stay;
    $('#spa-section').hidden = !booking.spa;
    document.querySelectorAll('[data-pet-name]').forEach(el => el.textContent = pet?.name || 'bé');
    $('#booking-checkin').min = today();
    $('#booking-checkin').value = booking.checkin;
    $('#booking-checkout').min = booking.checkin || today();
    $('#booking-checkout').value = booking.checkout;
    $('#stay-error').hidden = !(booking.checkin && booking.checkout && !days());
    P.mount('#room-hint', `Nhận 14:00 · Trả 12:00 · ${days() ? days() + ' đêm' : 'Chọn ngày để xem phòng trống'}<br>Chỉ hiển thị phòng còn trống có giới hạn cân nặng ≥ ${pet?.weight || 0} kg. Bé nặng đúng giới hạn vẫn đặt được.`);
    P.mount('#booking-rooms', available.map(r => `<button type="button" class="choice room ${r.id === booking.room ? 'active' : ''}" data-room="${r.id}" aria-pressed="${r.id === booking.room}"><img src="${P.img(r.img)}" alt="${esc(r.name)}"><div><b>${esc(r.name)}</b><span>Tối đa ${r.max} kg · Còn trống</span><b style="margin:9px 0 0">${money(r.price)} / đêm</b></div></button>`).join(''));
    P.mount('#room-empty', days() && !available.length ? empty('Chưa có phòng phù hợp', 'Thử chi nhánh hoặc ngày khác cho bé nhé.') : '');
    $('#booking-service').value = booking.service;
    $('#booking-spa-date').value = booking.spaDate;
    $('#booking-spa-date').min = booking.stay ? booking.checkin || today() : today();
    if (booking.stay && booking.checkout)
        $('#booking-spa-date').max = booking.checkout;
    else
        $('#booking-spa-date').removeAttribute('max');
    $('#combined-hint').hidden = !booking.stay;
    P.mount('#booking-slots', validSlots().map(slot => `<button type="button" class="slot ${slot === booking.slot ? 'active' : ''}" data-slot="${slot}" aria-pressed="${slot === booking.slot}">${slot}</button>`).join(''));
    $('#slot-hint').hidden = validSlots().length > 0;
    const room = rooms.find(r => r.id === booking.room), service = services.find(s => s.id === booking.service);
    const roomFee = booking.stay && room ? room.price * days() : 0, spaFee = booking.spa && service ? service.price : 0;
    P.mount('#booking-summary', `<div class="row small"><span>Chi nhánh</span><b>${esc(branches[booking.branch])}</b></div><div class="row small"><span>Người bạn nhỏ</span><b>${esc(pet?.name || 'Chưa chọn')} · ${pet?.weight || 0} kg</b></div>${booking.stay ? `<hr style="border:0;border-top:1px solid #e8deca"><div class="row small"><b>Lưu trú</b><span>${days()} đêm</span></div><p class="hint">${esc(booking.checkin || 'Chưa chọn ngày')} → ${esc(booking.checkout || 'Chưa chọn ngày')}<br>${esc(room?.name || 'Chưa chọn phòng')}</p><div class="row small"><span>Phí phòng</span><b>${money(roomFee)}</b></div>` : ''}${booking.spa ? `<hr style="border:0;border-top:1px solid #e8deca"><p class="hint"><b>${esc(service?.name || 'Chưa chọn dịch vụ')}</b><br>${esc(booking.spaDate || 'Chưa chọn ngày')} · ${esc(booking.slot || 'Chưa chọn giờ')}${service ? ' · ' + service.time + ' phút' : ''}</p><div class="row small"><span>Phí spa & grooming</span><b>${money(spaFee)}</b></div>` : ''}<div class="row total"><span>Tổng cộng</span><span>${money(roomFee + spaFee)}</span></div>`);
    $('#booking-error').textContent = '';
    P.draft();
}
function submitBooking() {
    let error = '';
    const pet = state.pets.find(p => p.id == booking.pet);
    if (!booking.stay && !booking.spa)
        error = 'Chọn ít nhất một nhu cầu cho bé.';
    else if (!pet)
        error = 'Vui lòng chọn thú cưng.';
    else if (booking.stay && (!days() || booking.checkin < today() || !availableRooms().some(r => r.id === booking.room)))
        error = 'Chọn ngày lưu trú hợp lệ và một phòng phù hợp.';
    else if (booking.spa && (!services.some(s => s.id === booking.service) || !validSlots().includes(booking.slot)))
        error = 'Chọn dịch vụ, ngày và giờ chăm sóc còn trống.';
    if (error) {
        $('#booking-error').textContent = error;
        notify(error);
        return;
    }
    if ($('#booking-submit').disabled)
        return;
    const room = rooms.find(r => r.id === booking.room), service = services.find(s => s.id === booking.service);
    const roomFee = booking.stay ? room.price * days() : 0, spaFee = booking.spa ? service.price : 0, id = P.id('DL');
    state.bookings.unshift({ id, branch: branches[booking.branch], pet: pet.name, petWeight: pet.weight, stay: booking.stay, spa: booking.spa, checkin: booking.stay ? booking.checkin : '', checkout: booking.stay ? booking.checkout : '', room: booking.stay ? room.name : '', service: booking.spa ? service.name : '', spaDate: booking.spa ? booking.spaDate : '', slot: booking.spa ? booking.slot : '', nights: booking.stay ? days() : 0, roomFee, spaFee, total: roomFee + spaFee, status: 'Đã xác nhận (demo)' });
    if (!save()) {
        state.bookings.shift();
        return;
    }
    $('#booking-submit').disabled = true;
    try {
        sessionStorage.removeItem('pawnest-booking-draft');
        sessionStorage.removeItem('pawnest-booking-mode');
    }
    catch { }
    // Không ghi lại bản nháp vừa xóa khi chuyển trang kết quả.
    location.assign(P.url('ket-qua-dat-lich', { id }));
}
const mode = new URLSearchParams(location.search).get('dich-vu');
try {
    if (mode && sessionStorage.getItem('pawnest-booking-mode') !== mode) {
        booking.stay = mode === 'luu-tru';
        booking.spa = mode === 'spa';
        booking.room = '';
        booking.slot = '';
        sessionStorage.setItem('pawnest-booking-mode', mode);
    }
}
catch { }
$('#booking-branches').addEventListener('click', e => {
    const button = e.target.closest('[data-branch]');
    if (button)
        bchange('branch', Number(button.dataset.branch));
});
$('#booking-pets').addEventListener('click', e => {
    const button = e.target.closest('[data-pet]');
    if (button)
        bchange('pet', Number(button.dataset.pet));
});
$('#booking-rooms').addEventListener('click', e => {
    const button = e.target.closest('[data-room]');
    if (button)
        bchange('room', button.dataset.room);
});
$('#booking-slots').addEventListener('click', e => {
    const button = e.target.closest('[data-slot]');
    if (button)
        bchange('slot', button.dataset.slot);
});
$('#need-stay').addEventListener('change', e => bchange('stay', e.target.checked));
$('#need-spa').addEventListener('change', e => bchange('spa', e.target.checked));
for (const [id, key] of [['booking-checkin', 'checkin'], ['booking-checkout', 'checkout'], ['booking-service', 'service'], ['booking-spa-date', 'spaDate']])
    $('#' + id).addEventListener('change', e => bchange(key, e.target.value));
$('#booking-submit').addEventListener('click', submitBooking);
P.pageRender = renderBooking;
render();
