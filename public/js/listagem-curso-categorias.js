const categories_list = document.getElementById('categories');

const fetchWithTimeout = (uri, options = {}, time = 5000) => {
    const controller = new AbortController();
    const config = { ...options, signal: controller.signal };
    const timeout = setTimeout(() => {
        controller.abort()
    }, time);
    return fetch(uri, config)
        .then(response => {
            if (!response.ok) {
                throw new Error(`${response.status}: ${response.statusText}`)
            }
            return response
        })
        .catch(error => {
            if (error.name === 'AbortError') {
                throw new Error('Response timed out')
            }
            throw new Error(error.message)
        })
};

function removeLoading() {
    $('#wrapper').find('.loading').remove();
}

function init() {
    fetchWithTimeout('https://www.iped.com.br/api/course/get-categories-courses?token=65cae115cf19a995aae7fbe95c6b68d425844722', {
        method: 'POST',
    }, 15000)
        .then(response => {
            return response.json()
        })
        .then(data => {
            data.CATEGORIES.forEach(categorias => {
                const option = document.createElement('option');
                option.value = categorias.category_slug;
                option.textContent = categorias.category_title.toUpperCase();

                if (categoria === categorias.category_slug) {
                    $('.title-categoria-curso').html(categorias.category_title.toUpperCase());
                    option.setAttribute('selected', true);
                }

                categories_list.appendChild(option);
            });
            removeLoading();
        })
        .catch(err => {
            removeLoading();
            console.log("catch: "+err);
        });
}

$(document).ready(function() {
    init();
});
