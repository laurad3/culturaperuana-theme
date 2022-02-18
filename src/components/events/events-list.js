import axios from 'axios';
import Handlebars from 'handlebars';
import { url, getEvent } from './events-slider';

const config = {
    selectors: {
        eventsList: '.js-events-list',
        upcomingEvents: '.js-upcoming-events',
        pastEvents: '.js-past-events'
    },
    upcomingEvents: [],
    pastEvents: [],
}

const createElements = (events, container) => {
    const source = document.getElementById('events-list');

    if (source) {
        const template = Handlebars.compile(source.innerHTML);
        container.innerHTML = template(events);
    }
};

const setEvents = () => {
    const upcomingEvents = eventsList.querySelector(config.selectors.upcomingEvents);
    const pastEvents = eventsList.querySelector(config.selectors.pastEvents);
    
    createElements(config.upcomingEvents, upcomingEvents);
    createElements(config.pastEvents, pastEvents);
};

const prepareData = (data) => {
    const now = new Date();

    data.map(event => {
        const newEvent = getEvent(event);

        if (now.getTime() < newEvent.date.getTime()) {
            config.upcomingEvents.push(newEvent);
        } else {
            config.pastEvents.push(newEvent);
        }
    });
};

const init = () => {
    axios.get(url).then(response => {
        const { data } = response.data;

        prepareData(data);
        setEvents();
    }).catch(error => {
        console.log(error);
    });
};

const eventsList = document.querySelector(config.selectors.eventsList);

if (eventsList) {
    init();
}
