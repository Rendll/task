(function ($) {
    $(document).ready(function () {

        $(document).on('click', '.taxonomy-filter-input', function () {
            let checkbox = $(this).prop('checked');
            if(checkbox === true) {
                $(this).attr('checked', 'checked')
            } else {
                $(this).attr('checked', false)
            }
        });

        $(document).on('change', '.taxonomy-filter-input', function () {
            let terms = [];
            let inputs = $('input[name="term-name"]:checked');
            inputs.each(function () {
                terms.push($(this).val());
            });
            $.ajax({
                type: "POST",
                url: wpAjax.url,
                data: {
                    action: 'filter_news',
                    terms: terms,
                },
                success: function (msg) {
                    $('.news-content').html(msg);
                }
            });
            return false;
        });

        $(document).on('click', '.reset-btn', function () {
            let inputs = $('input[name="term-name"]');
            inputs.each(function () {
                $(this).attr('checked', false);
            });
            $.ajax({
                type: "POST",
                url: wpAjax.url,
                data: {
                    action: 'reset_news',
                },
                success: function (msg) {
                    $('.news-content').html(msg);
                }
            });
            return false;
        });

        $(document).on('click', '.pagination a', function () {
            let page = parseInt($(this).text());
            let href = $(this).attr('href');
            let path = href.replace(/https?:\/\/[^\/]+/i, '');
            console.log(path);
            let terms = [];
            let inputs = $('input[name="term-name"]:checked');
            inputs.each(function () {
                terms.push($(this).val());
            });
            $.ajax({
                type: "POST",
                url: wpAjax.url,
                data: {
                    action: 'get_next_posts',
                    page: page,
                    terms: terms
                },
                success: function (msg) {
                    $('.news-content').html(msg);
                }
            });
            return false;
        });
    });
})(jQuery)