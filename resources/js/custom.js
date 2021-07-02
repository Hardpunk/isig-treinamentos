function selectCategory(event) {
    event.preventDefault();
    let $category = $(event.currentTarget).val();
    if ($category.length > 0) {
        window.location.href = '/cursos/' + $category;
    }
    return false;
}

function doSearch(e) {
    let $form = $(e.currentTarget);

    if ($form.find('input[name="q"]').val().length > 0) {
        return;
    }
    e.preventDefault();
}

$(function() {
    const maskBehavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
        };
    $('.phone-mask').mask(maskBehavior, options);

    $('#categories.select2').select2({
        placeholder: '-- CATEGORIAS --',
        language: 'pt-BR'
    });

    $('#categories').on('change', selectCategory);

    $('#customize-categorias').easyPaginate({
        paginateElement: '.category-item',
        elementsPerPage: 12,
    });

    $('.placeholder').on('click', function() {
        $('.search-input').trigger('focus');
    });

    if ($('.search-input').val()) {
        $('.placeholder').hide();
    }

    $('.search-input').on('blur', function() {
        if (!$('.search-input').val()) {
            $('.placeholder').show();
        }
    });

    $('.search-input').on('focus', function() {
        if (!$('.search-input').val()) {
            $('.placeholder').hide();
        }
    });

    $('.search-input').on('input', function() {
        if ($('.search-input').val()) {
            $('.placeholder').hide();
        }
    });

    $('.search-wrapper form').on('submit', doSearch);

    var scroll = new SmoothScroll('a[href*="#"]');
});
