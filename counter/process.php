<?php

session_start();


function generateUniqueCode() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomAlphabet = $alphabet[rand(0, strlen($alphabet) - 1)] . $alphabet[rand(0, strlen($alphabet) - 1)] . $alphabet[rand(0, strlen($alphabet) - 1)];
    
    $numericPart = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    return $randomAlphabet . $numericPart;
}



if(isset($_POST["action"]) && $_POST["action"] === "submit_name") {
    

    
    if (empty($_POST["name"])) {
        header("Location: index.php?error=name_required");
        exit(); // Make sure to exit to prevent further execution
    }


    if(isset($_SESSION["counter"])) {    
        $_SESSION["has_submitted"] = TRUE;  
        $_SESSION["code"] = generateUniqueCode();
        $_SESSION["counter"] = $_SESSION["counter"] - 1;
        header("Location: index.php");
    }
     
}


if(isset($_POST["btn_submit"])) {
    if($_POST["btn_submit"] === "Claim Again") {
        $_SESSION["has_submitted"] = FALSE;
        $_SESSION["default_message"] = "We're giving away <b>free coupons</b> as a token of appreciation for the first " . $_SESSION["counter"] . " customer(s)";
    
    if($_SESSION["counter"] === 0) {
        $_SESSION["default_message"] = "Sorry, We're Out of Coupons";
    }
        
    }
    if($_POST["btn_submit"] === "Reset") {
        $_SESSION = array();
    }

    header("Location: index.php");

}
?>