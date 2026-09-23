<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => $service['kicker'],
    'heading' => $service['title'],
    'lede'    => $service['intro'],
    'video'   => in_array($service['slug'] ?? '', ['digital-marketing', 'branding-creative'], true) ? 'campaigns.mp4' : 'web.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.services'), 'href' => base_url('services')],
        ['label' => $service['nav']],
    ],
    'panel'   => t('crumb.howRuns'),
    'facts'   => array_map(static function ($step, $i) {
        return ['label' => str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT), 'text' => $step];
    }, $service['process'] ?? [], array_keys($service['process'] ?? [])),
    'actions' => [
        ['label' => t('common.quote'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'arrow' => true],
        ['label' => t('common.book'), 'href' => base_url('contact'), 'class' => 'btn btn-ghost'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section">
    <div class="container split">
        <div>
            <h2 class="section-title"><?= esc(t('service.whoH')) ?></h2>
            <p class="lede"><?= esc($service['audience']) ?></p>
            <h3 style="margin-top:16px"><?= esc(t('service.problems')) ?></h3>
            <ul class="checklist">
                <?php foreach ($service['problems'] as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h2 class="section-title"><?= esc(t('service.benefits')) ?></h2>
            <ul class="checklist">
                <?php foreach ($service['benefits'] as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="section scope-section">
    <div class="container">
        <p class="kicker"><?= esc(t('service.delK')) ?></p>
        <h2 class="section-title"><?= esc(t('service.delH')) ?></h2>
        <p class="lede"><?= esc(t('service.delLede')) ?></p>
        <div class="scope-grid">
            <?php foreach ($service['deliverables'] as $i => $row): ?>
                <article class="scope-card">
                    <span class="scope-num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <p><?= esc($row) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <h2 class="section-title"><?= esc(t('service.procH')) ?></h2>
            <ol class="checklist">
                <?php foreach ($service['process'] as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ol>
            <p class="lede" style="margin-top:18px"><strong><?= esc(t('service.timeline')) ?></strong> <?= esc($service['timeline']) ?></p>
        </div>
        <div class="panel">
            <h3><?= esc(t('service.tools')) ?></h3>
            <div class="trust-row" style="justify-content:flex-start;margin-top:12px">
                <?php foreach ($service['tools'] as $tool): ?><span class="chip"><?= esc($tool) ?></span><?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <h2 class="section-title"><?= esc(t('service.faqH')) ?></h2>
            <div class="faq-list" style="margin-top:20px">
                <?php foreach ($service['faqs'] as $faq): ?>
                    <article class="faq-item">
                        <button type="button"><?= esc($faq['q']) ?> <span>+</span></button>
                        <div class="faq-body"><?= esc($faq['a']) ?></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <h2 class="section-title"><?= esc(t('service.relH')) ?></h2>
            <div class="cards-2 cards-fit" style="margin-top:20px">
                <?php foreach ($service['related'] as $slug): ?>
                    <?php $rel = $site->service($slug); if (! $rel) continue; ?>
                    <article class="card card-fit icon-card">
                        <span class="svc-icon sm"><?= st_icon($rel['icon'] ?? 'spark') ?></span>
                        <div>
                            <h3><?= esc($rel['title']) ?></h3>
                            <p><?= esc($rel['excerpt']) ?></p>
                            <a href="<?= base_url('services/' . $rel['slug']) ?>"><?= esc(t('common.viewArrow')) ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
                <article class="card card-fit icon-card">
                    <span class="svc-icon sm"><?= st_icon('book') ?></span>
                    <div>
                        <h3><?= esc(t('service.insH')) ?></h3>
                        <p><?= esc(t('service.insD')) ?></p>
                        <a href="<?= base_url('insights') ?>"><?= esc(t('service.readIns')) ?></a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<?= view('partials/videos', ['site' => $site, 'heading' => t('reel.related')]) ?>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('service.readyK')) ?></p>
            <h2 class="section-title"><?= esc(t('service.readyH')) ?></h2>
            <ul class="checklist">
                <?php foreach ($site->briefItems as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
        <div class="panel">
            <h3><?= esc(t('service.startH')) ?></h3>
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
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('service.ctaH', ['nav' => $service['nav']]),
    'ctaText'  => t('service.ctaT'),
    'ctaLabel' => t('common.quote'),
]) ?>

<?= $this->endSection() ?>
