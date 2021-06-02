const categories_list = document.getElementById('categories');
const app = document.getElementById('customize-categorias');
const dots = document.getElementById('dots-categorias');

function removeLoading() {
    $('#wrapper').find('.loading').remove();
}

function loadCourses() {
    var request = new XMLHttpRequest();

    request.open('POST', 'https://www.iped.com.br/api/course/get-categories-courses?token=65cae115cf19a995aae7fbe95c6b68d425844722&category_slug=' + categoria + '', true);

    request.timeout = 15000;

    request.onload = function () {
        let data = JSON.parse(this.response);

        if (request.status >= 200 && request.status < 400) {
            data.CATEGORIES.forEach(categorias => {
                //breadcrumb
                $('.title-categoria-curso').html(categorias.category_title.toUpperCase());

                categorias.category_courses.forEach(cursos => {
                    const item = document.createElement('div');
                    item.setAttribute('class', 'col-12 col-sm-6 col-md-4 col-lg-3');
                    app.appendChild(item);

                    // url para o curso
                    const urlCourse = document.createElement('a');
                    urlCourse.setAttribute('class', 'url-curso');
                    urlCourse.setAttribute('title', cursos.course_title);
                    urlCourse.href = '/cursos/' + categoria + '/' + cursos.course_slug;

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
                    thumb.setAttribute('style', 'background-image: url("' + cursos.course_image + '")');

                    //nome do curso
                    const h5 = document.createElement('h5');
                    h5.setAttribute('class', 'card-title');
                    h5.textContent = cursos.course_title;

                    const description = document.createElement('p');
                    description.setAttribute('class', 'card-text');
                    cursos.course_description = cursos.course_description.substring(0, 70);
                    description.textContent = `${cursos.course_description}...`;

                    //append
                    item.appendChild(card);
                    card.appendChild(urlCourse);
                    urlCourse.appendChild(thumb);
                    urlCourse.appendChild(cardBody);
                    cardBody.appendChild(h5);
                    cardBody.appendChild(description);
                });
            });
        } else {
            console.log('error');
        }
        removeLoading();
    };

    request.ontimeout = function () {
        removeLoading();
    };

    request.send();
}

function loadCategories() {
    fetch('https://www.iped.com.br/api/course/get-categories-courses?token=65cae115cf19a995aae7fbe95c6b68d425844722', {
        method: 'POST',
    })
        .then(response => {
            return response.json()
        })
        .then(data => {
            data.CATEGORIES.forEach(categorias => {
                const option = document.createElement('option');
                option.value = categorias.category_slug;
                option.textContent = categorias.category_title.toUpperCase();

                if (categoria === categorias.category_slug) {
                    option.setAttribute('selected', true);
                }

                categories_list.appendChild(option);
            });
        })
        .catch(err => {
            removeLoading();
            console.log("catch: "+err);
        });
}

function init() {
    loadCategories();
    loadCourses();
}

$(document).ready(function () {
    init();
});
