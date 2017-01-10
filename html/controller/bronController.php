<?php

class bronController extends baseController {

    public function index() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $db = $this->registry->db;
        $this->registry->template->results = $db::getBronList();
        $this->registry->template->show('bron/bron_index');
    }


    //DODANIE NOWEJ KATEGORII
    public function add() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $error = "";
        $success = "";
        $db = $this->registry->db;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Numer_broni = trim($_POST['Numer_broni']);
            if (empty($Numer_broni)) {
                $error .= 'Uzupełnij pole Numer broni <br />';
            }
            $Kaliber = trim($_POST['Kaliber']);
            if (empty($Kaliber)) {
                $error .= 'Uzupełnij pole Kaliber <br />';
            }
            $Nazwa_broni = trim($_POST['Nazwa_broni']);
            if (empty($Nazwa_broni)) {
                $error .= 'Uzupełnij pole Nazwa broni <br />';
            }
            $Rodzaj_broni = trim($_POST['Rodzaj_broni']);
            if (empty($Rodzaj_broni)) {
                $error .= 'Uzupełnij pole Rodzaj broni <br />';
            }
            if (empty($error)) {
                $bron = new Bron();
                $bron->setNumer_broni($Numer_broni);
                $bron->setKaliber($Kaliber);
                $bron->setNazwa_broni($Nazwa_broni);
                $bron->setRodzaj_broni($Rodzaj_broni);
                if ($db::addBron($bron)) {
                    $success .= 'Dodano nowy bron <br />';
                } else {
                    $error .= 'Dodanie broni nie powiodło się <br />';
                }
            }
            $this->registry->template->error = $error;
            $this->registry->template->success = $success;
        }
        $this->registry->template->show('bron/bron_add');
    }
    //EDYCJA KATEGORII
    public function edit() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $error = "";
        $success = "";
        $db = $this->registry->db;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Numer_broni = trim($_POST['Numer_broni']);
            if (empty($Numer_broni)) {
                $error .= 'Uzupełnij pole Numer broni <br />';
            }
            $Kaliber = trim($_POST['Kaliber']);
            if (empty($Kaliber)) {
                $error .= 'Uzupełnij pole Kaliber <br />';
            }
            $Nazwa_broni = trim($_POST['Nazwa_broni']);
            if (empty($Nazwa_broni)) {
                $error .= 'Uzupełnij pole Nazwa broni <br />';
            }
            $Rodzaj_broni = trim($_POST['Rodzaj_broni']);
            if (empty($Rodzaj_broni)) {
                $error .= 'Uzupełnij pole Rodzaj broni <br />';
            }
            if (empty($error)) {
                $bron = new Bron();
                $id = trim($_POST['idBron']);
                $bron->setidBron($id);
                $bron->setNumer_broni($Numer_broni);
                $bron->setKaliber($Kaliber);
                $bron->setNazwa_broni($Nazwa_broni);
                $bron->setRodzaj_broni($Rodzaj_broni);
                if ($db::updateBron($bron)) {
                    $success .= 'Edycja zakończona pomyślnie <br />';
                } else {
                    $error .= 'Edycja nie powiodła się <br />';
                }
            }
            $this->registry->template->success = $success;
            $this->registry->template->error = $error;
        } else {
            $idBron = $this->registry->id;

            $bron = $db::getBronById($idBron);
            $this->registry->template->model = $bron;
        }
        $this->registry->template->show('bron/bron_edit');
    }
    //USUNIĘCIE KATEGORII
    public function delete() {
        //$this->ograniczDostepTylkoDlaAdmina();
        $db = $this->registry->db;
        $error = "";
        $success = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                $bron = new Bron();
                $id = trim($_POST['idBron']);
                $bron->setidBron($id);
                if ($db::deleteBron($bron)) {
                    $success .= 'Usunięto Broń <br />';
                } else {
                    $error .= 'Usuwanie nie powiodło się. Broń może być aktualnie używana przez produkty. <br />';
                }
            } else {
                $location = '/' . APP_ROOT . '/bron';
                header("Location: $location");
            }
            $this->registry->template->success = $success;
            $this->registry->template->error = $error;
            $this->registry->template->show('bron/bron_action_result');
        } else {
            $id = $this->registry->id;
            $bron = $db::getBronById($id);
            $this->registry->template->model = $bron;
            $this->registry->template->show('bron/bron_delete');
        }
    }

}

?>