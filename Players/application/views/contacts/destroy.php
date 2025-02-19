<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <style> 
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #007BFF;
        }

        h2 {
            margin: 20px 0;
            font-size: 1.2em;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        input.delete {
            padding: 10px 20px;
            font-size: 1em;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <h1>Are you sure you want to delete <?= $contact_number ?> ?</h1>
    <form action="<?= base_url("delete/" . $id) ?>" method="POST"> 
        <input type="submit" value="No" name="back" />
        <input type="submit" value="Yes, I want to delete" name="delete" class = "delete" /> 
    </form>

</body>
</html>
