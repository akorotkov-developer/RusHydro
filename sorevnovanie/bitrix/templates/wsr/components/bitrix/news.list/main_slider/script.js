$(document).ready(function () {
    $(".slider").slick({
        customPaging: function (i, d) {
            return '<a href="#"><div class="slider__dot"></div><div class="slider__dot slider__dot--active"></div></a>'
        }
    })
});