<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME ?></title>

    <!-- Base URL -->
    <base href="/">

    <link rel="icon" type="favicon" href="favicon.ico">

    <script src="../js/jquery-3.1.1.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../View/css/starter-template.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="stylesheet" href="../View/css/carousel.css">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">

    <script src="../js/active-class-menu.js"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/popup.js"></script>
    <script src="../js/onclose.js"></script>
    <script src="../js/menu.js"></script>

    <script>
        $(document).ready(function () {
            $('body').css({
                'backgroundImage': 'url(../img/bg/bg.jpg)', 'backgroundSize': '100%',
                'background-attachment': 'fixed'
            });
        })
    </script>

</head>
<body>

<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><i class="icon-home icon-white"> </i> <?php echo SITE_NAME ?>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item "><a href="/finance/all/">Финансы</a></li>
                <li class="menu-item "><a href="/it/all/">Технологии</a></li>
                <li class="menu-item "><a href="/politic/all/">Политика</a></li>
                <li class="menu-item "><a href="/criminal/all/">Криминал</a></li>
                <li class="menu-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Для
                        пользователей<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="menu-item dropdown dropdown-submenu"><a href="#" class="dropdown-toggle"
                                                                           data-toggle="dropdown">Пример выпадающего
                                меню</a>
                            <ul class="dropdown-menu">

                                <?php
                                if(!isset($_SESSION['isLogged']))
                                {
                                    echo "<li class=\"menu-item \"><a href=\"user/login/\">Вход</a></li>";
                                }
                                ?>

                                <?php
                                if(isset($_SESSION['isLogged'])) {
                                    echo "<li class=\"menu-item \"><a href=\"user/cabinet/\">Кабинет</a></li>";
                                }
                                ?>


                                <li class="menu-item dropdown dropdown-submenu"><a href="#" class="dropdown-toggle"
                                                                                   data-toggle="dropdown">И еще</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/">Просто кнопка</a></li>
                                        <li><a href="/">И еще просто кнопка</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['isLogged']) && isset($_SESSION['login']) && $_SESSION['type'] == 'administrator') {
                    echo "<li class=\"menu-item \"><a href=\"/admin/panel/\">Панель</a></li>";
                }

                if (isset($_SESSION['isLogged']) && isset($_SESSION['login'])) {
                    echo "<li class=\"menu-item dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">" . $_SESSION['login'] . "<b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\"><li class=\"menu-item \"><a href=\"/user/logout/\">Выйти</a></li></ul>";
                }

                ?>

                <?php
                if (!$_GET) {
                    echo "<li>
                    <form class=\"navbar-search navbar-form\" method=\"get\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Поиск статьи\" name=\"search\" required>
                    </form>
                </li>";
                } else {
                    echo '<p class="alert-danger">Поиск пока только с главной страницы</p>';
                }

                ?>

            </ul>

        </div>
    </div>
</div>

<div id="bg_popup">
    <div id="popup">
        <a id="setCookie" class="close" href="#" title="Закрыть"
           onclick="document.getElementById('bg_popup').style.display='none'; return false;">х</a>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail">Ваш Email адрес</label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Ваше имя</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Имя">
            </div>
            <div class="form-group">
                <label for="exampleInputLastName">Ваша фамилия</label>
                <input type="text" class="form-control" id="exampleInputLastName" placeholder="Фамилия">
            </div>
            <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Подписаться
            </button>
        </form>
    </div>
</div>


<!-- template data -->
<div class="container">

    <div class="starter-template">

        <?php echo $content; ?>

    </div>

    <footer>
        <div class="inner">
            <p> &copy; Хорошие новости <?php echo date('Y') ?></p>
        </div>
    </footer>

</div>

</body>
</html>