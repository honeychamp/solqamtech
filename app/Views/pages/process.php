<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('process.kicker'),
    'heading' => t('process.heading'),
    'lede'    => t('process.lede'),
    'video'   => 'office.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.process')],
    ],
    'panel'   => t('crumb.six'),
    'facts'   => array_map(static fn ($step) => [
        'label' => $step['num'],
        'text'  => $step['title'],
    ], $site->process),
    'actions' => [
        ['label' => t('common.book'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('common.seeServices'), 'href' => base_url('services'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section">
    <div class="container process-track process-detail">
        <?php foreach ($site->process as $step): ?>
            <article class="process-step">
                <b><?= esc($step['num']) ?></b>
                <span class="svc-icon sm"><?= st_icon($step['icon'] ?? 'spark') ?></span>
                <h3><?= esc($step['title']) ?></h3>
                <p><?= esc($step['text']) ?></p>
                <div class="need-pair">
                    <p class="process-need is-need"><small><?= esc(t('common.need')) ?></small><?= esc($step['need']) ?></p>
                    <p class="process-need is-out"><small><?= esc(t('common.out')) ?></small><?= esc($step['out']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('process.beforeK')) ?></p>
            <h2 class="section-title"><?= esc(t('process.beforeH')) ?></h2>
            <ul class="checklist">
                <?php foreach ($site->briefItems as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
        <div class="panel">
            <h3><?= esc(t('process.scopeH')) ?></h3>
            <ul class="checklist">
                <?php foreach ($site->scopeIncludes as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('process.startK')) ?></p>
        <h2 class="section-title"><?= esc(t('process.startH')) ?></h2>
        <?= view('partials/icon_cards', ['items' => $site->howWeStart, 'cols' => 'cards-3']) ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="kicker"><?= esc(t('process.whoK')) ?></p>
        <h2 class="section-title"><?= esc(t('process.whoH')) ?></h2>
        <p class="lede"><?= esc(t('process.whoLede')) ?></p>
        <?= view('partials/icon_cards', ['items' => $site->whoWeServe, 'cols' => 'cards-2']) ?>
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('cta.title'),
    'ctaText'  => t('cta.text'),
]) ?>

<?= $this->endSection() ?>
