function selectCategory(event) {
    event.preventDefault();
    let $category = $(event.currentTarget).val();
    if ($category.length > 0) {
        window.location.href = "/cursos/" + $category;
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

$(function () {
    $.fn.button = function (action) {
        if (action === "loading" && this.data("loading-text")) {
            this.data("original-text", this.html())
                .html(this.data("loading-text"))
                .prop("disabled", true);
        }
        if (action === "reset" && this.data("original-text")) {
            this.html(this.data("original-text")).prop("disabled", false);
        }
    };

    const maskBehavior = function (val) {
            return val.replace(/\D/g, "").length === 11
                ? "(00) 00000-0000"
                : "(00) 0000-00009";
        },
        options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            },
        };
    $(".phone-mask").mask(maskBehavior, options);

    $("#categories.select2").select2({
        placeholder: "-- CATEGORIAS --",
        language: "pt-BR",
    });

    $("#categories").on("change", selectCategory);

    $("#customize-categorias").easyPaginate({
        paginateElement: ".category-item",
        elementsPerPage: 12,
    });

    $(".placeholder").on("click", function () {
        $(".search-input").trigger("focus");
    });

    if ($(".search-input").val()) {
        $(".placeholder").hide();
    }

    $(".search-input").on("blur", function () {
        if (!$(".search-input").val()) {
            $(".placeholder").show();
        }
    });

    $(".search-input").on("focus", function () {
        if (!$(".search-input").val()) {
            $(".placeholder").hide();
        }
    });

    $(".search-input").on("input", function () {
        if ($(".search-input").val()) {
            $(".placeholder").hide();
        }
    });

    $(".search-wrapper form").on("submit", doSearch);

    var scroll = new SmoothScroll('a[href*="#"]');

    $(".botaoFooter").on("click", function () {
        var $this = $(this),
            $form = $this.closest("form"),
            isValid = $form[0].reportValidity(),
            formData = $form.serialize();

        if (isValid) {
            $.ajax({
                url: "/ajax/newsletter",
                type: "POST",
                data: formData,
                beforeSend: function () {
                    $this.button("loading");
                },
            })
                .done(function (data) {
                    if (data.status === true) {
                        $this.closest(".subscribe-form").html(`
                        <div class="alert alert-success mb-0" role="alert">
                            ${data.message}
                        </div>`);
                    } else {
                        $this.button("reset");
                        $("#newsletterMessage").html(`
                        <div class="alert alert-danger alert-dismissible fade show mb-0 mt-2" role="alert">
                            Erro ao cadastrar e-mail.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);
                    }
                })
                .fail(function (error) {
                    $this.button("reset");
                    $("#newsletterMessage").html(`
                    <div class="alert alert-danger alert-dismissible fade show mb-0 mt-2" role="alert">
                        Erro ao cadastrar e-mail.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
                });
        }
    });

    $("#contactButton").on("click", function () {
        var $this = $(this),
            $form = $this.closest("form"),
            isValid = $form[0].reportValidity(),
            formData = $form.serialize();

        if (isValid) {
            $.ajax({
                url: "/ajax/contact",
                type: "POST",
                data: formData,
                beforeSend: function () {
                    $this.button("loading");
                },
            })
                .done(function (data) {
                    if (data.status === true) {
                        $this.closest(".form-wrapper")
                            .html(`
                                <div class="alert alert-success mb-0" role="alert">
                                    ${data.message}
                                </div>`);
                    } else {
                        $this.button("reset");
                        grecaptcha.reset();
                        $("#contactMessage")
                            .html(`
                                <div class="alert alert-danger alert-dismissible fade show mb-0 mt-2" role="alert">
                                    Erro ao enviar contato.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>`);
                    }
                })
                .fail(function (error) {
                    $this.button("reset");
                    grecaptcha.reset();
                    $("#contactMessage")
                        .html(`
                            <div class="alert alert-danger alert-dismissible fade show mb-0 mt-2" role="alert">
                                ${error.responseJSON.message}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`);
                });
        }
    });
});
