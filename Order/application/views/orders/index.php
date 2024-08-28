<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "public/css/styles.css" />
</head>
<body>
    <h1>Order Queue:</h1>

  
    <div class = "order-container">
    <?php foreach($orders as $order) { ?>
        <div class = "orders"> 
            <h2><?= $order["id"] ?></h2>
            <p><?= $order["order_name"] ?> </p>
        </div>
    <?php } ?>
    </div>
    


<footer>
    <form method = "POST" action = "<?= base_url('orders/process_submit') ?>">
        <input type = "text" name = "orders" />
        <input type = "submit" value = "Submit" />
    </form>
</footer>


</body>
</html>