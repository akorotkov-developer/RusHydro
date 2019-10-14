$(document).ready(function () {
    $('.fans-card__likes-text').click(function () {
        var id = $(this).parents('.fans-card__item').attr('id');
        $('input#name').val(id)
    })



})

