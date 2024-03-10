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
                    <li class="nav-item"><a href="login.php">Creer un CV</a></li>
                    <li class="nav-item"><a href="infoPersonnel.php">Information Personnel</a></li>
                    <li class="nav-item"><a href="infoFormation.php">Information Education</a></li>
                    <li class="nav-item"><a href="infoExperience.php">Information Experience</a></li>
                    <li class="nav-item"><a href="infoCompetences.php" class="nav-color">Information Competence</a></li>
                </ul>
                
            </nav>
            
        </header><hr> <br><br>
        <main>
            <fieldset>
                <legend>
                    <strong>Compétences</strong> 
                </legend>
                <div>
                    <form method="POST" action="">
                        <label for="competence">Entrez vos compétences:</label>
                        <textarea id="competence" name="competence" cols="40" rows="4" required></textarea><br> <br>

                        <input type="submit" value="Enregistrer " name="submitCompetence"/><br>

                    <form>
                </div>
            </fieldset>
        </main>
    </body>
</html>