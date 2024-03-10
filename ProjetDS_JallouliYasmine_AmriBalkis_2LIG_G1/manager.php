<?php
require('connect.php');
$dsn="mysql:dbname=".database.";host=".serveur;
try{
    $conn=new PDO($dsn,utilisateur,password);
}
catch(PDOException $e){
    printf("Echec de la connexion: %s\n",$e->getMessage());
    exit();
}

class manager{
    private $conn;
    public function __construct($conn){
        $this->setDb($conn);
    }
    //Vérification du mail 
    public function mailExistant(Login $infoLogin){
        try{
            $reqMail =$this->conn->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
            $reqMail->bindValue(':email',$infoLogin->getEmail());
            $reqMail->execute();
            $count=$reqMail->fetchColumn();
            return $count;
        }catch (PDOEXCEPTION $e){
            throw new Exception("Erreur : " . $e->getMessage());
        }
    }
    //Ajout dans la base de données
    public function ajouterUser(Login $infologin){
        
            try{
                $reqLogin=$this->conn->prepare("INSERT INTO user(email) VALUES (:email) ");
                $reqLogin->bindValue(':email',$infologin->getEmail());
                //$reqLogin->bindValue(':mdpasse',$infologin->getMdpasse());

                $resultat=$reqLogin->execute();
                
                
            }catch (PDOEXCEPTION $e){
            throw new Exception("Erreur lors de login : " . $e->getMessage());
            }
            
    }
    public function ajouterPersonne(Personne $cv,$email){
        try{
        $req=$this->conn->prepare("INSERT INTO personne(nom,prenom,positionActuelle,email,numTel,ville,pays) 
                                VALUES (:nom, :prenom, :positionActuelle, :email, :numTel, :ville, :pays) ");
        $req->bindValue(':nom',$cv->getNom());
        $req->bindValue(':prenom',$cv->getPrenom());
        $req->bindValue(':positionActuelle',$cv->getPositionActuelle());
        $req->bindValue(':email',$email);
        $req->bindValue(':numTel',$cv->getNumTel());
        $req->bindValue(':ville',$cv->getVille());
        $req->bindValue(':pays',$cv->getPays());


        $ajout=$req->execute();
        }catch (PDOEXCEPTION $e){
        throw new Exception("Erreur lors de l'insertion des informations personnelles : " . $e->getMessage());
        }
    }

    //Ajout des informations de la formation 
    public function ajouterFormation(Formation $infoformations,$email){
        try{
            $reqformation = $this->conn->prepare("INSERT INTO infoformation(diplomePersonne, nomEcole, paysEcole, dateDeb, dateFin, domaine, langue, email) 
            VALUES (:diplomePersonne, :nomEcole, :paysEcole, :dateDeb, :dateFin, :domaine, :langue, :email) ");
        $reqformation->bindValue(':diplomePersonne',$infoformations->getDiplomePersonne());
        $reqformation->bindValue(':nomEcole',$infoformations->getNomEcole());
        $reqformation->bindValue(':paysEcole',$infoformations->getPaysEcole());
        $reqformation->bindValue(':dateDeb',$infoformations->getDateDeb());
        $reqformation->bindValue(':dateFin',$infoformations->getDateFin());
        $reqformation->bindValue(':domaine',$infoformations->getDomaine());
        $reqformation->bindValue(':langue',$infoformations->getLangue());
        $reqformation->bindValue(':email',$email);

        $ajoutformation=$reqformation->execute();

        }catch (PDOEXCEPTION $e){
        throw new Exception("Erreur lors de l'insertion des informations Formation : " . $e->getMessage());
        }
        
    }
    
    //ajout des informations experience
    public function ajouterExperience(Experience $infoexperience,$email){
        try{
            $reqExperience=$this->conn->prepare("INSERT INTO infoexperience(nomEntreprise, paysEntreprise, posteOccupe, dateDeb, dateFin, descPoste, email) 
                                                VALUES (:nomEntreprise, :paysEntreprise, :posteOccupe, :dateDeb, :dateFin, :descPoste, :email) ");
            $reqExperience->bindValue(':nomEntreprise',$infoexperience->getNomEntreprise());
            $reqExperience->bindValue(':paysEntreprise',$infoexperience->getPaysEntreprise());
            $reqExperience->bindValue(':posteOccupe',$infoexperience->getPosteOccupe());
            $reqExperience->bindValue(':dateDeb',$infoexperience->getDateDeb());
            $reqExperience->bindValue(':dateFin',$infoexperience->getDateFin());
            $reqExperience->bindValue(':descPoste',$infoexperience->getDescPoste());

            $reqExperience->bindValue(':email',$email);

            $ajoutExperience=$reqExperience->execute();
        } catch(PDOException $e){
            throw new exception( "Echec d'insertion d'information Experience : ".$e->getMessage());
        } 
    }
    //Ajout des informations competence
    public function ajouterCompetence(Competence $infocompetence,$email){
        try{
        $reqAjoutCompetence=$this->conn->prepare("INSERT INTO infocompetence(competence,email) 
                                VALUES (:competence,:email) ");
        $reqAjoutCompetence->bindValue(':competence',$infocompetence->getCompetence());
        $reqAjoutCompetence->bindValue(':email',$email);

        $ajoutCompetence=$reqAjoutCompetence->execute();

        header("location: finalCV.php?email=$email");
        } catch(PDOException $e){
            throw new exception( "Echec d'insertion d'information Competences : ".$e->getMessage());
        } 
    }
    //Parcourir les données 
    public function getInfosPersonne($email) {
        try {
            $reqGetInfosPersonne = $this->conn->prepare("SELECT * FROM personne WHERE email = :email");
            $reqGetInfosPersonne->bindValue(':email', $email);
            $reqGetInfosPersonne->execute();
            $result = $reqGetInfosPersonne->fetch(PDO::FETCH_ASSOC);
            return $result; // Retourne les informations personnelles sous forme de tableau associatif
        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la récupération des informations personnelles : " . $e->getMessage());
        }
    }
    public function getInfosFormation($email) {
        try {
            $reqGetInfosFormation = $this->conn->prepare("SELECT diplomePersonne FROM infoformation WHERE email = :email");
            $reqGetInfosFormation->bindValue(':email', $email);
            $result =$reqGetInfosFormation->execute();
             //$reqGetInfosFormation->fetchAll(PDO::FETCH_ASSOC);
            return $result; // Retourne les informations Formation sous forme de tableau associatif
        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la récupération des informations Education : " . $e->getMessage());
        }
    }
    public function getInfosExperience($email) {
        try {
            $reqGetInfosPersonne = $this->conn->prepare("SELECT nomEntreprise FROM infoexperience WHERE email = :email");
            $reqGetInfosPersonne->bindValue(':email', $email);
            $result =$reqGetInfosPersonne->execute();
             //$reqGetInfosPersonne->fetchAll(PDO::FETCH_ASSOC);
            return $result; // Retourne les informations Experience sous forme de tableau associatif
        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la récupération des informations Experience : " . $e->getMessage());
        }
    }
    public function getInfosCompetence($email) {
        try {
            $reqGetInfosPersonne = $this->conn->prepare("SELECT * FROM infocompetence WHERE email = :email");
            $reqGetInfosPersonne->bindValue(':email', $email);
            $reqGetInfosPersonne->execute();
            $result = $reqGetInfosPersonne->fetchAll(PDO::FETCH_ASSOC);
            return $result; // Retourne les informations competence sous forme de tableau associatif
        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la récupération des informations Competence : " . $e->getMessage());
        }
    }
    //Modification des données
    //Modification de la table personne
    public function modifierPersonne(Personne $nouvellesInfos, $email) {

        try {
            $reqModifPersonne =$this->conn->prepare("UPDATE personne SET nom = :nom, prenom = :prenom, positionActuelle = :positionActuelle, numTel = :numTel, ville = :ville, pays = :pays WHERE email = :email");
            $reqModifPersonne->bindValue(':nom', $nouvellesInfos->getNom());
            $reqModifPersonne->bindValue(':prenom', $nouvellesInfos->getPrenom());
            $reqModifPersonne->bindValue(':positionActuelle', $nouvellesInfos->getPositionActuelle());
            $reqModifPersonne->bindValue(':numTel', $nouvellesInfos->getNumTel());
            $reqModifPersonne->bindValue(':ville', $nouvellesInfos->getVille());
            $reqModifPersonne->bindValue(':pays', $nouvellesInfos->getPays());
            $reqModifPersonne->bindValue(':email', $email);

            $modifpersonne=$reqModifPersonne->execute();

        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la modification des informations personnelles : " . $e->getMessage());
        }
    }
    //Modification de la table infoformation
    //Modification de la table infoformation
public function modifierFormation( $nouvellesInfosFormation, $email, $nomformation) {
    try {
        $reqModifFormation = $this->conn->prepare("UPDATE infoformation SET diplomePersonne=:diplomePersonne, nomEcole=:nomEcole, paysEcole=:paysEcole, dateDeb=:dateDeb, dateFin=:dateFin, domaine=:domaine, langue=:langue WHERE email=:email AND diplomePersonne=:nomformation");
       
        $reqModifFormation->bindValue(':diplomePersonne', $nouvellesInfosFormation['diplomePersonne']);
        $reqModifFormation->bindValue(':nomEcole', $nouvellesInfosFormation['nomEcole']);
        $reqModifFormation->bindValue(':paysEcole', $nouvellesInfosFormation['paysEcole']);
        $reqModifFormation->bindValue(':dateDeb', $nouvellesInfosFormation['dateDeb']);
        $reqModifFormation->bindValue(':dateFin', $nouvellesInfosFormation['dateFin']);
        $reqModifFormation->bindValue(':domaine', $nouvellesInfosFormation['domaine']);
        $reqModifFormation->bindValue(':langue', $nouvellesInfosFormation['langue']);
        $reqModifFormation->bindValue(':email', $email);
        $reqModifFormation->bindValue(':nomformation', $nomformation);
        
        // Exécution de la requête
        $modifformation=$reqModifFormation->execute();

        // Affichage du nombre de lignes affectées
        echo "Nombre de lignes modifiées: " . $reqModifFormation->rowCount() . "<br>";
        
    } catch(PDOException $e) {
        // Gestion des erreurs
        throw new Exception("Erreur lors de la modification des informations de formation : " . $e->getMessage());
    }
}
    //Modification de la table infoexperience
    public function modifierExperience(Experience $nouvellesInfosExperience, $email,$nomexperience) {
        try {
            $reqModifExperience =$this->conn->prepare( "UPDATE infoexperience SET nomEntreprise = :nomEntreprise, paysEntreprise = :paysEntreprise, posteOccupe = :posteOccupe, dateDeb = :dateDeb, dateFin = :dateFin, descPoste = :descPoste WHERE email = :email AND nomEntreprise=:nomexperience");
            $reqModifExperience->bindValue(':nomEntreprise', $nouvellesInfosExperience->getNomEntreprise());
            $reqModifExperience->bindValue(':paysEntreprise', $nouvellesInfosExperience->getPaysEntreprise());
            $reqModifExperience->bindValue(':posteOccupe', $nouvellesInfosExperience->getPosteOccupe());
            $reqModifExperience->bindValue(':dateDeb', $nouvellesInfosExperience->getDateDeb());
            $reqModifExperience->bindValue(':dateFin', $nouvellesInfosExperience->getDateFin());
            $reqModifExperience->bindValue(':descPoste', $nouvellesInfosExperience->getDescPoste());
            $reqModifExperience->bindValue(':email', $email);
            $reqModifExperience->bindValue(':nomexperience', $nomexperience);

            $modifexperience=$reqModifExperience->execute();
            
        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la modification des informations d'expérience : " . $e->getMessage());
        }
    }
    //Modification de la table infocompetence
    public function modifierInfoCompetence(Competence $nouvellesInfosCompetence, $email) {
        try {
            $reqModifCompetence = $this->conn->prepare("UPDATE infocompetence SET competence = :competence WHERE email = :email");
            $reqModifCompetence->bindValue(':competence', $nouvellesInfosCompetence->getCompetence());
            $reqModifCompetence->bindValue(':email', $email);
            $modifcompetence=$reqModifCompetence->execute();
            

        } catch(PDOException $e) {
            throw new Exception("Erreur lors de la modification des informations de compétence : " . $e->getMessage());
        }
    }
    public function setDb(PDO $conn){
        $this->conn=$conn;
    }
}
?>