<?php
class Competence{
    private $competence;

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
    public function getCompetence() {
        return $this->competence;
    }


    public function setCompetence($competence): void {
        $this->competence = $competence;
    }
    
}
?>