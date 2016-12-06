$(document).ready(function () {
    $(window).on('beforeunload', function () {
        return ('Вы действительно хотите покинуть сайт?')
    });

    $('a').click(function () {
        $(window).off('beforeunload')
    });
});