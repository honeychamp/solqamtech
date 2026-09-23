<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php
$arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17 17 7"/><path d="M8 7h9v9"/></svg>';
$heroSrc = video_url('office.mp4');
$trustCount = $site->proof[2] ?? ['value' => 750, 'suffix' => '+'];
$trustPeople = [
    ['file' => 'trust-1.jpg', 'alt' => ''],
    ['file' => 'trust-2.jpg', 'alt' => ''],
    ['file' => 'trust-3.jpg', 'alt' => ''],
    ['file' => 'trust-4.jpg', 'alt' => ''],
    ['file' => 'trust-5.jpg', 'alt' => ''],
];
$svcCards = $site->homeServices;
?>

<section class="hero has-video">
    <video class="hero-video" muted loop playsinline preload="none" data-src="<?= esc($heroSrc) ?>"></video>
    <div class="hero-scrim" aria-hidden="true"></div>
    <div class="container hero-stage">
        <div class="hero-top">
            <p class="hero-badge">
                <span class="hero-badge-dot" aria-hidden="true"></span>
                <?= esc(t('home.badge')) ?>
            </p>
            <a class="hero-orb" href="<?= base_url('contact') ?>" aria-label="<?= esc(t('home.orbAria')) ?>">
                <svg viewBox="0 0 140 140" aria-hidden="true">
                    <defs>
                        <path id="growPath" d="M70,70 m-48,0 a48,48 0 1,1 96,0 a48,48 0 1,1 -96,0"/>
                    </defs>
                    <text>
                        <textPath href="#growPath" startOffset="0"><?= esc(t('home.orb')) ?></textPath>
                    </text>
                </svg>
                <span class="hero-orb-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17 17 7"/><path d="M8 7h9v9"/></svg>
                </span>
            </a>
        </div>
        <h1><?= esc(t('home.h1a')) ?> <span class="text-grad"><?= esc(t('home.h1b')) ?></span></h1>
        <div class="hero-proof">
            <p class="hero-lead"><?= esc(t('home.lead')) ?></p>
            <div class="hero-stats">
                <?php foreach ($site->proof as $stat): ?>
                    <div class="hero-stat">
                        <strong><span data-count="<?= (int) $stat['value'] ?>"><?= (int) $stat['value'] ?></span><?= esc($stat['suffix']) ?></strong>
                        <span><?= esc($stat['label']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="hero-actions">
            <a class="btn btn-primary" href="<?= base_url('contact') ?>" data-open-quote><?= esc(t('home.quote')) ?> <?= $arrow ?></a>
            <a class="btn btn-ghost" href="<?= base_url('services') ?>"><?= esc(t('home.explore')) ?></a>
            <button type="button" class="btn btn-ghost" data-open-showreel><?= esc(t('home.showreel')) ?></button>
        </div>
        <div class="hero-trust">
            <a href="<?= esc($site->telHref()) ?>"><?= esc($site->phone) ?></a>
            <a href="mailto:<?= esc($site->email) ?>"><?= esc($site->email) ?></a>
            <a href="<?= esc($site->mapsLink()) ?>" target="_blank" rel="noopener"><?= esc(t('home.area')) ?></a>
        </div>
        <div class="hero-panel">
            <div class="hero-panel-visual">
                <video class="hero-panel-video" muted loop playsinline preload="none" data-src="<?= esc($heroSrc) ?>"></video>
                <span class="hero-panel-fade" aria-hidden="true"></span>
                <button type="button" class="play-btn" data-open-showreel aria-label="<?= esc(t('home.playReel')) ?>">
                    <svg viewBox="0 0 24 24"><path d="M8 5.5v13l11-6.5L8 5.5z"/></svg>
                </button>
            </div>
            <div class="hero-panel-card">
                <div class="avatar-row" aria-hidden="true">
                    <?php foreach ($trustPeople as $person): ?>
                        <img src="<?= base_url('assets/img/' . $person['file']) ?>?v=<?= @filemtime(FCPATH . 'assets/img/' . $person['file']) ?: time() ?>" alt="" width="96" height="96" decoding="async">
                    <?php endforeach; ?>
                </div>
                <div>
                    <small><?= esc(t('home.trusted')) ?></small>
                    <strong><?= (int) $trustCount['value'] ?><?= esc($trustCount['suffix']) ?> <?= esc(t('home.people')) ?></strong>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section about-band">
    <div class="container about-grid">
        <div>
            <p class="kicker"><?= esc(t('home.aboutK')) ?></p>
            <h2 class="section-title"><?= esc(t('home.aboutH')) ?></h2>
            <p class="lede"><?= esc(t('home.aboutLede')) ?></p>
            <a class="btn btn-primary" href="<?= base_url('about') ?>" style="margin-top:18px"><?= esc(t('home.readMore')) ?></a>
            <div class="about-shots">
                <figure class="about-shot about-shot-a">
                    <img src="<?= base_url('assets/img/about-web.jpg') ?>" alt="<?= esc(t('home.shotWebAlt')) ?>" width="900" height="600" loading="lazy">
                    <figcaption><?= esc(t('home.shotWeb')) ?></figcaption>
                </figure>
                <figure class="about-shot about-shot-b">
                    <img src="<?= base_url('assets/img/about-commerce.jpg') ?>" alt="<?= esc(t('home.shotBrandAlt')) ?>" width="900" height="600" loading="lazy">
                    <figcaption><?= esc(t('home.shotBrand')) ?></figcaption>
                </figure>
            </div>
        </div>
        <div>
            <h3><?= esc(t('home.visitH')) ?></h3>
            <p class="lede" style="margin:10px 0 24px"><?= esc(t('home.visitAddr')) ?></p>
            <ul class="icon-rows">
                <li>
                    <span class="svc-icon sm"><?= st_icon( 'map') ?></span>
                    <div>
                        <strong><?= esc(t('home.officeT')) ?></strong>
                        <span><?= esc(t('home.officeD')) ?></span>
                    </div>
                </li>
                <li>
                    <span class="svc-icon sm"><?= st_icon( 'monitor') ?></span>
                    <div>
                        <strong><?= esc(t('home.coordT')) ?></strong>
                        <span><?= esc(t('home.coordD')) ?></span>
                    </div>
                </li>
                <li>
                    <span class="svc-icon sm"><?= st_icon( 'spark') ?></span>
                    <div>
                        <strong><?= esc(t('home.expT')) ?></strong>
                        <span><?= esc(t('home.expD')) ?></span>
                    </div>
                </li>
            </ul>
            <button type="button" class="about-play" data-open-video data-src="<?= esc($heroSrc) ?>" data-title="<?= esc(t('home.walkTitle')) ?>">
                <span class="play-btn" aria-hidden="true">
                    <svg viewBox="0 0 24 24"><path d="M8 5.5v13l11-6.5L8 5.5z"/></svg>
                </span>
                <?= esc(t('home.watch')) ?>
            </button>
            <a class="btn btn-ghost" href="<?= esc($site->telHref()) ?>" style="margin-top:22px"><?= esc(t('home.callUs')) ?> · <?= esc($site->phone) ?></a>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
        <p class="kicker"><?= esc(t('home.whoK')) ?></p>
        <h2 class="section-title"><?= esc(t('home.whoH')) ?></h2>
        <p class="lede"><?= esc(t('home.whoLede')) ?></p>
        <?= view('partials/icon_cards', ['items' => $site->whoWeServe, 'cols' => 'cards-2']) ?>
    </div>
</section>

<?= $this->include('partials/brands') ?>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="kicker"><?= esc(t('home.svcK')) ?></p>
                <h3 class="section-title"><?= esc(t('home.svcH')) ?></h3>
                <p class="lede"><?= esc(t('home.svcLede')) ?></p>
            </div>
            <a class="btn btn-ghost" href="<?= base_url('services') ?>"><?= esc(t('home.viewAll')) ?></a>
        </div>
        <div class="cards-4 svc-grid">
            <?php foreach ($svcCards as $i => $card): ?>
                <article class="card svc-card">
                    <span class="card-index"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <span class="svc-icon"><?= st_icon( $card['icon']) ?></span>
                    <h3><?= esc($card['title']) ?></h3>
                    <p><?= esc($card['text']) ?></p>
                    <a class="read-more" href="<?= esc(base_url($card['url'])) ?>"><?= esc(t('home.readMore')) ?> <?= $arrow ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-band">
    <div class="cta-glow" aria-hidden="true"></div>
    <div class="container cta-band-inner">
        <div>
            <h2 class="section-title"><?= esc(t('home.ctaH')) ?></h2>
            <p class="lede"><?= esc(t('home.ctaLede')) ?></p>
        </div>
        <div class="hero-actions">
            <a class="btn btn-primary" href="<?= base_url('contact') ?>"><?= esc(t('home.free')) ?></a>
            <a class="btn btn-ghost" href="<?= esc($site->whatsappUrl(t('whatsapp.meeting'))) ?>" target="_blank" rel="noopener"><?= esc(t('home.meeting')) ?></a>
        </div>
    </div>
</section>

<section class="section why-band">
    <div class="why-glow" aria-hidden="true"></div>
    <div class="container why-grid">
        <div>
            <p class="kicker"><?= esc(t('home.whyK')) ?></p>
            <h2 class="section-title"><?= esc(t('home.whyH')) ?></h2>
            <p class="lede"><?= esc(t('home.whyLede')) ?></p>
            <a class="btn btn-primary" href="<?= base_url('contact') ?>" style="margin-top:16px"><?= esc(t('home.touch')) ?></a>
        </div>
        <div class="rings">
            <?php foreach ($site->proof as $i => $stat): ?>
                <div class="ring ring-<?= $i + 1 ?>" data-ring="<?= (int) ($stat['ring'] ?? $stat['value']) ?>">
                    <svg viewBox="0 0 120 120" aria-hidden="true">
                        <defs>
                            <linearGradient id="ringGrad<?= $i + 1 ?>" x1="0%" y1="0%" x2="100%" y2="100%">
                                <?php if ($i === 0): ?>
                                    <stop offset="0%" stop-color="#4df0e3"/>
                                    <stop offset="100%" stop-color="#6b88ff"/>
                                <?php elseif ($i === 1): ?>
                                    <stop offset="0%" stop-color="#7b61ff"/>
                                    <stop offset="100%" stop-color="#4df0e3"/>
                                <?php else: ?>
                                    <stop offset="0%" stop-color="#a898ff"/>
                                    <stop offset="100%" stop-color="#7b61ff"/>
                                <?php endif; ?>
                            </linearGradient>
                        </defs>
                        <circle class="ring-track" cx="60" cy="60" r="50"></circle>
                        <circle class="ring-meter" cx="60" cy="60" r="50" stroke="url(#ringGrad<?= $i + 1 ?>)"></circle>
                    </svg>
                    <div class="ring-copy">
                        <strong><span data-count="<?= (int) $stat['value'] ?>"><?= (int) $stat['value'] ?></span><?= esc($stat['suffix']) ?></strong>
                        <span><?= esc($stat['label']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container why-points">
        <article>
            <span class="svc-icon sm"><?= st_icon('target') ?></span>
            <div>
                <h3><?= esc(t('home.stratT')) ?></h3>
                <p><?= esc(t('home.stratD')) ?></p>
            </div>
        </article>
        <article>
            <span class="svc-icon sm"><?= st_icon('check') ?></span>
            <div>
                <h3><?= esc(t('home.transT')) ?></h3>
                <p><?= esc(t('home.transD')) ?></p>
            </div>
        </article>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="kicker"><?= esc(t('home.procK')) ?></p>
        <h3 class="section-title"><?= esc(t('home.procH')) ?></h3>
        <p class="lede"><?= esc(t('home.procLede')) ?></p>
        <div class="process-track process-4">
            <?php
            $procIcons = ['search', 'map', 'monitor', 'rocket'];
            foreach (array_slice($site->process, 0, 4) as $i => $step): ?>
                <article class="process-step">
                    <b>0<?= $i + 1 ?></b>
                    <span class="svc-icon"><?= st_icon( $procIcons[$i] ?? 'spark') ?></span>
                    <h3><?= esc($step['title']) ?></h3>
                    <p><?= esc($step['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->include('partials/videos') ?>

<section class="section contact-home">
    <div class="container contact-grid">
        <div>
            <p class="kicker"><?= esc(t('home.contactK')) ?></p>
            <h2 class="section-title"><?= esc(t('home.contactH')) ?></h2>
            <p class="lede"><?= esc(t('home.contactLede')) ?></p>
            <div class="benefit-cards">
                <article>
                    <span class="svc-icon sm"><?= st_icon( 'check') ?></span>
                    <div>
                        <strong><?= esc(t('home.scopeT')) ?></strong>
                        <span><?= esc(t('home.scopeD')) ?></span>
                    </div>
                </article>
                <article>
                    <span class="svc-icon sm"><?= st_icon( 'shield') ?></span>
                    <div>
                        <strong><?= esc(t('home.limitT')) ?></strong>
                        <span><?= esc(t('home.limitD')) ?></span>
                    </div>
                </article>
            </div>
        </div>
        <div class="panel get-in-touch">
            <h3><?= esc(t('home.touch')) ?></h3>
            <?= $this->include('partials/forms/contact', ['idPrefix' => 'home_']) ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
            <p class="kicker"><?= esc(t('home.workK')) ?></p>
            <h2 class="section-title"><?= esc(t('home.workH')) ?></h2>
            <p class="lede"><?= esc(t('home.workLede')) ?></p>
        <div class="cards-3" style="margin-top:16px">
            <article class="card quote-card">
                <span class="svc-icon sm"><?= st_icon( 'quote') ?></span>
                <p><?= esc(t('home.onboardD')) ?></p>
                <strong><?= esc(t('home.onboard')) ?></strong>
            </article>
            <article class="card quote-card">
                <span class="svc-icon sm"><?= st_icon( 'quote') ?></span>
                <p><?= esc(t('home.reportD')) ?></p>
                <strong><?= esc(t('home.report')) ?></strong>
            </article>
            <article class="card quote-card">
                <span class="svc-icon sm"><?= st_icon( 'quote') ?></span>
                <p><?= esc(t('home.limitsD')) ?></p>
                <strong><?= esc(t('home.limits')) ?></strong>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split faq-split">
        <div>
            <p class="kicker"><?= esc(t('home.faqK')) ?></p>
            <h2 class="section-title"><?= esc(t('home.faqH')) ?></h2>
            <p class="lede"><?= esc(t('home.faqLede')) ?></p>
            <div class="panel faq-cta">
                <h3><?= esc(t('home.faqQ')) ?></h3>
                <p><?= esc(t('home.faqA')) ?></p>
                <a class="btn btn-primary" href="<?= base_url('contact') ?>"><?= esc(t('nav.contact')) ?> <?= $arrow ?></a>
            </div>
        </div>
        <div class="faq-list">
            <?php foreach ($site->homeFaqs as $i => $faq): ?>
                <article class="faq-item <?= $i === 0 ? 'is-open' : '' ?>">
                    <button type="button"><?= esc($faq['q']) ?> <span>+</span></button>
                    <div class="faq-body"><?= esc($faq['a']) ?></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="kicker"><?= esc(t('home.insK')) ?></p>
                <h2 class="section-title"><?= esc(t('home.insH')) ?></h2>
                <p class="lede"><?= esc(t('home.insLede')) ?></p>
            </div>
            <a class="btn btn-ghost" href="<?= base_url('insights') ?>"><?= esc(t('home.viewAll')) ?></a>
        </div>
        <div class="cards-3">
            <?php foreach ($site->insights as $post): ?>
                <article class="card svc-card">
                    <span class="svc-icon sm"><?= st_icon( 'monitor') ?></span>
                    <p class="meta"><?= esc($post['category']) ?> · <?= esc($post['read']) ?></p>
                    <h3><?= esc($post['title']) ?></h3>
                    <p><?= esc($post['excerpt']) ?></p>
                    <a class="read-more" href="<?= base_url('insights/' . $post['slug']) ?>"><?= esc(t('home.readMore')) ?> <?= $arrow ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
