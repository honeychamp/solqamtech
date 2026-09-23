<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('faqs.kicker'),
    'heading' => t('faqs.heading'),
    'lede'    => t('faqs.lede'),
    'video'   => 'office.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.faqs')],
    ],
    'panel'   => t('crumb.topics'),
    'chips'   => [
        ['label' => t('faqs.chip1')],
        ['label' => t('faqs.chip2')],
        ['label' => t('faqs.chip3')],
        ['label' => t('faqs.chip4')],
        ['label' => t('faqs.chip5')],
        ['label' => t('faqs.chip6')],
    ],
    'actions' => [
        ['label' => t('faqs.still'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('faqs.process'), 'href' => base_url('process'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true]) ?>

<section class="section">
    <div class="container" style="max-width:860px">
        <p class="kicker"><?= esc(t('faqs.genK')) ?></p>
        <h2 class="section-title"><?= esc(t('faqs.genH')) ?></h2>
        <div class="faq-list" style="margin-top:16px">
            <?php foreach (array_merge($site->homeFaqs, $site->extraFaqs) as $i => $faq): ?>
                <article class="faq-item <?= $i === 0 ? 'is-open' : '' ?>">
                    <button type="button"><?= esc($faq['q']) ?> <span>+</span></button>
                    <div class="faq-body"><?= esc($faq['a']) ?></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php foreach ($site->services as $svc): ?>
<section class="section" style="padding-top:0">
    <div class="container" style="max-width:860px">
        <p class="kicker"><?= esc($svc['nav']) ?></p>
        <h2 class="section-title"><?= esc($svc['title']) ?></h2>
        <div class="faq-list" style="margin-top:16px">
            <?php foreach ($svc['faqs'] as $faq): ?>
                <article class="faq-item">
                    <button type="button"><?= esc($faq['q']) ?> <span>+</span></button>
                    <div class="faq-body"><?= esc($faq['a']) ?></div>
                </article>
            <?php endforeach; ?>
        </div>
        <p class="lede" style="margin-top:18px"><a href="<?= base_url('services/' . $svc['slug']) ?>"><?= esc(t('faqs.openSvc', ['nav' => $svc['nav']])) ?></a></p>
    </div>
</section>
<?php endforeach; ?>

<section class="section" style="padding-top:0">
    <div class="container" style="max-width:860px">
        <p class="kicker"><?= esc(t('common.amazonChip')) ?></p>
        <h2 class="section-title"><?= esc(t('faqs.amzH')) ?></h2>
        <div class="faq-list" style="margin-top:16px">
            <?php foreach ($site->amazonFaqs as $faq): ?>
                <article class="faq-item">
                    <button type="button"><?= esc($faq['q']) ?> <span>+</span></button>
                    <div class="faq-body"><?= esc($faq['a']) ?></div>
                </article>
            <?php endforeach; ?>
        </div>
        <p class="lede" style="margin-top:18px"><a href="<?= base_url('amazon-services') ?>"><?= esc(t('faqs.openAmz')) ?></a></p>
    </div>
</section>

<section class="section amazon-band">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('faqs.decK')) ?></p>
            <h2 class="section-title"><?= esc(t('faqs.decH')) ?></h2>
            <ul class="checklist">
                <?php foreach ($site->briefItems as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
        <div class="panel">
            <h3><?= esc(t('faqs.limH')) ?></h3>
            <p><?= esc(t('faqs.limP')) ?></p>
        </div>
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('faqs.ctaMore'),
    'ctaText'  => t('faqs.ctaMoreT'),
    'ctaLabel' => t('legal.contactBrand'),
    'ctaGhostHref' => base_url('process'),
    'ctaGhostLabel' => t('common.process'),
]) ?>

<?= $this->endSection() ?>
