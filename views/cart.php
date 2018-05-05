<div class="product-item">
    <form method="post" action="card.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
        <div class="product-image"><img src="<?="/images/{$product->path}"?>" alt="img"></div>
        <div>
            <strong><?php echo $product->name; ?></strong>
        </div>
        <div class="product-price"><?php echo $product->price . "$" ?></div>
        <div><input type="text" name="quantity" value="1" size="2" />
            <input type="submit" value="Add to cart" class="btnAddAction" />
        </div>
    </form>
</div>