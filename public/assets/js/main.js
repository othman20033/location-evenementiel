/**
 * Élégance Événements — main.js
 *
 * - Header sticky avec changement d'état au scroll
 * - Menu mobile
 * - Animations reveal au scroll (IntersectionObserver)
 * - Filtre de galerie + lightbox accessible
 * - Bouton retour en haut
 * - Validation client du formulaire de contact
 */
(function () {
    'use strict';

    /* ---------- Hero Slider (Swiper) ---------- */
    const heroSlider = new Swiper('.hero-slider', {
        loop: true,
        speed: 1000,
        parallax: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        }
    });

    /* ---------- Mouse Parallax Effect (Expert Level) ---------- */
    const HERO = document.querySelector('.hero-slider');
    if (HERO) {
        HERO.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const x = (clientX / window.innerWidth - 0.5) * 30; // 30px max shift
            const y = (clientY / window.innerHeight - 0.5) * 30;
            
            const activeSlideBg = HERO.querySelector('.swiper-slide-active .slide-bg');
            
            if (activeSlideBg) {
                activeSlideBg.style.transform = `scale(1.1) translate(${x}px, ${y}px)`;
            }
        });
        
        HERO.addEventListener('mouseleave', () => {
            const bgs = HERO.querySelectorAll('.slide-bg');
            bgs.forEach(bg => bg.style.transform = '');
        });
    }

    /* ---------- Header scroll state ---------- */
    const header = document.getElementById('siteHeader');
    const onScroll = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 30);

        const btt = document.getElementById('backToTop');
        if (btt) btt.classList.toggle('is-visible', window.scrollY > 600);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---------- Mobile nav toggle ---------- */
    const toggle = document.getElementById('navToggle');
    const nav    = document.getElementById('primaryNav');
    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const open = nav.classList.toggle('is-open');
            toggle.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            document.body.style.overflow = open ? 'hidden' : '';
        });
        nav.querySelectorAll('a').forEach(a =>
            a.addEventListener('click', () => {
                nav.classList.remove('is-open');
                toggle.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            })
        );
    }

    /* ---------- Reveal on scroll ---------- */
    const revealEls = document.querySelectorAll('.reveal');
    if (revealEls.length && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry, idx) => {
                if (entry.isIntersecting) {
                    // Léger échelonnement quand plusieurs éléments apparaissent ensemble
                    setTimeout(() => entry.target.classList.add('is-visible'), idx * 60);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(el => io.observe(el));
    } else {
        revealEls.forEach(el => el.classList.add('is-visible'));
    }

    /* ---------- Back to top ---------- */
    const btt = document.getElementById('backToTop');
    if (btt) {
        btt.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ---------- Contact form: validation client + UX ---------- */
    const form = document.getElementById('contactForm');
    if (form) {
        const submitBtn = form.querySelector('button[type="submit"]');

        const setError = (field, message) => {
            const wrapper = field.closest('.field');
            if (!wrapper) return;
            wrapper.classList.add('has-error');
            let errEl = wrapper.querySelector('small.error');
            if (!errEl) {
                errEl = document.createElement('small');
                errEl.className = 'error';
                wrapper.appendChild(errEl);
            }
            errEl.textContent = message;
        };

        const clearError = (field) => {
            const wrapper = field.closest('.field');
            if (!wrapper) return;
            wrapper.classList.remove('has-error');
            const errEl = wrapper.querySelector('small.error');
            if (errEl) errEl.remove();
        };

        const validate = () => {
            let ok = true;
            const name    = form.querySelector('#name');
            const email   = form.querySelector('#email');
            const phone   = form.querySelector('#phone');
            const message = form.querySelector('#message');

            if (name.value.trim().length < 2) {
                setError(name, 'Veuillez saisir votre nom (2 caractères minimum).');
                ok = false;
            } else clearError(name);

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                setError(email, 'Veuillez saisir une adresse email valide.');
                ok = false;
            } else clearError(email);

            if (phone.value.trim() !== '' && !/^[\d\s+\-().]{6,20}$/.test(phone.value)) {
                setError(phone, 'Numéro de téléphone invalide.');
                ok = false;
            } else clearError(phone);

            if (message.value.trim().length < 10) {
                setError(message, 'Votre message doit contenir au moins 10 caractères.');
                ok = false;
            } else clearError(message);

            return ok;
        };

        // Validation à la perte de focus
        form.querySelectorAll('input, textarea').forEach(el => {
            el.addEventListener('blur', () => validate());
        });

        form.addEventListener('submit', (e) => {
            if (!validate()) {
                e.preventDefault();
                return;
            }
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.style.opacity = '.7';
                submitBtn.innerHTML = 'Envoi en cours…';
            }
        });
    }
})();
