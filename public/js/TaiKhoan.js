'use strict';
// Hồ sơ và thú cưng dùng chung với trang đặt lịch.
function petModal(id) {
    const pet = state.pets.find(p => p.id == id);
    modal(`<h2>${pet ? 'Chỉnh sửa' : 'Thêm'} người bạn nhỏ</h2><p class="hint">Ảnh đại diện được chọn theo loài để xem thử giao diện.</p><form id="pet-form"><label class="field">Tên thú cưng<input name="name" required maxlength="30" value="${esc(pet?.name || '')}" placeholder="Bé tên là..."></label><div class="two"><label class="field">Loài<select name="species"><option ${pet?.species === 'Chó' ? 'selected' : ''}>Chó</option><option ${pet?.species === 'Mèo' ? 'selected' : ''}>Mèo</option></select></label><label class="field">Cân nặng (kg)<input name="weight" type="number" min="0.1" max="100" step="0.1" required value="${pet?.weight || ''}"></label></div><button type="submit" class="btn wide">Lưu hồ sơ demo</button></form>`);
    $('#pet-form').addEventListener('submit', event => {
        event.preventDefault();
        const form = event.currentTarget;
        if (!form.reportValidity())
            return;
        const values = Object.fromEntries(new FormData(form));
        const weight = Number(values.weight), name = values.name.trim();
        if (!name || !Number.isFinite(weight) || weight < 0.1 || weight > 100 || !['Chó', 'Mèo'].includes(values.species)) {
            notify('Kiểm tra tên, loài và cân nặng của bé.');
            return;
        }
        const saved = { id: pet?.id || Date.now(), name, species: values.species, weight, img: values.species === 'Chó' ? 'dog.jpg' : 'cat.jpg' };
        const previous = state.pets;
        state.pets = pet ? state.pets.map(p => p.id === pet.id ? saved : p) : [...state.pets, saved];
        if (!save()) {
            state.pets = previous;
            return;
        }
        if (!pet)
            booking.pet = saved.id;
        booking.room = '';
        booking.slot = '';
        P.draft();
        closeModal();
        render();
        notify('Đã lưu hồ sơ thú cưng');
    });
}
function showAccountPets() {
    P.mount('#account-pets', state.pets.length ? state.pets.map(p => `<div class="choice pet-choice"><img src="${P.img(p.img)}" alt="${esc(p.name)}"><div><b>${esc(p.name)}</b><span>${esc(p.species)} · ${p.weight} kg</span><br><button class="link" style="margin-top:10px" data-edit-pet="${esc(p.id)}">Chỉnh sửa hồ sơ</button></div></div>`).join('') : empty('Chưa có thú cưng', 'Thêm người bạn nhỏ để đặt lịch cho bé.'));
}
if ($('#account-pets')) {
    P.pageRender = showAccountPets;
    render();
    $('#account-pets').addEventListener('click', event => {
        const button = event.target.closest('[data-edit-pet]');
        if (button)
            petModal(button.dataset.editPet);
    });
    if (P.page === 'tai-khoan-them-thu-cung')
        petModal();
    if (P.page === 'tai-khoan-sua-thu-cung') {
        const id = new URLSearchParams(location.search).get('id');
        if (state.pets.some(p => p.id == id))
            petModal(id);
        else
            notify('Không tìm thấy hồ sơ thú cưng.');
    }
}
const profileForm = $('#profile-form');
if (profileForm) {
    for (const key of ['name', 'phone', 'email', 'address'])
        profileForm.elements[key].value = state.profile[key];
    profileForm.addEventListener('submit', event => {
        event.preventDefault();
        if (!profileForm.reportValidity())
            return;
        const profile = Object.fromEntries(new FormData(profileForm));
        for (const key of Object.keys(profile))
            profile[key] = profile[key].trim();
        if (!profile.name || !profile.address) {
            notify('Vui lòng nhập tên và địa chỉ.');
            return;
        }
        const previous = state.profile;
        state.profile = profile;
        if (!save()) {
            state.profile = previous;
            return;
        }
        notify('Đã cập nhật thông tin demo');
    });
}
document.querySelectorAll('[data-profile-name]').forEach(el => el.textContent = state.profile.name);
document.querySelectorAll('[data-count]').forEach(el => el.textContent = state[el.dataset.count].length);
if ($('#account-notice') && state.user)
    $('#account-notice').textContent = 'Bạn đang sử dụng tài khoản mẫu PawNest. Mọi dữ liệu chỉ lưu trong trình duyệt hiện tại.';
