<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joke Joke Joke</title>
    <link rel = "stylesheet" href = "public/css/styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
    $(document).ready(function() {
        
        // Get the value of the checked button from radio button.
        $('input[name="sort"]').change(function() {
            let sort_option = $('input[name="sort"]:checked').val();
            $.get("<?= base_url("jokes/sort") ?>", {sort: sort_option}, function(res) {
                
                $("ul").html(res);
            });
            return false;
        });
    });
</script>


</head>
<body>
        <h1>Jokes List (<?= count($jokes) ?>)</h1>
        <a class="new_page" href = "<?= base_url("jokes/new") ?>">Add Jokes</a>

        <form> 
            <input type="radio" id="old" name="sort" value="Old">
            <label for="old">Old</label>
            <input type="radio" id="recent" name="sort" value="Recent">
            <label for="recent">Recent</label>
        </form>

    <ul> 
        <?php foreach($jokes as $joke) { 
            $formatted_date = date("m/d/Y", strtotime($joke["created_at"]));
            ?>
            <li><a href = "<?= base_url("jokes/show/" . $joke["id"]) ?>"> <?= $joke["title"] ?> (<?= $formatted_date ?>)</a> </li>
        <?php } ?>

        
    </ul>
</body>
</html>