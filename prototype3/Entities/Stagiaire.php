<?php
class Stagiaire {
    private $Id;
    private $CNE;
    private $Nom;
    private $VilleNom;
 

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

    public function GetVilleNom() {
        return $this->VilleNom;
    }

    public function SetVilleNom($VilleNom) { 
        $this->VilleNom = $VilleNom;
    }

}
?>
