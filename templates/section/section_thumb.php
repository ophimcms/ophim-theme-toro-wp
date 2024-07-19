<section data-id="movies">
    <div class="Top AAIco-movie_filter">
        <h2 class="Title"><?= $title; ?></h2>
        <a href="<?= $slug; ?>" class="Button Sm">Xem thêm</a>
    </div>
    <ul class="MovieList Rows AX A04 B03 C20 D03 E20 Alt">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
        <?php include THEMETEMPLADE.'/section/section_thumb_item.php' ?>
        <?php endwhile; ?>
    </ul>
</section>
