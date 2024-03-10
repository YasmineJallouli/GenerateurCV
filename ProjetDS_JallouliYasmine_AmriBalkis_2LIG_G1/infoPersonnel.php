<?php
require('index.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Générateur de cv</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="shortcut icon" href="logo.png" />
        <script src="test.js"></script>
    </head>
    <body>
        <header>
            <div class="header-logo">
                <img src="logo.png" alt="BY - Generateur CV"/>
            </div>
            <nav class="nav">
                <ul class="nav-items">
                <li class="nav-item"><a href="login.php">Creer un CV</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item"><a href="infoPersonnel.php" class="nav-color">Information Personnel</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item"><a href="infoFormation.php">Information Education</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item"><a href="infoExperience.php">Information Experience</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item"><a href="infoCompetences.php">Information Competence</a></li>
                </ul>
                
            </nav>
            
        </header><hr> <br><br>
        <main>
        <fieldset>
            <legend> 
                    <strong>  Information personnel </strong>
            </legend>     
            <br>
            <div>
                <form  onsubmit="verif()" method="POST" action="">
                    
                    <label for="nom" >Nom : </label>
                    <input type="text"  name="nom" required><br><br>
                    <label for="prenom">Prenom : </label>                    
                    <input type="text" name="prenom" required><br><br>
                    <label for="positionActuelle">Position actuelle : </label>                    
                    <input type="text" name="positionActuelle" required>
                    <br> <br>
                    <label for="numTel">Numéro de Téléphone : </label>
                    <input type="tel"  name="numTel" required>
                    <br>  <br>
                    <label for="ville">Ville : </label>
                    <input type="text"  name="ville"  required> <br> <br>
                    <label for="pays">Pays : </label>
                    <input type="text"  name="pays"  required><br><br>
                    <input type="submit" value="Enregistrer & suivant" name="submitPersonne"/><br>
                </form> 
            </div>
        </fieldset>
    </main>
        <footer>
        </footer>
    </body>
</html>