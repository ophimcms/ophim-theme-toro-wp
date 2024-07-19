<div id="widget_post_toroflix-2" class="Wdgt widget_postlist">
    <div class="Title"><?php echo $title; ?></div>
    <ul class="MovieList ">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <li>
                <div class="TPost C">
                    <a href="<?php the_permalink(); ?>">
                        <span class="Top"><?= $key ?></span>
                        <div class="Image">
                            <figure class="Objf TpMvPlay AAIco-play_arrow">
                                <img loading="lazy"
                                     src="<?= op_get_thumb_url() ?>"
                                     alt="<?php the_title(); ?>">
                            </figure>
                        </div>
                        <div class="Title">
                            <?php the_title(); ?>
                        </div>
                    </a>
                    <div class="Info">
                        <div>
                            <span class="TpTv BgA">
                                <?= op_get_lang() ?>
                            </span>
                            <span class="TpTv BgA">
                                <?= op_get_quality() ?>
                            </span>
                        </div>
                        <div class="Vote">
                            <div class="post-ratings">
                                <img loading="lazy"
                                     src="<?= get_template_directory_uri() ?>/assets/img/cnt/rating_on.gif"
                                     alt="img"><span style="font-size: 12px;"><?= op_get_rating() ?></span>
                            </div>
                        </div>
                        <span class="Date"><?= op_get_year() ?></span> <span class="Time"><?= op_get_runtime() ?></span> <span
                            class="Views AAIco-remove_red_eye"><?= op_get_post_view() ?></span></div>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
