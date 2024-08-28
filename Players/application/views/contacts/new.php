<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
    <link rel="stylesheet" href="<?= base_url('public/css/new_user.css') ?>">
</head>
<body>


    <a href= <?= base_url("/") ?>>Go back</a>

    <h1>Add New Contact</h1>
    <?php if (isset($errors) && !empty($errors)) {
        foreach($errors as $error) 
        {
            echo '<div class="error">' . $error . '</div>';
        }
    } ?>
    <form action = <?= ("add") ?> method = "POST"> 
        <label for="name"> 
            Name:
            <input type="text" name="name"/>
        </label>

        <label for="contact_number"> 
            Contact Number:
            <input type="text" name="contact_number"/>
        </label>

        <input type="submit" value="Create" />
    </form>
</body>
</html>
