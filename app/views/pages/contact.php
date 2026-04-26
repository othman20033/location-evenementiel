<?php
/**
 * @var array{type:string,message:string}|null $flash
 * @var array<string, string>                  $old
 * @var array<string, string>                  $errors
 * @var string                                 $csrf
 */
$old    = $old ?? [];
$errors = $errors ?? [];
?>

<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Contact</span>
        <h1 class="reveal">Démarrons <em>votre projet</em></h1>
        <p class="reveal">
            Décrivez-nous votre événement. Notre équipe vous répond sous 24h avec une proposition personnalisée.
        </p>
    </div>
</section>

<section class="section contact-section">
    <div class="container contact-grid">
        <div class="contact-info reveal">
            <h2>Parlons-en.</h2>
            <p>Notre équipe est à votre écoute du lundi au samedi.</p>

            <ul class="contact-list">
                <li>
                    <span class="contact-icon"><i class="lucide lucide-map-pin"></i></span>
                    <div><strong>Adresse</strong><span><?= e($site['address']) ?></span></div>
                </li>
                <li>
                    <span class="contact-icon"><i class="lucide lucide-phone"></i></span>
                    <div><strong>Téléphone</strong><a href="tel:<?= e(preg_replace('/\s+/', '', $site['phone'])) ?>"><?= e($site['phone']) ?></a></div>
                </li>
                <li>
                    <span class="contact-icon"><i class="lucide lucide-mail"></i></span>
                    <div><strong>Email</strong><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></div>
                </li>
                <li>
                    <span class="contact-icon"><i class="lucide lucide-clock"></i></span>
                    <div><strong>Horaires</strong><span>Lun – Sam : 9h - 19h</span></div>
                </li>
            </ul>

            <div class="map-embed">
                <iframe
                    src="https://www.google.com/maps?q=Casablanca&output=embed"
                    title="Localisation"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen></iframe>
            </div>
        </div>

        <div class="contact-form-wrap reveal">
            <?php if (!empty($flash)): ?>
                <div class="alert alert-<?= e($flash['type']) ?>" role="alert">
                    <?= e($flash['message']) ?>
                </div>
            <?php endif; ?>

            <form action="<?= e(url('/contact')) ?>" method="post" novalidate class="contact-form" id="contactForm">
                <input type="hidden" name="_csrf" value="<?= e($csrf) ?>">

                <div class="field-row">
                    <div class="field <?= isset($errors['name']) ? 'has-error' : '' ?>">
                        <label for="name">Nom complet *</label>
                        <input type="text" id="name" name="name" required minlength="2"
                               value="<?= e($old['name'] ?? '') ?>" autocomplete="name">
                        <?php if (isset($errors['name'])): ?>
                            <small class="error"><?= e($errors['name']) ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="field <?= isset($errors['email']) ? 'has-error' : '' ?>">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required
                               value="<?= e($old['email'] ?? '') ?>" autocomplete="email">
                        <?php if (isset($errors['email'])): ?>
                            <small class="error"><?= e($errors['email']) ?></small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="field-row">
                    <div class="field <?= isset($errors['phone']) ? 'has-error' : '' ?>">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone"
                               value="<?= e($old['phone'] ?? '') ?>" autocomplete="tel">
                        <?php if (isset($errors['phone'])): ?>
                            <small class="error"><?= e($errors['phone']) ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="event_type">Type d'événement</label>
                        <select id="event_type" name="event_type">
                            <?php
                            $types = ['', 'Mariage', 'Séminaire', 'Soirée privée', 'Conférence', 'Autre'];
                            $selected = $old['event_type'] ?? '';
                            foreach ($types as $t):
                                $label = $t === '' ? '— Sélectionner —' : $t;
                            ?>
                                <option value="<?= e($t) ?>" <?= $selected === $t ? 'selected' : '' ?>><?= e($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="field <?= isset($errors['message']) ? 'has-error' : '' ?>">
                    <label for="message">Votre message *</label>
                    <textarea id="message" name="message" rows="6" required minlength="10"
                              placeholder="Décrivez votre événement : date, lieu, nombre d'invités, besoins…"><?= e($old['message'] ?? '') ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <small class="error"><?= e($errors['message']) ?></small>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Envoyer ma demande
                    <i class="lucide lucide-send"></i>
                </button>

                <p class="form-note">
                    En soumettant ce formulaire, vous acceptez d'être recontacté par notre équipe.
                </p>
            </form>
        </div>
    </div>
</section>
