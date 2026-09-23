<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('amazon.kicker'),
    'heading' => t('amazon.heading'),
    'lede'    => t('amazon.lede'),
    'video'   => 'commerce.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.amazon')],
    ],
    'panel'   => t('crumb.amazonWs'),
    'chips'   => array_map(static fn ($group) => [
        'label' => $group['title'],
        'href'  => '#' . $group['id'],
    ], $site->amazonGroups),
    'actions' => [
        ['label' => t('amazon.book'), 'href' => '#amazon-form', 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('amazon.general'), 'href' => base_url('contact'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section">
    <div class="container">
        <p class="disclaimer"><?= esc(t('amazon.disc')) ?></p>
        <div class="cards-2" style="margin-top:16px">
            <?php foreach ($site->amazonGroups as $group): ?>
                <article class="card icon-card" id="<?= esc($group['id']) ?>">
                    <span class="svc-icon sm"><?= st_icon(match ($group['id']) {
                        'account-setup' => 'lock',
                        'listings' => 'list',
                        'ppc' => 'ads',
                        'brand-growth' => 'rocket',
                        'fba' => 'box',
                        default => 'file',
                    }) ?></span>
                    <div>
                        <h3><?= esc($group['title']) ?></h3>
                        <p><?= esc($group['excerpt']) ?></p>
                        <ul class="checklist">
                            <?php foreach ($group['items'] as $item): ?><li><?= esc($item) ?></li><?php endforeach; ?>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('amazon.procK')) ?></p>
            <h2 class="section-title"><?= esc(t('amazon.procH')) ?></h2>
            <ol class="checklist">
                <li><?= esc(t('amazon.p1')) ?></li>
                <li><?= esc(t('amazon.p2')) ?></li>
                <li><?= esc(t('amazon.p3')) ?></li>
                <li><?= esc(t('amazon.p4')) ?></li>
                <li><?= esc(t('amazon.p5')) ?></li>
            </ol>
        </div>
        <div class="panel">
            <h3><?= esc(t('amazon.whoH')) ?></h3>
            <p><?= esc(t('amazon.who')) ?></p>
        </div>
    </div>
</section>

<section class="section" id="amazon-form">
    <div class="container contact-grid">
        <div>
            <p class="kicker"><?= esc(t('amazon.formK')) ?></p>
            <h2 class="section-title"><?= esc(t('amazon.formH')) ?></h2>
            <p class="lede"><?= esc(t('amazon.formLede')) ?></p>
        </div>
        <div class="panel"><?= $this->include('partials/forms/amazon') ?></div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('amazon.needK')) ?></p>
            <h2 class="section-title"><?= esc(t('amazon.needH')) ?></h2>
            <ul class="checklist">
                <li><?= esc(t('amazon.n1')) ?></li>
                <li><?= esc(t('amazon.n2')) ?></li>
                <li><?= esc(t('amazon.n3')) ?></li>
                <li><?= esc(t('amazon.n4')) ?></li>
                <li><?= esc(t('amazon.n5')) ?></li>
            </ul>
        </div>
        <div class="panel">
            <h3><?= esc(t('amazon.limitsH')) ?></h3>
            <p><?= esc(t('amazon.limitsP')) ?></p>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
        <p class="kicker"><?= esc(t('amazon.faqK')) ?></p>
        <h2 class="section-title"><?= esc(t('amazon.faqH')) ?></h2>
        <div class="faq-list" style="margin-top:24px;max-width:860px">
            <?php foreach ($site->amazonFaqs as $faq): ?>
                <article class="faq-item">
                    <button type="button"><?= esc($faq['q']) ?> <span>+</span></button>
                    <div class="faq-body"><?= esc($faq['a']) ?></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('amazon.readK')) ?></p>
        <h2 class="section-title"><?= esc(t('amazon.readH')) ?></h2>
        <div class="cards-2" style="margin-top:16px">
            <?php foreach ($site->insights as $post): ?>
                <?php if (! in_array($post['slug'], ['amazon-listings-before-advertising-spend', 'brand-assets-before-marketplace-and-ads'], true)) continue; ?>
                <article class="card card-fit icon-card">
                    <span class="svc-icon sm"><?= st_icon('box') ?></span>
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

<?= view('partials/videos', ['site' => $site, 'heading' => t('amazon.clips')]) ?>

<?= view('partials/page_cta', [
    'ctaTitle' => t('amazon.book'),
    'ctaText'  => t('amazon.formCtaT'),
    'ctaHref'  => '#amazon-form',
    'ctaLabel' => t('amazon.openForm'),
    'ctaGhostHref' => base_url('contact'),
    'ctaGhostLabel' => t('amazon.general'),
]) ?>

<?= $this->endSection() ?>
