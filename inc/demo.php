<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<footer class="Footer">
        <div class="Bot">
            <div class="Container">
                <p>Toroflix is the evolution of toroplay, we put the best of us in this theme that you love, we
                    promise</p>
            </div>
        </div>
    </footer>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);