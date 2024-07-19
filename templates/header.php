<style>
    #result{
        margin-top: 20px;
        background-color: #000;
        list-style-type: none;
        width: 600px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
        border;
    }
    .column {
        float: left;
        padding: 5px;
    }

    .left {
        text-align: center;
        width: 20%;
    }

    .right {
        width: 80%;
    }
</style>
<header id="Hd" class="Header">
    <div class="Container">
        <div id="HdTop" class="Top">
            <span class="MenuBtn AATggl CXHd" data-tggl="Tf-Wp"><i></i><i></i><i></i></span>
            <div class="Search">
                <form method="get" action="/" autocomplete="off">
                    <input type="text" onkeyup="fetch()" id="search" placeholder="Tìm kiếm phim..." name="s" value="<?php echo "$s"; ?>">
                    <label for="Tf-Search" class="SearchBtn fa-search AATggl" data-tggl="HdTop">
                        <i class="AAIco-clear"></i>
                    </label>
                </form>


            </div>
            <div class="" id="result"></div>
            <figure class="Logo">
                <a href="<?= get_home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
                    <?php op_the_logo('width:50px') ?>
                </a>
            </figure>
            <nav class="Menu">
                <ul>
                    <?php
                    $menu_items = wp_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                        <?php if (empty($item['children'])) { ?>
                            <li id="menu-item-<?= $key ?>"
                                class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-131">
                                <a href="<?= $item['url'] ?>" aria-current="page"><?= $item['title'] ?></a></li>
                        <?php } else { ?>
                            <li id="menu-item-<?= $key ?>"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-134">
                                <a href="<?= $item['url'] ?>"><?= $item['title'] ?></a>
                                <?php if (!empty($item['children'])): ?>
                                    <ul class="sub-menu">
                                        <?php foreach ($item['children'] as $k => $child): ?>
                                            <li id="menu-item-<?= $k ?>"
                                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-135">
                                                <a href="<?= $child['url'] ?>"><?= $child['title'] ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>

                </ul>
            </nav>
        </div>
    </div>
</header>

