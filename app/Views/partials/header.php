<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="<?= base_url('/') ?>">
            <img class="brand-full" src="<?= logo_url() ?>" alt="<?= esc(t('nav.logoAlt')) ?>">
        </a>

        <nav class="nav" aria-label="<?= esc(t('common.primary')) ?>">
            <a class="<?= nav_active('') ?>" href="<?= base_url('/') ?>"><?= esc(t('nav.home')) ?></a>
            <a class="<?= nav_active('about') ?>" href="<?= base_url('about') ?>"><?= esc(t('nav.about')) ?></a>
            <div class="nav-drop">
                <span><?= esc(t('nav.services')) ?> <i class="nav-caret" aria-hidden="true"></i></span>
                <ul>
                    <li><a class="<?= nav_active('services') ?>" href="<?= base_url('services') ?>"><?= esc(t('nav.allServices')) ?></a></li>
                    <?php foreach ($site->services as $item): ?>
                        <li><a href="<?= base_url('services/' . $item['slug']) ?>"><?= esc($item['nav']) ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?= base_url('amazon-services') ?>"><?= esc(t('nav.amazon')) ?></a></li>
                </ul>
            </div>
            <a class="<?= nav_active('insights') ?>" href="<?= base_url('insights') ?>"><?= esc(t('nav.insights')) ?></a>
            <a class="<?= nav_active('portfolio') ?>" href="<?= base_url('portfolio') ?>"><?= esc(t('nav.portfolio')) ?></a>
            <a class="<?= nav_active('contact') ?>" href="<?= base_url('contact') ?>"><?= esc(t('nav.contact')) ?></a>
        </nav>

        <div class="header-cta">
            <a class="btn btn-primary btn-quote is-mobile" href="<?= base_url('contact') ?>" data-open-quote>
                <?= esc(t('nav.quote')) ?>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7"/><path d="M8 7h9v9"/></svg>
            </a>
            <button class="menu-btn" type="button" aria-label="<?= esc(t('nav.menu')) ?>" aria-expanded="false"><span></span></button>
        </div>
    </div>
</header>
