<?php

Class Database {

    private static $db;

    public static function getInstance() {
        if (!self::$db) {
            
    $username = "root"; 
    $password = ""; 
    $host = "localhost"; 
    $dbname = "ksiazka"; 
    
    try { 
         self::$db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
        } 
    catch(PDOException $ex){ die("Bład  połączenia z bazą danych: " . $ex->getMessage());} 
       //     self::$db = new PDO('mysql:host=localhost;dbname=sklep;charset=utf8', 'root', '');
            return new Database();
        }
    }


    //użytkownicy
    //dodanie użytkownika
    public static function addUser($user) {
        $stmt = self::$db->prepare("INSERT INTO mysliwy ( 
                login, 
                email, 
                haslo, 
                Imie,
                Nazwisko,
                Numer_pozwolenia,
                Data_urodzenia
            ) VALUES ( 
                :login, 
                :email, 
                :haslo, 
                :Imie,
                :Nazwisko,
                :Numer_pozwolenia,
                :Data_urodzenia
            ) ");
        $stmt->execute(array(
             
            ':login' => $user->getLogin(),
            ':haslo' => sha1($user->getHaslo()), 
            ':Imie' => $user->getImie(), 
            ':email' => $user->getEmail(), 
            ':Nazwisko' => $user->getNazwisko(), 
            ':Numer_pozwolenia' => $user->getNumer_pozwolenia(), 
            ':Data_urodzenia' => $user->getData_urodzenia() )
               
                
                
        );
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //pobranie użytkownika po id
    public static function getUserByID($id) {
        $stmt = $db->prepare('SELECT * FROM mysliwy WHERE idMysliwy=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik;
            $user->setId($result['idMysliwy']);
            $user->setImie($result['Imie']);
            $user->setNazwisko($result['Nazwisko']);
            $user->setNumer_pozwolenia($result['Numer_pozwolenia']);
            $user->setData_urodzenia($result['Data_urodzenia']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['haslo']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
                           
        }
    }
    //pobranie użytkownika po loginie i haśle
    public static function getUserByLoginAndPassword($login, $password) {
        $stmt = self::$db->prepare('SELECT * FROM mysliwy WHERE  login=? and haslo=?');
        $stmt->execute(array($login, sha1($password)));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik();
            $user->setId($result['idMysliwy']);
            $user->setImie($result['Imie']);
            $user->setNazwisko($result['Nazwisko']);
            $user->setNumer_pozwolenia($result['Numer_pozwolenia']);
            $user->setData_urodzenia($result['Data_urodzenia']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['haslo']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }
    //pobranie użytkownika o podanym loginie
    public static function getUserByLogin($login) {
        $stmt = self::$db->prepare('SELECT * FROM mysliwy WHERE login=?');
        $stmt->execute(array($login));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik();
            $user->setId($result['idMysliwy']);
            $user->setImie($result['Imie']);
            $user->setNazwisko($result['Nazwisko']);
            $user->setNumer_pozwolenia($result['Numer_pozwolenia']);
            $user->setData_urodzenia($result['Data_urodzenia']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['haslo']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }
    //pobranie użytkownika o podanym mailu
    public static function getUserByEmail($email) {
        $stmt = self::$db->prepare('SELECT * FROM mysliwy WHERE email=?');
        $stmt->execute(array($email));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik();
            $user->setId($result['idMysliwy']);
            $user->setImie($result['Imie']);
            $user->setNazwisko($result['Nazwisko']);
            $user->setNumer_pozwolenia($result['Numer_pozwolenia']);
            $user->setData_urodzenia($result['Data_urodzenia']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['haslo']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }

    //role
    //sprawdzenie, czy użytkownik posiada określoną rolę
    public static function isUserInRole($login, $role) {
        $userRoles = self::userRoles($login);
        return in_array($role, $userRoles);
    }
    //pobranie wszystkich roli użytkownika
    public static function userRoles($login) {
        $stmt = self::$db->prepare("SELECT r.name FROM mysliwy AS m 	
		LEFT JOIN mysliwy_roles AS mr on(m.idMysliwy = mr.Mysliwy_idMysliwy)
		LEFT JOIN roles AS r on(mr.roles_id = r.id)
		WHERE	m.login = '$login'");

        $a = isset($_POST['name'] ) ? $_POST['name']  : '';
        $query_params = array( 
            ':name' => $a
                
        ); 
        
        
        $result = $stmt->execute($query_params); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row = $stmt->fetch(); 
         
       for ($i = 0; $i < count($result); $i++) {
            $roles[] = $result[$i]['name'];
            
        } 
        return $roles;
    }

    /*
     * kategorie
     */
    //POBRANIE KATEGORII NA PODSTAWIE ID
    public static function getRejonById($idRejon) {
        $stmt = self::$db->prepare('SELECT * FROM rejon WHERE idRejon=?');
        $stmt->execute(array($idRejon));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $rejon = new Rejon();
            $rejon->setidRejon($result['idRejon']);
            $rejon->setMiejscowosc($result['Miejscowosc']);
            $rejon->setObwod_lowiecki($result['Obwod_lowiecki']);
            $rejon->setNazwa_lowiska($result['Nazwa_lowiska']);
            $rejon->setMysliwy_idMysliwy($result['Mysliwy_idMysliwy']);
            
            return $rejon;
        }
    }
    //DODANIE REJONU
    public static function addRejon($rejon) {
        $stmt = self::$db->prepare("INSERT INTO rejon( Miejscowosc, Obwod_lowiecki, Nazwa_lowiska,Mysliwy_idMysliwy) "
                . "VALUES(:Miejscowosc,:Obwod_lowiecki,:Nazwa_lowiska,:Mysliwy_idMysliwy)");
        
        $stmt->bindParam (":Miejscowosc", $rejon->getMiejscowosc(), PDO::PARAM_STR);
        $stmt->bindParam (":Obwod_lowiecki", $rejon->getObwod_lowiecki(), PDO::PARAM_STR);
        $stmt->bindParam (":Nazwa_lowiska", $rejon->getNazwa_lowiska(), PDO::PARAM_STR);
        $stmt->bindParam (":Mysliwy_idMysliwy", $rejon->getMysliwy_idMysliwy(), PDO::PARAM_STR);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //POBRANIE LISTY KATEGORII
    public static function getRejonList() {
        $stmt = self::$db->query('SELECT * FROM rejon');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //USUNIECIE KATEGORII
    public static function deleteRejon($rejon) {
        $stmt = self::$db->prepare('DELETE FROM rejon WHERE  idRejon=:idRejon');
        //$stmt->execute(array($rejon->getidRejon()));
        $stmt->bindParam (":idRejon", $rejon->getidRejon(), PDO::PARAM_STR); 
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //EDYCJA KATEGORII
    public static function updateRejon($rejon) {
       // $stmt = self::$db->prepare('UPDATE rejon set Miejscowosc=:Miejscowosc,Obwod_lowiecki=:Obwod_lowiecki,Nazwa_lowiska=:Nazwa_lowiska,Mysliwy_idMysliwy=:Mysliwy_idMysliwy'
       //         . ' WHERE idRejon=?');
     $stmt = self::$db->prepare("UPDATE rejon set Miejscowosc=:Miejscowosc, Obwod_lowiecki=:Obwod_lowiecki, Nazwa_lowiska=:Nazwa_lowiska,Mysliwy_idMysliwy=:Mysliwy_idMysliwy "
                . " WHERE idRejon=:idRejon");        
        //$stmt->bindParam ($rejon->getMiejscowosc(),$rejon->getObwod_lowiecki(),$rejon->getNazwa_lowiska(),$rejon->getMysliwy_idMysliwy(), $rejon->getidRejon());
        $stmt->bindParam (":idRejon", $rejon->getidRejon(), PDO::PARAM_STR);   
        $stmt->bindParam (":Miejscowosc", $rejon->getMiejscowosc(), PDO::PARAM_STR);
        $stmt->bindParam (":Obwod_lowiecki", $rejon->getObwod_lowiecki(), PDO::PARAM_STR);
        $stmt->bindParam (":Nazwa_lowiska", $rejon->getNazwa_lowiska(), PDO::PARAM_STR);
        $stmt->bindParam (":Mysliwy_idMysliwy", $rejon->getMysliwy_idMysliwy(), PDO::PARAM_STR);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

    
    
    
    
    
    
    
    
    
    
    
    
        /*
     * Broń
     */
    //POBRANIE Broni NA PODSTAWIE ID
    public static function getBronById($idBron) {
        $stmt = self::$db->prepare('SELECT * FROM bron WHERE idBron=?');
        $stmt->execute(array($idBron));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $bron = new Bron();
            $bron->setidBron($result['idBron']);
            $bron->setNumer_broni($result['Numer_broni']);
            $bron->setKaliber($result['Kaliber']);
            $bron->setNazwa_broni($result['Nazwa_broni']);
            $bron->setRodzaj_broni($result['Rodzaj_broni']);
            
            return $bron;
        }
    }
    //DODANIE Broni
    public static function addBron($bron) {
        $stmt = self::$db->prepare("INSERT INTO bron( Numer_broni, Kaliber, Nazwa_broni,Rodzaj_broni) "
                . "VALUES(:Numer_broni,:Kaliber,:Nazwa_broni,:Rodzaj_broni)");
        
        $stmt->bindParam (":Numer_broni", $bron->getNumer_broni(), PDO::PARAM_STR);
        $stmt->bindParam (":Kaliber", $bron->getKaliber(), PDO::PARAM_STR);
        $stmt->bindParam (":Nazwa_broni", $bron->getNazwa_broni(), PDO::PARAM_STR);
        $stmt->bindParam (":Rodzaj_broni", $bron->getRodzaj_broni(), PDO::PARAM_STR);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //POBRANIE LISTY KATEGORII
    public static function getBronList() {
        $stmt = self::$db->query('SELECT * FROM bron');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //USUNIECIE KATEGORII
    public static function deleteBron($bron) {
        $stmt = self::$db->prepare('DELETE FROM bron WHERE  idBron=:idBron');
        //$stmt->execute(array($bron->getidBron()));
        $stmt->bindParam (":idBron", $bron->getidBron(), PDO::PARAM_STR); 
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //EDYCJA KATEGORII
    public static function updateBron($bron) {
     $stmt = self::$db->prepare("UPDATE bron set Numer_broni=:Numer_broni, Kaliber=:Kaliber, Nazwa_broni=:Nazwa_broni,Rodzaj_broni=:Rodzaj_broni "
                . " WHERE idBron=:idBron");        
        $stmt->bindParam (":idBron", $bron->getidBron(), PDO::PARAM_STR);   
        $stmt->bindParam (":Numer_broni", $bron->getNumer_broni(), PDO::PARAM_STR);
        $stmt->bindParam (":Kaliber", $bron->getKaliber(), PDO::PARAM_STR);
        $stmt->bindParam (":Nazwa_broni", $bron->getNazwa_broni(), PDO::PARAM_STR);
        $stmt->bindParam (":Rodzaj_broni", $bron->getRodzaj_broni(), PDO::PARAM_STR);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    /*
     * Zwierzyna
     */
    //POBRANIE Zwierzyna NA PODSTAWIE ID
    public static function getZwierzynaById($idZwierzyna) {
        $stmt = self::$db->prepare('SELECT * FROM zwierzyna WHERE idZwierzyna=?');
        $stmt->execute(array($idZwierzyna));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $zwierzyna= new Zwierzyna();
            $zwierzyna->setidZwierzyna($result['idZwierzyna']);
            $zwierzyna->setNazwa($result['Nazwa']);
            $zwierzyna->setOkres_ochronny($result['Okres_ochronny']);
            $zwierzyna->setSezon_polowan($result['Sezon_polowan']);
            $zwierzyna->setilosc($result['ilosc']);
            
            return $zwierzyna;
        }
    }
    //DODANIE Zwierzyna
    public static function addZwierzyna($zwierzyna) {
        $stmt = self::$db->prepare("INSERT INTO zwierzyna( Nazwa, Okres_ochronny, Sezon_polowan,ilosc) "
                . "VALUES(:Nazwa,:Okres_ochronny,:Sezon_polowan,:ilosc)");
        
        $stmt->bindParam (":Nazwa", $zwierzyna->getNazwa(), PDO::PARAM_STR);
        $stmt->bindParam (":Okres_ochronny", $zwierzyna->getOkres_ochronny(), PDO::PARAM_STR);
        $stmt->bindParam (":Sezon_polowan", $zwierzyna->getSezon_polowan(), PDO::PARAM_STR);
        $stmt->bindParam (":ilosc", $zwierzyna->getilosc(), PDO::PARAM_STR);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //POBRANIE LISTY Zwierzyna
    public static function getZwierzynaList() {
        $stmt = self::$db->query('SELECT * FROM zwierzyna');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //USUNIECIE Zwierzyna
    public static function deleteZwierzyna($zwierzyna) {
        $stmt = self::$db->prepare('DELETE FROM zwierzyna WHERE  idZwierzyna=:idZwierzyna');
        $stmt->bindParam (":idZwierzyna", $zwierzyna->getidZwierzyna(), PDO::PARAM_STR); 
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //EDYCJA Zwierzyna
    public static function updateZwierzyna($zwierzyna) {
     $stmt = self::$db->prepare("UPDATE zwierzyna set Nazwa=:Nazwa, Okres_ochronny=:Okres_ochronny, Sezon_polowan=:Sezon_polowan,ilosc=:ilosc "
                . " WHERE idZwierzyna=:idZwierzyna");        
        $stmt->bindParam (":idZwierzyna", $zwierzyna->getidZwierzyna(), PDO::PARAM_STR);   
        $stmt->bindParam (":Nazwa", $zwierzyna->getNazwa(), PDO::PARAM_STR);
        $stmt->bindParam (":Okres_ochronny", $zwierzyna->getOkres_ochronny(), PDO::PARAM_STR);
        $stmt->bindParam (":Sezon_polowan", $zwierzyna->getSezon_polowan(), PDO::PARAM_STR);
        $stmt->bindParam (":ilosc", $zwierzyna->getilosc(), PDO::PARAM_STR);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*
     * Produkty
     */

    public static function getksiazka_polowanById($id) {
        $stmt = self::$db->prepare('SELECT * FROM ksiazka_polowan kp WHERE idKsiazka_polowan=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $produkt = new Produkt();
            $produkt->setidKsiazka_polowan($result['idKsiazka_polowan']);
            $produkt->setRozpoczecie_polowania 	($result['Rozpoczecie_polowania']);
            $produkt->setZakonczenie_polowania($result['Zakonczenie_polowania']);
            $produkt->setStrzaly(self::getKategoriaById($result['Strzaly']));
            $produkt->setNumer_odstrzalu($result['Numer_odstrzalu']);
            return $produkt;
        }
    }

    public static function addksiazka_polowan($produkt) {
        $stmt = self::$db->prepare("INSERT INTO ksiazka_polowan(Rozpoczecie_polowania,Zakonczenie_polowania,Strzaly,Numer_odstrzalu) "
                . "VALUES(:Rozpoczecie_polowania , :Zakonczenie_polowania, :Strzaly, :Numer_odstrzalu)");
        $stmt->execute(array(
            ':Rozpoczecie_polowania' => $produkt->getRozpoczecie_polowania(),
            ':Zakonczenie_polowania' => $produkt->getZakonczenie_polowania(),
            ':Strzaly' => $produkt->getStrzaly(),
            ':Numer_odstrzalu' => $produkt->getNumer_odstrzalu()
        ));

        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public static function getksiazka_polowanList() {
        $stmt = self::$db->query('SELECT * FROM ksiazka_polowan');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
     public static function getksiazka_polowanListByCategory($idKategorii) {
        $stmt = self::$db->prepare('SELECT * FROM ksiazka_polowan WHERE idKsiazka_polowan=?');
         $stmt->execute(array($idKategorii));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteksiazka_polowan($produkt) {
        $stmt = self::$db->prepare('DELETE FROM ksiazka_polowan WHERE idKsiazka_polowan=?');
        $stmt->execute(array($produkt->getidKsiazka_polowan()));
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public static function updateksiazka_polowan($ksiazka_polowan) {
        try {
            self::$db->beginTransaction();
            $stmt = self::$db->prepare('UPDATE ksiazka_polowan set Rozpoczecie_polowania=:Rozpoczecie_polowania, '
                    . 'Zakonczenie_polowania=:Zakonczenie_polowania, '
                    . 'Strzaly=:Strzaly,'
                    . 'Numer_odstrzalu=:Numer_odstrzalu WHERE idKsiazka_polowan=:id');
            $stmt->execute(array(
                ':id' => $ksiazka_polowan->getidKsiazka_polowan(),
                ':Rozpoczecie_polowania' => $ksiazka_polowan->getRozpoczecie_polowania(),
                ':Zakonczenie_polowania' => $ksiazka_polowan->getZakonczenie_polowania(),
                ':Strzaly' => $ksiazka_polowan->getStrzaly(),
                ':Numer_odstrzalu' => $ksiazka_polowan->getNumer_odstrzalu()
            ));

            $affected_rows = $stmt->rowCount();
            if ($affected_rows == 1) {
                self::$db->commit();
                return TRUE;
            }
        } catch (Exception $ex) {
            echo $ex;
            self::$db->rollBack();
            return FALSE;
        }
    }

    /*
     * Zamówienia
     */

    public static function getZamowienieById($id) {
        $stmt = self::$db->prepare('SELECT * FROM zamowienie WHERE id_zamowienia=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $zamowienie = new Zamowienie();
            $zamowienie->setIdZamowienia($result['id_zamowienia']);

            $produktyZamowienia = self::getProduktyZamowienia($id);
            $zamowienie->setProdukty($produktyZamowienia);
            $kwota = 0.0;
            foreach ($produktyZamowienia as $p) {
                $kwota += $p->getProdukt()->getCena() * $p->getIlosc();
            }
            $zamowienie->setCena($kwota);
            $zamowienie->setAdres($result['adres']);
            $zamowienie->setDataRealizacji($result['data_realizacji']);
            $zamowienie->setDataZamowienia($result['data_zamowienia']);
            $zamowienie->setIdKlienta($result['id_klienta']);
            $zamowienie->setStatus($result['status']);
            $zamowienie->setUwagi($result['uwagi_dodatkowe']);
            return $zamowienie;
        }
    }

    public static function addZamowienie($zamowienie) {
        $stmt = self::$db->prepare("INSERT INTO zamowienie(id_klienta,adres,uwagi_dodatkowe,status,data_zamowienia) "
                . "VALUES(:id_klienta, :adres, :uwagi_dodatkowe, :status, now())");
        $stmt->execute(array(
            ':id_klienta' => $zamowienie->getIdKlienta(),
            ':adres' => $zamowienie->getAdres(),
            ':uwagi_dodatkowe' => $zamowienie->getUwagi(),
            ':status' => $zamowienie->getStatus()
        ));

        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            $idZamowienia = self::$db->lastInsertId();
            if (!empty($idZamowienia)) {
                foreach ($zamowienie->getProdukty() as $produkt) {
                    $stmt = self::$db->prepare("INSERT INTO szczegoly_zamowienia(id_zamowienia, id_produktu,ilosc) "
                            . "VALUES(:id_zamowienia, :id_produktu , :ilosc)");
                    $stmt->execute(array(
                        ':id_produktu' => $produkt->getIdProduktu(),
                        ':id_zamowienia' => $idZamowienia,
                        ':ilosc' => $produkt->getIlosc()
                    ));
                }
                return TRUE;
            }
        }
        return FALSE;
    }

    public static function getZamowienieList() {
        $stmt = self::$db->query('SELECT * FROM zamowienie');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getZamowienieUserList($idUser) {
        $stmt = self::$db->prepare('SELECT * FROM zamowienie WHERE id_klienta=?');
        $stmt->execute(array($idUser));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProduktyZamowienia($idZamowienia) {
        $stmt = self::$db->prepare('SELECT * FROM szczegoly_zamowienia WHERE id_zamowienia=?');
        $stmt->execute(array($idZamowienia));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $produkty = array();
        foreach ($results as $row) {
            $idProduktu = $row['id_produktu'];
            $produkt = self::getProduktById($idProduktu);
            $produktZamowienia = new ProduktZamowienia();
            $produktZamowienia->setIdProduktu($idProduktu);
            $produktZamowienia->setIdZamowienia($idZamowienia);
            $produktZamowienia->setIlosc($row['ilosc']);
            $produktZamowienia->setProdukt($produkt);
            $produkty[] = $produktZamowienia;
        }
        return $produkty;
    }

    public static function deleteZamowienie($zamowienie) {
        $stmt = self::$db->prepare('DELETE FROM zamowienie WHERE id_zamowienia=?');
        $stmt->execute(array($zamowienie->getIdZamowienia()));
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public static function payZamowienie($zamowienie) {
        $stmt = self::$db->prepare('UPDATE zamowienie SET status=? , data_zamowienia=now() WHERE id_zamowienia=?');
        $stmt->execute(array($zamowienie->getStatus(), $zamowienie->getIdZamowienia()));
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public static function realizeZamowienie($zamowienie) {
        $stmt = self::$db->prepare('UPDATE zamowienie SET data_realizacji=now() , status=? WHERE id_zamowienia=?');
        $stmt->execute(array($zamowienie->getStatus(), $zamowienie->getIdZamowienia()));

        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }

}

?>