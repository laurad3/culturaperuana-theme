<?php
$showEventsList = get_field('show_events_list');
?>

<?php if ($showEventsList) : ?>
    <section class="events-list alignfull js-events-list mb-6">
        <div class="events-list__wrapper">
            <h2 class="text-center pb-5">Próximos Eventos</h2>
            <div class="event-list event-list--upcoming js-upcoming-events"></div>
            <h2 class="text-center pb-5">Eventos Pasados</h2>
            <div class="event-list event-list--past js-past-events"></div>
        </div>
    </section>

    <script id="events-list" type="text/x-handlebars-template">
        {{#each this}}
            <div class="event d-flex align-items-center py-4 px-9">
                <h2 class="event__date title-font d-flex flex-column align-items-xl-center text-xl-center me-9">
                    <div class="month">{{ month }}</div>
                    <div class="day">{{ day }}</div>
                </h2>
                <div class="event__image pe-9">
                    <img src="{{ cover.source }}" alt="{{ name }}" class="image d-block" loading="lazy">
                </div>
                <div class="event__info">
                    <div class="event__title">{{ name }}</div>
                </div>
            </div>
        {{/each}}
    </script>
<?php endif; ?>