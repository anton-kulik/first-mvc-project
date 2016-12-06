<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="favicon" href="favicon.ico">

    <title>Админ панель</title>

    <!-- Base URL -->
    <base href="/">

    <script src="../../js/jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="../View/css/bootstrap.min.css">
    <link rel="stylesheet" href="../View/css/dashboard.css">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" target="_blank">На сайт</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="menu-item "><a href="/user/logout/">Выйти</a></li>
                <li><a href="admin/settings/">Настройки</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-2 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="admin/panel/">Пользователи</a></li>
                <li><a href="admin/categories/">Категории</a></li>
                <li><a href="admin/articles/">Статьи</a></li>
                <li><a href="admin/comments/">Все Комментарии</a></li>
                <li><a href="admin/commentsToModerate/">Неопубликованные комментарии</a></li>
                <li><a href="admin/ad/">Реклама</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Панель администратора</h1>

            <?php echo $content; ?>

        </div>
    </div>
</div>

</body>
</html>
