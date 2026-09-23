<?php $errors = session('errors') ?? []; ?>
<?php if (session('success')): ?>
    <div class="alert alert-ok"><?= esc(session('success')) ?></div>
<?php endif; ?>
<?php if ($errors): ?>
    <div class="alert alert-err"><?= esc(implode(' ', $errors)) ?></div>
<?php endif; ?>

<form class="form" method="post" action="<?= base_url('contact/amazon') ?>">
    <?= csrf_field() ?>
    <input class="hp" type="text" name="website_url" tabindex="-1" autocomplete="off">
    <div class="form-row">
        <div>
            <label for="aname"><?= esc(t('form.name')) ?></label>
            <input id="aname" name="name" required value="<?= esc(old('name')) ?>">
        </div>
        <div>
            <label for="aemail"><?= esc(t('form.email')) ?></label>
            <input id="aemail" type="email" name="email" required value="<?= esc(old('email')) ?>">
        </div>
    </div>
    <div class="form-row">
        <div>
            <label for="aphone"><?= esc(t('form.phone')) ?></label>
            <input id="aphone" name="phone" required value="<?= esc(old('phone')) ?>">
        </div>
        <div>
            <label for="acompany"><?= esc(t('form.companyBrand')) ?></label>
            <input id="acompany" name="company" value="<?= esc(old('company')) ?>">
        </div>
    </div>
    <div class="form-row">
        <div>
            <label for="marketplace"><?= esc(t('form.marketplace')) ?></label>
            <select id="marketplace" name="marketplace" required>
                <option value=""><?= esc(t('form.selectMarket')) ?></option>
                <?php foreach ($site->amazonMarketplaces as $option): ?>
                    <option value="<?= esc($option) ?>" <?= old('marketplace') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="category"><?= esc(t('form.category')) ?></label>
            <input id="category" name="category" required value="<?= esc(old('category')) ?>" placeholder="<?= esc(t('form.categoryPh')) ?>">
        </div>
    </div>
    <div class="form-row">
        <div>
            <label for="stage"><?= esc(t('form.stage')) ?></label>
            <select id="stage" name="stage" required>
                <option value=""><?= esc(t('form.selectStage')) ?></option>
                <?php foreach ($site->amazonStages as $option): ?>
                    <option value="<?= esc($option) ?>" <?= old('stage') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="support"><?= esc(t('form.support')) ?></label>
            <select id="support" name="support" required>
                <option value=""><?= esc(t('form.selectSupport')) ?></option>
                <?php foreach ($site->amazonSupport as $option): ?>
                    <option value="<?= esc($option) ?>" <?= old('support') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div>
        <label for="adetails"><?= esc(t('form.improve')) ?></label>
        <textarea id="adetails" name="details" required><?= esc(old('details')) ?></textarea>
    </div>
    <label class="consent">
        <input type="checkbox" name="consent" value="1" required>
        <?= esc(t('form.amazonConsent')) ?>
    </label>
    <button class="btn btn-primary" type="submit"><?= esc(t('form.amazonSubmit')) ?></button>
</form>
