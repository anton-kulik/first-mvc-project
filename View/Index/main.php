<style>
    .navbar-default {
        background-color: <?php echo $data['settings'][0]['headColor'] ?>
    }
</style>

<!-- Carousel ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="item active">
            <img class="first-slide"
                 src="img/articles/<?php echo $data['lastNews'][0]['image'] ?>"
                 alt="<?php echo $data['lastNews'][0]['title'] ?>">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $data['lastNews'][0]['title'] ?></h1>
                </div>
            </div>
        </div>

        <div class="item">
            <img class="second-slide"
                 src="img/articles/<?php echo $data['lastNews'][1]['image'] ?>"
                 alt="iPhone">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $data['lastNews'][1]['title'] ?></h1>
                </div>
            </div>
        </div>

        <div class="item">
            <img class="third-slide"
                 src="img/articles/<?php echo $data['lastNews'][2]['image'] ?>" alt="iPad">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $data['lastNews'][2]['title'] ?></h1>
                </div>
            </div>
        </div>

    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Предидущая</span>
    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Следующая</span>
    </a>
</div>
<!-- /.carousel -->

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->

<div class="row">

    <?php require_once 'ad-left.php' ?>

    <div class="col-xs-6 col-md-8">

        <div class="list-group">
            <a href="finance/all" class="list-group-item active">
                Свежее из категории Финансы
            </a>
            <?php
            foreach ($data['finance'] as $finance) { ?>
                <a href="finance/article/<?php echo $finance['id'] ?>"
                   class="list-group-item"><?php echo $finance['title'] ?></a>
            <?php } ?>
        </div>

        <div class="list-group">
            <a href="politic/all" class="list-group-item active">
                Свежее из категории Политика
            </a>
            <?php
            foreach ($data['politic'] as $politic) { ?>
                <a href="politic/article/<?php echo $politic['id'] ?>"
                   class="list-group-item"><?php echo $politic['title'] ?></a>
            <?php } ?>
        </div>

        <div class="list-group">
            <a href="it/all" class="list-group-item active">
                Свежее из категории Информационные технологии
            </a>
            <?php
            foreach ($data['it'] as $it) { ?>
                <a href="it/article/<?php echo $it['id'] ?>" class="list-group-item"><?php echo $it['title'] ?></a>
            <?php } ?>
        </div>

        <div class="list-group">
            <a href="criminal/all" class="list-group-item active">
                Свежее из категории Криминал
            </a>
            <?php
            foreach ($data['criminal'] as $criminal) { ?>
                <a href="criminal/article/<?php echo $criminal['id'] ?>"
                   class="list-group-item"><?php echo $criminal['title'] ?></a>
            <?php } ?>
        </div>

        <h4>Топ 5 комментариев</h4>

        <?php foreach ($data['topComments'] as $comment) {

            echo '<div class="panel panel-default">';
            echo '<div class="panel-body">';

            echo '<b>';
            echo $comment['title'];
            echo '</b>';
            echo ' - от пользователя: ';

            echo "<a href=\"user/commentsList/{$comment['user_id']}\">";
            echo $comment['login'];
            echo '</a>';

            echo '</div>';

            echo '<div class="panel-footer">';
            echo $comment['text'];
            echo '</div>';

            echo '<a href="article/';
            echo '/like/';
            echo $comment['id'];
            echo '">';
            echo '<p class="glyphicon glyphicon-thumbs-up">';

            echo '<span class="badge">';
            echo $comment['likes'];
            echo '</span>';
            echo '</p>';

            echo '</a>';

            echo '<a href="article/';
            echo '/dislike/';
            echo $comment['id'];
            echo '">';
            echo '<p class="glyphicon glyphicon-thumbs-down">';
            echo '<span class="badge">';
            echo $comment['dislikes'];
            echo '</span>';
            echo '</p>';
            echo '</a>';

            echo '</div>';
        } ?>


        <div class="list-group">
            <h3>Топ 3 активных темы</h3>
            <?php
            foreach ($data['topArticles'] as $article) { ?>
                <a href="it/article/<?php echo $article['id'] ?>"
                   class="list-group-item"><?php echo $article['title'] ?></a>
                <p>Комментариев всего: <?php echo $article['CommonComments']?></p>
            <?php } ?>
        </div>


    </div>

    <?php require_once 'ad-right.php' ?>

</div>