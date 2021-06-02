const categories_list = document.getElementById('categories');
const app = document.getElementById('customize-categorias');
const dots = document.getElementById('dots-categorias');

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
                categories_list.appendChild(option);

                const item = document.createElement('div');
                item.setAttribute('class', 'col-12 col-sm-6 col-md-4 col-lg-3');
                app.appendChild(item);

                // url para o curso
                const urlCourse = document.createElement('a');
                urlCourse.setAttribute('class', 'url-curso');
                urlCourse.setAttribute('title', categorias.category_title);
                urlCourse.href = '/cursos/' + categorias.category_slug;

                // card wrapper
                const card = document.createElement('div');
                card.setAttribute('class', 'card');

                // card body
                const cardBody = document.createElement('div');
                cardBody.setAttribute('class', 'card-body p-2');

                // div text
                const text = document.createElement('div');
                text.setAttribute('class', 'text');

                // thumb do curso
                const thumb = document.createElement('div');
                thumb.setAttribute('class', 'card-img-top');
                thumb.setAttribute('style', 'background-image: url("' + categorias.category_image + '")');

                // nome do curso
                const h5 = document.createElement('h5');
                h5.setAttribute('class', 'card-title');
                h5.textContent = categorias.category_title;

                const description = document.createElement('p');
                description.setAttribute('class', 'card-text');
                categorias.category_description = categorias.category_description.substring(0, 70);
                description.textContent = `${categorias.category_description}...`;

                // append
                item.appendChild(card);
                card.appendChild(urlCourse);
                urlCourse.appendChild(thumb);
                urlCourse.appendChild(cardBody);
                cardBody.appendChild(h5);
                cardBody.appendChild(description);
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
