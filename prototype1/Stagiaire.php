<?php
class   Stagiaire {
    private $Id;
    private $Nom;
    private $CNE;

    public function setId($Id) {
        $this->Id = $id;
    }

    public function getId() {
        return $this->Id;
    }

    public function setNom($Non) {
        $this->nom = $Non;
    }
    
    public function getNon() {
        return $this->nom;
    }

    public function setCne($CNE) {
        $this->CNE = $CNE;
    }
    
    public function getCNE() {
        return $this->CNE;
    }
}
?>