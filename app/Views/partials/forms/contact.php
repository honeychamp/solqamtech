<?php
$errors = session('errors') ?? [];
$pfx = $idPrefix ?? '';
?>
<?php if (session('success')): ?>
    <div class="alert alert-ok"><?= esc(session('success')) ?></div>
<?php endif; ?>
<?php if ($errors): ?>
    <div class="alert alert-err"><?= esc(implode(' ', $errors)) ?></div>
<?php endif; ?>

<form class="form" method="post" action="<?= base_url('contact/submit') ?>">
    <?= csrf_field() ?>
    <input class="hp" type="text" name="website_url" tabindex="-1" autocomplete="off">
    <div class="form-row">
        <div>
            <label for="<?= $pfx ?>name"><?= esc(t('form.name')) ?></label>
            <input id="<?= $pfx ?>name" name="name" required value="<?= esc(old('name')) ?>">
        </div>
        <div>
            <label for="<?= $pfx ?>email"><?= esc(t('form.email')) ?></label>
            <input id="<?= $pfx ?>email" type="email" name="email" required value="<?= esc(old('email')) ?>">
        </div>
    </div>
    <div class="form-row">
        <div>
            <label for="<?= $pfx ?>phone"><?= esc(t('form.phone')) ?></label>
            <input id="<?= $pfx ?>phone" name="phone" required value="<?= esc(old('phone')) ?>">
        </div>
        <div>
            <label for="<?= $pfx ?>company"><?= esc(t('form.company')) ?></label>
            <input id="<?= $pfx ?>company" name="company" value="<?= esc(old('company')) ?>">
        </div>
    </div>
    <div class="form-row">
        <div>
            <label for="<?= $pfx ?>service"><?= esc(t('form.service')) ?></label>
            <select id="<?= $pfx ?>service" name="service" required>
                <option value=""><?= esc(t('form.selectService')) ?></option>
                <?php foreach ($site->serviceOptions as $option): ?>
                    <option value="<?= esc($option) ?>" <?= old('service') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="<?= $pfx ?>budget"><?= esc(t('form.budget')) ?></label>
            <select id="<?= $pfx ?>budget" name="budget">
                <?php foreach ($site->budgetOptions as $option): ?>
                    <option value="<?= esc($option) ?>" <?= old('budget') === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div>
        <label for="<?= $pfx ?>details"><?= esc(t('form.details')) ?></label>
        <textarea id="<?= $pfx ?>details" name="details" required placeholder="<?= esc(t('form.detailsPh')) ?>"><?= esc(old('details')) ?></textarea>
    </div>
    <label class="consent">
        <input type="checkbox" name="consent" value="1" required>
        <?= t_link('form.consent', base_url('privacy-policy')) ?>
    </label>
    <button class="btn btn-primary" type="submit"><?= esc(t('form.submit')) ?></button>
</form>
