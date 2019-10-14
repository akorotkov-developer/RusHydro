$(document).ready(function () {    

    if ($.browser.msie) {
        $('body').addClass('ie' + $.browser.version.split('.')[0]);
    }


    if (!Modernizr.objectfit) {
        $('.slider__element, .media-item__img, .lightgallery-item, .double-slider-nav__item').each(function () {
            var $container = $(this),
                imgUrl = $container.find('img').prop('src');
            if (imgUrl) {
                var imageContainer = $("<div></div>");
                imageContainer.css('backgroundImage', 'url(' + imgUrl + ')').addClass('compat-object-fit');
                $container.find('img').css('display', 'none');

                $container.append(imageContainer);
            }
        });
    }
});
