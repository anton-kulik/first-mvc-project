<h1>Other products</h1>

<!-- Отключена сортировка для спарсенных товаров
Split button

<div class="btn-group">
    <button type="button" class="btn btn-danger">Sotring</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>

    <ul class="dropdown-menu">
        <li><a href="product/all/priceUp">price &uarr;</a></li>
        <li><a href="product/all/priceDown">price &darr;</a></li>
    </ul>
</div>
-->

<div class="row">

    <?php foreach ($data['products'] as $product) { ?>
        <!--
        <a href="product/display/<?php //echo $product['id'] ?>">
        -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>">
                    <div class="caption">
                        <h3><?php echo $product['title'] ?> - <?php echo $product['price'] ?></h3>
                        <p><?php echo $product['description'] ?></p>

                        <!-- Отключена кнопка More для спарсенных товаров
<!--                        <a href="product/display/--><?php //echo $product['id'] ?><!--" class="btn btn-primary"-->
<!--                           role="button">More</a>-->
                    </div>
                </div>
            </div>
        <!--
        </a>
        -->

    <?php } ?>
</div>