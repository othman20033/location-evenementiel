<?php
/** @var array<int, array{title:string,category:string,description:string,image:string,date:string}> $projects */
?>

<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Portfolio</span>
        <h1 class="reveal">Nos <em>Réalisations</em></h1>
        <p class="reveal">Un aperçu des événements que nous avons eu le plaisir d'accompagner.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <article class="project-card reveal">
                    <div class="project-image">
                        <img src="<?= e($project['image']) ?>" alt="<?= e($project['title']) ?>" loading="lazy">
                        <span class="project-tag"><?= e($project['category']) ?></span>
                    </div>
                    <div class="project-body">
                        <span class="project-date"><?= e($project['date']) ?></span>
                        <h3><?= e($project['title']) ?></h3>
                        <p><?= e($project['description']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
