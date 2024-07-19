<div id="toroflix_genres_widget-3" class="Wdgt widget_categories">
    <div class="Title"><?php echo $title; ?></div>
    <ul>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?= op_get_year() ?></li>
        <?php endwhile; ?>
    </ul>
</div>
