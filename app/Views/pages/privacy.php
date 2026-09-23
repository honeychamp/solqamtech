<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'     => $site,
    'compact'  => true,
    'kicker'   => t('legal.kicker'),
    'heading'  => t('legal.privacyH'),
    'lede'     => t('legal.privacyLede'),
    'video'    => '',
    'crumbs'   => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.privacy')],
    ],
    'actions'  => [
        ['label' => t('common.contactUs'), 'href' => base_url('contact'), 'class' => 'btn btn-primary'],
        ['label' => t('common.terms'), 'href' => base_url('terms'), 'class' => 'btn btn-ghost'],
    ],
]) ?>
<section class="section">
    <div class="container article">
        <p><?= esc(t('legal.privacyIntro')) ?></p>

        <h2><?= esc(t('legal.whoH')) ?></h2>
        <p><?= esc(t('legal.whoP', ['email' => $site->email, 'phone' => $site->phone])) ?></p>

        <h2><?= esc(t('legal.collectH')) ?></h2>
        <p><?= esc(t('legal.collect1')) ?></p>
        <p><?= esc(t('legal.collect2')) ?></p>
        <p><?= esc(t('legal.collect3')) ?></p>

        <h2><?= esc(t('legal.useH')) ?></h2>
        <p><?= esc(t('legal.use1')) ?></p>
        <p><?= esc(t('legal.use2')) ?></p>

        <h2><?= esc(t('legal.storeH')) ?></h2>
        <p><?= esc(t('legal.storeP', ['email' => $site->email])) ?></p>

        <h2><?= esc(t('legal.cookiesH')) ?></h2>
        <p><?= esc(t('legal.cookies1')) ?></p>
        <p><?= esc(t('legal.cookies2')) ?></p>

        <h2><?= esc(t('legal.keepH')) ?></h2>
        <p><?= esc(t('legal.keepP')) ?></p>

        <h2><?= esc(t('legal.reqH')) ?></h2>
        <p><?= esc(t('legal.reqP', ['email' => $site->email])) ?></p>

        <h2><?= esc(t('legal.childH')) ?></h2>
        <p><?= esc(t('legal.childP')) ?></p>

        <h2><?= esc(t('legal.changeH')) ?></h2>
        <p><?= esc(t('legal.changeP')) ?></p>

        <p><?= esc(t('legal.related')) ?> <a href="<?= base_url('terms') ?>"><?= esc(t('common.terms')) ?></a> · <a href="<?= base_url('contact') ?>"><?= esc(t('legal.contactBrand')) ?></a></p>
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('legal.privacyCtaH'),
    'ctaText'  => t('legal.privacyCtaT', ['email' => $site->email]),
    'ctaLabel' => t('legal.contactBrand'),
    'ctaGhostHref' => base_url('terms'),
    'ctaGhostLabel' => t('common.terms'),
]) ?>

<?= $this->endSection() ?>
