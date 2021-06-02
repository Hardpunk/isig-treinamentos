window.customNotificationItens = JSON.parse("[\n \u0022Deissy\u0022,\n \u0022Maicon\u0022,\n \u0022Helena\u0022,\n \u0022Priscila\u0022,\n \u0022Tiglatshe\u0022,\n \u0022Tiglatshe\u0022,\n \u0022Tha\u00eds\u0022,\n \u0022Anderson\u0022,\n \u0022C\u00e1tia\u0022,\n \u0022Wagner\u0022,\n \u0022Inovar\u0022,\n \u0022Regiane\u0022,\n \u0022Victor\u0022,\n \u0022Diego\u0022,\n \u0022J\u00falia\u0022,\n \u0022Luciana\u0022,\n \u0022Jose\u0022,\n \u0022Dafne\u0022,\n \u0022Luis\u0022,\n \u0022Renato\u0022,\n \u0022Tiago\u0022,\n \u0022Vict\u00f3ria\u0022,\n \u0022Maiara\u0022,\n \u0022Guilherme\u0022,\n \u0022Luiza\u0022,\n \u0022Carlos\u0022,\n \u0022Vinicius\u0022,\n \u0022Marcio\u0022,\n \u0022Cleber\u0022,\n \u0022Fabiano\u0022,\n \u0022Socrates\u0022,\n \u0022Bruna\u0022,\n \u0022Igor\u0022,\n \u0022Gabriel\u0022,\n \u0022Ricardo\u0022,\n \u0022Rodrigo\u0022,\n \u0022Roberth\u0022,\n \u0022Andreza\u0022,\n \u0022Leonardo\u0022,\n \u0022Rafael\u0022,\n \u0022Liziane\u0022,\n \u0022Ricardo\u0022,\n \u0022Marcelo\u0022,\n \u0022Vitor\u0022,\n \u0022Natan\u0022,\n \u0022C\u00e1ssio\u0022,\n \u0022Tamara\u0022,\n \u0022Marcelo\u0022,\n \u0022Roberto\u0022,\n \u0022Motivado\u0022,\n \u0022Camila\u0022,\n \u0022Gisleide\u0022,\n \u0022Louren\u00e7o\u0022,\n \u0022Daniel\u0022,\n \u0022Meysson\u0022,\n \u0022Rafael\u0022,\n \u0022Andre\u0022,\n \u0022Andr\u00e9\u0022,\n \u0022Lucas\u0022,\n \u0022Maria\u0022,\n \u0022Leticia\u0022,\n \u0022George\u0022,\n \u0022Let\u00edcia\u0022,\n \u0022Maickow\u0022,\n \u0022Bruna\u0022,\n \u0022Regina\u0022,\n \u0022Vivianne\u0022,\n \u0022Rafael\u0022,\n \u0022F\u00e1bio\u0022,\n \u0022Karina\u0022,\n \u0022Maritme\u0022,\n \u0022Leonardo\u0022,\n \u0022Igor\u0022,\n \u0022Diogo\u0022,\n \u0022Larissa\u0022,\n \u0022Janur\u0022,\n \u0022Guilherme\u0022,\n \u0022Rafael\u0022,\n \u0022Tayroni\u0022,\n \u0022Pedro\u0022,\n \u0022Sirlene\u0022,\n \u0022Omar\u0022,\n \u0022Daniel\u0022,\n \u0022Priscila\u0022,\n \u0022Priscila\u0022,\n \u0022Marina\u0022,\n \u0022Vinicius\u0022,\n \u0022Leonardo\u0022,\n \u0022Carla\u0022,\n \u0022Ricardo\u0022,\n \u0022Samir\u0022,\n \u0022Vander\u0022,\n \u0022Luciana\u0022,\n \u0022Jaqueline\u0022,\n \u0022Priscila\u0022,\n \u0022Alinne\u0022 \n]");

window.customNotificationDescriptions = JSON.parse("[\n \u0022Clique e Garanta o seu Tamb\u00e9m!\u0022,\n \u0022Garanta o seu Tamb\u00e9m!\u0022,\n \u0022Corra e Aproveite a Promo\u00e7\u00e3o!\u0022 \n]");

