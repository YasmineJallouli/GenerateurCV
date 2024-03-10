<?php

class Personne{
    //Information Personnel
    private $nom;
    private $prenom;
    private $positionActuelle;
    private $numtel;
    private $ville;
    private $pays;
    

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate($donnees){
        foreach ($donnees as $key=>$value){
            $method='set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    public function getNom() {
        return $this->nom;
    }


    public function setNom($nom): void {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }


    public function setPrenom($prenom): void {
        $this->prenom = $prenom;
    }

    public function getPositionActuelle() {
        return $this->positionActuelle;
    }


    public function setPositionActuelle($positionActuelle): void {
        $this->positionActuelle = $positionActuelle;
    }
    public function getNumTel() {
        return $this->numtel;
    }

    public function setNumTel($numtel): void {
        $this->numtel = $numtel;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville): void {
        $this->ville = $ville;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setPays($pays): void {
        $this->pays = $pays;
    }
    
}
?>