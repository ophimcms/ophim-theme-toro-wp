<section>
    <div class="Top">
        <div class="Title"><?= $title; ?></div>
    </div>
    <ul class="MovieList Rows BX B06 C04 E03 Episodes">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <li class="TPostMv">
                <article class="TPost B">
                    <a href="<?php the_permalink(); ?>">
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow">
                                <img class="TPostBg"
                                     src="<?= op_get_poster_url() ?>"
                                     alt="Background">
                            </figure>
                            <span class="Qlty"><?= op_get_quality() ?> <?= op_get_lang() ?></span>
                        </div>
                        <h2 class="Title" data-subtitle="<?= op_get_original_title() ?>"><?php the_title(); ?></h2>
                    </a>
                </article>
            </li>
        <?php endwhile; ?>
    </ul>
</section>
