<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookmarks</title>
    <link rel="stylesheet" href="<?= base_url('public/css/styles.css') ?>">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        main {
            width: 80%;
            margin: 0 auto;
        }

        h1 {
            color: #007BFF;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        td {
            background-color: #fff;
        }

        td:last-child {
            text-align: center;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main>
        <h1>Bookmarks</h1>
        <table> 
            <thead> 
                <tr>
                    <th>Folder</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
        
            <tbody> 
                <?php foreach ($bookmarks as $bookmark) { ?>
                    <tr>
                        <td><?= $bookmark["folder"] ?></td>
                        <td><?= $bookmark["name"] ?></td>
                        <td><?= $bookmark["url"] ?></td>
                        <td><a href="<?= base_url("/destroy/" . $bookmark["id"]) ?>">Delete</a></td>
                    </tr> 
                <?php } ?>  
            </tbody>
        </table>
        <a href="<?= base_url("/") ?>">Add Bookmark</a>
    </main>
</body>
</html>
