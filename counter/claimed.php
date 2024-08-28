<?php
session_start();
// $_SESSION = array();
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Coupons</title>

    <style> 
        * {
            padding: 10px;
            box-sizing: border-box; /* Include padding and border in box model */
        }

        body {
            text-align: center;
        }

        h1, form {
            margin: 0 auto;
            text-align: center;
            width: 60%;
        }

        h2 {
            width: 45%;
            margin: 0 auto;
            font-size: 1.7rem;
            padding-bottom: 10px;
            margin-bottom: 5px;
        }

        label {
            font-size: 1.5rem;
            display: block;
            padding: 5px;
            margin-bottom: 10px;
        }

        .sucess input.name {
            display: block;
            padding: 10px;
            width: 30%;
            margin: 0 auto;
        }

        .success input.submit {
            width: 20%;
            background-color: green;
            color: white;
            cursor: pointer;
        }

        .success form {
            border: 1px dotted black;
            width: 25%;
            background-color: yellow;
        }

       .success h1 {
        padding: 10px;
         margin-bottom:20px;
       }
        
       .success input {
            display: inline-block;
            width: 30%;
            margin-right: 20px;
            cursor: pointer;
        }

        form #reset {
            background-color: red;

            
        }

        form #claim {
            background-color: green;
        }

    </style>
</head>
<body>
    <h1>Welcome Customer!</h1>
    <h2>We're giving away<b>free coupons</b>as a token of appreciation.</h2>

    <div> 
        <h2>50% Discount</h2>
        <h1> 1211058 </h1>

        <input id = "reset" type = "submit" value = "Reset">
        <input id= "claim"type = "submit" value = "Claim Again">

    </div>
</body>
</html>
