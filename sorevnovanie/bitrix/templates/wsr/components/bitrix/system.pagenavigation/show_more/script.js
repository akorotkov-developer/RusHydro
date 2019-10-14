$(document).ready(function () {

    $(document).on('click', '.show_more', function () {

        if ($(this).hasClass('active')) return false;

        $(this).addClass('active');

        var btn = $(this);

        var navNum = $(this).attr('data-navNum');

        var page = btn.attr('data-next-page');

        var block_id = $(this).siblings();

        $.each(block_id, function (i, val) {
            if ($(val).attr('data-pager-id'))
                block_id = val;
        })


        var Idunic = $(block_id).attr('data-pager-id');

        var maxPage = $(this).attr('data-max-page');

        var data = {};

        data['PAGEN_' + navNum] = page;

        data['SHOW_MORE'] = true;

        $.ajax({
            type: "GET",
            url: window.location.href,
            data: data,
            timeout: 3000,
            beforeSend: function () {

                $('.show_more').hide();

                $('.loader_show_more').show();

            },
            error: function () {

                $('.news-more.error').show();

            },
            success: function (data) {

                var html = $(data).find('[data-pager-id="' + Idunic+'"').html();

                $(block_id).append(html);

                var pageId = parseInt(page) + 1;

                if (pageId > maxPage) {

                    $(block_id).siblings('.show_more').remove();

                } else {

                    $('.show_more').attr("data-next-page", parseInt(page) + 1);

                }

                $(document).trigger('page-loaded', [Idunic]);

            }
        }).always(function () {

            $('.show_more').show();

            $('.loader_show_more').hide();

            $('.show_more').removeClass('active');
        });

    });

})
