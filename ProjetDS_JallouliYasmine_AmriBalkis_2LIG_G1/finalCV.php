<?php
   
require('index.php');
$dsn="mysql:host=localhost;dbname=bd_personne";
$conn=new PDO($dsn,'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$email = $_GET['email'];
$reqAffiche=$conn->prepare("SELECT * from personne p, user u, infoexperience e, infoformation f, infocompetence c  
                                where u.email=p.email and u.email=e.email and u.email=f.email  and u.email=c.email and u.email='$email'");
$reqAffiche->execute();
$resultats = $reqAffiche->fetch(PDO::FETCH_ASSOC);


$nom=$resultats['nom'];
$prenom=$resultats['prenom'];
$positionActuelle=$resultats['positionActuelle'];
$email=$resultats['email'];
$numTel=$resultats['numTel'];
$ville=$resultats['ville'];
$pays=$resultats['pays'];

$reqFormation = $conn->prepare("SELECT * FROM infoformation WHERE email = '$email'");
$reqFormation->execute();
$formations = $reqFormation->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les informations d'expérience pour cet utilisateur
$reqExperience = $conn->prepare("SELECT * FROM infoexperience WHERE email = '$email'");
$reqExperience->execute();
$experiences = $reqExperience->fetchAll(PDO::FETCH_ASSOC);

$competence=$resultats['competence'];

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Générateur de cv</title>
        <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="logo.png" />
    <script>
        function afficherFormulaireModification() {

            document.getElementById('nom-prenom').style.display = 'none';
            document.getElementById('position').style.display = 'none';
            document.getElementById('info-prof').style.display = 'none';
            document.getElementById('infofor').style.display = 'none';
            document.getElementById('infoex').style.display = 'none';
            document.getElementById('infocomp').style.display = 'none';
            document.getElementById('infolang').style.display = 'none';

            document.getElementById('modifier').style.display = 'none';
            document.getElementById('formulaire-modification').style.display = 'block';
            
            // Récupérer les nouvelles valeurs des champs pour la personne
            var nouveauNom = document.getElementById('nom').value;
            var nouveauPrenom = document.getElementById('prenom').value;
            var nouvellePosition = document.getElementById('positionActuelle').value;
            var nouveauNumTel = document.getElementById('numTel').value;
            var nouvelleVille = document.getElementById('ville').value;
            var nouveauPays = document.getElementById('pays').value;

            // Attribuer les nouvelles valeurs aux champs du formulaire pour la personne
            document.getElementById('nom').value = nouveauNom;
            document.getElementById('prenom').value = nouveauPrenom;
            document.getElementById('positionActuelle').value = nouvellePosition;
            document.getElementById('numTel').value = nouveauNumTel;
            document.getElementById('ville').value = nouvelleVille;
            document.getElementById('pays').value = nouveauPays;

            // Répéter le processus pour les autres sections (Formation, Expérience, Compétence)
            // Attribuer les nouvelles valeurs aux champs du formulaire pour la formation
            var nouveauDiplome = document.getElementById('diplomePersonne').value;
            var nouveauNomEcole = document.getElementById('nomEcole').value;
            var nouveauPaysEcole = document.getElementById('paysEcole').value;
            var nouvelleDateDebut = document.getElementById('dateDeb').value;
            var nouvelleDateFin = document.getElementById('dateFin').value;
            var nouveauDomaine = document.getElementById('domaine').value;
            var nouvelleLangue = document.getElementById('langue').value;

            document.getElementById('diplomePersonne').value = nouveauDiplome;
            document.getElementById('nomEcole').value = nouveauNomEcole;
            document.getElementById('paysEcole').value = nouveauPaysEcole;
            document.getElementById('dateDeb').value = nouvelleDateDebut;
            document.getElementById('dateFin').value = nouvelleDateFin;
            document.getElementById('domaine').value = nouveauDomaine;
            document.getElementById('langue').value = nouvelleLangue;

            // Attribuer les nouvelles valeurs aux champs du formulaire pour l'expérience
            var nouveauNomEntreprise = document.getElementById('nomEntreprise').value;
            var nouveauPaysEntreprise = document.getElementById('paysEntreprise').value;
            var nouveauPosteOccupe = document.getElementById('posteOccupe').value;
            var nouvelleDateDebExp = document.getElementById('dateDebExp').value;
            var nouvelleDateFinExp = document.getElementById('dateFinExp').value;
            var nouveauDescPoste = document.getElementById('descPoste').value;

            document.getElementById('nomEntreprise').value = nouveauNomEntreprise;
            document.getElementById('paysEntreprise').value = nouveauPaysEntreprise;
            document.getElementById('posteOccupe').value = nouveauPosteOccupe;
            document.getElementById('dateDebExp').value = nouvelleDateDebExp;
            document.getElementById('dateFinExp').value = nouvelleDateFinExp;
            document.getElementById('descPoste').value = nouveauDescPoste;

            // Attribuer les nouvelles valeurs aux champs du formulaire pour la compétence
            var nouvelleCompetence = document.getElementById('competence').value;

            document.getElementById('competence').value = nouvelleCompetence;

            
        }
    </script>
    </head>   
    <body>
        <main>
            <div class="info-personnel">
                <p id="nom-prenom">

                    <?php 
                        
                        echo $nom." ".$prenom."<br>";
                    ?>
                </p>
                <p id="position">
                    <?php
                        echo $positionActuelle."<br>";
                    ?>
                </p>
                <p id="info-prof">
                <?php 
                    echo $email . "<br>";
                    echo $numTel . "<br>";
                    echo $ville . "<br>";
                    echo $pays . "<br>";
                ?>


                </p>
            </div>
            <div class="info-formation" id="infofor">
                <fieldset>
                <legend>Formation </legend>
                    <p class="formation">
                    
                        <?php 
                        
                             // Récupérer les informations de formation pour cet utilisateur
                             $reqFormation = $conn->prepare("SELECT * FROM infoformation WHERE email = '$email'");
                             $reqFormation->execute();
                             $formations = $reqFormation->fetchAll(PDO::FETCH_ASSOC);
                             foreach ($formations as $formation) {
                                 echo "<ul> <li> <b>".$formation['diplomePersonne'] . "</b><br>";
                                 echo $formation['nomEcole'] . "<br>";
                                 echo $formation['paysEcole'] . "<br>";
                                 echo "Date début: ".$formation['dateDeb'] . "<br>";
                                 echo "Date fin: ".$formation['dateFin'] . "<br>";
                                 echo $formation['domaine'] . "<br><br> </li></ul>";
                            }
                        
                        ?>
                    </p>
                </fieldset>
            </div>
            <div class="info-experience" id="infoex">
                <fieldset>
                    <legend>Experience</legend>
                    <p class="experience">
                        
                        <?php 
                            // Récupérer les informations d'expérience pour cet utilisateur
                            
                            $reqExperience = $conn->prepare("SELECT * FROM infoexperience WHERE email = '$email'");
                            $reqExperience->execute();
                            $experiences = $reqExperience->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($experiences as $experience) {
                                echo "<ul> <li> <b>".$experience['nomEntreprise'] . "</b><br>";
                                echo $experience['paysEntreprise'] . "<br>";
                                echo $experience['posteOccupe'] . "<br>";
                                echo "Date début: ".$experience['dateDeb'] . "<br>";
                                echo "Date fin: ".$experience['dateFin'] . "<br>";
                                echo $experience['descPoste'] . "<br><br></li></ul>";
                            }
                        ?>
                    </p>
                </fieldset>
            </div>
            <div class="info-competence" id="infocomp">
                <fieldset>
                    <legend> Competence </legend>
                    <p class="competence">
                        <?php 
                            echo $competence . "<br>";
                        ?>               
                    </p>
                </fieldset>
            </div>
            <div class="info-langue" id="infolang">
                <fieldset>
                    <legend> Langue </legend>
                    <p class="langue">
                        <?php 
                        $reqlangue = $conn->prepare("SELECT langue FROM infoformation WHERE email = '$email'");
                        $reqlangue->execute();
                        $langues = $reqlangue->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($langues as $langue) {
                            echo $langue['langue'] . "<br>";
                        }
                        ?>               
                    </p>
                </fieldset>
            </div>
            <form action="" method="POST">
                <input type="button" name="modifier" value="Modifier le CV"  id="modifier" onclick="afficherFormulaireModification();"/>
            </form>
            
            <div class="info-personnel" style="display: none;" id="formulaire-modification">
            
                <form action="" method="POST">
                    
                
                <label for="nom">Nom :</label><br>
                <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>"><br>
                <label for="prenom">Prénom :</label><br>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>"><br>
                <label for="positionActuelle">Position Actuelle :</label><br>
                <input type="text" id="positionActuelle" name="positionActuelle" value="<?php echo $positionActuelle; ?>"><br>
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <label for="numTel">Numéro de téléphone :</label><br>
                <input type="text" id="numTel" name="numTel" value="<?php echo $numTel; ?>"><br>
                <label for="ville">Ville :</label><br>
                <input type="text" id="ville" name="ville" value="<?php echo $ville; ?>"><br>
                <label for="pays">Pays :</label><br>
                <input type="text" id="pays" name="pays" value="<?php echo $pays; ?>"><br>

                <!--info Formation-->
                <?php 
                        
                // Récupérer les informations de formation pour cet utilisateur
                    
                    foreach ($formations as $formation) {?>
                        <label for="diplomePersonne">Diplôme obtenu:</label>
                        <input type="text" name="diplomePersonne" id="diplomePersonne" required value="<?php echo $formation['diplomePersonne']; ?>"> <br><br>
                        <label for="nomEcole">Nom de l'école:</label>
                        <input type="text" name="nomEcole" id="nomEcole" required value="<?php echo $formation['nomEcole']; ?>">  <br><br>
                        <label for="paysEcole">Pays de l'ecole:</label>
                        <input type="text" name="paysEcole" id="paysEcole" required value="<?php echo $formation['paysEcole']; ?>"> <br><br>
                        <label for="dateDeb">Date de début:</label> 
                        <input type="date"  name="dateDeb" id="dateDeb" required value="<?php echo $formation['dateDeb']; ?>"><br><br>
                        <label for="dateFin" >Date de fin:</label> 
                        <input type="date" name="dateFin" id="dateFin" required value="<?php echo $formation['dateFin']; ?>"><br><br>
                        <label for="domaine">Domaine d'étude:</label>
                        <input type="text" name="domaine" id="domaine" required value="<?php echo $formation['domaine']; ?>">
                        <br> <br>
                        <label for="langue">Langues : </label>
                        <textarea id="langue" name="langue" required ><?php echo $formation['langue']; ?></textarea><br><br>
                    <?php }?>
                    <!-- info experience -->
                    <?php
                        
                        foreach ($experiences as $experience) {?>
                            <label for="nomEntreprise">Nom de l'entreprise:</label>
                            <input type="text" id="nomEntreprise" name="nomEntreprise" required value="<?php echo $experience['nomEntreprise']; ?>"> <br><br>
                            <label for="pEntreprise">Pays de l'entreprise:</label>
                            <input type="text" id="paysEntreprise" name="paysEntreprise" required value="<?php echo $experience['paysEntreprise']; ?>"> <br><br>
                            <label for="posteOccupe">Poste occupé:</label>
                            <input type="text" id="posteOccupe" name="posteOccupe" required value="<?php echo $experience['posteOccupe']; ?>"> <br><br>
                            <label for="dateDeb" >Date de début:</label>
                            <input type="date" id="dateDebExp" name="dateDeb" required value="<?php echo $experience['dateDeb']; ?>"> <br><br>
                            <label for="dateFin" id="deb">Date de fin:</label>
                            <input type="date" id="dateFinExp" name="dateFin" required value="<?php echo $experience['dateFin']; ?>"> <br><br>
                            <label for="descPoste">Description des tâches:</label><br><br>
                            <textarea id="descPoste" name="descPoste" required ><?php echo $experience['descPoste']; ?></textarea><br> <br>
                        <?php } ?>
                        <label for="competence">Modifier vos compétences:</label>
                        <textarea id="competence" name="competence" cols="40" rows="4" required ><?php echo $competence; ?></textarea><br> <br>

                
                <input type="submit" name="EnregistrerModif" value="Enregistrer les modifications">
            </form>
            </div>
                
        </main>
    </body>
</html>
