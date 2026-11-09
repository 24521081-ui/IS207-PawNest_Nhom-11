'use strict';
// Sơ đồ và thời gian hoàn toàn giả lập; không gọi mạng hoặc định vị thiết bị.
let routeRequest = 0;
function branchModal(index) { const b = branches[index]; routeRequest++; modal(`<div class="branch-modal-title"><span class="mini-label">THÔNG TIN CHI NHÁNH</span><h2>${b}</h2><p class="hint">Chi nhánh giả lập · TP.HCM</p></div><div class="branch-modal-grid"><div><div class="branch-facts"><div>${icon('pin')}<div><b>Địa chỉ</b><p>${addresses[index]}</p></div></div><div>${icon('clock')}<div><b>Giờ hoạt động</b><p>09:00–20:00, từ thứ Hai đến Chủ nhật</p></div></div><div>${icon('paw')}<div><b>Dịch vụ tại chi nhánh</b><p>Spa & Grooming · Lưu trú cho chó và mèo</p></div></div></div><p class="hint">Liên hệ mẫu: 0900 000 000<br>hello@pawnest.example</p><button class="btn wide" onclick="booking.branch=${index};booking.room='';booking.slot='';closeModal();go('booking')">Đặt lịch tại chi nhánh này</button><div class="notice" style="margin-top:18px">Thông tin và địa chỉ được tạo để thử giao diện, không phải cơ sở kinh doanh thật.</div></div><div class="directions-panel"><h3>${icon('pin')} Đường đi đến chi nhánh</h3><form onsubmit="requestDirections(event,${index})"><label class="field">Điểm xuất phát<input name="origin" required maxlength="100" placeholder="Ví dụ: Điểm xuất phát mẫu" value="Điểm xuất phát mẫu" oninput="clearDirections()"></label><label class="field">Phương tiện<select name="mode" onchange="clearDirections()"><option value="bike">Xe máy</option><option value="car">Ô tô</option><option value="walk">Đi bộ</option></select></label><button id="directions-submit" class="btn outline wide" type="submit">Xem đường đi mẫu</button></form><div id="directions-result" aria-live="polite">${routePlaceholder()}</div><p class="hint map-disclaimer">Sơ đồ, khoảng cách và thời gian đều giả lập. Không dùng để di chuyển thực tế; không truy cập vị trí thiết bị.</p></div></div>`); $('.modal-box').classList.add('branch-modal'); modalCleanup = () => { routeRequest++; }; }
function routePlaceholder() { return `<div class="route-placeholder"><img src="${P.img('art/cat.svg')}" alt=""><p>Nhập điểm xuất phát và chọn<br>“Xem đường đi mẫu”.</p></div>`; }
function clearDirections() {
    routeRequest++;
    let result = $('#directions-result');
    if (result)
        result.innerHTML = routePlaceholder();
    let b = $('#directions-submit');
    if (b) {
        b.disabled = false;
        b.textContent = 'Xem đường đi mẫu';
    }
}
const mockDirectionsAPI = { async getRoute({ branch, origin, mode }) {
        await new Promise(resolve => setTimeout(resolve, 800));
        if (!origin.trim())
            throw new Error('Vui lòng nhập điểm xuất phát.');
        const distance = [4.2, 2.8, 7.1, 3.6][branch];
        return { origin, destination: branches[branch], distance: distance.toLocaleString('vi-VN'), minutes: Math.ceil(distance * (mode === 'walk' ? 13 : mode === 'car' ? 4 : 3)), mode, steps: ['Xuất phát từ điểm A trên sơ đồ mẫu.', 'Đi theo tuyến nét đứt đến điểm B.', 'Đến chi nhánh đã chọn.'] };
    } };
async function requestDirections(event, index) {
    event.preventDefault();
    const form = event.target, data = Object.fromEntries(new FormData(form)), token = ++routeRequest, button = $('#directions-submit'), target = $('#directions-result');
    button.disabled = true;
    button.textContent = 'Đang tìm đường…';
    target.innerHTML = '<div class="route-loading" role="status"><span class="spinner"></span>Đang tải lộ trình minh họa…</div>';
    try {
        const r = await mockDirectionsAPI.getRoute({ branch: index, origin: data.origin, mode: data.mode });
        if (token !== routeRequest || !target.isConnected)
            return;
        target.innerHTML = `<div class="route-metrics"><div><b>${r.distance} km</b><span>Khoảng cách mẫu</span></div><div><b>${r.minutes} phút</b><span>Thời gian mẫu</span></div></div>${routeMap(index)}<div class="route-endpoints"><p><b>A</b> ${esc(r.origin)}</p><p><b>B</b> ${esc(r.destination)}</p></div><ol class="route-steps">${r.steps.map(t => `<li>${t}</li>`).join('')}</ol>`;
    }
    catch (error) {
        if (token === routeRequest && target.isConnected)
            target.innerHTML = '<p class="error">Không tải được đường đi mẫu. Vui lòng thử lại.</p>';
    }
    finally {
        if (token === routeRequest && button.isConnected) {
            button.disabled = false;
            button.textContent = 'Xem lại đường đi mẫu';
        }
    }
}
function routeMap(index) { const x = [335, 300, 355, 320][index], y = [75, 110, 155, 65][index]; return `<div class="route-map"><span>SƠ ĐỒ MINH HỌA · KHÔNG PHẢI BẢN ĐỒ THẬT</span><svg viewBox="0 0 420 240" role="img" aria-label="Lộ trình giả lập từ điểm A đến chi nhánh B"><rect width="420" height="240" fill="#f3f2eb"/><g fill="#e0e7d7"><rect x="18" y="16" width="80" height="54" rx="12"/><rect x="260" y="165" width="130" height="48" rx="16"/><circle cx="190" cy="46" r="24"/></g><g stroke="white" stroke-width="18" fill="none"><path d="M-10 95H440M130-10V250M240-10V250M-10 175H440M330-10V250"/></g><g fill="#e9dfca"><rect x="152" y="115" width="66" height="40" rx="6"/><rect x="258" y="22" width="47" height="51" rx="6"/><rect x="18" y="114" width="85" height="38" rx="6"/></g><path d="M65 175H130V95H${x}V${y}" stroke="#003459" stroke-width="5" stroke-linecap="round" stroke-dasharray="9 7" fill="none"/><circle cx="65" cy="175" r="15" fill="#003459"/><circle cx="${x}" cy="${y}" r="17" fill="#f7dba7" stroke="#003459" stroke-width="3"/><g text-anchor="middle" font-size="14" font-family="sans-serif" font-weight="bold"><text x="65" y="180" fill="white">A</text><text x="${x}" y="${y + 5}" fill="#003459">B</text></g></svg></div>`; }
const contactForm = $('#contact-form');
if (contactForm)
    contactForm.addEventListener('submit', e => {
        e.preventDefault();
        if (!contactForm.reportValidity())
            return;
        notify('Đã ghi nhận lời nhắn demo. Chưa gửi đến bộ phận hỗ trợ.');
        contactForm.reset();
    });
if (P.page === 'chi-tiet-chi-nhanh') {
    const id = Number(new URLSearchParams(location.search).get('id'));
    if (Number.isInteger(id) && id >= 0 && id < branches.length)
        branchModal(id);
    else
        notify('Không tìm thấy chi nhánh trong dữ liệu mẫu.');
}
