$(function () {                              // Когда страница загрузится
    $('#navbar ul li a').each(function () {  // получаем все нужные нам ссылки
        var location = window.location.href; // получаем адрес страницы
        var link = this.href;                // получаем адрес ссылки
        console.log(location);
        console.log(link);
        if (location == link) {              // при совпадении адреса ссылки и адреса окна
            $(this).addClass('active');      //добавляем класс
        }
    });
});