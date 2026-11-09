<?php
$species = thamSo('thu-cung', 'cho') === 'meo' ? 'cat' : 'dog';
$type = thamSo('loai-sp');
$group = $type !== '' ? '' : thamSo('nhom');
$brand = thamSo('brand'); $price = thamSo('price'); $sort = thamSo('sort', 'featured'); $query = trim(thamSo('q'));
$list = array_values(array_filter($products, static function ($p) use ($species, $type, $group, $brand, $price, $query) {
    return ($p['species'] === $species || $p['species'] === 'both')
        && ($group === '' || $p['group'] === $group) && ($type === '' || $p['type'] === $type)
        && ($brand === '' || $p['brand'] === $brand)
        && ($price === '' || ($price === 'low' ? $p['price'] < 200000 : ($price === 'mid' ? $p['price'] >= 200000 && $p['price'] <= 400000 : $p['price'] > 400000)))
        && ($query === '' || mb_stripos($p['name'], $query, 0, 'UTF-8') !== false);
}));
if ($sort === 'asc') usort($list, fn($a,$b) => $a['price'] <=> $b['price']);
if ($sort === 'desc') usort($list, fn($a,$b) => $b['price'] <=> $a['price']);
if ($sort === 'name') {
    // Dùng Collator tiếng Việt khi PHP có intl; vẫn chạy được trên XAMPP chưa bật intl.
    if (class_exists('Collator')) { $collator = new Collator('vi_VN'); usort($list, fn($a,$b) => $collator->compare($a['name'],$b['name'])); }
    else usort($list, fn($a,$b) => strnatcasecmp($a['name'],$b['name']));
}
?>
<div class="container">
    <div class="breadcrumb"><a href="<?= h(url('trang-chu')) ?>">Trang chủ</a> / <?= $species === 'cat' ? 'Cho mèo' : 'Cho chó' ?></div>
    <div class="catalog">
        <aside class="filters">
            <form id="product-filters" method="get" action="index.php">
                <input type="hidden" name="trang" value="san-pham"><input type="hidden" name="thu-cung" value="<?= $species === 'cat' ? 'meo' : 'cho' ?>">
                <details open><summary><b>Bộ lọc sản phẩm</b></summary>
                    <h3>Nhóm sản phẩm</h3>
                    <?php foreach ($groups as $name=>$types): ?><label><input type="radio" name="nhom" value="<?= h($name) ?>" <?= $group === $name ? 'checked' : '' ?>><?= h($name) ?></label><?php endforeach; ?>
                    <h3>Loại sản phẩm</h3><label class="field"><select name="loai-sp" aria-label="Loại sản phẩm"><option value="">Tất cả loại</option><?php foreach (array_merge(...array_values($groups)) as $name): ?><option value="<?= h($name) ?>" <?= $type === $name ? 'selected' : '' ?>><?= h($name) ?></option><?php endforeach; ?></select></label>
                    <h3>Thương hiệu</h3><label class="field"><select name="brand" aria-label="Thương hiệu"><option value="">Tất cả thương hiệu</option><?php foreach (array_unique(array_column($products,'brand')) as $name): ?><option <?= $brand === $name ? 'selected' : '' ?>><?= h($name) ?></option><?php endforeach; ?></select></label>
                    <h3>Khoảng giá</h3><?php foreach (['low'=>'Dưới 200.000 ₫','mid'=>'200.000 – 400.000 ₫','high'=>'Trên 400.000 ₫'] as $value=>$name): ?><label><input type="radio" name="price" value="<?= $value ?>" <?= $price === $value ? 'checked' : '' ?>><?= h($name) ?></label><?php endforeach; ?>
                    <?php if ($query !== ''): ?><input type="hidden" name="q" value="<?= h($query) ?>"><?php endif; ?>
                    <input type="hidden" name="sort" value="<?= h($sort) ?>">
                    <a class="link" style="display:block;margin:20px 0" href="<?= h(url('san-pham',['thu-cung'=>$species === 'cat'?'meo':'cho'])) ?>">Xóa bộ lọc</a>
                    <noscript><button class="btn sm" type="submit">Áp dụng bộ lọc</button></noscript>
                </details>
            </form>
        </aside>
        <div>
            <div class="toolbar"><span><?= count($list) ?> sản phẩm</span><select class="sort" id="product-sort" aria-label="Sắp xếp"><?php foreach (['featured'=>'Nổi bật','asc'=>'Giá tăng dần','desc'=>'Giá giảm dần','name'=>'Tên A–Z'] as $value=>$name): ?><option value="<?= $value ?>" <?= $sort === $value ? 'selected' : '' ?>><?= h($name) ?></option><?php endforeach; ?></select></div>
            <?php if ($list): ?><div class="product-grid"><?php foreach ($list as $p) theSanPham($p); ?></div>
            <?php else: ?><div class="empty"><img class="empty-cartoon" src="<?= h(anh('art/cat.svg')) ?>" alt=""><h3>Chưa tìm thấy món đồ phù hợp</h3><p>Thử đổi hoặc xóa bộ lọc để khám phá thêm nhé.</p></div><?php endif; ?>
        </div>
    </div>
</div>
