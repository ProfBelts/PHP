<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
    <style> 
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
        }

        a {
            font-size: 1.5rem;
            text-decoration: none;
            color: #007BFF;
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 20px;
        }

        a span {
            color: #ccc;
            margin-right: 5px;
            margin-left: 5px;
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 3rem;
            color: black;
        }

        h2 {
            margin-bottom: 10px;
            font-size: 2rem;
        }

        ul {
            list-style: none;
            padding-left: 0;
            font-size: 1.2rem;
        }

        li {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <a href="<?= base_url("/") ?>">Go back <span>|</span></a>

    <a href="<?= base_url("edit/" . $id) ?>">Edit</a>
    <h1>Contact #<?= $id ?></h1>

    <ul> 
        <li><?= $name ?></li>
        <li>Contact Number: <?= $contact_number ?></li>
    </ul>
</body>

</html>
