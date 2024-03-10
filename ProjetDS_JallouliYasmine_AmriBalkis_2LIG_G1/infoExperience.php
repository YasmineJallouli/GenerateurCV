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
                    <li class="nav-item"><a href="infoExperience.php" class="nav-color">Information Experience</a></li>
                    <li class="nav-item"><a href="infoCompetences.php">Information Competence</a></li>
                </ul>
                
            </nav>
            
        </header><hr> <br><br>
        <main>
            <fieldset>
                <legend> 
                    <strong>Expérience Professionnelle</strong>
                </legend>
                <div >
                    <form method="POST" action="" onsubmit="verif()">
                        <br>
                        <label for="nomEntreprise">Nom de l'entreprise:</label>
                        <input type="text" id="nomEntreprise" name="nomEntreprise" required> <br><br>
                        <label for="pEntreprise">Pays de l'entreprise:</label>
                        <input type="text" id="paysEntreprise" name="paysEntreprise" required> <br><br>
                        <label for="posteOccupe">Poste occupé:</label>
                        <input type="text" id="posteOccupe" name="posteOccupe" required> <br><br>
                        <label for="dateDeb" >Date de début:</label>
                        <input type="date" id="dateDeb" name="dateDeb" required> <br><br>
                        <label for="dateFin" id="deb">Date de fin:</label>
                        <input type="date" id="dateFin" name="dateFin" required> <br><br>
                        <label for="descPoste">Description des tâches:</label><br><br>
                        <textarea id="descPoste" name="descPoste" required></textarea><br> <br>
                        <input type="submit" value="Ajouter une autre experience" name="ajoutExperience" />

                        <input type="submit" value="Enregistrer & suivant" name="submitExperience"/><br>

                    </form>
                </div>      
            </fieldset>
        </main>
        <footer>
        </footer>
    </body>
</html>