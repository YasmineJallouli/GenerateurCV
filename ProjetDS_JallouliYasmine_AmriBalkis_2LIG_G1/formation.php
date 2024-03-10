<?php
class Formation{
    //Information Formation
    private $diplomePersonne;
    private $nomEcole;
    private $paysEcole;
    private $dateDeb;
    private $dateFin;
    private $domaine;
    private $langue;
    private $email;

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

    public function getDiplomePersonne() {
        return $this->diplomePersonne;
    }


    public function setDiplomePersonne($diplomePersonne): void {
        $this->diplomePersonne = $diplomePersonne;
    }

    public function getNomEcole() {
        return $this->nomEcole;
    }


    public function setNomEcole($nomEcole): void {
        $this->nomEcole = $nomEcole;
    }

    public function getPaysEcole() {
        return $this->paysEcole;
    }

    public function setPaysEcole($paysEcole): void {
        $this->paysEcole = $paysEcole;
    }

    public function getDateDeb() {
        return $this->dateDeb;
    }

    public function setDateDeb($dateDeb): void {
        $this->dateDeb = $dateDeb;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function setDateFin($dateFin): void {
        $this->dateFin = $dateFin;
    }

    public function getDomaine() {
        return $this->domaine;
    }

    public function setDomaine($domaine): void {
        $this->domaine = $domaine;
    }

    public function getLangue() {
        return $this->langue;
    }

    public function setLangue($langue): void {
        $this->langue = $langue;
    }
    

}

?>