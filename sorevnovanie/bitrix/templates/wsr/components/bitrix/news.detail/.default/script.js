$(document).ready(function () {
    $('.double-slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.double-slider-nav'
    });
    $('.double-slider-nav').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.double-slider-for',
        dots: true,
        arrows: false,
        centerMode: false,
        focusOnSelect: true,
        customPaging: function customPaging(slider, i) {
            return '<div class="slider__dot"></div><div class="slider__dot slider__dot--active"></div>';
        }

    });
    $('.js-lightgallery').lightGallery({
        thumbnail: true,
        selector: '.lightgallery-item'
    });
});