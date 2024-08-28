<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="/resources/demos/external/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="public/js/index.js"></script>
</head>
<body>
    <nav> 
        <h1>My Store</h1>
        <?php if($cart_items == 0) { ?>
            <a href = "<?= ("cart") ?>">Cart </a>

        <?php } else { ?>
            <a href = "<?=("cart") ?>"> Cart (<?= $cart_items ?>) </a>
        <?php }?>
    </nav>

    <main> 
        <?php 
        foreach($items as $item) {  ?>
            <div class="items"> 
                <img src="<?= $item["image"] ?>" />
                <p><?= $item["name"] ?> - Php <?= $item["price"] ?></p>
                <form action="add_to_cart" method="POST"> 
                    <input type="hidden" name="product_id" value="<?= $item["id"] ?>">
                    <input class="spinner" type="number" name="quantity" value="1" min="1" max="99">
                    <input type="submit" value="Add to Cart" name = "add">
                    <input type="submit" value="Remove Item" name = "remove">
                </form>
            </div>
        <?php } ?>
    </main>
</body>
</html>
