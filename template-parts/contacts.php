<?php
$args = array('post_type' => 'cultura_contact');
$the_query = new WP_Query($args);
$currentLanguage = pll_current_language();
?>

<?php if ($the_query->have_posts()) : ?>
    <section class="contact py-5 px-3 px-md-5 py-md-7 bg-primary">
        <div class="container">
            <h2 class="text-center pb-5">Directiva</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <div class="col mb-4">
                        <div class="card border-0">
                            <?php the_post_thumbnail('full', array('class' => 'card-img-top w-100')); ?>
                            <div class="card-body bg-white text-primary py-3 px-4">
                                <div class="contact__role mb-2">
                                    <?php echo the_field('contact_role'); ?>
                                </div>
                                <h3 class="h4"><?php echo the_field('contact_name'); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>