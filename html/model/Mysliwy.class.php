<?php

class Mysliwy {

    private $idMysliwy;
    private $login;
    private $haslo;
    private $email;
    private $Imie;
    private $Nazwisko;
    private $Numer_pozwolenia;
    private $Data_urodzenia;





    public function getMysliwy() {
        return $this->mysliwy;
    }

    public function setMysliwy($mysliwy) {
        $this->mysliwy = $mysliwy;
    }

    public function getidMysliwy() {
        return $this->idMysliwy;
    }

    public function getlogin() {
        return $this->login;
    }

    public function gethaslo() {
        return $this->haslo;
    }

    public function getemail() {
        return $this->email;
    }

    public function getImie() {
        return $this->Imie;
    }
    public function getNazwisko() {
        return $this->Nazwisko;
    }
    public function getNumer_pozwolenia() {
        return $this->Numer_pozwolenia;
    }
    public function getData_urodzenia() {
        return $this->Data_urodzenia;
    }
    public function setidMysliwy($idMysliwy) {
        $this->idMysliwy = $idMysliwy;
    }
    
    public function setlogin($login) {
        $this->login = $login;
    }

    public function sethaslo($haslo) {
        $this->haslo = $haslo;
    }

    public function setemail($email) {
        $this->email = $email;
    }

    public function setImie($Imie) {
        $this->Mysliwy_idMysliwy = $Imie;
    }
    public function setNazwisko($Nazwisko) {
        $this->Mysliwy_idMysliwy = $Nazwisko;
    }
        public function setNumer_pozwolenia($Numer_pozwolenia) {
        $this->Numer_pozwolenia = $Numer_pozwolenia;
    }
    public function setData_urodzenia($Data_urodzenia) {
        $this->Data_urodzenia = $Data_urodzenia;
    }    

}

?>