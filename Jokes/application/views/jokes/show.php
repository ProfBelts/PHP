<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokes List</title>
    <link rel="stylesheet" href="<?= base_url("public/css/show.css") ?>">
</head>
<body>
    <div> 
    <h1><?= $joke["title"] ?></h1>
    <a class="delete_page" href="<?= base_url("jokes/delete/" . $joke["id"]) ?>">Delete Joke</a>
    </div>

    <div> 
    <p class="joke-content"><?= $joke["content"] ?></p>
    <a class="add_page" href="<?= base_url("jokes/new") ?>">Add Joke</a>
    </div>
</body>
</html>
