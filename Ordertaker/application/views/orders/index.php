<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Taker</title>
    <link rel="stylesheet" href="public/css/styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script> 
        $(document).ready(function() {

          $.get("/orders/index_html", function(res) {
            $(".order-container").html(res)
          });
            $(document).on("submit", 'form', function(e) {
                let form = $(this);
                $.post(form.attr('action'), form.serialize(), function(res) {
                    $(".order-container").html(res);
                });
                return false;
            });

        });
    </script>
</head>
<body>
    <h1>Order Queue:</h1>

    <div class="order-container">
    </div>

    <footer>
        <form class="add_order" method="POST" action="<?= base_url('orders/create') ?>">
            <input type="text" name="orders" />
            <input type="submit" value="Submit" />
        </form>
    </footer>

</body>
</html>
