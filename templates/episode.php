<div class="Body">
    <style>
        .jwplayer {
            position: unset !important;
        }
    </style>
    <div class="TPost A D">
        <div class="Container">
            <div class="optns-bx">
                <div class="drpdn">
                    <button class="bstd Button">
                        <span>Đổi server khi lỗi<span>2 server</span></span>
                        <i class="fa-chevron-down"></i>
                    </button>
                    <ul class="optnslst trsrcbx">
                        <li>
                            <a onclick="chooseStreamingServer(this)" data-type="m3u8" data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>" class="streaming-server Button sgty">
                                <span class="nmopt">01</span>
                                <span>Nguồn Phát <span>#01</span></span>
                            </a>
                        </li>
                        <li>
                            <a onclick="chooseStreamingServer(this)" data-type="embed" data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>" class="streaming-server Button sgty">
                                <span class="nmopt">02</span>
                                <span>Nguồn Phát <span>#02</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="VideoPlayer">
                <div id="VideoOption01" class="Video on">

                </div>
                <span class="BtnLight AAIco-lightbulb_outline lgtbx-lnk"></span>
                <span class="lgtbx"></span>
                <div class="navepi tagcloud">
                </div>
            </div>
            <div class="Image">
                <figure class="Objf"><img src="<?= op_get_poster_url() ?>" alt="<?php the_title(); ?>"></figure>
            </div>
        </div>
    </div>
    <div class="Main Container">
        <?php foreach (episodeList() as $key => $server) { ?>
            <section class="SeasonBx AACrdn">
                <div class="Top AAIco-playlist_play AALink episodes-view episodes-load">
                    <div class="Title"><a href="#">Danh sách tập <span><?= $server['server_name'] ?></span></a></div>
                </div>
                <ul class="AZList">
                    <?php foreach ($server['server_data'] as $list) {
                        $current = '';
                        if (slugify($list['name']) == episodeName()&& episodeSV() == $key) {
                            $current = 'Current';
                        }
                        echo '<li  class="' . $current . '">
                                            <a href="' . hrefEpisode($list["name"],$key) . '"
                                              >
                                                ' . $list['name'] . '
                                            </a>
                                        </li>';
                    } ?>
                </ul>
            </section>
        <?php } ?>
    </div>
    <div class="Main Container">
        <div class="TpRwCont ">
            <main>
                <article class="TPost A">
                    <header class="Container">
                        <div class="TPMvCn">
                            <a href="javascript:void(0)"><h1 class="Title"><?php the_title(); ?></h1></a>
                            <ul class="ShareList">
                                <li><a href="javascript:void(0)"
                                       title="Chia sẻ lên facebook"
                                       onclick="window.open ('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');"
                                       class="fa-facebook"></a></li>
                                <li><a href="javascript:void(0)"
                                       title="Chia sẻ lên twitter"
                                       onclick="javascript:window.open('https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?>', 'Twitter', 'toolbar=0, status=0, width=650, height=450');"
                                       class="fa-twitter"></a></li>
                            </ul>
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
                                <span class="Qlty"><?= op_get_regions() ?></span>
                            </div>
                            <div class="Description">
                                <div class="content-film" style="">
                                    <p><?php the_content();?></p>
                                </div>
                                <p class="Director">
                                    <span>Đạo diễn:</span>
                                    <?= op_get_directors(10,', ') ?>
                                </p>
                                <p class="Genre"><span>Thể loại:</span>
                                    <?= op_get_genres(', ') ?>
                                </p>
                                <p class="Cast">
                                    <span>Diễn viên:</span>
                                    <?= op_get_actors(10, ', ') ?>
                                </p>
                            </div>
                            <?php if (op_get_trailer_url()) { ?>
                                <a href="javascript:void(0)" id="watch-trailer" class="Button TPlay AAIco-play_circle_outline"><strong>Xem Trailer</strong></a>
                            <?php } ?>

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
                    </header>
                </article>

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

<script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>

<script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer-8.9.3.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/hls.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer.hlsjs.min.js"></script>

