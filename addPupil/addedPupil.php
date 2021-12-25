<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupil Successfully Added</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
        <?php
            include '../navMenu.php';         
            include "../database/index.php";

            $conn = new Database("localhost", "root", "root", "sortinghat", 3306);

            $inputName = $_POST['inputName'];
            $inputFavFood = $_POST['inputFavFood'];
            $inputFavActivity = $_POST['inputFavActivity'];
            $inputBestTrait = $_POST['inputBestTrait'];

            $conn->insertQuery("CALL AddPupil('$inputName','$inputFavActivity','$inputFavFood','$inputBestTrait')");
        ?>

        <h1>
            Succes!
        </h1>

        <br>

        <div id="pupilData2">
            <h2>Name: <?php echo $inputName; ?> </h2>
            <h2>Favourite Activity: <?php echo $inputFavActivity; ?> </h2>
            <h2>Favourite Food: <?php echo $inputFavFood; ?> </h2>
            <h2>Best Trait: <?php echo $inputBestTrait; ?></h2>
            
            <form action="addPupil.php" >
                <input type="submit" class="button anotherPupil"value="Add Another Pupil">
            </form>
        </div>
            
</body>
</html>