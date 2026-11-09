<section class="panel" id="spa-section" hidden>
    <h2>Buổi spa của <span data-pet-name>bé</span></h2>
    <label class="field">Chọn dịch vụ<select id="booking-service"><option value="">Chọn dịch vụ cho bé</option><?php foreach ($services as $service): ?><option value="<?= h($service['id']) ?>"><?= h($service['name']) ?> · <?= $service['time'] ?> phút · <?= tien($service['price']) ?></option><?php endforeach; ?></select></label>
    <label class="field">Ngày chăm sóc<input type="date" id="booking-spa-date"></label>
    <p class="hint" id="combined-hint" hidden>Chọn ngày grooming trong khoảng lưu trú. Ngày nhận phòng chỉ đặt từ 14:00, ngày trả phòng cần kết thúc trước 12:00.</p>
    <h3>Giờ còn trống</h3><div class="slots" id="booking-slots"></div><p class="hint" id="slot-hint">Chọn dịch vụ và ngày phù hợp để xem giờ còn trống.</p>
    <p class="hint" style="margin-top:16px">Giá dùng chung cho chó và mèo. Các giờ trống chỉ là dữ liệu minh họa.</p>
</section>
