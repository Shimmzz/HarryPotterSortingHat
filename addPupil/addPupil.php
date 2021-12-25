<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add a Pupil</title>
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <div class="centertext">
            <?php
                include '../navMenu.php';                  
            ?>

            <h1>
                Add new pupil!
            </h1>

            <h2 id="addSort">
                <form method="POST" action = "addedPupil.php">
                    <div class="centerText">
                        <label for="input-name" >
                            Name
                        </label>
                        <br>
                        <input type="text" id="input-name" name="inputName" required>
                    </div>
                    
                    <br>

                    <div class="centerText">
                        <label for="input-fav-food">
                            Favourite food
                        </label>
                        <br>
                        <input type="text" id="input-fav-food" name="inputFavFood" required>
                    </div>

                    <br>

                    <div class="centerText">
                        <label for="input-fav-activity">
                            Favourite activity
                        </label>
                        <br>
                        <input type="text" id="input-fav-activity" name="inputFavActivity" required>
                    </div>

                    <br>

                    <div class="centerText">
                        <label for="input-best-trait">
                            Best trait
                        </label>
                        <br>
                        <input type="text" id="input-best-trait" name="inputBestTrait" required>
                    </div>
                    <br>

                    <button id="submitButton" type="submit" class="button">
                        Add pupil!
                    </button>
                </form>
            </div>
        </h2>
        
    </body>
</html>