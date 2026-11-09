<section class="panel" id="stay-section" hidden>
    <img class="form-decoration cartoon-peek" src="<?= h(anh('art/cat.svg')) ?>" alt=""><h2>Kỳ nghỉ của <span data-pet-name>bé</span></h2>
    <div class="two"><label class="field">Ngày nhận phòng<input type="date" id="booking-checkin"></label><label class="field">Ngày trả phòng<input type="date" id="booking-checkout"></label></div>
    <p class="error" id="stay-error" hidden>Ngày trả phải sau ngày nhận, tối thiểu một đêm.</p>
    <p class="hint" id="room-hint"></p><div class="choice-grid" id="booking-rooms"></div><div id="room-empty"></div>
</section>
