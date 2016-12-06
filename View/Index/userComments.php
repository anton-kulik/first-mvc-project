<style>
    /*Тут меняем цвет меню*/
    .navbar-default {
        background-color: <?php echo $data['settings'][0]['headColor'] ?>
    }
</style>

<h1>Все комментарии пользователя <?php echo $data['comments'][0]['login']?></h1>

<div class="row">
    <?php require_once 'ad-left.php' ?>

    <div class="col-xs-6 col-md-8">

        <?php
        if (isset($data['comments'])) {
            foreach ($data['comments'] as $comment) { ?>
                    <div class="list-group">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">Статья: <b><?php echo $comment['title'] ?></b></h4>
                            </div>

                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment['text'] ?></h4>
                            </div>
                        </div>
                    </div>
            <?php }
        } else {
            echo 'Материалов не найдено';
        } ?>

        <?php require_once 'pagination.php' ?>

    </div>
    <?php require_once 'ad-right.php' ?>
</div>