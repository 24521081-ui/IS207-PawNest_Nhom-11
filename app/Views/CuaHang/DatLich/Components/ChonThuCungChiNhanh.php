<section class="panel"><h2><span class="booking-step">1</span>Chọn chi nhánh</h2><div class="choice-grid" id="booking-branches">
<?php foreach ($branches as $i=>$name): ?><button type="button" class="choice" data-branch="<?= $i ?>" aria-pressed="false"><b><?= icon('pin') ?> <?= h($name) ?></b><span><?= h($addresses[$i]) ?></span></button><?php endforeach; ?>
</div><p class="hint" style="margin:13px 0 0">4 địa chỉ mẫu tại TP.HCM · Mở cửa 09:00–20:00</p></section>
<section class="panel"><div class="row" style="margin-top:0"><h2 style="margin:0"><span class="booking-step">2</span>Chọn thú cưng</h2><button type="button" class="link" onclick="petModal()">+ Thêm thú cưng</button></div><div class="choice-grid" id="booking-pets"></div></section>
