<?php 
foreach($items as $item) { ?>
    <tr> 
        <td><?= $item["name"] ?></td>
        <td><?= $item["stock_number"] ?></td>
        <td>$<?= $item["price"] ?></td>
        <td><?= $item["created_at"] ?></td>
    </tr>
<?php } ?>
?>