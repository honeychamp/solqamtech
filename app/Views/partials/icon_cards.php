<?php
$cols     = $cols ?? 'cards-2';
$items    = $items ?? [];
$titleKey = $titleKey ?? 'title';
$textKey  = $textKey ?? 'text';
$linkKey  = $linkKey ?? null;
$linkText = $linkText ?? t('common.viewArrow');
$class    = $class ?? 'icon-card-grid';
?>
<div class="<?= esc($cols) ?> <?= esc($class) ?>" style="margin-top:18px">
    <?php foreach ($items as $item): ?>
        <article class="card card-fit icon-card">
            <span class="svc-icon sm"><?= st_icon($item['icon'] ?? 'spark') ?></span>
            <div>
                <h3><?= esc($item[$titleKey] ?? '') ?></h3>
                <p><?= esc($item[$textKey] ?? $item['excerpt'] ?? '') ?></p>
                <?php if ($linkKey && ! empty($item[$linkKey])): ?>
                    <a href="<?= esc($item[$linkKey]) ?>"><?= esc($item['linkLabel'] ?? $linkText) ?></a>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>
