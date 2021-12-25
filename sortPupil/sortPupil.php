<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sort Pupils</title>
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <?php
            include '../navMenu.php';
            include '../database/index.php';
            $conn = new Database("localhost", "root", "root", "sortinghat", 3306);
            
            $pupilId= $_POST['pupilId'];
            
            $allData = $conn->getQuery("SELECT * FROM Pupils");

            if($pupilId > count($allData)){
            
        ?>
        <nav id="addSort" >
            <form action="../addPupil/addPupil.php" >
                    <input type="submit" class="button anotherPupil" value="Add Pupil">
            </form>
            <form action="sortPupil.php" method="POST">
                <button type="submit" class="button anotherPupil">Sort Pupils Again!</button></a>
                <input type="hidden" name="pupilId" value="1">
            </form>
        </nav>
        <?php  
            }
            else{
                $currentPupil = $conn->getQuery("SELECT * FROM Pupils WHERE PupilId='$pupilId'");
                
                foreach ($currentPupil as $pupil){
                    $pupilName = $pupil['Name'];
                    $pupilFavActivity = $pupil['FavActivity'];
                    $pupilFavFood = $pupil['FavFood'];
                    $pupilBestTrait = $pupil['BestTrait'];
        ?>

        <h1>Sort Pupil!</h1>
        <h2 class="centerText">Choose a house to which you want the pupil to be assigned to.</h2>
        
        <div id="pupilData1">
            <h3>Name: <?php echo $pupilName; ?> </h3>
            <h3>Favourite Activity: <?php echo $pupilFavActivity; ?> </h3>
            <h3>Favourite Food: <?php echo $pupilFavFood; ?> </h3>
            <h3>Best Trait: <?php echo $pupilBestTrait; ?></h3>
        </div>
        <?php
                }
        ?>
        <div id="housebuttons">
            <form action="sortedPupil.php" method="POST">
                <button type="submit" name="house" value="Gryffindor" class="button">Gryffindor</button>
                <input type="hidden" name="pupilId" value="<?php echo $pupilId;?>">
            </form>

            <form action="sortedPupil.php" method="POST">
                <button type="submit" name="house" value="Hufflepuff" class="button">Hufflepuff</button>
                <input type="hidden" name="pupilId" value="<?php echo $pupilId;?>">
            </form>

            <form action="sortedPupil.php" method="POST">
                <button type="submit" name="house" value="Ravenclaw" class="button">Ravenclaw</button>
                <input type="hidden" name="pupilId" value="<?php echo $pupilId;?>">
            </form>

            <form action="sortedPupil.php" method="POST">
                <button type="submit" name="house" value="Slytherin" class="button">Slytherin</button>
                <input type="hidden" name="pupilId" value="<?php echo $pupilId;?>">
            </form>
        </div>
        <?php
            }
        ?>
        
    </body>
</html>