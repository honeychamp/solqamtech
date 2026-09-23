<?php
$heading = $heading ?? t('reel.heading');
$kicker  = $kicker ?? t('reel.kicker');
$lede    = $lede ?? t('reel.lede');
$clips   = array_values($site->videos);
$playlist = [];
foreach ($clips as $i => $clip) {
    $dur = (float) ($clip['dur'] ?? 7.5);
    $playlist[] = [
        'src'     => video_url($clip['file']),
        'title'   => $clip['title'],
        'caption' => $clip['caption'],
        'tag'     => $clip['tag'] ?? '',
        'id'      => $clip['id'],
        'in'      => (float) ($clip['in'] ?? 0),
        'dur'     => $dur,
        'label'   => sprintf('00:%02d', max(1, (int) round($dur))),
        'n'       => str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT),
    ];
}
$first = $playlist[0] ?? null;
$total = str_pad((string) count($playlist), 2, '0', STR_PAD_LEFT);
?>
<section class="section videos-band">
    <div class="videos-aura" aria-hidden="true"></div>
    <div class="container">
        <div class="videos-head">
            <div>
                <p class="kicker"><?= esc($kicker) ?></p>
                <h2 class="section-title"><?= esc($heading) ?></h2>
                <p class="lede"><?= esc($lede) ?></p>
            </div>
            <div class="videos-live">
                <span class="rec-dot" aria-hidden="true"></span>
                <div>
                    <strong><?= esc(t('reel.studio')) ?></strong>
                    <small><?= esc($total) ?> <?= esc(t('reel.chapters')) ?></small>
                </div>
            </div>
        </div>

        <div class="reel" data-reel>
            <script type="application/json" class="reel-data" aria-hidden="true"><?= json_encode($playlist, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

            <div class="reel-chassis">
                <span class="reel-mark tl" aria-hidden="true"></span>
                <span class="reel-mark tr" aria-hidden="true"></span>
                <span class="reel-mark bl" aria-hidden="true"></span>
                <span class="reel-mark br" aria-hidden="true"></span>

                <div class="reel-bezel">
                    <div class="reel-frame">
                        <div class="reel-stack">
                            <video class="reel-player is-front" muted playsinline preload="none"></video>
                            <video class="reel-player is-back" muted playsinline preload="none"></video>
                        </div>
                        <div class="reel-grade" aria-hidden="true"></div>
                        <div class="reel-vignette" aria-hidden="true"></div>
                        <div class="reel-scan" aria-hidden="true"></div>
                        <div class="reel-noise" aria-hidden="true"></div>

                        <div class="reel-open" data-reel-open>
                            <span class="reel-open-kicker"><?= esc(t('reel.openKicker')) ?></span>
                            <b>ST</b>
                            <strong><?= esc(t('reel.kicker')) ?></strong>
                            <i class="reel-open-rule" aria-hidden="true"></i>
                            <small><?= esc(t('reel.openSmall')) ?></small>
                        </div>

                        <div class="reel-end" data-reel-end>
                            <span class="reel-open-kicker">SolqamTech</span>
                            <strong><?= esc(t('reel.endTitle')) ?></strong>
                            <i class="reel-open-rule" aria-hidden="true"></i>
                            <small><?= esc($site->phone) ?> · <?= esc($site->email) ?></small>
                        </div>

                        <div class="reel-hud">
                            <span class="reel-rec"><i></i> REC</span>
                            <span class="reel-brand">SOLQAMTECH</span>
                            <span class="reel-clock">01:00:00:00</span>
                        </div>
                        <div class="reel-third">
                            <span class="reel-third-bar" aria-hidden="true"></span>
                            <div class="reel-third-copy">
                                <small class="reel-chap"><?= esc($first['n'] ?? '01') ?> / <?= esc($total) ?> · <?= esc($first['tag'] ?? '') ?></small>
                                <strong class="reel-title"><?= esc($first['title'] ?? 'Showreel') ?></strong>
                                <span class="reel-cap"><?= esc($first['caption'] ?? '') ?></span>
                            </div>
                        </div>
                        <button type="button" class="reel-toggle" aria-label="<?= esc(t('reel.playPause')) ?>">
                            <span class="play-btn" aria-hidden="true">
                                <svg class="icon-play" viewBox="0 0 24 24"><path d="M8 5.5v13l11-6.5L8 5.5z"/></svg>
                                <svg class="icon-pause" viewBox="0 0 24 24"><rect x="7" y="6" width="4" height="12" rx="1"/><rect x="13" y="6" width="4" height="12" rx="1"/></svg>
                            </span>
                        </button>
                    </div>

                    <div class="reel-console">
                        <button type="button" class="reel-skip" data-reel-prev aria-label="<?= esc(t('reel.prev')) ?>">‹</button>
                        <div class="reel-timeline" data-reel-timeline>
                            <?php foreach ($playlist as $i => $clip): ?>
                                <button type="button" class="reel-seg<?= $i === 0 ? ' is-on' : '' ?>" data-reel-seg="<?= $i ?>" aria-label="<?= esc($clip['title']) ?>">
                                    <i></i>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="reel-skip" data-reel-next aria-label="<?= esc(t('reel.next')) ?>">›</button>
                    </div>
                </div>
            </div>

            <div class="reel-chapters">
                <?php foreach ($playlist as $i => $clip): ?>
                    <button type="button" class="reel-thumb<?= $i === 0 ? ' is-on' : '' ?>" data-reel-index="<?= $i ?>">
                        <span class="reel-thumb-media">
                            <video muted playsinline preload="none" data-src="<?= esc($clip['src']) ?>"></video>
                            <em><?= esc($clip['n']) ?></em>
                            <span class="reel-thumb-time"><?= esc($clip['label']) ?></span>
                        </span>
                        <span class="reel-thumb-meta">
                            <small><?= esc($clip['tag']) ?></small>
                            <strong><?= esc($clip['title']) ?></strong>
                            <span><?= esc($clip['caption']) ?></span>
                        </span>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="reel-toolbar">
                <p class="reel-now"><?= esc($first['caption'] ?? '') ?></p>
                <div class="hero-actions">
                    <button type="button" class="btn btn-primary" data-reel-sound><?= esc(t('reel.sound')) ?></button>
                    <button type="button" class="btn btn-ghost" data-reel-all><?= esc(t('reel.playAll')) ?></button>
                </div>
            </div>
        </div>
    </div>
</section>
