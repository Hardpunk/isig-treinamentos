! function() {
    "use strict";
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var e = document.createElement("style");
        e.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")), document.querySelector("head").appendChild(e)
    }
}(), eval(function(e, t, n, a, o, i) {
        if (o = function(e) {
                return (e < t ? "" : o(parseInt(e / t))) + ((e %= t) > 35 ? String.fromCharCode(e + 29) : e.toString(36))
            }, !"".replace(/^/, String)) {
            for (; n--;) i[o(n)] = a[n] || o(n);
            a = [function(e) {
                return i[e]
            }], o = function() {
                return "\\w+"
            }, n = 1
        }
        for (; n--;) a[n] && (e = e.replace(new RegExp("\\b" + o(n) + "\\b", "g"), a[n]));
        return e
    }('(5($){$.K.w=5(b,c){2(3.7==0)6;2(14 b==\'15\'){c=(14 c==\'15\')?c:b;6 3.L(5(){2(3.M){3.N();3.M(b,c)}v 2(3.17){4 a=3.17();a.1x(O);a.1y(\'P\',c);a.18(\'P\',b);a.1z()}})}v{2(3[0].M){b=3[0].1A;c=3[0].1B}v 2(Q.R&&Q.R.19){4 d=Q.R.19();b=0-d.1C().18(\'P\',-1D);c=b+d.1E.7}6{t:b,S:c}}};4 q={\'9\':"[0-9]",\'a\':"[A-T-z]",\'*\':"[A-T-1a-9]"};$.1b={1F:5(c,r){q[c]=r}};$.K.U=5(){6 3.1G("U")};$.K.1b=5(m,n){n=$.1H({C:"1I",V:B},n);4 o=D W("^"+$.1J(m.1c(""),5(c,i){6 q[c]||((/[A-T-1a-9]/.1d(c)?"":"\\\\")+c)}).1e(\'\')+"$");6 3.L(5(){4 d=$(3);4 f=D 1f(m.7);4 g=D 1f(m.7);4 h=u;4 j=u;4 l=B;$.L(m.1c(""),5(i,c){g[i]=(q[c]==B);f[i]=g[i]?c:n.C;2(!g[i]&&l==B)l=i});5 X(){x();y();1g(5(){$(d[0]).w(h?m.7:l)},0)};5 Y(e){4 a=$(3).w();4 k=e.Z;j=(k<16||(k>16&&k<10)||(k>10&&k<1h));2((a.t-a.S)!=0&&(!j||k==8||k==1i)){E(a.t,a.S)}2(k==8){11(a.t-->=0){2(!g[a.t]){f[a.t]=n.C;2($.F.1K){s=y();d.G(s.1j(0,a.t)+" "+s.1j(a.t));$(3).w(a.t+1)}v{y();$(3).w(1k.1l(l,a.t))}6 u}}}v 2(k==1i){E(a.t,a.t+1);y();$(3).w(1k.1l(l,a.t));6 u}v 2(k==1L){E(0,m.7);y();$(3).w(l);6 u}};5 12(e){2(j){j=u;6(e.Z==8)?u:B}e=e||1M.1N;4 k=e.1O||e.Z||e.1P;4 a=$(3).w();2(e.1Q||e.1R){6 O}v 2((k>=1h&&k<=1S)||k==10||k>1T){4 p=13(a.t-1);2(p<m.7){2(D W(q[m.H(p)]).1d(1m.1n(k))){f[p]=1m.1n(k);y();4 b=13(p);$(3).w(b);2(n.V&&b==m.7)n.V.1U(d)}}}6 u};5 E(a,b){1o(4 i=a;i<b&&i<m.7;i++){2(!g[i])f[i]=n.C}};5 y(){6 d.G(f.1e(\'\')).G()};5 x(){4 a=d.G();4 b=0;1o(4 i=0;i<m.7;i++){2(!g[i]){f[i]=n.C;11(b++<a.7){4 c=D W(q[m.H(i)]);2(a.H(b-1).1p(c)){f[i]=a.H(b-1);1V}}}}4 s=y();2(!s.1p(o)){d.G("");E(0,m.7);h=u}v h=O};5 13(a){11(++a<m.7){2(!g[a])6 a}6 m.7};d.1W("U",5(){d.I("N",X);d.I("1q",x);d.I("1r",Y);d.I("1s",12);2($.F.1t)3.1u=B;v 2($.F.1v)3.1X(\'1w\',x,u)});d.J("N",X);d.J("1q",x);d.J("1r",Y);d.J("1s",12);2($.F.1t)3.1u=5(){1g(x,0)};v 2($.F.1v)3.1Y(\'1w\',x,u);x()})}})(1Z);', 62, 124, "||if|this|var|function|return|length||||||||||||||||||||||begin|false|else|caret|checkVal|writeBuffer|||null|placeholder|new|clearBuffer|browser|val|charAt|unbind|bind|fn|each|setSelectionRange|focus|true|character|document|selection|end|Za|unmask|completed|RegExp|focusEvent|keydownEvent|keyCode|32|while|keypressEvent|seekNext|typeof|number||createTextRange|moveStart|createRange|z0|mask|split|test|join|Array|setTimeout|41|46|substring|Math|max|String|fromCharCode|for|match|blur|keydown|keypress|msie|onpaste|mozilla|input|collapse|moveEnd|select|selectionStart|selectionEnd|duplicate|100000|text|addPlaceholder|trigger|extend|_|map|opera|27|window|event|charCode|which|ctrlKey|altKey|122|186|call|break|one|removeEventListener|addEventListener|jQuery".split("|"), 0, {})),
    function(e) {
        e.fn.maskMoney = function(t) {
            return t = e.extend({
                symbol: "US$",
                showSymbol: !1,
                symbolStay: !1,
                thousands: ",",
                decimal: ".",
                precision: 2,
                defaultZero: !0,
                allowZero: !1,
                allowNegative: !1
            }, t), this.each(function() {
                function n() {
                    g = !0
                }

                function a() {
                    g = !1
                }

                function o(t) {
                    t = t || window.event;
                    var o = t.charCode || t.keyCode || t.which;
                    if (void 0 == o) return !1;
                    if (p.attr("readonly") && 13 != o && 9 != o) return !1;
                    if (o < 48 || o > 57) return 45 == o ? (n(), p.val(h(p)), !1) : 43 == o ? (n(), p.val(p.val().replace("-", "")), !1) : 13 == o || 9 == o ? (g && (a(), e(this).change()), !0) : 37 == o || 39 == o || (r(t), !0);
                    if (p.val().length >= p.attr("maxlength")) return !1;
                    r(t);
                    var i = String.fromCharCode(o),
                        s = p.get(0),
                        l = p.getInputSelection(s),
                        d = l.start,
                        u = l.end;
                    return s.value = s.value.substring(0, d) + i + s.value.substring(u, s.value.length), c(s, d + 1), n(), !1
                }

                function i(t) {
                    t = t || window.event;
                    var o = t.charCode || t.keyCode || t.which;
                    if (void 0 == o) return !1;
                    if (p.attr("readonly") && 13 != o && 9 != o) return !1;
                    var i = p.get(0),
                        s = p.getInputSelection(i),
                        l = s.start,
                        d = s.end;
                    return 8 == o ? (r(t), l == d ? (i.value = i.value.substring(0, l - 1) + i.value.substring(d, i.value.length), l -= 1) : i.value = i.value.substring(0, l) + i.value.substring(d, i.value.length), c(i, l), n(), !1) : 9 == o ? (g && (e(this).change(), a()), !0) : 46 != o && 63272 != o || (r(t), i.selectionStart == i.selectionEnd ? i.value = i.value.substring(0, l) + i.value.substring(d + 1, i.value.length) : i.value = i.value.substring(0, l) + i.value.substring(d, i.value.length), c(i, l), n(), !1)
                }

                function s(e) {
                    var n = f();
                    if (p.val() == n ? p.val("") : "" == p.val() && t.defaultZero ? p.val(v(n)) : p.val(v(p.val())), this.createTextRange) {
                        var a = this.createTextRange();
                        a.collapse(!1), a.select()
                    }
                }

                function l(n) {
                    e.browser.msie && o(n), "" == p.val() || p.val() == v(f()) || p.val() == t.symbol ? t.allowZero ? t.symbolStay ? p.val(v(f())) : p.val(f()) : p.val("") : t.symbolStay ? t.symbolStay && p.val() == t.symbol && p.val(v(f())) : p.val(p.val().replace(t.symbol, ""))
                }

                function r(e) {
                    e.preventDefault ? e.preventDefault() : e.returnValue = !1
                }

                function c(e, t) {
                    var n = p.val().length;
                    p.val(d(e.value));
                    var a = p.val().length;
                    t -= n - a, p.setCursorPosition(t)
                }

                function d(e) {
                    e = e.replace(t.symbol, "");
                    var n = "0123456789",
                        a = e.length,
                        o = "",
                        i = "",
                        s = "";
                    if (0 != a && "-" == e.charAt(0) && (e = e.replace("-", ""), t.allowNegative && (s = "-")), 0 == a) {
                        if (!t.defaultZero) return i;
                        i = "0.00"
                    }
                    for (var l = 0; l < a && ("0" == e.charAt(l) || e.charAt(l) == t.decimal); l++);
                    for (; l < a; l++) n.indexOf(e.charAt(l)) != -1 && (o += e.charAt(l));
                    var r = parseFloat(o);
                    r = isNaN(r) ? 0 : r / Math.pow(10, t.precision), i = r.toFixed(t.precision), l = 0 == t.precision ? 0 : 1;
                    var c, d = (i = i.split("."))[l].substr(0, t.precision);
                    for (c = (i = i[0]).length;
                        (c -= 3) >= 1;) i = i.substr(0, c) + t.thousands + i.substr(c);
                    return v(t.precision > 0 ? s + i + t.decimal + d + Array(t.precision + 1 - d.length).join(0) : s + i)
                }

                function u() {
                    var e = p.val();
                    p.val(d(e))
                }

                function f() {
                    var e = parseFloat("0") / Math.pow(10, t.precision);
                    return e.toFixed(t.precision).replace(new RegExp("\\.", "g"), t.decimal)
                }

                function v(e) {
                    return t.showSymbol && e.substr(0, t.symbol.length) != t.symbol ? t.symbol + e : e
                }

                function h(e) {
                    if (t.allowNegative) {
                        e.val();
                        return "" != e.val() && "-" == e.val().charAt(0) ? e.val().replace("-", "") : "-" + e.val()
                    }
                    return e.val()
                }
                var p = e(this),
                    g = !1;
                p.bind("keypress.maskMoney", o), p.bind("keydown.maskMoney", i), p.bind("blur.maskMoney", l), p.bind("focus.maskMoney", s), p.bind("maskAppend", u), p.one("unmaskMoney", function() {
                    p.unbind(".maskMoney"), e.browser.msie ? this.onpaste = null : e.browser.mozilla && this.removeEventListener("input", l, !1)
                })
            })
        }, e.fn.unmaskMoney = function() {
            return this.trigger("unmaskMoney")
        }, e.fn.maskAppend = function() {
            return this.trigger("maskAppend")
        }, e.fn.setCursorPosition = function(e) {
            return this.each(function(t, n) {
                if (n.setSelectionRange) n.focus(), n.setSelectionRange(e, e);
                else if (n.createTextRange) {
                    var a = n.createTextRange();
                    a.collapse(!0), a.moveEnd("character", e), a.moveStart("character", e), a.select()
                }
            }), this
        }, e.fn.getInputSelection = function(e) {
            var t, n, a, o, i, s = 0,
                l = 0;
            return "number" == typeof e.selectionStart && "number" == typeof e.selectionEnd ? (s = e.selectionStart, l = e.selectionEnd) : (n = document.selection.createRange(), n && n.parentElement() == e && (o = e.value.length, t = e.value.replace(/\r\n/g, "\n"), a = e.createTextRange(), a.moveToBookmark(n.getBookmark()), i = e.createTextRange(), i.collapse(!1), a.compareEndPoints("StartToEnd", i) > -1 ? s = l = o : (s = -a.moveStart("character", -o), s += t.slice(0, s).split("\n").length - 1, a.compareEndPoints("EndToEnd", i) > -1 ? l = o : (l = -a.moveEnd("character", -o), l += t.slice(0, l).split("\n").length - 1)))), {
                start: s,
                end: l
            }
        }
    }(jQuery), $(document).ready(function() {
        var e = $(".icon-top-heart span").width(),
            t = $(".icon-top-heart span").height(),
            n = $(document).width(),
            a = $(document).height();
        $(".overlay").width(n), $(".overlay").height(a), $(".icons-top span").css({
            "margin-left": "-" + e / 2 + "px",
            "margin-top": "-" + t / 2 + "px"
        }), $(".btn-slide.btn-login").on("click", function(e) {
            e.preventDefault(), $(".admin-menu-top .btn-slide i").toggleClass("fa-caret-down fa-caret-up"), $("#slide-panel").slideToggle("slow", function() {})
        }), $(".btn-slide.signin").on("click", function(e) {
            e.preventDefault(), $(".tela-overlay").fadeOut("fast"), $(".overlay").fadeIn("fast"), $(".login").fadeIn("fast", function() {
                $(".close-menu").on("click", function(e) {
                    $(".overlay").fadeOut("fast"), $(".tela-overlay").fadeOut("fast")
                }), $(".overlay").on("click", function(e) {
                    $(this).fadeOut("fast"), $(".tela-overlay").fadeOut("fast")
                })
            })
        }), $(".btn-slide.signup").on("click", function(e) {
            e.preventDefault(), $(".tela-overlay").fadeOut("fast"), $(".overlay").fadeIn("fast"), $(".sign-up").fadeIn("fast", function() {
                $(".close-menu").on("click", function(e) {
                    $(".overlay").fadeOut("fast"), $(".tela-overlay").fadeOut("fast")
                }), $(".overlay").on("click", function(e) {
                    $(this).fadeOut("fast"), $(".tela-overlay").fadeOut("fast")
                })
            })
        }), $(".icon-top-cart").on("click", function(e) {
            /*e.preventDefault(), $(".overlay").fadeIn("fast"), $(".carrinho").fadeIn("fast", function() {
                $(".close").on("click", function(e) {
                    $(".overlay").fadeOut("fast"), $(".carrinho").fadeOut("fast")
                }), $(".overlay").on("click", function(e) {
                    $(this).fadeOut("fast"), $(".carrinho").fadeOut("fast")
                })
            })*/
        }), $(".icon-top-cart").on("click", function(e) {
            /*e.preventDefault(), $(".overlay").fadeIn("fast"), $(".carrinho").fadeIn("fast", function() {
                $(".close").on("click", function(e) {
                    $(".overlay").fadeOut("fast"), $(".carrinho").fadeOut("fast")
                }), $(".overlay").on("click", function(e) {
                    $(this).fadeOut("fast"), $(".carrinho").fadeOut("fast")
                })
            })*/
        }),
        $(".carousel-more-products").slick({
            dots: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 5,
            centerMode: false,
            variableWidth: false,
            lazyLoad: "ondemand",
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0,
                    dots: !0
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        }), 
        $(".carousel-photos").slick({
            dots: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 7,
            centerMode: !1,
            variableWidth: !1,
            lazyLoad: "ondemand",
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0,
                    dots: !0
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        }), $(".carousel-purse").slick({
            dots: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 7,
            centerMode: !0,
            variableWidth: !0,
            lazyLoad: "ondemand",
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0,
                    dots: !0
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        }), $(".carousel-minihighlights").slick({
            dots: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 7,
            centerMode: !1,
            variableWidth: !1,
            lazyLoad: "ondemand",
            prevArrow: !1,
            nextArrow: '<a class="btn btn-warning btn-caret" href="#"><i class="fa fa-caret-right"></i></a>',
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0,
                    dots: !0
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        }), $(".carousel-highlights").slick({
            dots: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            centerMode: !0,
            variableWidth: !0,
            lazyLoad: "ondemand",
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0,
                    dots: !0
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        }), $(".carousel-artesaos").slick({
            dots: !1,
            infinite: false,
            speed: 300,
            slidesToShow: 9,
            slidesToScroll: 9,
            centerMode: false,
            variableWidth: false,
            lazyLoad: "ondemand",
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0,
                    dots: !0
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 320,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        }), $(".internas .search-sm i.fa-search").on("click", function() {
            $(".internas .search-sm .panel").fadeIn("fast"), $(".internas .search-sm .fa-times").on("click", function() {
                $(".internas .search-sm .panel").fadeOut("fast")
            })
        })
    });