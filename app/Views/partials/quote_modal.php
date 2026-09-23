<div class="modal" id="quote-modal" role="dialog" aria-modal="true" aria-labelledby="quote-title">
    <div class="modal-card">
        <button class="modal-close" type="button" data-close-modal aria-label="<?= esc(t('form.close')) ?>">×</button>
        <p class="kicker"><?= esc(t('quote.kicker')) ?></p>
        <h2 id="quote-title" class="section-title"><?= esc(t('quote.title')) ?></h2>
        <p class="lede"><?= esc(t('quote.lede')) ?></p>
        <div style="margin-top:24px">
            <?= $this->include('partials/forms/contact', ['idPrefix' => 'modal_']) ?>
        </div>
    </div>
</div>
