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
                    <li class="nav-item"><a href="infoFormation.php" class="nav-color">Information Education</a></li>
                    <li class="nav-item"><a href="infoExperience.php">Information Experience</a></li>
                    <li class="nav-item"><a href="infoCompetences.php">Information Competence</a></li>
                </ul>
                
            </nav>
            
        </header><hr> <br><br>
        <main>
            
            <div>
                <fieldset>
                    <legend> 
                        <strong>Formation </strong>
                    </legend>
                    <form  method="POST" action="" onsubmit="verif()">
                        <label for="diplomePersonne">Diplôme obtenu:</label>
                        <input type="text" name="diplomePersonne" required> <br><br>
                        <label for="nomEcole">Nom de l'école:</label>
                        <input type="text" name="nomEcole" required>  <br><br>
                        <label for="paysEcole">Pays de l'ecole:</label>
                        <input type="text" name="paysEcole" required> <br><br>
                        <label for="dateDeb">Date de début:</label> 
                        <input type="date"  name="dateDeb" required><br><br>
                        <label for="dateFin" >Date de fin:</label> 
                        <input type="date" name="dateFin" required><br><br>
                        <label for="domaine">Domaine d'étude:</label>
                        <input type="text" name="domaine" required>
                        <br> <br>
                        <label for="langue">Langues : </label>
                        <textarea id="langue" name="langue" required></textarea><br><br>
                        <input type="submit" value="Ajouter une autre formation" name="ajoutFormation" />
                        <input type="submit" value="Enregistrer & suivant" name="submitFormation" /><br>

                    </form> 
                </fieldest>
            </div>
           
        </main>
        <footer>
        </footer>
    </body>
</html>