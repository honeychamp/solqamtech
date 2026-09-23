<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('blog.kicker'),
    'heading' => t('blog.heading'),
    'lede'    => t('blog.lede'),
    'video'   => 'web.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.insights')],
    ],
    'panel'   => t('crumb.library'),
    'chips'   => array_map(static fn ($post) => [
        'label' => $post['category'],
        'href'  => base_url('insights/' . $post['slug']),
    ], $site->insights),
    'actions' => [
        ['label' => t('common.discuss'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('common.viewServices'), 'href' => base_url('services'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true]) ?>

<section class="section">
    <div class="container cards-3">
        <?php foreach ($site->insights as $post): ?>
            <article class="card icon-card">
                <span class="svc-icon sm"><?= st_icon('book') ?></span>
                <div>
                    <p class="meta"><?= esc($post['date']) ?> · <?= esc($post['category']) ?> · <?= esc($post['read']) ?></p>
                    <h3><?= esc($post['title']) ?></h3>
                    <p><?= esc($post['excerpt']) ?></p>
                    <a href="<?= base_url('insights/' . $post['slug']) ?>"><?= esc(t('common.readArticle')) ?></a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('blog.whatK')) ?></p>
            <h2 class="section-title"><?= esc(t('blog.whatH')) ?></h2>
            <p class="lede"><?= esc(t('blog.what')) ?></p>
        </div>
        <div class="panel">
            <h3><?= esc(t('blog.topicsH')) ?></h3>
            <ul class="checklist">
                <li><?= esc(t('blog.t1')) ?></li>
                <li><?= esc(t('blog.t2')) ?></li>
                <li><?= esc(t('blog.t3')) ?></li>
                <li><?= esc(t('blog.t4')) ?></li>
                <li><?= esc(t('blog.t5')) ?></li>
                <li><?= esc(t('blog.t6')) ?></li>
            </ul>
        </div>
    </div>
</section>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('blog.nextK')) ?></p>
        <h2 class="section-title"><?= esc(t('blog.nextH')) ?></h2>
        <div class="cards-3" style="margin-top:16px">
            <article class="card card-fit icon-card">
                <span class="svc-icon sm"><?= st_icon('monitor') ?></span>
                <div>
                    <h3><?= t('blog.webH') ?></h3>
                    <p><?= esc(t('blog.webD')) ?></p>
                    <a href="<?= base_url('services/website-technology') ?>"><?= esc(t('common.viewArrow')) ?></a>
                </div>
            </article>
            <article class="card card-fit icon-card">
                <span class="svc-icon sm"><?= st_icon('box') ?></span>
                <div>
                    <h3><?= esc(t('blog.amzH')) ?></h3>
                    <p><?= esc(t('blog.amzD')) ?></p>
                    <a href="<?= base_url('amazon-services') ?>"><?= esc(t('blog.amzA')) ?></a>
                </div>
            </article>
            <article class="card card-fit icon-card">
                <span class="svc-icon sm"><?= st_icon('megaphone') ?></span>
                <div>
                    <h3><?= esc(t('blog.dmH')) ?></h3>
                    <p><?= esc(t('blog.dmD')) ?></p>
                    <a href="<?= base_url('services/digital-marketing') ?>"><?= esc(t('common.viewArrow')) ?></a>
                </div>
            </article>
        </div>
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('blog.ctaH'),
    'ctaText'  => t('blog.ctaT'),
]) ?>

<?= $this->endSection() ?>
