<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="public/css/cart.css" />
</head>
<body>
    <nav> 
        <h1>My Store</h1>
        <a href="/">Catalog</a>
    </nav>

    <section> 
        <h2>Shopping Cart</h2>
        <?php 
            $total = 0; // Initialize total amount
            foreach($products as $product) { 
                // Calculate subtotal for each product
                $subtotal = isset($cart[$product["id"]]) ? $cart[$product["id"]] * $product["price"] : 0;
                // Add subtotal to total
                $total += $subtotal;
            }
        ?>
        <h3>Total: Php <?= $total ?> </h3> <!-- Display total amount -->
        <table> 
            <thead> 
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach($products as $product) { ?>
                    <tr>
                        <td><?= $product["name"] ?></td>
                        <td><?= isset($cart[$product["id"]]) ? $cart[$product["id"]] : 0 ?></td>
                        <td><?= $product["price"] ?></td>
                        <td> 
                        <form method="post" action="/shops/remove_from_cart">
                        <input type="hidden" name="product_id" value="<?= $product["id"] ?>">
                        <button type="submit">X</button>
                    </form>

                        </td>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>
