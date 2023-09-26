<?php
class   Stagiaire {
    private $Id;
    private $Nom;
    private $CNE;

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function getId() {
        return $this->Id;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }
    
    public function getNom() {
        return $this->Nom;
    }

    public function setCNE($CNE) {
        $this->CNE = $CNE;
    }
    
    public function getCNE() {
        return $this->CNE;
    }
}
?>