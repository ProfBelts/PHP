<div class="pagination">
    <?php 
    $total_pages = ceil(count($items) / 5); 
    for ($i = 1; $i <= $total_pages; $i++) { ?>
        <a class="page_number" href="#" data-page = <?= $i ?> >
        <?= $i ?>
    </a>
    <?php } ?>
</div>
