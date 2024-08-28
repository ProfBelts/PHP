<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "<?= base_url("public/css/new-jokes.css") ?> " />
</head>
<body>
    <h1>Add your own hilarious joke</h1>

    <form method = "POST" action = "<?=base_url("jokes/process_add_jokes") ?>" >

    <label for = "title">Title:</label>
    <input type = "text" name = "title" />

    <label for = "content">Content:</label>
    <textarea name = "content"></textarea>

    <input type = "submit" value = "Add Joke" />

    </form>

</body>
</html>