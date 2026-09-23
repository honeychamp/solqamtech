<section class="news-band">
    <div class="container news-band-inner">
        <div>
            <h2 class="section-title"><?= esc(t('footer.subscribe')) ?></h2>
            <p><?= esc(t('footer.newsLede')) ?></p>
            <?php if (session('success')): ?>
                <div class="alert alert-ok"><?= esc(session('success')) ?></div>
            <?php endif; ?>
            <?php if (session('errors')): ?>
                <div class="alert alert-err"><?= esc(implode(' ', (array) session('errors'))) ?></div>
            <?php endif; ?>
        </div>
        <form class="news-form" method="post" action="<?= base_url('contact/newsletter') ?>">
            <?= csrf_field() ?>
            <input class="hp" type="text" name="website_url" tabindex="-1" autocomplete="off">
            <label class="sr-only" for="news-email"><?= esc(t('footer.newsEmail')) ?></label>
            <input id="news-email" type="email" name="email" required placeholder="<?= esc(t('footer.newsEmail')) ?>">
            <label class="consent news-consent">
                <input type="checkbox" name="consent" value="1" required>
                <?= esc(t('footer.newsOk')) ?>
            </label>
            <button class="btn btn-primary" type="submit">
                <?= esc(t('footer.subscribeBtn')) ?>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17 17 7"/><path d="M8 7h9v9"/></svg>
            </button>
        </form>
    </div>
    <a class="to-top" href="#content" aria-label="<?= esc(t('footer.toTop')) ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
            <path d="M12 19V5"/>
            <path d="m6 11 6-6 6 6"/>
        </svg>
    </a>
</section>

<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-about">
            <a class="footer-brand" href="<?= base_url('/') ?>">
                <img src="<?= logo_url() ?>" alt="<?= esc(t('nav.logoAlt')) ?>">
            </a>
            <p><?= esc(t('footer.about')) ?></p>
            <div class="socials">
                <?php foreach ($site->social as $network => $url): ?>
                    <?php if (! is_string($url) || $url === '') continue; ?>
                    <?php $live = $url !== '#'; ?>
                    <a href="<?= esc($url) ?>" aria-label="<?= esc(t('social.' . $network, [], ucfirst((string) $network))) ?>"<?= $live ? ' target="_blank" rel="noopener"' : '' ?>>
                        <?php if ($network === 'facebook'): ?>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 8h3V4h-3c-2.8 0-5 2.2-5 5v2H7v4h2v7h4v-7h3l1-4h-4V9c0-.6.4-1 1-1z"/></svg>
                        <?php elseif ($network === 'linkedin'): ?>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.5 9H3.7v11h2.8V9zM5.1 4.8A1.6 1.6 0 1 0 5.1 8a1.6 1.6 0 0 0 0-3.2zM20.3 13.4c0-3.2-1.7-4.7-4-4.7-1.8 0-2.6 1-3.1 1.7V9H10.4c0 1.6 0 11 0 11h2.8v-6.1c0-.3 0-.7.1-1 .3-.7.9-1.4 2-1.4 1.4 0 2 1.1 2 2.6V20h2.8v-6.6z"/></svg>
                        <?php elseif ($network === 'tiktok'): ?>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14.6 3h2.7c.2 1.5.9 2.8 2 3.8 1 1 2.3 1.5 3.7 1.7v2.7c-1.6 0-3.1-.4-4.5-1.2v6.5c0 3.5-2.8 6.4-6.3 6.5A6.4 6.4 0 0 1 6 16.3a6.4 6.4 0 0 1 7.3-6.3v2.8a3.6 3.6 0 1 0 2.5 3.4V3z"/></svg>
                        <?php else: ?>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 3h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8a5 5 0 0 1 5-5zm8 2H8a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3zm-4 3.2A4.8 4.8 0 1 1 7.2 13 4.8 4.8 0 0 1 12 8.2zm0 2A2.8 2.8 0 1 0 14.8 13 2.8 2.8 0 0 0 12 10.2zM17.6 7.1a1.1 1.1 0 1 1-1.1-1.1 1.1 1.1 0 0 1 1.1 1.1z"/></svg>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <h4><?= esc(t('footer.quick')) ?></h4>
            <ul>
                <li><a href="<?= base_url('/') ?>"><?= esc(t('nav.home')) ?></a></li>
                <li><a href="<?= base_url('about') ?>"><?= esc(t('nav.about')) ?></a></li>
                <li><a href="<?= base_url('services') ?>"><?= esc(t('nav.services')) ?></a></li>
                <li><a href="<?= base_url('contact') ?>"><?= esc(t('nav.contact')) ?></a></li>
            </ul>
        </div>
        <div>
            <h4><?= esc(t('footer.explore')) ?></h4>
            <ul>
                <li><a href="<?= base_url('insights') ?>"><?= esc(t('nav.insights')) ?></a></li>
                <li><a href="<?= base_url('portfolio') ?>"><?= esc(t('nav.portfolio')) ?></a></li>
                <li><a href="<?= base_url('process') ?>"><?= esc(t('nav.process')) ?></a></li>
                <li><a href="<?= base_url('faqs') ?>"><?= esc(t('nav.faqs')) ?></a></li>
                <li><a href="<?= base_url('amazon-services') ?>"><?= esc(t('nav.amazon')) ?></a></li>
                <li><a href="<?= base_url('privacy-policy') ?>"><?= esc(t('nav.privacy')) ?></a></li>
                <li><a href="<?= base_url('terms') ?>"><?= esc(t('nav.terms')) ?></a></li>
            </ul>
        </div>
        <div>
            <h4><?= esc(t('footer.info')) ?></h4>
            <ul class="footer-contact">
                <li>
                    <a href="<?= esc($site->telHref()) ?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6.5 4.5h3l1.2 3.2-1.8 1.2a12 12 0 0 0 6.2 6.2l1.2-1.8 3.2 1.2v3A2 2 0 0 1 17.5 19 15 15 0 0 1 5 6.5a2 2 0 0 1 1.5-2Z"/></svg>
                        <?= esc($site->phone) ?>
                    </a>
                </li>
                <li>
                    <a href="mailto:<?= esc($site->email) ?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="m4 7 8 6 8-6"/></svg>
                        <?= esc($site->email) ?>
                    </a>
                </li>
                <li>
                    <a href="<?= esc($site->mapsLink()) ?>" target="_blank" rel="noopener">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.4"/></svg>
                        <?= esc($site->address) ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container legal">
        <span><?= esc(t('footer.copy', ['year' => date('Y')])) ?></span>
        <span><?= esc(t('footer.disclaimer')) ?></span>
    </div>
</footer>
