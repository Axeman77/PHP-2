<?php /** @var \app\models\Product $product */  ?>
<h1><?=$product->name?></h1>
<div>
    Товар: <?=$product->model;?><br>
    Описание: <?=$product->description?><br>
    Цена: <?=$product->price?> $
</div>
<img src="<?="/images/{$product->path}"?>" alt="img">
<div>
    <a href="add_to_cart.php?id=<?=$product->id?>">Add to cart</a>
</div>
