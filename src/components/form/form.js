const config = {
    selectors: {
        field: '.js-field',
        label: '.js-label',
        input: '.js-input',
    }
}

const fields = document.querySelectorAll(config.selectors.field);

fields.forEach(field => {
    const input = field.querySelector(config.selectors.input);

    input.addEventListener('input', function() {
        const value = input.value;
        const label = field.querySelector(config.selectors.label);

        if (value.length > 0) {
            if (!label.classList.contains('is-valid')) {
                label.classList.add('is-valid');
            }
        }

        if (value <= 0) {
            label.classList.remove('is-valid');
        }
    });
});