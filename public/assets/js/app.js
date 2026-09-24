(() => {
  const header = document.querySelector(".site-header");
  const menuBtn = document.querySelector(".menu-btn");
  const nav = document.querySelector(".nav");
  const progress = document.querySelector(".scroll-progress");
  const glow = document.querySelector(".pointer-glow");
  const modal = document.getElementById("quote-modal");
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const finePointer = window.matchMedia("(hover: hover) and (pointer: fine)").matches;

  const onScroll = () => {
    const y = window.scrollY;
    const max = document.documentElement.scrollHeight - window.innerHeight;
    header?.classList.toggle("is-scrolled", y > 8);
    if (progress) {
      progress.style.width = `${max > 0 ? Math.min(100, (y / max) * 100) : 0}%`;
    }
  };
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  document.querySelectorAll("form.form, form.news-form").forEach((form) => {
    form.addEventListener("submit", () => {
      const btn = form.querySelector("[type=submit]");
      if (!btn || btn.disabled) return;
      btn.disabled = true;
      btn.setAttribute("aria-busy", "true");
    });
  });

  document.querySelector(".to-top")?.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: reduceMotion ? "auto" : "smooth" });
  });

  menuBtn?.addEventListener("click", () => {
    const open = nav?.classList.toggle("is-open");
    menuBtn.setAttribute("aria-expanded", open ? "true" : "false");
    header?.classList.remove("is-hidden");
  });

  const openModal = () => {
    modal?.classList.add("is-open");
    document.body.style.overflow = "hidden";
  };
  const closeModal = () => {
    modal?.classList.remove("is-open");
    document.body.style.overflow = "";
  };

  document.querySelectorAll("[data-open-quote]").forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      openModal();
    });
  });
  document.querySelectorAll("[data-close-modal]").forEach((el) => {
    el.addEventListener("click", closeModal);
  });
  modal?.addEventListener("click", (e) => {
    if (e.target.id === "quote-modal") closeModal();
  });
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeModal();
      closeVideo();
    }
  });

  document.querySelectorAll(".faq-item button").forEach((btn) => {
    btn.addEventListener("click", () => {
      const item = btn.parentElement;
      const open = item.classList.contains("is-open");
      item.parentElement.querySelectorAll(".faq-item").forEach((n) => n.classList.remove("is-open"));
      if (!open) item.classList.add("is-open");
    });
  });

  const animateCount = (el) => {
    const end = Number(el.getAttribute("data-count") || "0");
    if (!end) return;
    if (reduceMotion) {
      el.textContent = String(end);
      return;
    }
    const start = performance.now();
    const dur = 1100;
    const tick = (now) => {
      const t = Math.min(1, (now - start) / dur);
      const eased = 1 - Math.pow(1 - t, 3);
      el.textContent = String(Math.round(end * eased));
      if (t < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  if ("IntersectionObserver" in window) {
    const countIo = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        animateCount(entry.target);
        countIo.unobserve(entry.target);
      });
    }, { threshold: 0.4 });
    document.querySelectorAll("[data-count]").forEach((el) => countIo.observe(el));

    const ringIo = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const ring = entry.target;
        ring.style.setProperty("--p", ring.getAttribute("data-ring") || "0");
        ring.classList.add("is-on");
        ringIo.unobserve(ring);
      });
    }, { threshold: 0.4 });
    document.querySelectorAll("[data-ring]").forEach((el) => ringIo.observe(el));

    const revealEls = document.querySelectorAll(".section, .cta-box, .card, .process-step, .contact-card, .map-stage, .cta-band, .news-band, .why-points article");
    const revealIo = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("is-in");
        revealIo.unobserve(entry.target);
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
    revealEls.forEach((el) => {
      const siblings = [...(el.parentElement?.children || [])].filter((n) => n.classList.contains(el.classList[0]) || n.matches(".card, .process-step, .contact-card"));
      const i = Math.max(0, siblings.indexOf(el));
      el.classList.add("js-reveal");
      el.style.transitionDelay = `${Math.min(i, 6) * 70}ms`;
      revealIo.observe(el);
    });
  } else {
    document.querySelectorAll("[data-count]").forEach(animateCount);
    document.querySelectorAll("[data-ring]").forEach((el) => {
      el.style.setProperty("--p", el.getAttribute("data-ring") || "0");
      el.classList.add("is-on");
    });
  }

  if (!reduceMotion && finePointer && glow) {
    document.body.classList.add("is-pointer");
    const trail = glow.querySelector(".pg-trail");
    const core = glow.querySelector(".pg-core");
    const dot = glow.querySelector(".pg-dot");
    let mx = window.innerWidth / 2;
    let my = window.innerHeight / 2;
    let tx = mx;
    let ty = my;
    let cx = mx;
    let cy = my;
    let dx = mx;
    let dy = my;
    let hot = false;
    window.addEventListener("pointermove", (e) => {
      mx = e.clientX;
      my = e.clientY;
    }, { passive: true });
    document.addEventListener("pointerover", (e) => {
      hot = !!e.target.closest("a, button, .btn, input, select, textarea, .to-top, .reel-thumb, .play-btn");
      document.body.classList.toggle("is-pointer-hot", hot);
    }, true);
    const follow = () => {
      tx += (mx - tx) * 0.07;
      ty += (my - ty) * 0.07;
      cx += (mx - cx) * 0.18;
      cy += (my - cy) * 0.18;
      dx += (mx - dx) * 0.45;
      dy += (my - dy) * 0.45;
      const s = hot ? 1.22 : 1;
      if (trail) trail.style.transform = `translate3d(${tx}px, ${ty}px, 0)`;
      if (core) core.style.transform = `translate3d(${cx}px, ${cy}px, 0) scale(${s})`;
      if (dot) dot.style.transform = `translate3d(${dx}px, ${dy}px, 0) scale(${hot ? 1.45 : 1})`;
      requestAnimationFrame(follow);
    };
    requestAnimationFrame(follow);

    document.querySelectorAll(".svc-card, .quote-card, .process-step, .contact-card").forEach((card) => {
      card.addEventListener("pointermove", (e) => {
        const r = card.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - 0.5;
        const y = (e.clientY - r.top) / r.height - 0.5;
        card.style.setProperty("--mx", `${(x + 0.5) * 100}%`);
        card.style.setProperty("--my", `${(y + 0.5) * 100}%`);
        card.style.transform = `perspective(900px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg) translateY(-8px)`;
      });
      card.addEventListener("pointerleave", () => {
        card.style.transform = "";
      });
    });

    document.querySelectorAll(".btn-primary").forEach((btn) => {
      btn.addEventListener("pointermove", (e) => {
        const r = btn.getBoundingClientRect();
        const x = e.clientX - r.left - r.width / 2;
        const y = e.clientY - r.top - r.height / 2;
        btn.style.transform = `translate(${x * 0.16}px, ${y * 0.2}px)`;
      });
      btn.addEventListener("pointerleave", () => {
        btn.style.transform = "";
      });
    });
  }

  const vmodal = document.getElementById("video-modal");
  const vplayer = document.getElementById("video-modal-player");
  const vtitle = document.getElementById("video-modal-title");
  const cinemaFrame = document.querySelector(".reel-cinema-frame");
  const cinemaChap = document.getElementById("cinema-chap");
  const cinemaClipTitle = document.getElementById("cinema-clip-title");
  const cinemaClipCap = document.getElementById("cinema-clip-cap");
  const cinemaClock = document.getElementById("cinema-clock");
  const cinemaChapters = document.getElementById("cinema-chapters");
  const ambientVideos = () => document.querySelectorAll(".hero-video, .hero-panel-video, .page-hero-video");
  const hydrateVideo = (vid) => {
    if (vid.dataset.src && !vid.getAttribute("src")) {
      vid.src = vid.dataset.src;
      vid.removeAttribute("data-src");
    }
    vid.muted = true;
    vid.loop = true;
    vid.playsInline = true;
    vid.setAttribute("muted", "");
    vid.setAttribute("loop", "");
    vid.setAttribute("playsinline", "");
    vid.setAttribute("autoplay", "");
    const tryPlay = () => vid.play().catch(() => {});
    tryPlay();
    vid.addEventListener("canplay", tryPlay, { once: true });
    vid.addEventListener("loadeddata", tryPlay, { once: true });
  };
  const playAmbient = () => {
    if (reduceMotion) return;
    ambientVideos().forEach((vid) => {
      if (vid.dataset.armed === "1") return;
      if (!vid.dataset.src && !vid.getAttribute("src")) return;
      vid.dataset.armed = "1";
      if (!("IntersectionObserver" in window)) {
        hydrateVideo(vid);
        return;
      }
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) hydrateVideo(vid);
          else vid.pause();
        });
      }, { rootMargin: "40px", threshold: 0.28 });
      io.observe(vid);
    });
  };

  document.querySelectorAll("iframe[data-src]").forEach((frame) => {
    const load = () => {
      if (!frame.dataset.src) return;
      frame.src = frame.dataset.src;
      frame.removeAttribute("data-src");
    };
    if (!("IntersectionObserver" in window)) {
      load();
      return;
    }
    const io = new IntersectionObserver((entries) => {
      if (!entries.some((entry) => entry.isIntersecting)) return;
      load();
      io.disconnect();
    }, { rootMargin: "160px" });
    io.observe(frame);
  });
  const pauseAmbient = () => {
    ambientVideos().forEach((vid) => vid.pause());
  };
  const pad = (n) => String(Math.floor(n || 0)).padStart(2, "0");
  const tc = (t) => `01:${pad((t / 60) % 60)}:${pad(t % 60)}:${pad((t % 1) * 24)}`;
  const OPEN_MS = 3400;
  const END_MS = 3800;
  const clipIn = (clip) => Number(clip?.in || 0);
  const clipDur = (clip) => Number(clip?.dur || 7.5);
  const clipEnd = (clip, duration) => {
    const start = clipIn(clip);
    const end = start + clipDur(clip);
    return duration ? Math.min(end, duration - 0.05) : end;
  };
  let cinemaQueue = [];
  let cinemaIndex = 0;
  let cinemaTimer = 0;
  let cinemaPhase = "clip";
  let cinemaAdvancing = false;

  const firstPlaylist = () => {
    try {
      return JSON.parse(document.querySelector("[data-reel] .reel-data")?.textContent || "[]");
    } catch (err) {
      return [];
    }
  };

  const setCinemaPhase = (phase) => {
    cinemaPhase = phase;
    cinemaFrame?.classList.toggle("is-open-card", phase === "open");
    cinemaFrame?.classList.toggle("is-end-card", phase === "end");
    cinemaFrame?.classList.toggle("is-clip", phase === "clip");
  };

  const paintCinemaMeta = (clip) => {
    if (!clip) return;
    if (vtitle) vtitle.textContent = clip.title || "Showreel";
    if (cinemaChap) cinemaChap.textContent = `${clip.n} / ${String(cinemaQueue.length).padStart(2, "0")} · ${clip.tag}`;
    if (cinemaClipTitle) cinemaClipTitle.textContent = clip.title;
    if (cinemaClipCap) cinemaClipCap.textContent = clip.caption || "";
  };

  const paintCinemaChapters = () => {
    if (!cinemaChapters) return;
    if (!cinemaQueue.length) {
      cinemaChapters.hidden = true;
      cinemaChapters.innerHTML = "";
      return;
    }
    cinemaChapters.hidden = false;
    cinemaChapters.innerHTML = cinemaQueue.map((clip, i) => (
      `<button type="button" data-cinema-i="${i}" class="${i === cinemaIndex && cinemaPhase === "clip" ? "is-on" : ""}"><small>${clip.n} · ${clip.tag}</small>${clip.title}</button>`
    )).join("");
  };

  const clearCinemaTimer = () => {
    if (cinemaTimer) window.clearTimeout(cinemaTimer);
    cinemaTimer = 0;
  };

  const cueCinemaClip = (i) => {
    const clip = cinemaQueue[i];
    if (!clip || !vplayer) return;
    cinemaIndex = i;
    cinemaAdvancing = false;
    setCinemaPhase("clip");
    paintCinemaMeta(clip);
    paintCinemaChapters();
    const applyIn = () => {
      try { vplayer.currentTime = clipIn(clip); } catch (err) {}
      vplayer.play().catch(() => {});
    };
    if (vplayer.getAttribute("src") !== clip.src) {
      vplayer.src = clip.src;
      vplayer.addEventListener("loadeddata", applyIn, { once: true });
    } else {
      applyIn();
    }
  };

  const playCinemaEnd = () => {
    if (!vplayer) return;
    vplayer.pause();
    setCinemaPhase("end");
    if (vtitle) vtitle.textContent = "Request a briefing";
    paintCinemaChapters();
    cinemaTimer = window.setTimeout(closeVideo, END_MS);
  };

  const playCinemaOpen = () => {
    if (!vplayer) return;
    vplayer.pause();
    setCinemaPhase("open");
    if (vtitle) vtitle.textContent = "SolqamTech Showreel";
    paintCinemaChapters();
    cinemaTimer = window.setTimeout(() => cueCinemaClip(0), reduceMotion ? 400 : OPEN_MS);
  };

  const openCinema = (clips, startIndex = 0, withOpen = true) => {
    if (!vmodal || !vplayer || !clips?.length) return;
    cinemaQueue = clips;
    cinemaIndex = startIndex;
    vmodal.classList.add("is-open");
    document.body.style.overflow = "hidden";
    pauseAmbient();
    document.querySelectorAll(".reel-player").forEach((el) => el.pause());
    clearCinemaTimer();
    if (withOpen && startIndex === 0) playCinemaOpen();
    else cueCinemaClip(startIndex);
  };

  const openVideo = (src, title) => {
    if (!src) return;
    openCinema([{ src, title, caption: "", tag: "Clip", n: "01", in: 0, dur: 99 }], 0, false);
  };

  const closeVideo = () => {
    clearCinemaTimer();
    cinemaQueue = [];
    cinemaIndex = 0;
    setCinemaPhase("clip");
    vmodal?.classList.remove("is-open");
    if (vplayer) {
      vplayer.pause();
      vplayer.removeAttribute("src");
      vplayer.load();
    }
    paintCinemaChapters();
    if (!modal?.classList.contains("is-open")) {
      document.body.style.overflow = "";
    }
    playAmbient();
  };

  vplayer?.addEventListener("timeupdate", () => {
    if (!cinemaQueue.length || cinemaPhase !== "clip") return;
    const clip = cinemaQueue[cinemaIndex];
    if (!clip) return;
    const start = clipIn(clip);
    const local = Math.max(0, (vplayer.currentTime || 0) - start);
    if (cinemaClock) cinemaClock.textContent = tc(local);
    if (vplayer.currentTime >= clipEnd(clip, vplayer.duration)) {
      if (cinemaAdvancing) return;
      cinemaAdvancing = true;
      if (cinemaIndex < cinemaQueue.length - 1) cueCinemaClip(cinemaIndex + 1);
      else playCinemaEnd();
    }
  });
  vplayer?.addEventListener("ended", () => {
    if (!cinemaQueue.length || cinemaPhase !== "clip") return;
    if (cinemaIndex < cinemaQueue.length - 1) cueCinemaClip(cinemaIndex + 1);
    else playCinemaEnd();
  });

  document.querySelectorAll("[data-open-video]").forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      openVideo(el.getAttribute("data-src"), el.getAttribute("data-title"));
    });
  });
  document.querySelectorAll("[data-open-showreel]").forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      const clips = firstPlaylist();
      if (clips.length) openCinema(clips, 0, true);
    });
  });
  document.querySelectorAll("[data-close-video]").forEach((el) => {
    el.addEventListener("click", closeVideo);
  });
  vmodal?.addEventListener("click", (e) => {
    if (e.target.id === "video-modal") closeVideo();
  });
  cinemaChapters?.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-cinema-i]");
    if (!btn || !cinemaQueue.length) return;
    clearCinemaTimer();
    cueCinemaClip(Number(btn.getAttribute("data-cinema-i")));
  });

  document.querySelectorAll("[data-reel]").forEach((root) => {
    let clips = [];
    try {
      clips = JSON.parse(root.querySelector(".reel-data")?.textContent || "[]");
    } catch (err) {
      clips = [];
    }
    const clockEl = root.querySelector(".reel-clock");
    const chapEl = root.querySelector(".reel-chap");
    const titleEl = root.querySelector(".reel-title");
    const capEl = root.querySelector(".reel-cap");
    const nowEl = root.querySelector(".reel-now");
    const thumbs = [...root.querySelectorAll("[data-reel-index]")];
    const segs = [...root.querySelectorAll("[data-reel-seg]")];
    let index = 0;
    let cutting = false;
    let advancing = false;
    let phase = "open";
    let timer = 0;
    let armed = false;

    const frontEl = () => root.querySelector(".reel-player.is-front");
    const backEl = () => root.querySelector(".reel-player.is-back");

    const setPlaying = (on) => {
      root.classList.toggle("is-playing", on && phase === "clip");
      root.classList.toggle("is-paused", !on);
    };
    const setPhase = (next) => {
      phase = next;
      root.classList.toggle("is-open-card", next === "open");
      root.classList.toggle("is-end-card", next === "end");
    };
    const clearTimer = () => {
      if (timer) window.clearTimeout(timer);
      timer = 0;
    };

    const paintMeta = (clip) => {
      if (!clip) return;
      if (titleEl) titleEl.textContent = clip.title;
      if (capEl) capEl.textContent = clip.caption;
      if (nowEl) nowEl.textContent = clip.caption;
      if (chapEl) chapEl.textContent = `${clip.n} / ${String(clips.length).padStart(2, "0")} · ${clip.tag}`;
      thumbs.forEach((thumb) => {
        thumb.classList.toggle("is-on", Number(thumb.getAttribute("data-reel-index")) === index);
      });
      segs.forEach((seg, i) => {
        seg.classList.toggle("is-on", i === index);
        if (i !== index) {
          const fill = seg.querySelector("i");
          if (fill) fill.style.width = i < index ? "100%" : "0%";
        }
      });
    };

    const arm = (el) => {
      if (!el) return;
      el.muted = true;
      el.loop = false;
      el.playsInline = true;
      el.preload = "auto";
    };

    const seekIn = (el, clip) => {
      if (!el || !clip) return;
      const run = () => {
        try { el.currentTime = clipIn(clip); } catch (err) {}
      };
      if (el.readyState >= 1) run();
      else el.addEventListener("loadedmetadata", run, { once: true });
    };

    const playEnd = () => {
      const el = frontEl();
      el?.pause();
      setPhase("end");
      setPlaying(false);
      segs.forEach((seg) => {
        const fill = seg.querySelector("i");
        if (fill) fill.style.width = "100%";
      });
      timer = window.setTimeout(() => playOpen(true), reduceMotion ? 600 : END_MS);
    };

    const cutTo = (i, autoplay = true) => {
      if (!clips[i] || cutting) return;
      advancing = false;
      clearTimer();
      setPhase("clip");
      const from = frontEl();
      const to = backEl();
      const clip = clips[i];
      const same = i === index && from?.getAttribute("src") === clip.src;
      index = i;
      paintMeta(clip);
      const start = (el) => {
        seekIn(el, clip);
        if (autoplay) el.play().catch(() => setPlaying(false));
        else setPlaying(false);
      };
      if (same) {
        start(from);
        return;
      }
      if (!to || reduceMotion) {
        if (from) {
          from.src = clip.src;
          arm(from);
          start(from);
        }
        return;
      }
      cutting = true;
      root.classList.add("is-cutting");
      to.src = clip.src;
      arm(to);
      try { to.load(); } catch (err) {}
      const finish = () => {
        if (!cutting) return;
        seekIn(to, clip);
        to.classList.add("is-front");
        to.classList.remove("is-back");
        from.classList.add("is-back");
        from.classList.remove("is-front");
        releasePlayer(from);
        root.classList.remove("is-cutting");
        cutting = false;
        if (autoplay) to.play().catch(() => setPlaying(false));
        else setPlaying(false);
      };
      const run = () => window.setTimeout(finish, 220);
      if (to.readyState >= 2) run();
      else {
        to.addEventListener("loadeddata", run, { once: true });
        to.addEventListener("error", () => {
          cutting = false;
          root.classList.remove("is-cutting");
          if (from) {
            from.src = clip.src;
            arm(from);
            start(from);
          }
        }, { once: true });
        window.setTimeout(() => {
          if (cutting) run();
        }, 1800);
      }
    };

    const playOpen = (autoplay = true) => {
      clearTimer();
      const el = frontEl();
      el?.pause();
      index = 0;
      paintMeta(clips[0]);
      segs.forEach((seg) => {
        const fill = seg.querySelector("i");
        if (fill) fill.style.width = "0%";
      });
      setPhase("open");
      setPlaying(false);
      if (!autoplay) return;
      timer = window.setTimeout(() => cutTo(0, true), reduceMotion ? 200 : 420);
    };

    const releasePlayer = (el) => {
      if (!el) return;
      el.pause();
      el.removeAttribute("src");
      el.removeAttribute("poster");
      try { el.load(); } catch (err) {}
    };

    const primeMain = () => {
      const el = frontEl();
      const clip = clips[0];
      if (!el || !clip) return;
      if (!el.getAttribute("src")) {
        el.src = clip.src;
        arm(el);
      }
      seekIn(el, clip);
    };

    thumbs.forEach((thumb) => {
      thumb.addEventListener("click", () => {
        cutTo(Number(thumb.getAttribute("data-reel-index")), true);
      });
    });

    segs.forEach((seg) => {
      seg.addEventListener("click", () => {
        cutTo(Number(seg.getAttribute("data-reel-seg")), true);
      });
    });

    root.querySelector(".reel-toggle")?.addEventListener("click", () => {
      if (phase === "open") {
        cutTo(index, true);
        return;
      }
      if (phase === "end") {
        playOpen(true);
        return;
      }
      const el = frontEl();
      if (!el) return;
      if (el.paused) el.play().catch(() => {});
      else el.pause();
    });
    root.querySelector("[data-reel-prev]")?.addEventListener("click", () => {
      cutTo((index - 1 + clips.length) % clips.length, true);
    });
    root.querySelector("[data-reel-next]")?.addEventListener("click", () => {
      cutTo((index + 1) % clips.length, true);
    });
    root.querySelector("[data-reel-sound]")?.addEventListener("click", () => {
      if (clips.length) openCinema(clips, index, false);
    });
    root.querySelector("[data-reel-all]")?.addEventListener("click", () => {
      if (clips.length) openCinema(clips, 0, true);
    });

    root.querySelectorAll(".reel-player").forEach((el) => {
      el.addEventListener("play", () => {
        if (el.classList.contains("is-front") && phase === "clip") setPlaying(true);
      });
      el.addEventListener("pause", () => {
        if (el.classList.contains("is-front") && phase === "clip") setPlaying(false);
      });
      el.addEventListener("timeupdate", () => {
        if (!el.classList.contains("is-front") || phase !== "clip") return;
        const clip = clips[index];
        if (!clip) return;
        const start = clipIn(clip);
        const span = Math.max(0.1, clipEnd(clip, el.duration) - start);
        const local = Math.max(0, el.currentTime - start);
        const fill = segs[index]?.querySelector("i");
        if (fill) fill.style.width = `${Math.min(100, (local / span) * 100)}%`;
        if (clockEl) clockEl.textContent = tc(local);
        if (el.currentTime >= clipEnd(clip, el.duration) && !cutting) {
          if (advancing) return;
          advancing = true;
          if (index < clips.length - 1) cutTo(index + 1, true);
          else playEnd();
        }
      });
      el.addEventListener("ended", () => {
        if (!el.classList.contains("is-front") || cutting || phase !== "clip") return;
        if (index < clips.length - 1) cutTo(index + 1, true);
        else playEnd();
      });
    });

    arm(frontEl());
    paintMeta(clips[0]);
    setPhase("open");
    root.classList.add("is-paused");

    const armReel = () => {
      if (armed) return;
      armed = true;
      primeMain();
      cutTo(0, true);
    };

    if ("IntersectionObserver" in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            if (!armed) armReel();
            else if (phase === "clip" && !cutting) frontEl()?.play().catch(() => {});
          } else if (!cutting) {
            frontEl()?.pause();
            backEl()?.pause();
            if (phase === "open" || phase === "end") clearTimer();
          }
        });
      }, { threshold: 0.28, rootMargin: "40px" });
      io.observe(root);
    } else {
      armReel();
    }
  });

  playAmbient();
  if (reduceMotion) {
    pauseAmbient();
    ambientVideos().forEach((vid) => vid.removeAttribute("autoplay"));
  }
})();
