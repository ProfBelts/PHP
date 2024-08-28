<?php
session_start();


function generateUniqueCode() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomAlphabet = $alphabet[rand(0, strlen($alphabet) - 1)] . $alphabet[rand(0, strlen($alphabet) - 1)] . $alphabet[rand(0, strlen($alphabet) - 1)];
    
    $numericPart = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    return $randomAlphabet . $numericPart;
}


// $_SESSION = array();
if (isset($_GET["error"]) && $_GET["error"] === "name_required") {
    $warning_message = "Please enter your name before submitting.";
}


if (!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 3;
    $_SESSION["has_submitted"] = FALSE;
    $_SESSION["default_message"] = "We're giving away <b>free coupons</b> as a token of appreciation for the " . ($_SESSION["counter"] > 0 ? "first " . $_SESSION["counter"] : "next customer") . "(s)";
    $_SESSION["code"] = generateUniqueCode();
} 


var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Coupons</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Welcome Customer!</h1>

    <?php
    if ($_SESSION["has_submitted"] === TRUE) {
        $message = "We're giving away free coupons as a token of appreciation.";
    }
    ?>

    <h2><?= $_SESSION["has_submitted"] === TRUE ? $message : ($_SESSION["has_submitted"] === TRUE && $_SESSION["counter"] > 0 ? $_SESSION["default_message"] : $_SESSION["default_message"]) ?></h2>

    <?php if (isset($warning_message)) { ?>
        <p style="color: red;"><?= $warning_message ?></p>
    <?php } ?>

    <form method="POST" action="process.php">
        <?php if ($_SESSION["has_submitted"] === FALSE) { ?>
            <input type="hidden" name="action" value="submit_name">
            <label for="user"> 
                Kindly Type your name: 
                <input class="name" type="text" name="name">      
            </label>
            <input class="submit" type="submit" value="Submit">
        </form>  
        <?php } else { ?>
            <!-- HTML code within the else block -->
            <div class = "success">
            
                <h2><?= $_SESSION["counter"] < 0 ? "Sorry!" : "50% Discount" ?></h2>
                <h1><?= $_SESSION["counter"] < 0 ? "UNAVAILABLE" :"Coupon Code:" . $_SESSION["code"]; ?> </h1>
                <form method = "POST" action="process.php">
                        <input id="reset" type="submit" value="Reset" name = "btn_submit">
                        <input id="claim" type="submit" value="Claim Again" name = "btn_submit">
                </form>
            </div>
        <?php } ?>

</body>
</html>