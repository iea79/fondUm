

$('.menu-mob, .close-img').on('click', function () {
	$('.mobile-content').toggleClass('open');
	$('body').toggleClass('open-menu');
});

// $('.close-img').on('click', function () {
// 	$('.mobile-content').css('left', '-400px');
// });

var firstScreenSlider = $('.firstScreen-slider').slick({
	infinite: true,
	slidesToShow: 1,
	autoplay: true,
	// autoplaySpeed: '3000',
	arrows: false,
	dots: false,
	pauseOnHover: false,
	slidesToScroll: 1,
	responsive: [{
		breakpoint: 991,
		settings: {
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false
		}
	},]
});

$('.firstScreen__plate:first').addClass('active');

firstScreenSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
	$('.firstScreen__plate').removeClass('active');
	$('.firstScreen__plate').eq(nextSlide).addClass('active');
});

$('.firstScreen__plate').on('click', function () {
	firstScreenSlider.slick('slickGoTo', $(this).index(), false);
});

$(function () {
	if ($(window).width() < 992) {
		$('.navbar__link').on('click', function () {
			$('.nav__swicher').prop('checked', false);
		});
	}
});

function popup(y) {

	var popup = $(y);

	setTimeout(function () {
		$(popup).fadeIn(500);
		$('body').addClass('substrate');
	}, 200);

	$('.close-popup').on('click', function (e) {
		$(popup).fadeOut(500);
		$('body').removeClass('substrate');
	});

	$(document).mousedown(function (e) {
		var div = $(popup);
		if (div.is(e.target)
		&& div.has(e.target).length === 0) {
			$(popup).fadeOut(500);
			$('body').removeClass('substrate');

		}
	});
}

let totalSumm = document.querySelector('.counter-numbers').innerHTML;
let newTotalSumm = '';
for (var i = 0; i < totalSumm.length; i++){
	if (totalSumm[i]!=' ') {
		newTotalSumm = newTotalSumm +'<span class="number">' + totalSumm[i] + '</span>';
	} else {
		newTotalSumm = newTotalSumm + ' ';
	}
}
document.querySelector('.counter-numbers').innerHTML = newTotalSumm;


function selectYear() {
    let drop = $('.reporting__drop'),
        item = $('.reporting-drop__item');

    drop.on('mouseenter', function() {
        $(this).addClass('open');
    });

    drop.on('mouseleave', function() {
        $(this).removeClass('open');
    });

    item.on('click', function() {
        let current = $(this).html(),
            dropCurent = $(this).closest('.reporting__drop'),
            listIem = dropCurent.find('.reporting-drop__item'),
            value = dropCurent.find('.reporting-drop__name'),
			year = $(this).data('year-toggle');
        // console.log(current);

        listIem.removeClass('active');

        $(this).addClass('active');

        value.html( current );

		$('.reporting__item').addClass('hidden');
		$('[data-year="' + current + '"]').removeClass('hidden');

        drop.removeClass('open');
    });
}

selectYear();
