<?php

class Rejon {

    private $idRejon;
    private $Miejscowosc;
    private $Obwod_lowiecki;
    private $Nazwa_lowiska;
    private $Mysliwy_idMysliwy;
    





    public function getRejon() {
        return $this->rejon;
    }

    public function setRejon($rejon) {
        $this->rejon = $rejon;
    }

    public function getidRejon() {
        return $this->idRejon;
    }

    public function getMiejscowosc() {
        return $this->Miejscowosc;
    }

    public function getObwod_lowiecki() {
        return $this->Obwod_lowiecki;
    }

    public function getNazwa_lowiska() {
        return $this->Nazwa_lowiska;
    }

    public function getMysliwy_idMysliwy() {
        return $this->Mysliwy_idMysliwy;
    }

    public function setidRejon($idRejon) {
        $this->idRejon = $idRejon;
    }
    
    public function setMiejscowosc($Miejscowosc) {
        $this->Miejscowosc = $Miejscowosc;
    }

    public function setObwod_lowiecki($Obwod_lowiecki) {
        $this->Obwod_lowiecki = $Obwod_lowiecki;
    }

    public function setNazwa_lowiska($Nazwa_lowiska) {
        $this->Nazwa_lowiska = $Nazwa_lowiska;
    }

    public function setMysliwy_idMysliwy($Mysliwy_idMysliwy) {
        $this->Mysliwy_idMysliwy = $Mysliwy_idMysliwy;
    }

    

}

?>