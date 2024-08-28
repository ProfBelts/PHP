
<ul> 
    <?php foreach($jokes as $joke) { 
        $formatted_date = date("m/d/Y", strtotime($joke["created_at"]));
    ?>
        <li><a href="<?= base_url("jokes/show/" . $joke["id"]) ?>"><?= $joke["title"] ?> (<?= $formatted_date ?>)</a></li>
    <?php } ?>
</ul>
