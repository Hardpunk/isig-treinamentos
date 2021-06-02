"use strict";
//$2a$08$MTI4NDYyMDgxOTVjNWRlYuPUWIx7KvFWVHmv2qM.qHzIgjeAP3qrC
var url = $('.list-quiz').data('tip-url'), idQuestion, counter = 1;

function showWindow(url) {

	var lar_janela = window.innerWidth;
	var alt_janela = window.innerHeight;

	console.log(alt_janela);
	window.open(url, "_blank", "toolbar=false, scrollbars=false,resizable=false, top=" + (200) + ", left=" + (300) + ", width=500, height=300");
	document.onclick = null;
	// anulando na próxima execução.
}

function initializeSelect2(selectElementObj) {
	selectElementObj.select2({
		placeholder: 'Qual o tipo do seu evento?',
		width: '100%'
	});
}
// Carrega os ceps dos correios
$('#zipcode').on('blur', function() {
	var cep = $(this).val();
	if (!$(this).hasClass('active')) {
		$.ajax({
			type : "POST",
			url : location.protocol + '//' + window.location.hostname + "/ajax/cep",
			dataType : "json",
			data : {
				'cep' : cep
			},
			cache : false
		}).done(function(data) {
			if (data !== false) {
				if (data.resultado == 1) {
					var logradouro = data.logradouro.split(' - ');
					$("#state option[value='" + data.uf + "']").attr("selected", true);
					$('#address').val(data.tipo_logradouro + " " + logradouro[0]);
					$('#district').val(data.bairro);
					$('#city').val(data.cidade);
					$('#state').val(data.uf);
					$('#state').val(data.uf).trigger('change.select2');
					$('#number').focus();
					$('.ajax-loader').hide();
				}
			}
		});
	}
});
$(document).on('click', '.video-home-play', function(){
	var url = $(this).data('url');
	$('.triple-video iframe').attr('src', url + '?autoplay=1');
});
$('.change-module').on('change', function(){
	var url = $(this).data('url'), id = $(this).val(), urlQuiz = $('.-action-questions').data('url');
	$.ajax({
        url : url,
        type : 'POST',
        cache : false,
        data : {
        	'courses_modules_id' : id, 
    	},
      	beforeSend: function() {
    	},
        error : function(data) {
        },
        success : function(data) {
        	var result = data.split('|');
        	$('.lesson-list .items').html('').append(result[0]);
        	$('.lesson iframe').attr('src', result[1]); 
        	$('.teacher-info .description').html('').html(result[2]);
        	$('.lesson-files ul').html('').append(result[3]); 
        	$('.progress-count').html('').append(result[4]); 
        	$('.progress-bar').html('').append(result[5]);
        	$('.-action-questions').data('src', urlQuiz + '/' + result[6]);
        	$('.lesson .title').text('').text(result[7]);
        }
    });
});
$(document).on('click', '.lesson-item', function(e){
	e.preventDefault();
	var url = $(this).closest('ul').data('url'), id = $(this).data('item'), that = $(this), urlQuiz = $('.-action-questions').data('url');
	$.ajax({
        url : url,
        type : 'POST',
        cache : false,
        data : {
        	'courses_lessons_id' : id, 
    	},
      	beforeSend: function() {
    	},
        error : function(data) {
        },
        success : function(data) {
        	var result = data.split('|');
        	$('.lesson-list .items .item').removeClass('-active');
        	$('.lesson-list .items').find('li[data-item="' + id + '"]').addClass('-active');
        	$('.lesson iframe').attr('src', result[0]);
        	$('.teacher-info .description').html('').html(result[1]);
        	$('.lesson-files ul').html('').append(result[2]);
        	$('.progress-count').html('').append(result[3]); 
        	$('.progress-bar').html('').append(result[4]);
        	that.find('i').removeClass('far fa-circle').addClass('fas fa-check-circle');
        	if(result[6] != '') {
        		$('.-action-questions').removeClass('d-none');
        		$('.-action-questions').prop('disabled', false);
        		$('.-action-questions').data('src', urlQuiz + '/' + result[5]);
        	}
        	else {
        		$('.-action-questions').addClass('d-none');
        		$('.-action-questions').prop('disabled', true);
        	}
        	$('.lesson .title').text('').text(result[7]);
        }
    });
});
$('.fbox').fancybox();
$('.fbclose').fancybox({
	autoCenter : true,
	autoSize : false,
	type : 'iframe'
});

