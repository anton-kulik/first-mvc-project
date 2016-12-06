<style>
    /*Тут меняем цвет меню*/
    .navbar-default {
        background-color: <?php echo $data['settings'][0]['headColor'] ?>
    }
</style>

<div class="row">
    <?php require_once 'ad-left.php' ?>
    <div class="col-xs-6 col-md-8">
        <?php
        foreach ($data['articles'] as $article) { ?>
            <a href="finance/article/<?php echo $article['id'] ?>">
                <div class="list-group">
                    <div class="media">
                        <div class="media-left media-middle">
                            <img class="media-object" src="img/articles/<?php echo $article['image'] ?>"
                                 alt="<?php echo $article['title'] ?>">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $article['title'] ?></h4>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
    <?php require_once 'ad-right.php' ?>
</div>
