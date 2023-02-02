import 'owl.carousel';
import 'jquery-ui';
import Swiper from 'swiper/js/swiper';
import 'magnific-popup';

const $win = $(window);
const $doc = $(document);
const $body = $('body');

scrollToSection();
initMap();

 $win.on('load', function() {
 	initSliderBoxes();
 	wrapSelectFields();
 });

$win.on('resize', function() {
	adjustHeight();
})

$doc.on('ready', function() {
 	adjustHeight();
 })
/**
 *
 * Datepicker
 *
 */

const checkoutField = $('#checkout');
const checkInField = $('#checkin');
let startDate;

$('.form__field--date').datepicker({
	rangeSelect: true,
	dateFormat : 'yy-mm-dd',
	onSelect: (date, input) => {
		if ( input.id === 'checkin' ) {
			startDate = date;
			checkInField.attr('value', startDate);
			console.log(checkInField.val());
		}
	},
	minDate: 0
});

// Nav trigger

$('.nav-trigger').on('click', function(event) {
	$('.mobile-menu').toggleClass('mobile-menu--active');
	$('.overlay').toggleClass('overlay--active');
	$('body').toggleClass('nav-show');

	event.preventDefault();
});

// Nav

  $('.nav').on('click', 'a', function(e){
	let parentEl = $(this).closest('li');
	let subMenu = $(this).closest('li').children('ul');

	parentEl.siblings().removeClass('hovered');

	if ( !parentEl.hasClass('hovered') && $win.width() < 1024 && subMenu.length > 0 ) {
	  e.preventDefault();

	  parentEl.addClass('hovered');
	};
  });

  $doc.on('touchstart', function(e) {
	if ( !e.target.closest('.nav') ) {
	  $('.nav').find('li').removeClass('hovered');
	};
  });

$(window).bind("resize", function () {
  if ($(this).width() > 1024) {
	$('.mobile-menu').removeClass('mobile-menu--active');
	$('.overlay').removeClass('overlay--active');
	$('body').removeClass('nav-show');
  }
}).trigger('resize');

$(window).bind("resize", function () {
  if ($(this).width() <= 420) {
	$('.form__field--date').on('touchstart', function() {
	})
  }
}).trigger('resize');


// Slider Images

$('.slider-images').owlCarousel({
  items: 1,
  nav: true,
  dots: true,
  loop: true,
  autoplay:true,
  autoplayTimeout: 7000,
});

$('.list-properties--slider').owlCarousel({
  nav: false,
  dots: true,
  responsive : {
	0 : {
	  items : 1,
	  margin: 10,
	},

	420 : {
	  items : 2,
	  margin : 10,
	},

	 812 : {
	  items : 3,
	  margin: 10,
	 },

	 1023 : {
	  items : 3,
	  margin: 10,
	 }
  },
});

let $owlContainer = $('.slider-images-secondary');
let $owlSlides    = $owlContainer.children('div');

if ($owlSlides.length > 1) {
	$owlContainer.addClass('owl-carousel')
	$owlContainer.owlCarousel({
	 items: 1,
	 dots: true,
	 loop: true,
	 autoplay:true,
	 autoplayTimeout: 12300,
	 singleItem: true,
	 margin: 150,
	});
}

$win.on('load resize', function() {
	let $windowWidth = $($win).width();
	let $contentWidth = $('.slider-images-secondary .slider__slide').outerWidth();
	let $dotsWidth = $('.slider-images-secondary .owl-dots')

	$dotsWidth.css( 'width' , $contentWidth );

})

// MyVR
var key = crb.api_key;
myvr.init(key);
myvr.properties()
	  .then(function(data){
		  // Populate homepage properties search form
		  let results = data.results;
		  let elements = [];
		  $.each( results, function( index, value ) {
			let element = value.city + ", " + value.state;
			if ($.inArray(element, elements) == -1) {
			  elements.push(element);
			}
		  });
		  elements.reverse();
		  for(var i=0; i<elements.length; i++){
			let selectValue = elements[i].replace(/ /g, '%20');
			$('.myvr-properties-form .form__field--select').append('<option value="' + selectValue + '">' + elements[i] + '</option>');
		  }
		  elements.reverse();
	  })
	  .error(function(statusCode, data, request) {
		  // Log the error and hide the VR form
		  console.log(statusCode, data, request);
		  $('.myvr-properties-form').hide();
	  });

// Submit MyVR Form
$('.myvr-properties-form').on( 'submit', function(e) {
	e.preventDefault();

	let location = $(this).find(':selected').val();
	let checkinDate = $(this).find('.form__field--date-in').val();
	let checkoutDate = $(this).find('.form__field--date-out').val();

	window.location.href = $(this).attr('action') + 'l=' + location + '&a=' + checkinDate + '&d=' + checkoutDate;
});


if( $body.hasClass('single-crb_city') ) {
	$('.form-book-inner form').on( 'submit', function(e) {
		e.preventDefault();

		let $form = $(this);
		let location = $form.find('input[name="l"]').val();
		let checkinDate = $form.find('input[name="a"]').val();
		let checkoutDate = $form.find('input[name="d"]').val();

		window.location.href = $form.attr('action') + '&checkin=' + checkinDate + '&checkout=' + checkoutDate;

	});
}


