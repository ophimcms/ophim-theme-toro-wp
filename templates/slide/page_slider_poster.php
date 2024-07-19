<div class="MovieListSldCn" style="height: 589px; margin-bottom: 20px" >
    <div class="MovieListSld owl-carousel">
        <?php $key = 0;
        while ($query->have_posts()) : $query->the_post();
            $key++ ?>
            <div class="TPostMv">
                <article class="TPost A">
                    <header class="Container">
                        <div class="TPMvCn">
                            <a href="<?php the_permalink(); ?>">
                                <div class="Title"><?php the_title(); ?></div>
                            </a>
                            <div class="Info">
                                <div class="Vote">
                                    <div class="post-ratings">
                                        <img src="<?= get_template_directory_uri() ?>/assets/img/cnt/rating_on.gif">
                                        <span class="st-vote"><?= op_get_rating() ?></span>
                                    </div>
                                </div>
                                <span class="Date"><?= op_get_year() ?></span>
                                <span class="Qlty">Phim bộ
                                </span>
                                <span class="Time"><?= op_get_runtime() ?></span> <span
                                        class="Views AAIco-remove_red_eye"><?= op_get_post_view() ?></span>
                            </div>
                            <div class="Description">
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                                <p class="Director"><span>Đạo diễn:</span>
                                    <?php
                                    $ophim_directors = get_the_terms(get_the_id(), 'ophim_directors');
                                    if ($ophim_directors) : foreach ($ophim_directors as $term) { ?>
                                        <a href="<?php echo home_url("/");
                                        echo get_option('ophim_slug_directors') ? get_option('ophim_slug_directors') : 'directors' ?>/<?php echo "{$term->slug}" ?>/"
                                           target="_blank"><?php echo "{$term->name}" ?></a>,
                                    <?php } else : endif ?>
                                </p>
                                <p class="Genre"><span>Thể loại:</span>
                                    <?php
                                   $ophim_genres = get_the_terms(get_the_id(), 'ophim_genres');
                                    if ($ophim_genres) : foreach ($ophim_genres as $term) { ?>
                                        <a href="<?php echo home_url("/");
                                        echo get_option('ophim_slug_genres') ? get_option('ophim_slug_genres') : 'genres' ?>/<?php echo "{$term->slug}" ?>/"
                                           target="_blank"><?php echo "{$term->name}" ?></a>,
                                    <?php } else : endif ?>
                                </p>
                                <p class="Cast"><span>Diễn viên:</span>
                                    <?php
                                    $ophim_actors = get_the_terms(get_the_id(), 'ophim_actors');
                                    if ($ophim_actors) : foreach ($ophim_actors as $term) { ?>
                                        <a href="<?php echo home_url("/");
                                        echo get_option('ophim_slug_actors') ? get_option('ophim_slug_actors') : 'actors' ?>/<?php echo "{$term->slug}" ?>/"
                                           target="_blank"><?php echo "{$term->name}" ?></a>,
                                    <?php } else : endif ?>
                                </p>
                            </div>
                            <a href="<?php the_permalink(); ?>"
                               class="Button TPlay AAIco-play_circle_outline"><strong>Xem phim</strong></a>
                        </div>
                        <div class="Image">
                            <figure class="Objf">
                                <img loading="lazy" class="TPostBg" src="<?= op_get_poster_url() ?>"
                                     alt="Background">
                            </figure>
                        </div>
                    </header>
                </article>
            </div>
        <?php endwhile; ?>
    </div>
</div>
