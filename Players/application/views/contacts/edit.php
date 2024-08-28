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
            font-size: 2rem;
            color: black;
        }

        form {
            max-width: 300px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

    .error {
        width: 18%;
        padding: 15px;
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        text-align: left;
        margin-bottom: 10px;
    }

    </style>
</head>
<body>
    <a href= <?= base_url("/") ?>>Go back <span>|</span></a>

    <a href= <?= base_url("show/" . 1) ?>>Show</a>

    <h1>Edit Contact # <?= $id ?> </h1>
    <?php if (isset($errors) && !empty($errors)) {
        foreach($errors as $error) 
        {
            echo '<div class="error">' . $error . '</div>';
        }
    } ?>  

    <form action =<?= base_url("update") ?> method = "POST"> 
    <label for="name"> 
        Name: 
        <input type="text" name="name" value="<?= $contact["name"] ?>" />
    </label>

    <label for="contact_number"> 
        Contact Number:
        <input type="text" name="contact_number" value="<?= $contact["contact_number"] ?>" />
    </label>

        <input type="submit" value="Save" />
    </form>
</body>
</html>
