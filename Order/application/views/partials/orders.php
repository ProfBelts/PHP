<div class = "order-container">
    <?php foreach($orders as $order) { ?>
        <div class = "orders"> 
            <h2><?= $order["id"] ?></h2>
            <p><?= $order["order_name"] ?> </p>
        </div>
    <?php } ?>
</div>