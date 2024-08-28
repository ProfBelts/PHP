<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Contacts</title>
    <link rel="stylesheet" href="<?= ('public/css/styles.css') ?>">
</head>
<body>
    <main>
        <h1>Contacts</h1>
        <table> 
            <thead> 
                <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach($contacts as $contact) { ?>
                    <tr>
                        <td><?= $contact["name"] ?></td>
                        <td><?= $contact["contact_number"] ?></td>
                        <td>
                            <ul> 
                                <li><a href="<?= ("show/" . $contact["id"]) ?>">Show</a></li>
                                <li><a href="<?= ("edit/" . $contact["id"]) ?>">Update</a></li>
                                <li><a href="<?=("destroy/" . $contact["id"]) ?>">Remove</a></li>
                            </ul>
                        </td>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>
        <a class="add" href="<?= ("new") ?>">Add Contact</a>
    </main>
</body>
</html>
