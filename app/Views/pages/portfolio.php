<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('portfolio.kicker'),
    'heading' => t('portfolio.heading'),
    'lede'    => t('portfolio.lede'),
    'video'   => 'campaigns.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.portfolio')],
    ],
    'panel'   => t('crumb.types'),
    'chips'   => array_map(static fn ($item) => [
        'label' => $item['tag'],
    ], $site->portfolio),
    'actions' => [
        ['label' => t('common.startBrief'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('common.viewServices'), 'href' => base_url('services'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section">
    <div class="container cards-2">
        <?php foreach ($site->portfolio as $item): ?>
            <article class="card icon-card">
                <span class="svc-icon sm"><?= st_icon('layers') ?></span>
                <div>
                    <span class="chip"><?= esc($item['label']) ?> · <?= esc($item['tag']) ?></span>
                    <h3><?= esc($item['title']) ?></h3>
                    <p><?= esc($item['summary']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('portfolio.howK')) ?></p>
            <h2 class="section-title"><?= esc(t('portfolio.howH')) ?></h2>
            <p class="lede"><?= esc(t('portfolio.how1')) ?></p>
            <p class="lede" style="margin-top:14px"><?= esc(t('portfolio.how2')) ?></p>
        </div>
        <div class="panel">
            <h3><?= esc(t('portfolio.mixH')) ?></h3>
            <ul class="checklist">
                <li><?= esc(t('portfolio.mix1')) ?></li>
                <li><?= esc(t('portfolio.mix2')) ?></li>
                <li><?= esc(t('portfolio.mix3')) ?></li>
                <li><?= esc(t('portfolio.mix4')) ?></li>
            </ul>
        </div>
    </div>
</section>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('portfolio.relK')) ?></p>
        <h2 class="section-title"><?= esc(t('portfolio.relH')) ?></h2>
        <?= view('partials/icon_cards', [
            'items' => array_map(static function ($item) {
                $item['href'] = base_url('services/' . $item['slug']);
                $item['text'] = $item['excerpt'];
                $item['linkLabel'] = t('contact.linkSvc');
                return $item;
            }, array_slice($site->services, 0, 3)),
            'cols' => 'cards-3',
            'linkKey' => 'href',
        ]) ?>
    </div>
</section>

<?= view('partials/videos', ['site' => $site, 'heading' => t('portfolio.clips')]) ?>

<?= view('partials/page_cta', [
    'ctaTitle' => t('portfolio.startCta'),
    'ctaText'  => t('portfolio.startCtaT'),
]) ?>

<?= $this->endSection() ?>
