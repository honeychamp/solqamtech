<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?= view('partials/page_hero', [
    'site'     => $site,
    'compact'  => true,
    'kicker'   => t('legal.kicker'),
    'heading'  => t('legal.termsH'),
    'lede'     => t('legal.termsLede'),
    'video'    => '',
    'crumbs'   => [
        ['label' => t('crumb.home'), 'href' => base_url('/')],
        ['label' => t('nav.terms')],
    ],
    'actions'  => [
        ['label' => t('common.contactUs'), 'href' => base_url('contact'), 'class' => 'btn btn-primary'],
        ['label' => t('legal.privacyH'), 'href' => base_url('privacy-policy'), 'class' => 'btn btn-ghost'],
    ],
]) ?>
<section class="section">
    <div class="container article">
        <p><?= esc(t('legal.termsIntro')) ?></p>

        <h2><?= esc(t('legal.webH')) ?></h2>
        <p><?= esc(t('legal.web1')) ?></p>
        <p><?= esc(t('legal.web2')) ?></p>

        <h2><?= esc(t('legal.contractH')) ?></h2>
        <p><?= esc(t('legal.contractP')) ?></p>

        <h2><?= esc(t('legal.outcomesH')) ?></h2>
        <p><?= esc(t('legal.outcomesP')) ?></p>

        <h2><?= esc(t('legal.assetsH')) ?></h2>
        <p><?= esc(t('legal.assets1')) ?></p>
        <p><?= t_link('legal.assets2', base_url('privacy-policy')) ?></p>

        <h2><?= esc(t('legal.acceptH')) ?></h2>
        <p><?= esc(t('legal.acceptP')) ?></p>

        <h2><?= esc(t('legal.ipH')) ?></h2>
        <p><?= esc(t('legal.ipP')) ?></p>

        <h2><?= esc(t('legal.thirdH')) ?></h2>
        <p><?= esc(t('legal.thirdP')) ?></p>

        <h2><?= esc(t('legal.limitH')) ?></h2>
        <p><?= esc(t('legal.limitP')) ?></p>

        <h2><?= esc(t('legal.lawH')) ?></h2>
        <p><?= esc(t('legal.lawP', ['email' => $site->email, 'phone' => $site->phone])) ?></p>

        <p><?= esc(t('legal.related')) ?> <a href="<?= base_url('privacy-policy') ?>"><?= esc(t('legal.privacyH')) ?></a> · <a href="<?= base_url('contact') ?>"><?= esc(t('legal.contactBrand')) ?></a></p>
    </div>
</section>

<?= view('partials/page_cta', [
    'ctaTitle' => t('legal.termsCtaH'),
    'ctaText'  => t('legal.termsCtaT'),
    'ctaGhostHref' => base_url('privacy-policy'),
    'ctaGhostLabel' => t('legal.privacyH'),
]) ?>

<?= $this->endSection() ?>
