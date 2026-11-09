'use strict';
let donateAmount = 100000;
const donationForm = $('#donation-form');
if (donationForm) {
    donationForm.elements.name.value = state.profile.name;
    $('#donation-amount').addEventListener('input', event => {
        donateAmount = Number(event.target.value);
        document.querySelectorAll('.amounts button').forEach((button, index) => button.classList.toggle('active', [50000, 100000, 200000][index] === donateAmount));
    });
    donationForm.addEventListener('submit', event => {
        event.preventDefault();
        if (!donationForm.reportValidity() || donationForm.dataset.submitting)
            return;
        const values = Object.fromEntries(new FormData(donationForm)), amount = Number(values.amount);
        if (!Number.isFinite(amount) || amount < 10000 || amount > 100000000 || amount % 1000 !== 0 || !values.name.trim()) {
            notify('Vui lòng kiểm tra tên và số tiền quyên góp mẫu.');
            return;
        }
        const id = P.id('QG');
        state.donations.unshift({ id, amount, name: values.name.trim(), anonymous: !!values.anonymous, date: P.date() });
        if (!save()) {
            state.donations.shift();
            return;
        }
        donationForm.dataset.submitting = 'true';
        donationForm.querySelector('[type="submit"]').disabled = true;
        go('result/donation/' + id);
    });
}
if ($('#history-view')) {
    P.pageRender = () => P.history('donation');
    render();
}
