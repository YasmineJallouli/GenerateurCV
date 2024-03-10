<?php
require("manager.php");
require('personne.php');
require('formation.php');
require('experience.php');
require('competence.php');

$dsn="mysql:host=localhost;dbname=bd_personne";

$conn=new PDO($dsn,'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$managerPersonnes=new manager($conn);
if(isset($_POST['creer'])){

$infologin=new Login(array('email'=>$_POST['email']/*, 'mdpasse'=>$_POST['mdpasse']*/));
    if ($managerPersonnes->mailExistant($infologin) > 0){
        $email = $infologin->getEmail();
        header("location: finalCV.php?email=$email");    
    }
    else{
    $infologin=new Login(array('email'=>$_POST['email']/*, 'mdpasse'=>$_POST['mdpasse']*/));
        $managerPersonnes->ajouterUser($infologin);
        $email = $infologin->getEmail();
        header("location: infoPersonnel.php?email=$email");
    }
}       
if(isset($_POST['submitPersonne'])){
    $email=$_GET['email'];
    $cv=new Personne(array('nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'positionActuelle'=>$_POST['positionActuelle'],$email,'numTel'=>$_POST['numTel'],'ville'=>$_POST['ville'],'pays'=>$_POST['pays']));
    $managerPersonnes->ajouterPersonne($cv,$email);
    header("location: infoFormation.php?email=$email");
}
if (isset($_POST['ajoutFormation'])){
    $email=$_GET['email'];
    $infoformations=new Formation(array('diplomePersonne'=>$_POST['diplomePersonne'],'nomEcole'=>$_POST['nomEcole'],'paysEcole'=>$_POST['paysEcole'],'dateDeb'=>$_POST['dateDeb'],'dateFin'=>$_POST['dateFin'],'domaine'=>$_POST['domaine'],'langue'=>$_POST['langue'],'$email'));
    $managerPersonnes->ajouterFormation($infoformations,$email);
            
    header("location: infoFormation.php?email=$email");
}
if(isset($_POST['submitFormation'])){
    $email=$_GET['email'];
    $infoformations=new Formation(array('diplomePersonne'=>$_POST['diplomePersonne'],'nomEcole'=>$_POST['nomEcole'],'paysEcole'=>$_POST['paysEcole'],'dateDeb'=>$_POST['dateDeb'],'dateFin'=>$_POST['dateFin'],'domaine'=>$_POST['domaine'],'langue'=>$_POST['langue'],$email));
    $managerPersonnes->ajouterFormation($infoformations,$email);

    header("location: infoExperience.php?email=$email");
            
}   
if (isset($_POST['ajoutExperience'])){
    $email=$_GET['email'];
    $infoexperience=new Experience(array('nomEntreprise'=>$_POST['nomEntreprise'], 'paysEntreprise'=>$_POST['paysEntreprise'], 'posteOccupe'=>$_POST['posteOccupe'], 'dateDeb'=>$_POST['dateDeb'], 'dateFin'=>$_POST['dateFin'], 'descPoste'=>$_POST['descPoste'],$email));
    $managerPersonnes->ajouterExperience($infoexperience,$email);

    header("location: infoExperience.php?email=$email");
}
if (isset($_POST['submitExperience'])){
    $email=$_GET['email'];
    $infoexperience=new Experience(array('nomEntreprise'=>$_POST['nomEntreprise'], 'paysEntreprise'=>$_POST['paysEntreprise'], 'posteOccupe'=>$_POST['posteOccupe'], 'dateDeb'=>$_POST['dateDeb'], 'dateFin'=>$_POST['dateFin'], 'descPoste'=>$_POST['descPoste'],$email));
    $managerPersonnes->ajouterExperience($infoexperience,$email);

    header("location: infoCompetences.php?email=$email");
}

if (isset($_POST['submitCompetence'])){
    $email=$_GET['email'];
    $infocompetence=new Competence(array('competence'=>$_POST['competence'],$email));
    $managerPersonnes->ajouterCompetence($infocompetence,$email);

    header("location: finalCV.php?email=$email");
}  
if (isset($_POST['EnregistrerModif'])) {

    $email = $_GET['email'];
    
    $nouvellesInfos = new Personne(array('nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'positionActuelle'=>$_POST['positionActuelle'],$email,'numTel'=>$_POST['numTel'],'ville'=>$_POST['ville'],'pays'=>$_POST['pays']));
    $managerPersonnes->modifierPersonne($nouvellesInfos, $email);
    
    // Parcourir les données de modification de formation 
    //$nomformation = $managerPersonnes->getInfosFormation($email);

    
    $nouvellesInfosFormation = (array('diplomePersonne' => $_POST['diplomePersonne'],'nomEcole' => $_POST['nomEcole'],'paysEcole' => $_POST['paysEcole'],'dateDeb' => $_POST['dateDeb'],'dateFin' => $_POST['dateFin'],'domaine' => $_POST['domaine'],'langue' => $_POST['langue']));        $managerPersonnes->modifierFormation($nouvellesInfosFormation, $email,$nomformation);

    //parcourir les données de modification des infos experience
    $nomexperience = $managerPersonnes->getInfosExperience($email);
    
    $nouvellesInfosExperience = new Experience(array('nomEntreprise' => $_POST['nomEntreprise'],'paysEntreprise' => $_POST['paysEntreprise'],'posteOccupe' => $_POST['posteOccupe'],'dateDeb' => $_POST['dateDeb'],'dateFin' => $_POST['dateFin'],'descPoste' => $_POST['descPoste']));
    $managerPersonnes->modifierExperience($nouvellesInfosExperience, $email,$nomexperience);
 
    // Parcourir les données de modification de compétence

    $nouvellesInfosCompetence = new Competence(array('competence' => $_POST['competence'],$email));
    $managerPersonnes->modifierInfoCompetence($nouvellesInfosCompetence, $email);

    header("location: finalCV.php?email=$email");

}
?>