window.customCommonsFunctions = {
    fadeIn: function (e, t, n) {
        void 0 === t && (t = 500),
            e.css("transition", "opacity " + t + "ms ease-in-out"),
            e.css("opacity", "0"),
            e.css("display", "block"),
            e.one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function () {
                $(this).css("display"),
                void 0 !== n && n()
            }),
            setTimeout(function () {
                e.css("opacity", "1")
            }, 50)
    },
    fadeOut: function (e, t, n) {
        void 0 === t && (t = 500),
            e.css("transition", "opacity " + t + "ms ease-in-out"),
            e.css("opacity", "0"),
            e.one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function () {
                $(this).css("display", "none"),
                    $(this).css("display"),
                void 0 !== n && n()
            })
    },
    addLoaderToButton: function (e) {
        actualWidth = e.css("width"),
            e.css("width", actualWidth),
            e.attr("type", "button"),
            e.addClass("btn-loader"),
            e.html('<i class="fas fa-redo-alt"></i>')
    },
    removeLoaderFromButton: function (e, t) {
        e.removeClass("btn-loader"),
            e.html(t)
    },
    randomDescription: function () {
        let array = customNotificationDescriptions;
        return array[Math.floor(Math.random() * array.length)];
    },
    randomTitle: function (c) {
        const q = randomNumber(1, 7),
            n = randomNumber(5, 10);
        let mensagens = JSON.parse("[\n \u0022" + n + " novas pessoas compraram o Plano Premium nos \u00faltimos 50 minutos.\u0022,\n \u0022" + c + " acabou de comprar Plano Vip.\u0022,\n \u0022" + c + " acabou de comprar Plano Mensal.\u0022,\n \u0022" + c + " acabou de comprar Plano Premium.\u0022,\n \u0022" + c + " acabou de comprar Plano Premium.\u0022,\n \u0022" + c + " acabou de comprar Plano Vip.\u0022,\n \u0022" + c + " acabou de comprar Plano Mensal.\u0022,\n \u0022" + c + " acabou de comprar Plano Premium.\u0022,\n \u0022" + c + " acabou de comprar Plano Vip.\u0022,\n \u0022" + c + " acabou de comprar Plano Premium.\u0022,\n \u0022" + c + " acabou de comprar Plano Premium.\u0022,\n \u0022" + c + " acabou de comprar Plano Mensal.\u0022,\n \u0022" + c + " est\u00e1 comprando agora Plano Premium\u0022,\n \u0022" + c + " acabou de comprar Plano Vip.\u0022,\n \u0022" + n + " novas pessoas compraram nos \u00faltimos 30 minutos.\u0022,\n \u0022" + c + " acabou de comprar Plano Premium.\u0022,\n \u0022" + n + " novas pessoas compraram nos \u00faltimos 40 minutos.\u0022 \n]");
        return mensagens[Math.floor(Math.random() * mensagens.length)];
    }
};

window.customNotification = {
    show: function (e) {
        $.notify({}, {
            element: "body",
            position: null,
            type: "info",
            allow_dismiss: !0,
            newest_on_top: !1,
            showProgressbar: !1,
            placement: {
                from: "bottom",
                align: "left"
            },
            offset: {
                x: 10,
                y: 10
            },
            spacing: 10,
            z_index: 1031,
            delay: 8e3,
            timer: 1e3,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated bounceInUp",
                exit: "animated fadeOut"
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template: '<div data-notify="container" class="col-11 col-sm-3 notification alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><div class="row align-items-center"><div class="col-3"><div class="nf-photo"><img src="https://speedcursos.com.br/images/favicon/' + e.photo + '.png" class="img-circle img-fluid"></div></div><div class="col-9 pl-0"><div class="nf-content"><div class="nf-title">' + e.title + '</div> <div class="nf-message">' + e.description + '</div></div></div></div></div>'
        })
    },
    createTimeout: function (e, t) {
        setTimeout(function () {
            var t = {'nome': customNotificationItens[e]};
            t.photo = "speed-favicon",
                t.description = customCommonsFunctions.randomDescription(),
                t.title = customCommonsFunctions.randomTitle(t.nome);
            customNotification.show(t),
                e++,
            e === customNotificationItens.length && (e = 0),
                customNotification.createTimeout(e, randomNumber())
        }, t)
    },
    shuffle: function () {
        for (var e = customNotificationItens.length - 1; e > 0; e--) {
            var t = Math.floor(Math.random() * (e + 1))
                , n = customNotificationItens[e];
            customNotificationItens[e] = customNotificationItens[t],
                customNotificationItens[t] = n
        }
    }
};

function randomNumber(min = 12e3, max = 2e4) {
    return Math.round(Math.random() * (max - min + 1) + min);
}


$(document).on("click", ".notification.alert", function () {
    $.smoothScroll({
        scrollTarget: '#planos',
        speed: 'auto',
        preventDefault: true
    });
    return false;
});

$(document).ready(function() {
    customNotification.shuffle();
    customNotification.createTimeout(0, 5e3);
});