function initSliderBoxes() {
	$('.slider-boxes .swiper-container').each(function(index, element){
	    let $this = $(this);

	    initBoxesHover();

	    let $sliderBoxes = new Swiper ($this, {
			slidesPerView: 1,
			loop: true,
      		grabCursor: true,
      		centeredSlides: true,
			navigation: {
		        nextEl: $this.parents('.slider-boxes').find('.slider__btn--next')[0],
		        prevEl: $this.parents('.slider-boxes').find('.slider__btn--prev')[0],
		    },
		    pagination: {
				el: $this.parents('.slider-boxes').find('.slider__pagination')[0],
				clickable: true
			},
			breakpoints: {
				1023: {
					slidesPerView: 'auto',
					spaceBetween: 7
				},
				767: {
					slidesPerView: 3,
					spaceBetween: 10
				},
				425: {
					slidesPerView: 2,
					spaceBetween: 0
				}
			}
	    });
	});
}

function initBoxesHover() {
	$('.slider-boxes').each( function() {
		let $this = $(this);

		$this.on('hover touchstart', 'a', function(e){
			let parentEl = $(this).closest('.swiper-slide');

			parentEl.siblings().removeClass('hovered');

			if ( !parentEl.hasClass('hovered') ) {
			  e.preventDefault();

			  parentEl.addClass('hovered');

				$this.magnificPopup({
					type: 'image',
					delegate: '.slider__slide-link',
				});
			}
		});
	})
}

function scrollToSection() {
	$('.nav-main').find('a').click(function(event) {

		let scroll = $win.scrollTop();
		let section = $(this).attr('href');
		let linkUrl = $(this).attr('href').substr(0,1);

		if ( $(section).length ) {
			event.preventDefault();
			if ( $body.hasClass('animating') ){
				return;
			}

			$body.removeClass('nav-show')
			$('.mobile-menu').removeClass('mobile-menu--active');
			$('.overlay').removeClass('overlay--active');
			$body.addClass('animating');


			$('html, body').animate({
				scrollTop: $(section).offset().top - 50
			}, 2000);

			setTimeout(function(){
				$body.removeClass('animating');
			}, 2000)
		}
	});
}

function wrapSelectFields() {
	let $single = $('.search-single');

	if ( ! $single.length ) {
		return;
	}

	$single.find('.extra-persons-box select').wrap('<div class="select-holder"></div>');
}


/**
 *
 * Load More Articles
 *
**/

// $doc.on('click', '.js-load-more', function(e){
//     e.preventDefault();
//     if ( $('body').hasClass( 'loading' ) ) {
//         return;
//     }
//     var link = $(this).attr('href');
//     $('body').addClass('loading');
//     $.ajax({
//         url: link,
//         type: 'GET',
//         dataType: 'html',
//         success: function (data) {
//             var elements = $(data).find('.articles ul');
//             $doc.find('.articles ul ').append(elements.html());

//             if ( $(data).find('.js-load-more a').length ) {
//                 $doc.find('.js-load-more a').attr('href', $(data).find('.js-load-more a').attr('href'));
//             } else {
//                 $doc.find('.js-load-more a').remove();
//             }
//         },
//         error: function (xhr, textStatus, errorThrown) {
//             console.log(textStatus);
//         }
//     }).done(function(data){
//         $('body').removeClass( 'loading' );
//     })
// })

$doc.on('click', '.js-load-more', function(e){
	e.preventDefault();

	if ( $('body').hasClass( 'loading' ) ) {
        return;
    }

    let link = $(this).attr('href');
    let page = $(this).data('next');

    $('body').addClass('loading');

    $.ajax({
        url: link,
        type: 'GET',
        data: {
        	'page': page,
        },
        dataType: 'html',

        success: function (data) {
            var elements = $(data).find('.articles ul');
            $doc.find('.articles ul ').append(elements.html());

            if ( $(data).find('.js-load-more').length ) {
            	let $newButton = $(data).find('.js-load-more');
            	$(document).find('.js-load-more').parent().empty().append($newButton);
            } else {
                $(document).find('.js-load-more').parent().empty()
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
        }
    }).done(function(data){
        $('body').removeClass( 'loading' );
    })
})

function isMobile(){
	var isMobile = (/Android|webOS|iPhone|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1)) && !window.MSStream;

	return isMobile;
}
function adjustHeight() {
	if( ! isMobile() ) {
		return;
	}

	let $wrapper = $('.main--alt');

	if ( ! $wrapper.length ) {
		return;
	}

	let headerHeight = $('header').outerHeight();
	$wrapper.css('padding-top', headerHeight + 'px');
}

function initMap() {
	const $maps = $('.js-map');
	$maps.each((i, map) => {
		const $mapHolder = $(map).find('.map__holder')
		const lat = parseFloat($(map).data('lat'));
		const lng = parseFloat($(map).data('lng'));
		//Set map options
		const mapOptions = {
			center: new google.maps.LatLng(lat, lng),
			zoom: 13,
			draggable: true,
			scrollwheel: true,
			panControl: false,
			zoomControl: false,
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false,
			fullscreenControl: false,
		};

		const gMap = new google.maps.Map($mapHolder[0], mapOptions);

		const marker = new google.maps.Marker({
			map: gMap,
			position: mapOptions.center,
		});
	})

	updateMapSectionPlace();
}

function updateMapSectionPlace() {
	const $section = $('.section-location-map');
	const $tabs = $('#listing-tabs');

	if($tabs.length && $section.length) {
		$section.insertBefore($tabs);
	}
}