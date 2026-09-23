<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'    => $site,
    'kicker'  => t('contact.kicker'),
    'heading' => t('contact.heading'),
    'lede'    => t('contact.lede'),
    'video'   => 'office.mp4',
    'crumbs'  => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.contact')],
    ],
    'panel'   => t('crumb.reach'),
    'facts'   => [
        ['label' => t('contact.phoneL'), 'text' => $site->phone, 'href' => $site->telHref()],
        ['label' => t('contact.emailL'), 'text' => $site->email, 'href' => 'mailto:' . $site->email],
        ['label' => t('contact.hoursL'), 'text' => t('contact.hours')],
        ['label' => t('contact.mapL'), 'text' => t('contact.mapV'), 'href' => $site->mapsLink()],
    ],
    'actions' => [
        ['label' => t('contact.quote'), 'href' => base_url('contact'), 'class' => 'btn btn-primary', 'attrs' => 'data-open-quote', 'arrow' => true],
        ['label' => t('contact.chat'), 'href' => $site->whatsappUrl(t('whatsapp.project')), 'class' => 'btn btn-ghost', 'attrs' => 'target="_blank" rel="noopener"'],
    ],
]) ?>

<?= view('partials/brands', ['site' => $site, 'compact' => true, 'heading' => t('brands.heading')]) ?>

<section class="section" style="padding-top:36px">
    <div class="container cards-4">
        <a class="contact-card" href="<?= esc($site->mapsLink()) ?>" target="_blank" rel="noopener">
            <span class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.4"/></svg>
            </span>
            <h3><?= esc(t('contact.visitH')) ?></h3>
            <p><?= esc($site->address) ?></p>
            <strong><?= esc(t('contact.maps')) ?></strong>
        </a>
        <a class="contact-card" href="<?= esc($site->telHref()) ?>">
            <span class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6.5 4.5h3l1.2 3.2-1.8 1.2a12 12 0 0 0 6.2 6.2l1.2-1.8 3.2 1.2v3A2 2 0 0 1 17.5 19 15 15 0 0 1 5 6.5a2 2 0 0 1 1.5-2Z"/></svg>
            </span>
            <h3><?= esc(t('contact.callH')) ?></h3>
            <p><?= esc($site->phone) ?></p>
            <strong><?= esc(t('contact.call')) ?></strong>
        </a>
        <a class="contact-card" href="mailto:<?= esc($site->email) ?>">
            <span class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="m4 7 8 6 8-6"/></svg>
            </span>
            <h3><?= esc(t('contact.writeH')) ?></h3>
            <p><?= esc($site->email) ?></p>
            <strong><?= esc(t('contact.write')) ?></strong>
        </a>
        <a class="contact-card" href="<?= esc($site->whatsappUrl(t('whatsapp.visit'))) ?>" target="_blank" rel="noopener">
            <span class="icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg>
            </span>
            <h3><?= esc(t('contact.hoursH')) ?></h3>
            <p><?= esc($site->hours) ?></p>
            <strong><?= esc(t('contact.hoursCta')) ?></strong>
        </a>
    </div>
</section>

<section class="section map-section">
    <div class="container contact-grid">
        <div>
            <p class="kicker"><?= esc(t('contact.findK')) ?></p>
            <h2 class="section-title"><?= esc(t('contact.findH')) ?></h2>
            <p class="lede"><?= esc(t('contact.findLede')) ?></p>
            <ul class="checklist">
                <li><?= esc(t('contact.line1')) ?></li>
                <li><?= esc(t('contact.line2')) ?></li>
                <li><?= esc($site->phone) ?></li>
                <li><?= esc($site->email) ?></li>
            </ul>
            <div class="hero-actions">
                <a class="btn btn-primary" href="<?= esc($site->whatsappUrl(t('whatsapp.office'))) ?>" target="_blank" rel="noopener"><?= esc(t('contact.waOffice')) ?></a>
                <a class="btn btn-ghost" href="<?= esc($site->mapsLink()) ?>" target="_blank" rel="noopener"><?= esc(t('contact.dirs')) ?></a>
            </div>
        </div>
        <div class="map-stage">
            <div class="map-frame">
                <iframe
                    title="<?= esc(t('contact.mapTitle')) ?>"
                    data-src="<?= esc($site->mapsEmbed()) ?>"
                    src="about:blank"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen></iframe>
            </div>
            <aside class="map-pin">
                <small><?= esc(t('contact.pinSmall')) ?></small>
                <strong><?= esc(t('contact.pinH')) ?></strong>
                <p><?= esc(t('contact.pinP')) ?></p>
                <a href="<?= esc($site->mapsLink()) ?>" target="_blank" rel="noopener"><?= esc(t('contact.openMaps')) ?></a>
            </aside>
        </div>
    </div>
</section>

<section class="section" id="inquiry-form" style="padding-top:0">
    <div class="container contact-grid">
        <div>
            <p class="kicker"><?= esc(t('contact.inqK')) ?></p>
            <h2 class="section-title"><?= esc(t('contact.inqH')) ?></h2>
            <p class="lede"><?= esc(t('contact.inqLede')) ?></p>
        </div>
        <div class="panel"><?= $this->include('partials/forms/contact') ?></div>
    </div>
</section>

<section class="section" id="amazon-form" style="padding-top:0">
    <div class="container contact-grid">
        <div>
            <p class="kicker"><?= esc(t('contact.amzK')) ?></p>
            <h2 class="section-title"><?= esc(t('contact.amzH')) ?></h2>
            <p class="lede"><?= esc(t('contact.amzLede')) ?></p>
        </div>
        <div class="panel"><?= $this->include('partials/forms/amazon') ?></div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container split">
        <div>
            <p class="kicker"><?= esc(t('contact.beforeK')) ?></p>
            <h2 class="section-title"><?= esc(t('contact.beforeH')) ?></h2>
            <ul class="checklist">
                <?php foreach ($site->briefItems as $row): ?><li><?= esc($row) ?></li><?php endforeach; ?>
            </ul>
        </div>
        <div>
            <p class="kicker"><?= esc(t('contact.offK')) ?></p>
            <h2 class="section-title"><?= esc(t('contact.offH')) ?></h2>
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
    </div>
</section>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('contact.startK')) ?></p>
        <h2 class="section-title"><?= esc(t('contact.startH')) ?></h2>
        <?= view('partials/icon_cards', ['items' => $site->howWeStart, 'cols' => 'cards-3']) ?>
    </div>
</section>

<?= view('partials/videos', ['site' => $site, 'heading' => t('reel.contact')]) ?>

<section class="section amazon-band">
    <div class="container">
        <p class="kicker"><?= esc(t('contact.svcK')) ?></p>
        <h2 class="section-title"><?= esc(t('contact.svcH')) ?></h2>
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

<?= view('partials/page_cta', [
    'ctaTitle' => t('contact.ctaH'),
    'ctaText'  => t('contact.ctaT'),
    'ctaLabel' => t('contact.ctaLabel'),
    'ctaHref'  => '#inquiry-form',
    'ctaGhostHref' => $site->whatsappUrl(t('whatsapp.project')),
    'ctaGhostLabel' => t('contact.waOffice'),
]) ?>

<?= $this->endSection() ?>
