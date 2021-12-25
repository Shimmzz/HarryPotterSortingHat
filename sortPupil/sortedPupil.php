<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pupil Successfully Sorted</title>
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <?php
            include '../navMenu.php';
            include '../database/index.php';
            $conn = new Database("localhost", "root", "root", "sortinghat", 3306);
        
            $pupilId= $_POST['pupilId'];
            $house = $_POST['house'];
            
            switch($house){
                case "Gryffindor":
                    $conn->insertQuery("CALL AddVoteGryffindor('$pupilId');");
                    break;
                case "Hufflepuff":
                    $conn->insertQuery("CALL AddVoteHufflepuff('$pupilId');");
                    break;
                case "Ravenclaw":
                    $conn->insertQuery("CALL AddVoteRavenclaw('$pupilId');");
                    break;
                case "Slytherin":
                    $conn->insertQuery("CALL AddVoteSlytherin('$pupilId');");
                    break;
            }

        
            $currentPupil = $conn->getQuery("SELECT * FROM Pupils WHERE PupilId='$pupilId'");
            foreach ($currentPupil as $pupil){
                $pupilName = $pupil['Name'];
                $pupilFavActivity = $pupil['FavActivity'];
                $pupilFavFood = $pupil['FavFood'];
                $pupilBestTrait = $pupil['BestTrait'];
        ?>

        <h1>Sort Pupil!</h1>
        <h2 class="centerText">You chose <?php echo $house; ?></h2>
        
        <div id="pupilData1">
            <h3>Name: <?php echo $pupilName; ?> </h3>
            <h3>Favourite Activity: <?php echo $pupilFavActivity; ?> </h3>
            <h3>Favourite Food: <?php echo $pupilFavFood; ?> </h3>
            <h3>Best Trait: <?php echo $pupilBestTrait; ?></h3>
        </div>
        
        <?php
            }
            $conn->insertQuery("CALL AllPercent('$pupilId', @gryff, @huff, @rav, @sly);");
            $allVotes = $conn->getQuery("SELECT @gryff, @huff, @rav, @sly;");
            foreach($allVotes as $vote){    
        ?>

        <h2 class="centerText" id="votesSize">VOTES:</h2>
        <div id="voteResults">
            <h3>Gryffindor: <?php echo $vote['@gryff'];?> %</h3>
            <h3>Hufflepuff: <?php echo $vote['@huff'];?> %</h3>
            <h3>Ravenclaw: <?php echo $vote['@rav'];?> %</h3>
            <h3>Slytherin: <?php echo $vote['@sly'];?> %</h3>
        </div>

        <?php
            }
            $pupilId++;
        ?>
        <form action="sortPupil.php" method="POST" id="addSort">
            <button type="submit" name="pupilId" value=<?php echo $pupilId;?> class="button anotherPupil">Next pupil</button>
        </form>
    </body>
</html>