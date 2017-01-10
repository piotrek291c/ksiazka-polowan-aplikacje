<?php

class rejonController extends baseController {

    public function index() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $db = $this->registry->db;
        $this->registry->template->results = $db::getRejonList();
        $this->registry->template->show('rejon/rejon_index');
    }


    //DODANIE NOWEJ KATEGORII
    public function add() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $error = "";
        $success = "";
        $db = $this->registry->db;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Miejscowosc = trim($_POST['Miejscowosc']);
            if (empty($Miejscowosc)) {
                $error .= 'Uzupełnij pole Miejscowość <br />';
            }
            $Obwod_lowiecki = trim($_POST['Obwod_lowiecki']);
            if (empty($Obwod_lowiecki)) {
                $error .= 'Uzupełnij pole Obwód łowiecki <br />';
            }
            $Nazwa_lowiska = trim($_POST['Nazwa_lowiska']);
            if (empty($Nazwa_lowiska)) {
                $error .= 'Uzupełnij pole Nazwa łowiska <br />';
            }
            $Mysliwy_idMysliwy = trim($_POST['Mysliwy_idMysliwy']);
            if (empty($Mysliwy_idMysliwy)) {
                $error .= 'Uzupełnij pole idMysliwy <br />';
            }
            if (empty($error)) {
                $rejon = new Rejon();
                $rejon->setMiejscowosc($Miejscowosc);
                $rejon->setObwod_lowiecki($Obwod_lowiecki);
                $rejon->setNazwa_lowiska($Nazwa_lowiska);
                $rejon->setMysliwy_idMysliwy($Mysliwy_idMysliwy);
                if ($db::addRejon($rejon)) {
                    $success .= 'Dodano nowy rejon <br />';
                } else {
                    $error .= 'Dodanie rejonu nie powiodło się <br />';
                }
            }
            $this->registry->template->error = $error;
            $this->registry->template->success = $success;
        }
        $this->registry->template->show('rejon/rejon_add');
    }
    //EDYCJA KATEGORII
    public function edit() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $error = "";
        $success = "";
        $db = $this->registry->db;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Miejscowosc = trim($_POST['Miejscowosc']);
            if (empty($Miejscowosc)) {
                $error .= 'Uzupełnij pole Miejscowość <br />';
            }
            $Obwod_lowiecki = trim($_POST['Obwod_lowiecki']);
            if (empty($Obwod_lowiecki)) {
                $error .= 'Uzupełnij pole Obwód łowiecki <br />';
            }
            $Nazwa_lowiska = trim($_POST['Nazwa_lowiska']);
            if (empty($Nazwa_lowiska)) {
                $error .= 'Uzupełnij pole Nazwa łowiska <br />';
            }
            $Mysliwy_idMysliwy = trim($_POST['Mysliwy_idMysliwy']);
            if (empty($Mysliwy_idMysliwy)) {
                $error .= 'Uzupełnij pole idMysliwy <br />';
            }
            if (empty($error)) {
                $rejon = new Rejon();
                $id = trim($_POST['idRejon']);
                $rejon->setidRejon($id);
                $rejon->setMiejscowosc($Miejscowosc);
                $rejon->setObwod_lowiecki($Obwod_lowiecki);
                $rejon->setNazwa_lowiska($Nazwa_lowiska);
                $rejon->setMysliwy_idMysliwy($Mysliwy_idMysliwy);
                if ($db::updateRejon($rejon)) {
                    $success .= 'Edycja zakończona pomyślnie <br />';
                } else {
                    $error .= 'Edycja nie powiodła się <br />';
                }
            }
            $this->registry->template->success = $success;
            $this->registry->template->error = $error;
        } else {
            $idRejon = $this->registry->id;

            $rejon = $db::getRejonById($idRejon);
            $this->registry->template->model = $rejon;
        }
        $this->registry->template->show('rejon/rejon_edit');
    }
    //USUNIĘCIE KATEGORII
    public function delete() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $db = $this->registry->db;
        $error = "";
        $success = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                $rejon = new Rejon();
                $id = trim($_POST['idRejon']);
                $rejon->setidRejon($id);
                if ($db::deleteRejon($rejon)) {
                    $success .= 'Usunięto Rejon <br />';
                } else {
                    $error .= 'Usuwanie nie powiodło się. Rejon może być aktualnie używana przez produkty. <br />';
                }
            } else {
                $location = '/' . APP_ROOT . '/rejon';
                header("Location: $location");
            }
            $this->registry->template->success = $success;
            $this->registry->template->error = $error;
            $this->registry->template->show('rejon/rejon_action_result');
        } else {
            $id = $this->registry->id;
            $rejon = $db::getRejonById($id);
            $this->registry->template->model = $rejon;
            $this->registry->template->show('rejon/rejon_delete');
        }
    }

}

?>