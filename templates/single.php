
<div class="Body">
    <div class="MovieListSldCn">
        <article class="TPost A">
            <header class="Container">
                <div class="TPMvCn">
                    <h1 class="Title"><?php the_title(); ?></h1>
                    <p class="SubTitle"><span><?= op_get_original_title() ?></span></p>
                    <div class="Info">
                        <div class="Vote">
                            <div class="post-ratings">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/cnt/rating_on.gif" alt="img"><span
                                        style="font-size: 12px;"><?= op_get_rating() ?></span>
                            </div>
                        </div>
                        <span class="Date"><?= op_get_year() ?></span>
                        <span class="Qlty">
                            <?= op_get_status() ?>
                        </span>
                        <span class="Time"><?= op_get_runtime() ?></span>
                        <span class="Views AAIco-remove_red_eye"><?= op_get_post_view() ?></span>
                        <span class="Qlty"><?= op_get_regions(' ') ?></span>
                    </div>
                    <div class="Description">
                        <div class="content-film" style="">
                            <p><?php the_content();?></p>
                        </div>
                        <p class="Director">
                            <span>Đạo diễn:</span>
                            <?= op_get_directors('10',', ') ?>
                        </p>
                        <p class="Genre"><span>Thể loại:</span>
                            <?= op_get_genres(', ') ?>
                        </p>
                        <p class="Cast">
                            <span>Diễn viên:</span>
                            <?= op_get_actors(10, ', ') ?>
                        </p>
                    </div>
                    <?php if (watchUrl()) { ?>
                    <a href="<?= watchUrl() ?>" class="Button TPlay AAIco-play_circle_outline"><strong>Xem Phim</strong></a>
                    <?php } ?>
                    <ul class="ShareList">
                        <?php if (op_get_trailer_url()) { ?>
                        <li><a href="javascript:void(0)" id="watch-trailer" class="fa-youtube" title="Xem Trailer"></a></li>
                        <?php } ?>
                        <li><a href="javascript:void(0)"
                               title="Chia sẻ lên facebook"
                               onclick="window.open ('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');"
                               class="fa-facebook"></a></li>

                    </ul>

                    <div class="rating-content">
                        <div id="movies-rating-star" style="height: 18px;"></div>
                        <div>
                            (<?= op_get_rating(); ?>
                            sao
                            /
                            <?= op_get_rating_count() ?> đánh giá)
                        </div>
                        <div id="movies-rating-msg"></div>
                    </div>

                </div>
                <div class="Image">
                    <figure class="Objf">
                        <img loading="lazy" class="TPostBg"
                             src="<?= op_get_poster_url() ?>" alt="Background">
                    </figure>
                </div>
            </header>
        </article>
    </div>
    <div class="Main Container">
        <div class="TpRwCont ">
            <main>
                <?php if (op_get_showtime_movies()) { ?>
                <p class="comment-notes">
                    <span id="email-notes">Lịch chiếu</span>
                    <span class="required-field-message"><?= op_get_showtime_movies() ?></span>
                </p>
                <?php } ?>

                <?php if (op_get_notify()) { ?>
                <p class="comment-notes">
                    <span id="email-notes">Thông báo</span>
                    <span class="required-field-message"><?= op_get_notify() ?></span>
                </p>
                <?php } ?>

                <?php foreach (episodeList() as $key => $server) { ?>
                <section class="SeasonBx AACrdn">
                    <div class="Top AAIco-playlist_play AALink episodes-view episodes-load">
                        <div class="Title"><a href="#">Danh sách tập <span><?= $server['server_name'] ?></span></a></div>
                    </div>
                    <ul class="AZList">
                        <?php foreach ($server['server_data'] as $list) : ?>
                            <li>
                                <a href="<?= hrefEpisode($list["name"],$key)?>">
                                <?= $list['name'] ?>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </section>
                <?php } ?>
                <section>
                    <div class="Top AAIco-chat">
                        <div class="Title">Bình luận</div>
                    </div>
                    <ul class="CommentsList">
                        <div style="width: 100%; background-color: #fff">
                            <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
                        </div>
                    </ul>
                </section>

                <section>
                    <div class="Top AAIco-star_border">
                        <h3 class="Title">Có thể bạn muốn xem?</h3>
                    </div>
                    <div class="MovieListTop owl-carousel">
                        <?php
                        $postType = 'ophim';
                        $taxonomyName = 'ophim_genres';
                        $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                        if ($taxonomy) {
                            $category_ids = array();
                            foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                            $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                            $my_query = new wp_query($args);
                            if ($my_query->have_posts()):
                                while ($my_query->have_posts()):$my_query->the_post(); ?>
                                    <div class="TPostMv">
                                        <div class="TPost B">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="Image">
                                                    <figure class="Objf TpMvPlay AAIco-play_arrow">
                                                        <img loading="lazy" class="owl-lazy"
                                                             data-src="<?= op_get_poster_url() ?>"
                                                             alt="<?php the_title(); ?>">
                                                    </figure>
                                                    <span class="Qlty"><?= op_get_lang() ?></span>
                                                </div>
                                                <h2 class="Title"><?php the_title(); ?></h2>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        }
                        ?>
                    </div>
                </section>
            </main>
            <?php get_sidebar('ophim'); ?>
        </div>
    </div>
</div>
<?php if (op_get_trailer_url()) { ?>
<?php
add_action('wp_footer', function (){
    parse_str( parse_url( op_get_trailer_url(), PHP_URL_QUERY ), $my_array_of_vars );
    $video_id = $my_array_of_vars['v'];
    ?>
    <script>
        toroflixPublic.trailer = "<iframe width=\"560\" height=\"315\" src=\"https:\/\/www.youtube.com\/embed\/<?php echo $video_id ?>\" frameborder=\"0\" allow=\"autoplay\" allow=\"encrypted-media\" allowfullscreen><\/iframe>"
    </script>
<?php }) ?>
<?php } ?>
<div class="Modal-Box Ttrailer">
    <div class="Modal-Content">
        <span class="Modal-Close Button AAIco-clear"></span>
    </div>
    <i class="AAOverlay"></i>
</div>

<script src="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.js"></script>
<link href="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.css" rel="stylesheet" type="text/css" />

<script>
    var rated = false;
    $('#movies-rating-star').raty({
        score: <?= op_get_rating(); ?>,
    number: 10,
        numberMax: 10,
        hints: ['quá tệ', 'tệ', 'không hay', 'không hay lắm', 'bình thường', 'xem được', 'có vẻ hay', 'hay',
        'rất hay', 'siêu phẩm'
    ],
        starOff: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-off.png',
        starOn: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-on.png',
        starHalf: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-half.png',
        click: function(score, evt) {
        if (rated) return
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php')?>',
                type: 'POST',
                data:{
                    action: "ratemovie",
                    rating: score,
                    postid: '<?php echo get_the_ID(); ?>',
                },
            }).done(function (data) {
                $('#movies-rating-msg').html(`Bạn đã đánh giá ${score} sao cho phim này!`);
                });
        rated = true;
        //$('#movies-rating-star').data('raty').readOnly(true);
    }
    });
</script>