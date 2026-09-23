<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('services.kicker'),
    'heading' => t('services.heading'),
    'lede'    => t('services.lede'),
    'video'   => 'web.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.services')],
    ],
    'panel'   => t('crumb.index'),
    'chips'   => array_merge(
        array_map(static fn ($item) => [
            'label' => $item['nav'],
            'href'  => base_url('services/' . $item['slug']),
        ], $site->services),
        [['label' => t('nav.amazon'), 'href' => base_url('amazon-services')]]
    ),
    'actions' => [
        ['label' => t('common.quote'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('services.amazon'), 'href' => base_url('amazon-services'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section">
    <div class="container cards-3">
        <?php foreach ($site->services as $item): ?>
            <article class="card card-fit icon-card svc-index-card">
                <span class="svc-icon sm"><?= st_icon($item['icon'] ?? 'spark') ?></span>
                <div>
                    <span class="chip"><?= esc($item['kicker']) ?></span>
                    <h3><?= esc($item['title']) ?></h3>
                    <p><?= esc($item['excerpt']) ?></p>
                    <a class="btn btn-ghost btn-sm" href="<?= base_url('services/' . $item['slug']) ?>"><?= esc(t('common.viewSvc')) ?></a>
                </div>
            </article>
        <?php endforeach; ?>
        <article class="card card-fit icon-card svc-index-card">
            <span class="svc-icon sm"><?= st_icon('box') ?></span>
            <div>
                <span class="chip"><?= esc(t('common.amazonChip')) ?></span>
                <h3><?= esc(t('common.amazonH')) ?></h3>
                <p><?= esc(t('common.amazonD')) ?></p>
                <a class="btn btn-ghost btn-sm" href="<?= base_url('amazon-services') ?>"><?= esc(t('common.viewAmazon')) ?></a>
            </div>
        </article>
        <article class="card card-fit icon-card svc-index-card">
            <span class="svc-icon sm"><?= st_icon('pen') ?></span>
            <div>
                <span class="chip"><?= esc(t('common.creative')) ?></span>
                <h3><?= esc(t('common.content')) ?></h3>
                <p><?= esc(t('common.contentD')) ?></p>
                    <a class="btn btn-ghost btn-sm" href="<?= base_url('services/branding-creative') ?>"><?= esc(t('common.viewBrand')) ?></a>
                </div>
            </article>
        <article class="card card-fit icon-card svc-index-card">
            <span class="svc-icon sm"><?= st_icon('camera') ?></span>
            <div>
                <span class="chip"><?= esc(t('common.video')) ?></span>
                <h3><?= esc(t('common.videoH')) ?></h3>
                <p><?= esc(t('common.videoD')) ?></p>
                <a class="btn btn-ghost btn-sm" href="<?= base_url('services/branding-creative') ?>"><?= esc(t('common.viewBrand')) ?></a>
            </div>
        </article>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('services.chooseK')) ?></p>
            <h2 class="section-title"><?= esc(t('services.chooseH')) ?></h2>
            <p class="lede"><?= esc(t('services.chooseLede')) ?></p>
            <ul class="checklist" style="margin-top:18px">
                <li><?= esc(t('services.c1')) ?></li>
                <li><?= esc(t('services.c2')) ?></li>
                <li><?= esc(t('services.c3')) ?></li>
                <li><?= esc(t('services.c4')) ?></li>
            </ul>
        </div>
        <div class="panel">
            <h3><?= esc(t('services.everyH')) ?></h3>
            <ul class="checklist">
                <?php foreach ($site->scopeIncludes as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('services.whoK')) ?></p>
        <h2 class="section-title"><?= esc(t('services.whoH')) ?></h2>
        <?= view('partials/icon_cards', ['items' => $site->whoWeServe, 'cols' => 'cards-2']) ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="kicker"><?= esc(t('services.procK')) ?></p>
                <h2 class="section-title"><?= esc(t('services.procH')) ?></h2>
                <p class="lede"><?= esc(t('services.procLede')) ?></p>
            </div>
            <a class="btn btn-ghost" href="<?= base_url('process') ?>"><?= esc(t('common.fullProcess')) ?></a>
        </div>
        <div class="process-track">
            <?php foreach ($site->process as $step): ?>
                <article class="process-step">
                    <b><?= esc($step['num']) ?></b>
                    <span class="svc-icon sm"><?= st_icon($step['icon'] ?? 'spark') ?></span>
                    <h3><?= esc($step['title']) ?></h3>
                    <p><?= esc($step['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="kicker"><?= esc(t('services.insK')) ?></p>
                <h2 class="section-title"><?= esc(t('services.insH')) ?></h2>
            </div>
            <a class="btn btn-ghost" href="<?= base_url('insights') ?>"><?= esc(t('common.allInsights')) ?></a>
        </div>
        <div class="cards-3">
            <?php foreach ($site->insights as $post): ?>
                <article class="card card-fit icon-card">
                    <span class="svc-icon sm"><?= st_icon('book') ?></span>
                    <div>
                        <p class="meta"><?= esc($post['category']) ?> · <?= esc($post['read']) ?></p>
                        <h3><?= esc($post['title']) ?></h3>
                        <p><?= esc($post['excerpt']) ?></p>
                        <a href="<?= base_url('insights/' . $post['slug']) ?>"><?= esc(t('common.readArticle')) ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= view('partials/videos', ['site' => $site, 'heading' => t('reel.service')]) ?>

<?= view('partials/page_cta', [
    'ctaTitle' => t('services.ctaH'),
    'ctaText'  => t('services.ctaT'),
    'ctaLabel' => t('common.quote'),
]) ?>

<?= $this->endSection() ?>
