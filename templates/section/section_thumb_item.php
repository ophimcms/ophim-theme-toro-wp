<li class="TPostMv post-66 movies type-movies status-publish hentry category-comedy category-drama category-romance country-united-states-of-america annee-360 directors-diane-durant directors-greg-berlanti directors-katye-kalivoda directors-kevin-breen directors-meaghan-f-mclaughlin directors-richard-graves directors-ryan-j-pezdirc cast-abigail-houck cast-alex-sgambati cast-alexandra-shipp cast-baz-ma cast-briana-estevez cast-bryson-pitts cast-campbell-godfrey cast-carsen-rowe cast-cassady-mcclincy cast-chantell-d-christopher cast-christian-ojore-mayfield cast-christopher-l-plunkett cast-clark-moore cast-collin-mchugh cast-danni-heverin cast-david-copeland-brown-jr cast-drew-starkey cast-dylan-cheek cast-emily-jordan cast-haroon-khan cast-jaidi-ventura cast-james-sterling cast-jamila-thompson cast-jennifer-garner cast-jessi-peralta cast-jodi-houck cast-joey-pollari cast-jonah-blaine-bowling cast-jonathan-fritschi cast-jorge-lendeborg-jr cast-josh-duhamel cast-josh-royston cast-joshua-mikel cast-katherine-langford cast-keiynan-lonsdale cast-logan-miller cast-mackenzie-lintz cast-mandy-fason cast-matthew-laraway cast-miles-heizer cast-nancy-de-mayo cast-natalia-tureta cast-natasha-rothwell cast-nicholas-stargel cast-nick-robinson cast-nye-reynolds cast-patrick-donohue cast-philip-covin cast-robbie-rogers cast-samantha-bulka cast-sean-odonnell cast-skye-mowbray cast-talitha-bateman cast-terayle-hill cast-tony-hale cast-tyler-chase cast-tyson-love">
    <article class="TPost B">
        <a href="<?php the_permalink(); ?>">
            <div class="Image">
                <figure class="Objf TpMvPlay AAIco-play_arrow">
                    <img loading="lazy" src="<?= op_get_thumb_url() ?>"
                         alt="<?php the_title(); ?>">
                </figure>
                <span class="MvIC"><span class="Qlty Yr"><?= op_get_year() ?></span></span>
            </div>
            <h2 class="Title"><?php the_title(); ?></h2>
        </a>
        <div class="TPMvCn">
            <a href="<?php the_permalink(); ?>">
                <div class="Title"><?php the_title(); ?></div>
            </a>
            <p><?= op_get_original_title() ?></p>
            <div class="Info">
                <div class="Vote">
                    <div class="post-ratings">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/cnt/rating_on.gif" alt="img"><span style="font-size: 12px;"><?= op_get_rating() ?></span>
                    </div>
                </div>
                <span class="Date"><?= op_get_year() ?></span>
                <span class="Qlty"><?= op_get_quality() ?></span>
                <span class="Qlty"><?= op_get_lang() ?></span>
                <span class="Time"><?= op_get_runtime() ?></span>
                <span class="Views AAIco-remove_red_eye"><?= op_get_post_view() ?></span>
            </div>
            <div class="Description">
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="TPlay AAIco-play_circle_outline"><strong>Xem phim</strong></a>
            </div>
    </article>
</li>
