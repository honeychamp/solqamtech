<?php
$ctaTitle = $ctaTitle ?? t('cta.title');
$ctaText  = $ctaText ?? t('cta.text');
$ctaHref  = $ctaHref ?? base_url('contact');
$ctaLabel = $ctaLabel ?? t('cta.label');
$ctaGhostHref  = $ctaGhostHref ?? base_url('services');
$ctaGhostLabel = $ctaGhostLabel ?? t('cta.ghost');
$ctaIcon = $ctaIcon ?? 'chat';
?>
<section class="section final-cta">
    <div class="container cta-box">
        <div>
            <span class="cta-mark"><?= st_icon($ctaIcon) ?></span>
            <h2 class="section-title"><?= esc($ctaTitle) ?></h2>
            <p class="lede"><?= esc($ctaText) ?></p>
        </div>
        <div class="hero-actions">
            <a class="btn btn-primary" href="<?= esc($ctaHref) ?>"><?= esc($ctaLabel) ?> <?= st_icon('arrow') ?></a>
            <a class="btn btn-ghost" href="<?= esc($ctaGhostHref) ?>"><?= esc($ctaGhostLabel) ?></a>
        </div>
    </div>
</section>
