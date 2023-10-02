<?php
class Stagiaire {
    private $Id;
    private $CNE;
    private $Nom;
 

    public function GetId() {
        return $this->Id;
    }

    public function SetId($Id) { 
        $this->Id = $Id;
    }
    public function GetCNE() {
        return $this->CNE;
    }

    public function SetCNE($CNE) { 
        $this->CNE = $CNE;
    }

    public function GetNom() {
        return $this->Nom;
    }

    public function SetNom($Nom) { 
        $this->Nom = $Nom;
    }




}
?>
