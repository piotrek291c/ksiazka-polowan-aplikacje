<?php

class zwierzynaController extends baseController {

    public function index() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $db = $this->registry->db;
        $this->registry->template->results = $db::getZwierzynaList();
        $this->registry->template->show('zwierzyna/zwierzyna_index');
    }


    //DODANIE NOWEJ KATEGORII
    public function add() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $error = "";
        $success = "";
        $db = $this->registry->db;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Nazwa = trim($_POST['Nazwa']);
            if (empty($Nazwa)) {
                $error .= 'Uzupełnij pole Nazwa <br />';
            }
            $Okres_ochronny = trim($_POST['Okres_ochronny']);
            if (empty($Okres_ochronny)) {
                $error .= 'Uzupełnij pole Okres ochronny <br />';
            }
            $Sezon_polowan = trim($_POST['Sezon_polowan']);
            if (empty($Sezon_polowan)) {
                $error .= 'Uzupełnij pole Sezon polowań <br />';
            }
            $ilosc = trim($_POST['ilosc']);
            if (empty($ilosc)) {
                $error .= 'Uzupełnij pole ilość <br />';
            }
            if (empty($error)) {
                $zwierzyna = new Zwierzyna();
                $zwierzyna->setNazwa($Nazwa);
                $zwierzyna->setOkres_ochronny($Okres_ochronny);
                $zwierzyna->setSezon_polowan($Sezon_polowan);
                $zwierzyna->setilosc($ilosc);
                if ($db::addZwierzyna($zwierzyna)) {
                    $success .= 'Dodano nową zwierzynę <br />';
                } else {
                    $error .= 'Dodanie zwierzyny nie powiodło się <br />';
                }
            }
            $this->registry->template->error = $error;
            $this->registry->template->success = $success;
        }
        $this->registry->template->show('zwierzyna/zwierzyna_add');
    }
    //EDYCJA KATEGORII
    public function edit() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $error = "";
        $success = "";
        $db = $this->registry->db;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Nazwa = trim($_POST['Nazwa']);
            if (empty($Nazwa)) {
                $error .= 'Uzupełnij pole Nazwa <br />';
            }
            $Okres_ochronny = trim($_POST['Okres_ochronny']);
            if (empty($Okres_ochronny)) {
                $error .= 'Uzupełnij pole Okres ochronny <br />';
            }
            $Sezon_polowan = trim($_POST['Sezon_polowan']);
            if (empty($Sezon_polowan)) {
                $error .= 'Uzupełnij pole Sezon polowań <br />';
            }
            $ilosc = trim($_POST['ilosc']);
            if (empty($ilosc)) {
                $error .= 'Uzupełnij pole ilość <br />';
            }
            if (empty($error)) {
                $zwierzyna = new Zwierzyna();
                $id = trim($_POST['idZwierzyna']);
                $zwierzyna->setidZwierzyna($id);
                $zwierzyna->setNazwa($Nazwa);
                $zwierzyna->setOkres_ochronny($Okres_ochronny);
                $zwierzyna->setSezon_polowan($Sezon_polowan);
                $zwierzyna->setilosc($ilosc);
                if ($db::updateZwierzyna($zwierzyna)) {
                    $success .= 'Edycja zakończona pomyślnie <br />';
                } else {
                    $error .= 'Edycja nie powiodła się <br />';
                }
            }
            $this->registry->template->success = $success;
            $this->registry->template->error = $error;
        } else {
            $idZwierzyna = $this->registry->id;

            $zwierzyna = $db::getZwierzynaById($idZwierzyna);
            $this->registry->template->model = $zwierzyna;
        }
        $this->registry->template->show('zwierzyna/zwierzyna_edit');
    }
    //USUNIĘCIE KATEGORII
    public function delete() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $db = $this->registry->db;
        $error = "";
        $success = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                $zwierzyna = new Zwierzyna();
                $id = trim($_POST['idZwierzyna']);
                $zwierzyna->setidZwierzyna($id);
                if ($db::deleteZwierzyna($zwierzyna)) {
                    $success .= 'Usunięto Zwierzynę <br />';
                } else {
                    $error .= 'Usuwanie nie powiodło się. Zwierzyna może być aktualnie używana przez produkty. <br />';
                }
            } else {
                $location = '/' . APP_ROOT . '/zwierzyna';
                header("Location: $location");
            }
            $this->registry->template->success = $success;
            $this->registry->template->error = $error;
            $this->registry->template->show('zwierzyna/zwierzyna_action_result');
        } else {
            $id = $this->registry->id;
            $zwierzyna = $db::getZwierzynaById($id);
            $this->registry->template->model = $zwierzyna;
            $this->registry->template->show('zwierzyna/zwierzyna_delete');
        }
    }

}

?>