$(".various").fancybox();
$(".various").attr('data-fancybox', "gallery");
$('.fancybox').fancybox({
	image : {
		protect : true
	}
});
$(document).ready(function() {
	$('.show-search').on('click', function(e) {
		$('.form-search').fadeIn('fast');
		$('.close-search').on('click', function(e) {
			$('.form-search').fadeOut('fast');
			e.preventDefault();
		});
		e.preventDefault();
	});
	$('.post-content *').removeAttr('style');
	if($('.slick-carousel').length) {
		
		$('.slick-carousel').slick({
			lazyLoad: 'ondemand',
	  		dots: false,
		  	infinite: true,
		  	arrows: true,
		  	autoplay: true,
	  		autoplaySpeed: 5000,
			speed: 300,
			slidesToShow: 5,
		  	slidesToScroll: 2,
		  	responsive: [
	    		{
		      		breakpoint: 1024,
			      	settings: {
				        slidesToShow: 3,
				        slidesToScroll: 3,
				        infinite: true,
				        dots: true
			      	}
			    },
			    {
					breakpoint: 600,
			      	settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2
			      	}
			    },
			    {
			      	breakpoint: 480,
			      	settings: {
				        slidesToShow: 3,
				        slidesToScroll: 3
			      	}
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
		  	]
		});
	}
	if($('.slick-home').length) {
		$('.slick-home').slick({
			lazyLoad: 'ondemand',
	  		dots: false,
		  	infinite: true,
		  	arrows: true,
		  	autoplay: true,
	  		autoplaySpeed: 5000,
			speed: 300,
			slidesToShow: 10,
		  	slidesToScroll: 2,
		  	responsive: [
	    		{
		      		breakpoint: 1024,
			      	settings: {
				        slidesToShow: 3,
				        slidesToScroll: 3,
				        infinite: true,
				        dots: true
			      	}
			    },
			    {
					breakpoint: 600,
			      	settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2
			      	}
			    },
			    {
			      	breakpoint: 480,
			      	settings: {
				        slidesToShow: 3,
				        slidesToScroll: 3
			      	}
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
		  	]
		});
	}
	//$('.post-content div').replaceWith($('<p>').append($('.post-content').contents()));
	
	
	var secondaryNav = $('.navbar-class.fixed-top'), 
    secondaryNavTopPosition = secondaryNav.offset().top, 
    windowWidth = $(window).width();
    $(window).on('scroll', function(){
        if($(window).scrollTop() > 40 && windowWidth > 1170) {
            secondaryNav.removeClass('d-none').fadeIn('fast');
            $('.top-bar').addClass('fixed-top');
        } else {
            secondaryNav.addClass('d-none').fadeOut('fast');
            $('.top-bar').removeClass('fixed-top');
        }
        if($(window).scrollTop() > 768 ) {
            $('.ir-topo').fadeIn('fast');   
            /*
            setTimeout(function() {
                                    secondaryNav.addClass('animate-children');
                                    $('#cd-logo').addClass('slide-in');
                                    $('.cd-btn').addClass('slide-in');
                                }, 50);*/
            
        } else {
            $('.ir-topo').fadeOut('fast');
            /*
            setTimeout(function() {
                                    secondaryNav.removeClass('animate-children');
                                    $('#cd-logo').removeClass('slide-in');
                                    $('.cd-btn').removeClass('slide-in');
                                }, 50);*/
            
        }
    });

});
$(".select2").each(function() {
	initializeSelect2($(this));
}); 

function toggleDropdown (e) {
  let _d = $(e.target).closest('.dropdown'),
      _m = $('.dropdown-menu', _d);
  setTimeout(function(){
    let shouldOpen = e.type !== 'click' && _d.is(':hover');
    _m.toggleClass('show', shouldOpen);
    _d.toggleClass('show', shouldOpen);
    $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
  }, e.type === 'mouseleave' ? 300 : 0);
}

