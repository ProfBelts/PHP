<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url("public/css/styles.css") ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
    $(document).ready(function() {
        // Load initial orders on page load
        $.get("<?= base_url("orders/partials") ?>", function(res) {
            $(".order-container").html(res);
        });

        // Handle form submission
        $('form').submit(function(event) {
            event.preventDefault(); 
            $.post("<?= base_url("orders/create_order") ?>", $(this).serialize(), function(res) {
                $(".order-container").html(res);
            });
        });    
    });
</script>

</head>
<body>
    <h1>Order Queue:</h1>
    <div class="order-container"></div>
    <footer>
        <form method="POST" action="<?= base_url('orders/create_order') ?>">
            <input type="text" name="orders" />
            <input type="submit" value="Submit" />
        </form>
    </footer>
</body>
</html>
