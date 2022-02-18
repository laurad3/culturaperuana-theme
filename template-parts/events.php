<?php 
$showEventsSlider = get_field('show_events_slider');
?>

<?php if ($showEventsSlider) : ?>
    <section class="events py-5 px-3 px-md-5 py-md-7 bg-white">
        <div class="container">
            <h2 class="text-center pb-5">Eventos</h2>
            <div class="events-slider js-events-slider d-lg-flex mb-6">
                <div class="events-slider__images d-none d-lg-block js-events-slider-images"></div>
                <div class="events-slider__slider">
                    <div class="line bg-primary js-line d-none d-lg-block"></div>
                    <div class="events-slider__items js-upcoming-events js-siema-slider"></div>
                    <div class="events-slider__arrows d-flex justify-content-end d-lg-none">
                        <button class="btn arrow arrow--left js-prev me-2" aria-label="prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="btn arrow arrow--left js-next" aria-label="next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="<?php echo get_permalink(get_page_by_path('eventos')); ?>" class="btn btn-white btn-outline-primary rounded-0 border-2 btn-lg my-0 mx-auto">Mostrar mas</a>
            </div>
        </div>
    </section>

    <script id="events-images" type="text/x-handlebars-template">
        {{#each this}}
            <img src="{{ cover.source }}" alt="{{ name }}" class="events-slider__image js-image {{#if @first}}is-active{{/if}}" data-id="{{ id }}" loading="lazy">
        {{/each}}
    </script>

    <script id="events-slider" type="text/x-handlebars-template">
        {{#each this}}
            <div class="slider__item d-lg-flex px-lg-5 py-lg-4 js-item {{#if @first}}is-active{{/if}}" data-id="{{ id }}">
                <h2 class="item__date title-font d-flex flex-column align-items-lg-center text-lg-center me-5">
                    <div class="month">{{ month }}</div>
                    <div class="day">{{ day }}</div>
                </h2>
                <div class="item__content me-5 me-lg-0">
                    <div class="item__title">{{ name }}</div>
                </div>
            </div>
        {{/each}}
    </script>
<?php endif; ?>