<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('public/css/styles.css') ?>">
</head>
<body>
    <h1>Add a Bookmark</h1>

    <?php if (isset($errors) && !empty($errors)) {
        foreach($errors as $error) 
        {
            echo '<div class="error">' . $error . '</div>';
        }
    } ?>
        
    <form method="POST" action="<?= base_url("/process") ?>"> 
        <label for="name"> 
            Name:
            <input type="text" name="name"/>
        </label>

        <label for="url"> 
            URL:
            <input type="text" name="url"/>
        </label>
    
        <label for="folder"> 
            Folder:
            <select name="folder"> 
                <option value="favorites">Favorites</option>
                <option value="others">Others</option>
            </select>
        </label>

        <input type="submit" value="Add" />
    </form>
</body>
</html>