<script>
    var episode_id = '<?= episodeName() ?>';
    const wrapper = document.getElementById('VideoOption01');
    const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

    function chooseStreamingServer(el) {
        const type = el.dataset.type;
        const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
        const id = el.dataset.id;

        const newUrl =
            location.protocol +
            "//" +
            location.host +
            location.pathname.replace(`-${episode_id}`, `-${id}`);

        history.pushState({
            path: newUrl
        }, "", newUrl);
        episode_id = id;

        Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
            server.classList.remove('on');
        })
        el.classList.add('on');
        renderPlayer(type, link, id);
    }

    function renderPlayer(type, link, id) {
        if (type == 'embed') {
            if (vastAds) {
                wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                const fake_player = jwplayer("fake_jwplayer");
                const objSetupFake = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                    volume: 100,
                    mute: false,
                    autostart: true,
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };
                fake_player.setup(objSetupFake);
                fake_player.on('complete', function(event) {
                    $("#fake_jwplayer").remove();
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    fake_player.remove();
                });

                fake_player.on('adSkipped', function(event) {
                    $("#fake_jwplayer").remove();
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    fake_player.remove();
                });

                fake_player.on('adComplete', function(event) {
                    $("#fake_jwplayer").remove();
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    fake_player.remove();
                });
            } else {
                if (wrapper) {
                    wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                }
            }
            return;
        }

        if (type == 'm3u8' || type == 'mp4') {
            wrapper.innerHTML = `<div id="jwplayer"></div>`;
            const player = jwplayer("jwplayer");
            const objSetup = {
                key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                aspectratio: "16:9",
                width: "100%",
                image: "<?= op_get_poster_url() ?>",
                file: link,
                playbackRateControls: true,
                playbackRates: [0.25, 0.75, 1, 1.25],
                sharing: {
                    sites: [
                        "reddit",
                        "facebook",
                        "twitter",
                        "googleplus",
                        "email",
                        "linkedin",
                    ],
                },
                volume: 100,
                mute: false,
                autostart: true,
                logo: {
                    file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                    link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                    position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                },
                advertising: {
                    tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                    client: "vast",
                    vpaidmode: "insecure",
                    skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                    skipmessage: "Bỏ qua sau xx giây",
                    skiptext: "Bỏ qua"
                }
            };

            if (type == 'm3u8') {
                const segments_in_queue = 50;

                var engine_config = {
                    debug: !1,
                    segments: {
                        forwardSegmentCount: 50,
                    },
                    loader: {
                        cachedSegmentExpiration: 864e5,
                        cachedSegmentsCount: 1e3,
                        requiredSegmentsPriority: segments_in_queue,
                        httpDownloadMaxPriority: 9,
                        httpDownloadProbability: 0.06,
                        httpDownloadProbabilityInterval: 1e3,
                        httpDownloadProbabilitySkipIfNoPeers: !0,
                        p2pDownloadMaxPriority: 50,
                        httpFailedSegmentTimeout: 500,
                        simultaneousP2PDownloads: 20,
                        simultaneousHttpDownloads: 2,
                        // httpDownloadInitialTimeout: 12e4,
                        // httpDownloadInitialTimeoutPerSegment: 17e3,
                        httpDownloadInitialTimeout: 0,
                        httpDownloadInitialTimeoutPerSegment: 17e3,
                        httpUseRanges: !0,
                        maxBufferLength: 300,
                        // useP2P: false,
                    },
                };
                if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                    var engine = new p2pml.hlsjs.Engine(engine_config);
                    player.setup(objSetup);
                    jwplayer_hls_provider.attach();
                    p2pml.hlsjs.initJwPlayer(player, {
                        liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                        maxBufferLength: 300,
                        loader: engine.createLoaderClass(),
                    });
                } else {
                    player.setup(objSetup);
                }
            } else {
                player.setup(objSetup);
            }


            const resumeData = 'OPCMS-PlayerPosition-' + id;
            player.on('ready', function() {
                if (typeof(Storage) !== 'undefined') {
                    if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                        console.log("No cookie for position found");
                        var currentPosition = 0;
                    } else {
                        if (localStorage[resumeData] == "null") {
                            localStorage[resumeData] = 0;
                        } else {
                            var currentPosition = localStorage[resumeData];
                        }
                        console.log("Position cookie found: " + localStorage[resumeData]);
                    }
                    player.once('play', function() {
                        console.log('Checking position cookie!');
                        console.log(Math.abs(player.getDuration() - currentPosition));
                        if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                            5) {
                            player.seek(currentPosition);
                        }
                    });
                    window.onunload = function() {
                        localStorage[resumeData] = player.getPosition();
                    }
                } else {
                    console.log('Your browser is too old!');
                }
            });

            player.on('complete', function() {
                <?php if(nextEpisodeUrl()){ ?>
                window.location.href = "<?= nextEpisodeUrl() ?>";
                <?php }?>
                if (typeof(Storage) !== 'undefined') {
                    localStorage.removeItem(resumeData);
                } else {
                    console.log('Your browser is too old!');
                }
            })

            function formatSeconds(seconds) {
                var date = new Date(1970, 0, 1);
                date.setSeconds(seconds);
                return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
            }
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const episode = '<?= episodeName() ?>';
        let playing = document.querySelector(`[data-id="${episode}"]`);
        if (playing) {
            playing.click();
            return;
        }

        const servers = document.getElementsByClassName('streaming-server');
        if (servers[0]) {
            servers[0].click();
        }
    });
</script>

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