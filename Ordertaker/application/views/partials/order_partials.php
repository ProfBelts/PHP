<?php foreach($orders as $order) { ?>
    <div class="order-container">
        <div class="orders"> 
            <form class="delete_order" action="/orders/delete" method="POST"> 
                <input type="hidden" name="order_id" value="<?= $order["id"] ?>">
                <button type="submit" class="delete_button">X</button>
            </form>
                <form class="edit_order" action="/orders/update" method="POST"> 
                    <h2>Order ID: <?= $order["id"] ?> </h2>
                    <p><?= $order["order_name"] ?></p>
                    <button type="submit" class="edit_button">Edit</button>
                    <input type="hidden" name="order_id" value="<?= $order["id"] ?>">
                   <textarea name = "edited_order"> </textarea>
                </form>
        </div>
    </div>
<?php } ?>