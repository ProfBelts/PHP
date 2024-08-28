<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up & Log In</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<?php if (isset($errors) && !empty($errors)) { ?>
<div id="error-message">
  <h3>Form Error!</h3>
  <ul>
    <?php foreach ($errors as $error) { ?>
      <li> <?= $error ?></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>

<?php if ($success) { ?>
<div id="success-message">
    <h3>Success!</h3>
    <p><?= $success ?></p>
</div>
<?php } ?>

    <main> 
        <div class="container"> 
            <div class="form-wrapper">
                <h2>Sign Up</h2>
                <form id="sign_up" action = <?= ("register") ?> method = "POST" > 
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" placeholder="Enter your first name">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" placeholder="Enter your last name">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" placeholder="Enter your contact number">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter your email">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm your password">
                    <input type="submit" value="Sign Up">
                </form>
            </div>
            <div class="form-wrapper">
                <h2>Log In</h2>
                <form id="log_in" action = <?= ("login") ?> method= "POST"> 
                    <label for="username">Contact Number/Email</label>
                    <input type="text" name="user_info" placeholder="Email/Number">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <input type="submit" value="Log In">
                </form>
            </div>
        </div>
    </main>
</body>
</html>