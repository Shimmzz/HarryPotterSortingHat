<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <h1 id="title">Welcome to the sorting hat!</h1>
        
        

        <?php 
            include "navMenu.php";

            $index = 1;
        ?>
        <nav id="addSort">
            <form action="addPupil/addPupil.php" >
                <input type="submit" class="button"value="Add Pupil">
            </form>
            
            <form action="sortPupil/sortPupil.php" method="POST">
                <button type="submit" class="button">Sort Pupil</button>
                <input type="hidden" name="pupilId" value="1">
            </form>
        </nav>
    </body>
</html>