<?php
$compact = ! empty($compact);
$heading = $heading ?? t('brands.heading');
$kicker  = $kicker ?? t('brands.kicker');
$lede    = $lede ?? t('brands.lede');
$items   = $site->brands;
$svgs = require __DIR__ . '/brand_svgs.php';
?>
<section class="brands-band<?= $compact ? ' is-compact' : '' ?>">
    <div class="container">
        <p class="kicker"><?= esc($kicker) ?></p>
        <h2 class="section-title"><?= esc($heading) ?></h2>
        <?php if (! $compact): ?>
            <p class="lede"><?= esc($lede) ?></p>
        <?php endif; ?>
    </div>
    <div class="brands-marquee" aria-label="<?= esc(t('brands.aria')) ?>">
        <div class="brands-track">
            <?php for ($loop = 0; $loop < 2; $loop++):
                foreach ($items as $brand):
                    $svg = $svgs[$brand['name']] ?? ''; ?>
                    <article class="brand-tile" title="<?= esc($brand['name']) ?>">
                        <span class="brand-logo"><?= $svg ?></span>
                        <span class="sr-only"><?= esc($brand['name']) ?></span>
                    </article>
                <?php endforeach;
            endfor; ?>
        </div>
    </div>
</section>