$('body')
  .on('mouseenter mouseleave','.dropdown',toggleDropdown)
  .on('click', '.dropdown-menu a', toggleDropdown);
  
$('.zipcode').inputmask("99.999-999", {reverse: true});
$('.phone').inputmask('9999[9]-9999');
$('.cpf').inputmask("999.999.999-99", {reverse: true});
$('.cnpj').inputmask("99.999.999/9999-99", {reverse: true});

// date format
$(".date").inputmask("99/99/9999", {
    autoUnmask: false
});
$(".email").inputmask({
    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
    greedy: false,
    onBeforePaste: function (pastedValue, opts) {
        pastedValue = pastedValue.toLowerCase();
        return pastedValue.replace("mailto:", "");
    },
    definitions: {
        '*': {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
            cardinality: 1,
            casing: "lower"
        }
    }
});
$('.tooltipz').tooltipster({
	theme: ['tooltipster-light', 'tooltipster-light-customized'],
	contentCloning: true,
	contentAsHTML: true,
	content: 'Carregando...',
	interactive: true,
	trigger: 'click',
	functionBefore: function(instance, helper) {
        
        var $origin = $(helper.origin);
        // we set a variable so the data is only loaded once via Ajax, not every time the tooltip opens
        if ($origin.data('loaded') !== true) {

            //var url = $('.list-quiz').data('tip-url'), 
            idQuestion = $origin.data('question');
			$.ajax({
		        url : url,
		        type : 'POST',
		        cache : false,
		        data : {
		        	'quizzes_id' : idQuestion, 
		    	},
		      	beforeSend: function() {
		    	},
		        error : function(data) {
		        },
		        success : function(data) {
		        	var result = data.split('|');
		        	instance.content(result[0]); 
		        	$origin.data('loaded', true);
		        }
		    });
        }
    }
});
$(document).on('click', '.more-tip', function(e){
	$.ajax({
        url : url,
        type : 'POST',
        cache : false,
        data : {
        	'quizzes_id' : idQuestion, 
        	'counter' : counter, 
    	},
      	beforeSend: function() {
    	},
        error : function(data) {
        },
        success : function(data) {
        	var result = data.split('|');
        	if(result[0] != 'stop') {
        		$('.tooltipz').tooltipster('content', result[0]);
        	}
			counter = result[1];
        }
    });
});

var arrRadio = [], lengthQuiz = $('.list-quiz').length;
$('.list-quiz input:radio').on('change', function(e){
	var id = $(this).closest('.list-quiz').attr('id');
	arrRadio[id] = $(this).val();
	
	if(Object.keys(arrRadio).length == lengthQuiz) {
		$('.send-quiz').prop('disabled', false);
	}
	else {
		$('.send-quiz').prop('disabled', true);
	}
	e.preventDefault();
});

$('.cancel-essay').on('click', function(e){
	var url = $(this).data('url'); 
    Swal.fire({
        title: 'Confirmação requerida',
        text: "Tem certeza que deseja cancelar esta redação?",
        type: 'danger',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, cancele'
	}).then((result) => {
		if (result.value) {
			$(window.document.location).attr('href', url);
        }
    });
    e.preventDefault();
});
$('.get-consulting').on('click', function(e){
	var url = $(this).data('url'); 
    Swal.fire({
        title: 'Confirmação requerida',
        text: "Nossa equipe receberá seu pedido e iniciará seu processo de consultoria!",
        type: 'success',
        showCancelButton: true,
        confirmButtonColor: '#30A453',
        cancelButtonColor: '#30A453',
        confirmButtonText: 'Confirmar'
	}).then((result) => {
		if (result.value) {
			$(window.document.location).attr('href', url);
        }
    });
    e.preventDefault();
});
$('.download-model').on('click', function(e){
	var url = $(this).data('url');
	console.log(url); 
    $(window.document.location).attr('href', url);
    e.preventDefault();
});

