<section>
    <div class="Top AAIco-star_border">
        <h1 class="Title"><?= $title; ?></h1>
    </div>
    <div class="MovieListTop owl-carousel">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <div class="TPostMv">
                <div class="TPost B">
                    <a href="<?php the_permalink(); ?>">
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow">
                                <img loading="lazy" class="owl-lazy"
                                     data-src="<?= op_get_thumb_url() ?>"
                                     alt="<?php the_title(); ?>">
                            </figure>
                            <span class="Qlty"><?= op_get_total_episode() ?></span>
                        </div>
                        <h2 class="Title"><?php the_title(); ?></h2>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>
