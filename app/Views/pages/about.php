<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('about.kicker'),
    'heading' => t('about.heading'),
    'lede'    => t('about.lede'),
    'video'   => 'office.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.about')],
    ],
    'panel'   => t('crumb.thisPage'),
    'facts'   => [
        ['label' => t('about.office'), 'text' => t('about.officeV')],
        ['label' => t('about.delivery'), 'text' => t('about.deliveryV')],
        ['label' => t('about.focus'), 'text' => t('about.focusV')],
    ],
    'actions' => [
        ['label' => t('common.book'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('common.process'), 'href' => base_url('process'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section">
    <div class="container split">
        <div>
            <h2 class="section-title"><?= esc(t('about.whoH')) ?></h2>
            <p class="lede"><?= esc(t('about.who1')) ?></p>
            <p class="lede" style="margin-top:14px"><?= esc(t('about.who2')) ?></p>
        </div>
        <div class="panel">
            <h3 class="section-title" style="font-size:1.4rem"><?= esc(t('about.missionH')) ?></h3>
            <p><?= esc(t('about.mission')) ?></p>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
            <p class="kicker"><?= esc(t('about.whyK')) ?></p>
            <h2 class="section-title"><?= esc(t('about.whyH')) ?></h2>
        <div class="cards-3" style="margin-top:16px">
            <?php foreach ($site->why as $item): ?>
                <article class="card">
                    <h3><?= esc($item['title']) ?></h3>
                    <p><?= esc($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="hero-actions" style="margin-top:18px">
            <a class="btn btn-primary" href="<?= base_url('contact') ?>"><?= esc(t('common.book')) ?></a>
            <a class="btn btn-ghost" href="<?= base_url('process') ?>"><?= esc(t('common.process')) ?></a>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
            <p class="kicker"><?= esc(t('about.whoK')) ?></p>
            <h2 class="section-title"><?= esc(t('about.whoH2')) ?></h2>
            <p class="lede"><?= esc(t('about.whoLede')) ?></p>
        <?= view('partials/icon_cards', ['items' => $site->whoWeServe, 'cols' => 'cards-2']) ?>
    </div>
</section>

<section class="section amazon-band">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('about.startK')) ?></p>
            <h2 class="section-title"><?= esc(t('about.startH')) ?></h2>
            <p class="lede"><?= esc(t('about.startLede')) ?></p>
            <div class="start-list">
                <?php foreach ($site->howWeStart as $item): ?>
                    <article class="start-row">
                        <span class="svc-icon sm"><?= st_icon($item['icon']) ?></span>
                        <div>
                            <strong><?= esc($item['title']) ?></strong>
                            <span><?= esc($item['text']) ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="panel">
            <h3><?= esc(t('about.scopeH')) ?></h3>
            <ul class="checklist">
                <?php foreach ($site->scopeIncludes as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('about.offK')) ?></p>
            <h2 class="section-title"><?= esc(t('about.offH')) ?></h2>
            <ul class="start-list" style="margin-top:0">
                <?php
                $officeIcons = ['map', 'clock', 'phone', 'briefcase', 'globe'];
                foreach ($site->officeNotes as $i => $row): ?>
                    <li class="start-row">
                        <span class="svc-icon sm"><?= st_icon($officeIcons[$i] ?? 'check') ?></span>
                        <div><span><?= esc($row) ?></span></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <p class="kicker"><?= esc(t('about.proofK')) ?></p>
            <h2 class="section-title"><?= esc(t('about.proofH')) ?></h2>
            <p class="lede"><?= esc(t('about.proofLede')) ?></p>
            <div class="hero-stats proof-row" style="margin-top:24px;padding:0;border:0">
                <?php foreach ($site->proof as $stat): ?>
                    <div class="hero-stat">
                        <strong><span data-count="<?= (int) $stat['value'] ?>"><?= (int) $stat['value'] ?></span><?= esc($stat['suffix']) ?></strong>
                        <span><?= esc($stat['label']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?= view('partials/videos', ['site' => $site, 'heading' => t('reel.office')]) ?>

<?= view('partials/page_cta', [
    'ctaTitle' => t('about.ctaH'),
    'ctaText'  => t('about.ctaT'),
]) ?>

<?= $this->endSection() ?>
