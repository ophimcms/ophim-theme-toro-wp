<div id="widget_post_toroflix-3" class="Wdgt widget_postlist">
    <div class="Title"><?php echo $title; ?></div>
    <ul class="MovieList MovieList Rows AF A04">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li>
                <div class="TPost B">
                    <a href="<?php the_permalink(); ?>">
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow">
                                <img loading="lazy"
                                     src="<?= op_get_thumb_url() ?>"
                                     alt="<?php the_title(); ?>">
                            </figure>
                            <span class="TpTv BgA"><?= op_get_quality() ?></span></div>
                        <div class="Title"><?php the_title(); ?></div>
                    </a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
