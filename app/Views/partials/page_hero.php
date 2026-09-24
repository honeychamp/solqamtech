<?php
$site    = $site ?? site_config();
$compact = ! empty($compact);
$kicker  = (string) ($kicker ?? '');
$heading = trim((string) ($heading ?? ''));
$lede    = (string) ($lede ?? '');
$video   = (string) ($video ?? 'office.mp4');
$tag     = ($tag ?? 'section') === 'article' ? 'article' : 'section';
$crumbs  = is_array($crumbs ?? null) ? $crumbs : [];
$facts   = is_array($facts ?? null) ? $facts : [];
$chips   = is_array($chips ?? null) ? $chips : [];
$panel   = (string) ($panel ?? '');
$actions = $actions ?? [];
$arrow   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7"/><path d="M8 7h9v9"/></svg>';
$hasPanel = $panel !== '' || $facts !== [] || $chips !== [];
$class    = 'page-hero' . ($compact ? ' is-compact' : '') . ($hasPanel ? ' has-panel' : ' is-simple');
$heroSrc    = $video !== '' ? video_url($video) : '';
$heroPoster = $video !== '' ? video_poster($video) : '';
?>
<<?= $tag ?> class="<?= esc($class) ?>">
    <?php if ($heroSrc !== ''): ?>
        <video class="page-hero-video" muted loop playsinline autoplay preload="none"<?= $heroPoster !== '' ? ' poster="' . esc($heroPoster) . '"' : '' ?> data-src="<?= esc($heroSrc) ?>"></video>
    <?php endif; ?>
    <div class="page-hero-scrim" aria-hidden="true"></div>
    <div class="container page-hero-inner">
        <?php if ($crumbs !== []): ?>
            <nav class="page-hero-crumbs" aria-label="<?= esc(t('common.breadcrumb')) ?>">
                <ol>
                    <?php foreach ($crumbs as $i => $crumb): ?>
                        <li>
                            <?php if (! empty($crumb['href']) && $i < count($crumbs) - 1): ?>
                                <a href="<?= esc($crumb['href']) ?>"><?= esc($crumb['label']) ?></a>
                            <?php else: ?>
                                <span><?= esc($crumb['label']) ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>
        <div class="page-hero-layout">
            <div class="page-hero-copy">
                <?php if ($kicker !== ''): ?>
                    <p class="kicker"><?= esc($kicker) ?></p>
                <?php endif; ?>
                <h1><?= esc($heading) ?></h1>
                <?php if ($lede !== ''): ?>
                    <p class="lede"><?= esc($lede) ?></p>
                <?php endif; ?>
                <?php if ($actions !== []): ?>
                    <div class="page-hero-actions">
                        <?php foreach ($actions as $action): ?>
                            <a class="<?= esc($action['class'] ?? 'btn btn-ghost') ?>" href="<?= esc($action['href'] ?? base_url('contact')) ?>" <?= $action['attrs'] ?? '' ?>>
                                <?= esc($action['label'] ?? t('cta.continue')) ?>
                                <?= ! empty($action['arrow']) ? $arrow : '' ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($hasPanel): ?>
                <aside class="page-hero-panel">
                    <?php if ($panel !== ''): ?>
                        <p class="page-hero-panel-title"><?= esc($panel) ?></p>
                    <?php endif; ?>
                    <?php if ($facts !== []): ?>
                        <ul class="page-hero-facts">
                            <?php foreach ($facts as $fact): ?>
                                <li>
                                    <?php if (! empty($fact['label'])): ?>
                                        <small><?= esc($fact['label']) ?></small>
                                    <?php endif; ?>
                                    <?php if (! empty($fact['href'])): ?>
                                        <a href="<?= esc($fact['href']) ?>"><?= esc($fact['text'] ?? '') ?></a>
                                    <?php else: ?>
                                        <span><?= esc($fact['text'] ?? '') ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if ($chips !== []): ?>
                        <ul class="page-hero-chips">
                            <?php foreach ($chips as $chip): ?>
                                <li>
                                    <?php if (! empty($chip['href'])): ?>
                                        <a href="<?= esc($chip['href']) ?>"><?= esc($chip['label']) ?></a>
                                    <?php else: ?>
                                        <span><?= esc($chip['label']) ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</<?= $tag ?>>
