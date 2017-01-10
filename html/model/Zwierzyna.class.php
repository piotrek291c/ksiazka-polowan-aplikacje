<?php

class Zwierzyna {

    private $idZwierzyna;
    private $Nazwa;
    private $Okres_ochronny;
    private $Sezon_polowan;
    private $ilosc;
    

    public function getZwierzyna() {
        return $this->rejon;
    }

    public function setZwierzyna($zwierzyna) {
        $this->rejon = $zwierzyna;
    }

    public function getidZwierzyna() {
        return $this->idZwierzyna;
    }

    public function getNazwa() {
        return $this->Nazwa;
    }

    public function getOkres_ochronny() {
        return $this->Okres_ochronny;
    }

    public function getSezon_polowan() {
        return $this->Sezon_polowan;
    }

    public function getilosc() {
        return $this->ilosc;
    }

    public function setidZwierzyna($idZwierzyna) {
        $this->idZwierzyna = $idZwierzyna;
    }
    
    public function setNazwa($Nazwa) {
        $this->Nazwa = $Nazwa;
    }

    public function setOkres_ochronny($Okres_ochronny) {
        $this->Okres_ochronny = $Okres_ochronny;
    }

    public function setSezon_polowan($Sezon_polowan) {
        $this->Sezon_polowan = $Sezon_polowan;
    }

    public function setilosc($ilosc) {
        $this->ilosc = $ilosc;
    }

    

}

?>