<!DOCTYPE html>
<html lang="<?= esc(current_lang()) ?>" dir="<?= is_rtl() ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <meta name="description" content="<?= esc($description) ?>">
    <link rel="canonical" href="<?= esc($canonical) ?>">
    <meta property="og:title" content="<?= esc($title) ?>">
    <meta property="og:description" content="<?= esc($description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc($canonical) ?>">
    <meta property="og:image" content="<?= esc(logo_url()) ?>">
    <meta property="og:locale" content="<?= current_lang() === 'ar' ? 'ar_SA' : 'en_US' ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="<?= base_url('assets/img/logo.svg') ?>" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php if (is_rtl()): ?>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript><link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet"></noscript>
    <?php else: ?>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"></noscript>
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>?v=<?= @filemtime(FCPATH . 'assets/css/app.css') ?: time() ?>">
</head>
<body>
<div class="fx-orbs" aria-hidden="true">
    <span class="fx-orb fx-orb-a"></span>
    <span class="fx-orb fx-orb-b"></span>
    <span class="fx-orb fx-orb-c"></span>
</div>
<div class="fx-grid" aria-hidden="true"></div>
<div class="fx-grain" aria-hidden="true"></div>
<div class="scroll-progress" aria-hidden="true"></div>
<div class="pointer-glow" aria-hidden="true">
    <span class="pg-trail"></span>
    <span class="pg-core"></span>
    <span class="pg-dot"></span>
</div>
<a class="skip" href="#content"><?= esc(t('skip')) ?></a>
<?= $this->include('partials/header') ?>
<main id="content">
    <?= $this->renderSection('content') ?>
</main>
<?= $this->include('partials/footer') ?>
<?= $this->include('partials/quote_modal') ?>
<?= $this->include('partials/video_modal') ?>
<details class="lang-fab">
    <summary aria-label="<?= esc(t('lang.label')) ?>">
        <?= st_icon('globe') ?>
        <span class="lang-fab-code"><?= current_lang() === 'ar' ? 'AR' : 'EN' ?></span>
    </summary>
    <div class="lang-fab-menu" role="menu">
        <a href="<?= esc(lang_url('en')) ?>" role="menuitem" class="<?= current_lang() === 'en' ? 'is-on' : '' ?>" hreflang="en" lang="en"><?= esc(t('lang.en')) ?></a>
        <a href="<?= esc(lang_url('ar')) ?>" role="menuitem" class="<?= current_lang() === 'ar' ? 'is-on' : '' ?>" hreflang="ar" lang="ar"><?= esc(t('lang.ar')) ?></a>
    </div>
</details>
<a class="whatsapp-fab" href="<?= esc($site->whatsappUrl(t('whatsapp.project'))) ?>" target="_blank" rel="noopener" aria-label="<?= esc(t('whatsapp.aria')) ?>">
    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.5 3.5A11 11 0 0 0 2.1 17.8L1 23l5.4-1.1A11 11 0 1 0 20.5 3.5Zm-8.5 17a9.1 9.1 0 0 1-4.6-1.3l-.3-.2-3.2.7.7-3.1-.2-.3A9.1 9.1 0 1 1 12 20.5Zm5-6.8c-.3-.1-1.6-.8-1.9-.9s-.4-.1-.6.1-.7.9-.8 1-.3.2-.6.1a7.4 7.4 0 0 1-2.2-1.4 8.2 8.2 0 0 1-1.5-1.9c-.2-.3 0-.4.1-.6l.4-.5.1-.3a.5.5 0 0 0 0-.5c0-.1-.6-1.4-.8-1.9s-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3s-1 1-1 2.4 1 2.8 1.2 3a10 10 0 0 0 3.8 3.4c.5.3 1 .4 1.3.5.6.2 1.1.2 1.5.1.5-.1 1.6-.7 1.8-1.3s.2-1.2.2-1.3-.2-.2-.5-.3Z"/></svg>
</a>
<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'ProfessionalService',
    'name'     => $site->name,
    'url'      => base_url('/'),
    'email'    => $site->email,
    'telephone'=> $site->phone,
    'image'    => logo_url(),
    'description' => t('meta.ldDesc'),
    'areaServed' => $site->markets,
    'address'  => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => 'Office#4, First Floor, Qasim Arcade, Khyber Market',
        'addressLocality' => 'Islamabad',
        'addressRegion'   => 'Islamabad Capital Territory',
        'postalCode'      => 'G-13/4',
        'addressCountry'  => 'PK',
    ],
    'openingHours' => 'Mo-Sa 10:00-18:00',
    'inLanguage'   => current_lang(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
</script>
<script src="<?= base_url('assets/js/app.js') ?>?v=<?= @filemtime(FCPATH . 'assets/js/app.js') ?: time() ?>"></script>
</body>
</html>
