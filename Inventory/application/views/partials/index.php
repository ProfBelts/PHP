<?php  
 $rows_per_page = 5; 

// Calculate total number of rows
$total_rows = count($items);

// Calculate total number of pages
$total_pages = ceil($total_rows / $rows_per_page);

// Calculate the starting index of the items to display on the current page
$start_index = ($page - 1) * $rows_per_page;

// Get a subset of items to display on the current page
$page_items = array_slice($items, $start_index, $rows_per_page);

// Loop through the items on the current page
foreach($page_items as $item) { ?>
    <tr> 
        <td><?= $item["name"] ?></td>
        <td><?= $item["stock_number"] ?></td>
        <td>$<?= $item["price"] ?></td>
        <td><?= $item["created_at"] ?></td>
    </tr>
<?php } ?>


