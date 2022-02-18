import Siema from 'siema';

const gallery = document.querySelector('.siema .blocks-gallery-grid');

if (gallery) {
    const mySiema = new Siema({
        selector: gallery,
    });
}