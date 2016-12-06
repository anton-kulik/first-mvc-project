<h1><?php echo $data['product']['title'] ?></h1>

<img src="<?php echo $data['product']['image'] ?>" alt="<?php echo $data['product']['image'] ?>" class="img-thumbnail"
     width="370">

<div class="caption">
    <h3>Total price: <?php echo $data['product']['price'] ?> $</h3>
    <p><?php echo $data['product']['description'] ?></p>
    <a href="product/buy/<?php echo $data['product']['id'] ?>">
        <button type="button" class="btn btn-success">Buy</button>
    </a>
    </p>
</div>
