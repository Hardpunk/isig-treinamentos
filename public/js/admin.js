/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/painel.js":
/*!********************************!*\
  !*** ./resources/js/painel.js ***!
  \********************************/
/***/ (() => {

(function () {
  var options = {
    onKeyPress: function onKeyPress(cpfcnpj, e, field, options) {
      var masks = ['000.000.000-009', '00.000.000/0000-00'];
      var mask = cpfcnpj.length > 14 ? masks[1] : masks[0];
      $('.cpf_cnpj').mask(mask, options);
    }
  };

  var slug = function slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim

    str = str.toLowerCase(); // remove accents, swap ñ for n, etc

    var from = 'ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;';
    var to = 'aaaaaeeeeeiiiiooooouuuunc------';

    for (var i = 0, l = from.length; i < l; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

    return str;
  };

  function copyText(e) {
    e.preventDefault();
    var text = $(this).attr('href');
    navigator.clipboard.writeText(text);
    toastr.options.preventDuplicates = true;
    toastr.success('Link copiado com sucesso!');
  }

  $(function () {
    $('.number').mask('00');
    $('.number-infinite').mask('0#');
    $('.number-percent').mask('00.00', {
      reverse: true
    });
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
      callback: function callback(text) {
        $('#slug').val(text);
      }
    });
    $('.cpf_cnpj').mask('000.000.000-009', options);
    $('.cpf').mask('000.000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');
  });
  $(document).on('click', 'a.copy', copyText);
})();

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
__webpack_require__(/*! ./painel.js */ "./resources/js/painel.js");
})();

/******/ })()
;