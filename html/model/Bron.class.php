<?php

class Bron {

    private $idBron;
    private $Numer_broni;
    private $Kaliber;
    private $Nazwa_broni;
    private $Rodzaj_broni;
    





    public function getBron() {
        return $this->bron;
    }

    public function setBron($bron) {
        $this->bron = $bron;
    }

    public function getidBron() {
        return $this->idBron;
    }

    public function getNumer_broni() {
        return $this->Numer_broni;
    }

    public function getKaliber() {
        return $this->Kaliber;
    }

    public function getNazwa_broni() {
        return $this->Nazwa_broni;
    }

    public function getRodzaj_broni() {
        return $this->Rodzaj_broni;
    }

    public function setidBron($idBron) {
        $this->idBron = $idBron;
    }
    
    public function setNumer_broni($Numer_broni) {
        $this->Numer_broni = $Numer_broni;
    }

    public function setKaliber($Kaliber) {
        $this->Kaliber = $Kaliber;
    }

    public function setNazwa_broni($Nazwa_broni) {
        $this->Nazwa_broni = $Nazwa_broni;
    }

    public function setRodzaj_broni($Rodzaj_broni) {
        $this->Rodzaj_broni = $Rodzaj_broni;
    }

    

}

?>