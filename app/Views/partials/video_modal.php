<div class="video-modal" id="video-modal">
    <div class="video-modal-dialog reel-cinema" role="dialog" aria-modal="true" aria-labelledby="video-modal-title">
        <div class="video-modal-bar">
            <div>
                <small><?= esc(t('reel.heading')) ?></small>
                <strong id="video-modal-title"><?= esc(t('reel.kicker')) ?></strong>
            </div>
            <button type="button" class="video-modal-close" data-close-video aria-label="<?= esc(t('form.closeVideo')) ?>">×</button>
        </div>
        <div class="reel-cinema-frame">
            <video id="video-modal-player" playsinline></video>
            <div class="reel-grade" aria-hidden="true"></div>
            <div class="reel-vignette" aria-hidden="true"></div>
            <div class="reel-open" id="cinema-open">
                <span class="reel-open-kicker"><?= esc(t('reel.openKicker')) ?></span>
                <b>ST</b>
                <strong><?= esc(t('reel.kicker')) ?></strong>
                <i class="reel-open-rule" aria-hidden="true"></i>
                <small><?= esc(t('reel.openSmall')) ?></small>
            </div>
            <div class="reel-end" id="cinema-end">
                <span class="reel-open-kicker">SolqamTech</span>
                <strong><?= esc(t('reel.endTitle')) ?></strong>
                <i class="reel-open-rule" aria-hidden="true"></i>
                <small>+92 309 7896666 · info@solqamtech.com</small>
            </div>
            <div class="reel-hud cinema-hud">
                <span class="reel-brand">SOLQAMTECH</span>
                <span class="reel-clock" id="cinema-clock">01:00:00:00</span>
            </div>
            <div class="reel-third cinema-third" id="cinema-third">
                <span class="reel-third-bar" aria-hidden="true"></span>
                <div class="reel-third-copy">
                    <small class="reel-chap" id="cinema-chap">01</small>
                    <strong class="reel-title" id="cinema-clip-title">Showreel</strong>
                    <span class="reel-cap" id="cinema-clip-cap"></span>
                </div>
            </div>
        </div>
        <div class="cinema-chapters" id="cinema-chapters" hidden></div>
    </div>
</div>
