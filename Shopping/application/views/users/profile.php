


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style> 
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Add position relative */
        }

        .auth-links {
            position: absolute;
            right: 0px;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-left: 20px; /* Add margin-left instead of margin-right */
        }

        h1, h2 {
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="auth-links">
        <?php if(!$logged_in) { ?>
            <a href="<?= base_url('/') ?>">Log-in</a>
        <?php } else { ?> 
            <a href="<?= base_url('users/logout') ?>">Sign-out</a>
        <?php } ?>
    </div>
    
    <?php if(!$logged_in) { ?>
        <h1>Welcome! Please log-in to see details.</h1>
    <?php } else { 
        $date_string = $user["created_at"];

        $date_time = new DateTime($date_string);
        
        $formatted_date = $date_time->format('d M Y g:ia');
        
        ?> 
        <h2>Basic information</h2>
        <p>First name: <?= $user["first_name"] ?> </p>
        <p>Last Name: <?= $user["last_name"] ?> </p>
        <p>Contact number: <?= $user["contact_number"] ?> </p>
        <p>Last failed login: <?= $formatted_date ?> </p>
    <?php } ?>
</div>
</body>
</html>
