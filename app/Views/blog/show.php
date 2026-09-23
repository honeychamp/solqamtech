<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'     => $site,
    'tag'      => 'article',
    'kicker'   => $post['category'],
    'heading'  => $post['title'],
    'lede'     => $post['excerpt'],
    'video'    => 'web.mp4',
    'crumbs'   => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.insights'), 'href' => base_url('insights')],
        ['label' => $post['title']],
    ],
    'panel'    => t('crumb.article'),
    'facts'    => [
        ['label' => t('common.published'), 'text' => $post['date']],
        ['label' => t('common.reading'), 'text' => $post['read']],
        ['label' => t('common.topic'), 'text' => $post['category']],
    ],
    'actions'  => [
        ['label' => t('blog.discussH'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('common.moreInsights'), 'href' => base_url('insights'), 'class' => 'btn btn-ghost'],
    ],
]) ?>
<section class="section">
    <div class="container article">
        <?= $post['body'] ?>
        <h2><?= esc(t('blog.discussH')) ?></h2>
        <p><?= esc(t('blog.discussP')) ?></p>
        <div class="hero-actions" style="margin-top:18px">
            <a class="btn btn-primary" href="<?= base_url('contact') ?>"><?= esc(t('blog.discussH')) ?></a>
            <a class="btn btn-ghost" href="<?= base_url('insights') ?>"><?= esc(t('common.moreInsights')) ?></a>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
        <p class="kicker"><?= esc(t('blog.moreK')) ?></p>
        <h2 class="section-title"><?= esc(t('blog.moreH')) ?></h2>
        <div class="cards-3" style="margin-top:16px">
            <?php foreach ($site->insights as $other): ?>
                <?php if ($other['slug'] === $post['slug']) continue; ?>
                <article class="card card-fit icon-card">
                    <span class="svc-icon sm"><?= st_icon('book') ?></span>
                    <div>
                        <p class="meta"><?= esc($other['category']) ?> · <?= esc($other['read']) ?></p>
                        <h3><?= esc($other['title']) ?></h3>
                        <p><?= esc($other['excerpt']) ?></p>
                        <a href="<?= base_url('insights/' . $other['slug']) ?>"><?= esc(t('common.readArticle')) ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('blog.matchH'),
    'ctaText'  => t('blog.matchT'),
]) ?>

<?= $this->endSection() ?>
