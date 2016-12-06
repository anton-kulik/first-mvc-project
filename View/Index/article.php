<style>
    .navbar-default {
        background-color: <?php echo $data['settings'][0]['headColor'] ?>
    }
</style>

<div class="row">

    <?php require_once 'ad-left.php' ?>

    <div class="col-xs-6 col-md-8">

        <div class="list-group">

            <h1><?php echo $data['article']['title'] ?></h1>
            <p class="text-right">
                <small>Опубликовано : <?php echo $data['article']['date'] ?></small>
            </p>
            <img class="img-rounded" src="img/articles/<?php echo $data['article']['image'] ?>" alt="">
            <p class="text-justify"><?php echo $data['article']['text'] ?></p>
        </div>

        <p class="text-left">
            <button type="button" class="btn btn-default" aria-label="Left Align">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Сейчас читают"></span>
            </button>
            Сейчас на странице:
            <small id="nowHere">0</small>
        </p>

        <p class="text-left">
            <button type="button" class="btn btn-default" aria-label="Left Align">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true" title="Всего просмотров"></span>
            </button>
            Всего просмотров:
            <small id="totalViews">348</small>
        </p>

        <small>Мета теги:
            <?php
            $tags = $data['article']['meta_tags'];
            $tags = explode(',', $tags);
            $tags = str_replace(' ', '', $tags);

            foreach ($tags as $tag) {
                $tag_search = mb_substr($tag, 0, 5);
                echo '<a class="btn btn-default" href="/article/tag/' . $tag_search . '" ' . ' role="button">' . $tag . '</a>';
            }
            ?>
        </small>

        <?php
        if ($data['comments'] != null) {
            foreach ($data['comments'] as $comment) {

                echo '<div class="panel panel-default">';
                echo '<div class="panel-body">';

                echo $comment['login'];

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
            }
        } else {
            echo '<p class="bg-info">Еще никто не комментировал, будьте первым!</p>';
        }
        ?>

        <div class="form-group">
            <form method="post">
                <label for="text">
                    <textarea id="text" class="form-control" cols="500" rows="2" name="text"
                              placeholder="Введите текст Вашего комментария" required></textarea>
                </label>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="article_id" value="<?php echo $data['article']['id'] ?>">
                <input type="hidden" name="action" value="addComment">
                <button type="submit" class="btn btn-default">Сохранить</button>
            </form>
        </div>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

    </div>

    <?php require_once 'ad-right.php' ?>

</div>

<script>
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    setInterval(function () {
        $('#nowHere').html(getRandomInt(0, 5));
    }, 3000);
</script>

<script>
    function getRandomIntTotal(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function totalViews() {
        var str = $('#totalViews').text();
        var total = parseInt(str);
        var str2 = $('#nowHere').text();
        var now = parseInt(str2);
        var result = total + now;
        return result;
    }

    setInterval(function () {
        $('#totalViews').html(totalViews())
    }, 3000);
</script>