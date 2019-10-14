$(document).ready(function () {
    $('.js-lightgallery').lightGallery({
        thumbnail: true,
        selector: '.lightgallery-item',
    });
});

$(document).on("page-loaded", function(event,blockId){

    if ($('#'+blockId +'.js-lightgallery').data("lightGallery")) {

        $('#'+blockId +'.js-lightgallery').data("lightGallery").destroy(true);

        $('#'+blockId +'.js-lightgallery').lightGallery({
            thumbnail: true,
            selector: '.lightgallery-item'
        });
    }

});