$(document).on('click', '#get-coupon', function(e) {
	var $totalValue = $('input[name="total-value"]');
	var $coupon = $('.input-coupon');
	var url = $(this).closest('span').data('url');
	if($coupon.val()) {
		$.ajax({
			type: 'post',
			url: url,
			data: {
				'total' : $totalValue.val(),
				'coupon' : $coupon.val(),
				'order' : $('input[name="id_order"]').val(),
			},
			beforeSend: function() {
				$('.loading').show();
			},
			success: function(data) {
				//hasCoupon = 1;
				if(data != '') {
					var result = data.split('|');
					if(result[0] == 'ERROR') {
						alert(result[1]);
						$coupon.focus();
					}
					else {
						$totalValue.val(result[1]);
						$('.total-discount').text('').text(number_format(result[0], '2', ',', '.'));
						$('.paid-value').text('').text(number_format(result[1], '2', ',', '.'));
						$('#coupon-clear').removeClass("d-none");
						$('#get-coupon').addClass("d-none");
					}
				}
            }
		});
	}
	else {
		//hasCoupon = 0;
		alert('Você precisa de um cupom para completar esta ação');
		$coupon.focus();
	}
	e.preventDefault();
});
$(document).on('click', "#coupon-clear", function(e) {
	var hasCoupon = 0, urlHasCoupon=$('input[name="url-hascoupon"]').val(), urlClearCoupon=$('input[name="url-clearcoupon"]').val();
    /*$.ajax({
        type: 'post',
        url: urlHasCoupon,
        data: '',
        beforeSend: function() {
            $('.loading').show();
        },
        success: function(data) {
            hasCoupon = data;
            $('.loading').hide();
        }
    });
	if(hasCoupon > 0) {*/
		var r = confirm("Tem certeza que deseja cancelar este cupom?");
	
		if(r == true) {
			$.ajax({
				type: "POST",
				url: urlClearCoupon,
				data: {
					'order' : $('input[name="id_order"]').val(),
				},
				cache: false
			})
			.done(function(data) {
			    
				var result = data.trim().split('|');
				$('.total-discount').text(number_format(result[0], '2', ',', '.'));
				$('.paid-value').text('').text(number_format(result[1], '2', ',', '.'));
				$('input[name="total-value"]').val(number_format(result[1], '2', '.', ''));
				$('.input-coupon').val('');
				$('#coupon-clear').addClass("d-none");
				$('#get-coupon').removeClass("d-none");
			});
		}
	/*}
	else {
		$('.input-coupon').val('');
		$('#coupon-clear').addClass("hide");
		$('#get-coupon').removeClass("hide");
	}*/
	e.preventDefault();
});
$('.popup').on('click', 'i', function(e){
	$('.popup').hide();
	e.preventDefault();
});
$(document).on('click', function() {
    $('.popup').hide();
});

$(".botao-finalizar-boleto").on('click', function(e) {//gera identificação do usuário
	$(this).prop('disabled', true);
	$('.botao-finalizar-boleto i').addClass('d-none');
	$('.botao-finalizar-boleto img').removeClass('d-none');

	var order = $('#id_order').val();
	$.ajax({
		url : $('#mercadopagoboleto-functions').val() + '/getpermalink/' + order,
		type : "POST",
		data : {},
		cache : false,
		success : function(response) {

		}
	}).done(function(response) {
		var result = response.split('|');
		if (result[0] == 'success') {
			$('#modal-boleto').modal('show');
			$('#modal-boleto a.permalink').attr('href',result[1]);
			$('#modal-boleto a.permalink').on('click',function(e){
				$('.final-result').removeClass('d-none');
				$('.final-result').addClass('d-flex');
				var redirect = $('#redirect-success').val();
				setTimeout(function() {
					// and call `resolve` on the deferred object, once you're done
					window.location.href = redirect;
				}, 2500);
				
			});
		} else {
			alert(result[1]);
			/*var redirect = $('#redirect-error').val();
			window.location.href = redirect;*/
			$(this).prop('disabled', false);
			$('.botao-finalizar-boleto i').removeClass('d-none');
			$('.botao-finalizar-boleto img').addClass('d-none');
		}
	});

	e.preventDefault();
});
$(document).ready(function(){
	$('#modal-boleto').on('hidden.bs.modal', function(e) {
		var redirect = $('#redirect-success').val();
		window.location.href = redirect;
	});
});