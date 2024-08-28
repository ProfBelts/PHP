<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "public/css/styles.css" />
</head>
<body>
    <main> 

    
        <div class = "filter"> 
            <h2>Search Users</h2>
            <form method = "POST" action = <?= ("/players/search") ?>> 
                <input type="text" name="athlete_name" placeholder="Enter Athlete's Name" />
                
                <h4>Gender</h4>
                <input type="checkbox" id="female" name="gender" value="Female">
                <label for="female"> Female</label><br>
                
                <input type="checkbox" id="male" name="gender" value="Male">
                <label for="male"> Male</label><br>
                
                <h4>Sports</h4>
                <input type="checkbox" id="basketball" name="sports" value="Basketball">
                <label for="basketball"> Basketball</label><br>
                
                <input type="checkbox" id="volleyball" name="sports" value="Volleyball">
                <label for="volleyball"> Volleyball</label><br>
                
                <input type="checkbox" id="baseball" name="sports" value="Baseball">
                <label for="baseball"> Baseball</label><br>
                
                <input type="checkbox" id="soccer" name="sports" value="Soccer">
                <label for="soccer"> Soccer</label><br>
                
                <input type="checkbox" id="tennis" name="sports" value="Tennis">
                <label for="boxing"> Tennis</label><br><br>
                
                <input type="submit" value="Search">
            </form>
        </div>

        <div class = "player_info">


        <?php foreach($players as $player) { ?>
            <div class = "player"> 
            <img src = "<?= $player["image"] ?>" />
            <p> <?= $player["name"] ?> </p>
            </div>
        <?php } ?>
        
        </div>
        

            

        

    </main>
</body>
</html>