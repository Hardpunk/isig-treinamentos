(function () {
    var options = {
        onKeyPress: function (cpfcnpj, e, field, options) {
            var masks = ['000.000.000-009', '00.000.000/0000-00'];
            var mask = cpfcnpj.length > 14 ? masks[1] : masks[0];
            $('.cpf_cnpj').mask(mask, options);
        }
    };

    const maskBehavior = function (val) {
            return val.replace(/\D/g, "").length === 11
                ? "(00) 00000-0000"
                : "(00) 0000-00009";
        },
        optionsPhone = {
            onKeyPress: function (val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            },
        };

    var slug = function (str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = 'ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;';
        var to = 'aaaaaeeeeeiiiiooooouuuunc------';
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str
            .replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    };

    function copyText(e) {
        e.preventDefault();

        let text = $(this).attr('href');
        navigator.clipboard.writeText(text);

        toastr.options.preventDuplicates = true;
        toastr.success('Link copiado com sucesso!');
    }

    $(function () {
        $('.number').mask('00');
        $('.number-infinite').mask('0#');
        $('.number-percent').mask('00.00', {reverse: true});

        $('.money').maskMoney({
            allowZero: true,
            allowEmpty: true,
            prefix: '',
            thousands: '.',
            decimal: ',',
            affixesStay: true
        });

        $('#slug').stringToSlug({
            setEvents: 'blur',
            callback: function (text) {
                $('#slug').val(text);
            }
        });

        $('.cpf_cnpj').mask('000.000.000-009', options);
        $('.cpf').mask('000.000.000-00');
        $('.cnpj').mask('00.000.000/0000-00');
        $('.phone-mask').mask(maskBehavior, optionsPhone);
    });

    $(document).on('click', 'a.copy', copyText);
})();
