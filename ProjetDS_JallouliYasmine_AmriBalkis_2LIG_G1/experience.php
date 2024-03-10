<?php

class Experience{

    private $nomEntreprise;
    private $paysEntreprise;
    private $posteOccupe;
    private $dateDeb;
    private $dateFin;
    private $descPoste; 

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
    public function getNomEntreprise() {
        return $this->nomEntreprise;
    }


    public function setNomEntreprise($nomEntreprise): void {
        $this->nomEntreprise = $nomEntreprise;
    }

    public function getPaysEntreprise() {
        return $this->paysEntreprise;
    }


    public function setPaysEntreprise($paysEntreprise): void {
        $this->paysEntreprise = $paysEntreprise;
    }

    public function getPosteOccupe() {
        return $this->posteOccupe;
    }

    public function setPosteOccupe($posteOccupe): void {
        $this->posteOccupe = $posteOccupe;
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

    public function getDescPoste() {
        return $this->descPoste;
    }

    public function setDescPoste($descPoste): void {
        $this->descPoste = $descPoste;
    }
    
}
?>