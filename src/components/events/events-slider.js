import axios from 'axios';
import Handlebars from 'handlebars';
import Siema from 'siema';

const config = {
    selectors: {
        eventsSlider: '.js-events-slider',
        eventsSliderImages: '.js-events-slider-images',
        upcomingEvents: '.js-upcoming-events',
        line: '.js-line',
        item: '.js-item',
        image: '.js-image',
        siemaSlider: '.js-siema-slider',
        next: '.js-next',
        prev: '.js-prev',
    },
    pageId: '278035062213544',
    accessToken: FB.ACCESS_TOKEN,
    fields: [
        'id',
        'description',
        'name',
        'place',
        'start_time',
        'cover',
        'is_online',
    ],
    upcomingEvents: [],
    pastEvents: [],
    desktop: '992',
};

const url = `https://graph.facebook.com/${config.pageId}/events?fields=${config.fields}&access_token=${config.accessToken}`;

const clearActive = () => {
    const items = eventsSlider.querySelectorAll(config.selectors.item);
    const images = eventsSlider.querySelectorAll(config.selectors.image);

    items.forEach(item => {
        item.classList.remove('is-active');
    });

    images.forEach(image => {
        image.classList.remove('is-active');
    });
};

const getEvent = (event) => {
    const { id, description, name, place, cover, is_online } = event;
    const date = new Date(event.start_time);

    const newEvent = {
        id,
        description,
        name,
        place,
        cover,
        is_online,
        date,
        month: date.getDate(),
        day: date.toLocaleString('default', { month: 'short' }),
    }

    return newEvent;
};

const prepareData = (data) => {
    const now = new Date();

    data.map(event => {
        const newEvent = getEvent(event);

        // if (now.getTime() < newEvent.date.getTime()) {
            config.upcomingEvents.push(newEvent);
        // } else {
            // config.pastEvents.push(newEvent);
        // }
    });
};

const createElements = (events) => {
    const imageSlider = eventsSlider.querySelector(config.selectors.eventsSliderImages);
    const upcomingEvents = eventsSlider.querySelector(config.selectors.upcomingEvents);

    const sourceImages = document.getElementById('events-images');
    const source = document.getElementById('events-slider');

    if (source && sourceImages) {
        const imagesTemplate = Handlebars.compile(sourceImages.innerHTML);
        const template = Handlebars.compile(source.innerHTML);

        imageSlider.innerHTML = imagesTemplate(events);
        upcomingEvents.innerHTML = template(events);
    }
};

const setEvents = () => {
    createElements(config.upcomingEvents);
};

const initSiema = () => {
    const siemaSlider = eventsSlider.querySelector(config.selectors.siemaSlider);
    const items = eventsSlider.querySelectorAll(config.selectors.item);
    const next = eventsSlider.querySelector(config.selectors.next);
    const prev = eventsSlider.querySelector(config.selectors.prev);

    if (items.length > 1) {
        const mySiema = new Siema({
            selector: siemaSlider,
            perPage: 1.5,
            draggable: false,
            onChange: function() {
                const currentSlide = Math.round(this.currentSlide);

                clearActive();
                items[currentSlide].classList.add('is-active');
            }
        });

        next.addEventListener('click', () => mySiema.next());
        prev.addEventListener('click', () => mySiema.prev());
    }
};

const initEventsSlider = () => {
    const items = eventsSlider.querySelectorAll(config.selectors.item);
    const line = eventsSlider.querySelector(config.selectors.line);

    if (items.length > 1) {
        items.forEach(item => {
            item.addEventListener('mouseenter', el => {
                clearActive();
                const id = item.getAttribute('data-id');
                const image = eventsSlider.querySelector(`${config.selectors.image}[data-id="${id}"]`);
                
                if (image) {
                    image.classList.add('is-active');
                    item.classList.add('is-active');
                    line.style.top = `${item.offsetTop}px`;
                }
            });
        })
    }
};

const init = () => {
    const ww = window.innerWidth;

    // limit results to 2
    axios.get(`${url}&limit=2`).then(response => {
        console.log(response);
        const { data } = response.data;

        prepareData(data);
        setEvents();

        if (ww < config.desktop) {
            initSiema();
        } else {
            initEventsSlider();
        }
    }).catch(error => {
        console.log(error);
    });
};

const eventsSlider = document.querySelector(config.selectors.eventsSlider);

if (eventsSlider) {
    init();
}

export { url, getEvent };