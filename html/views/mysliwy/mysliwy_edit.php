<h1>Edytuj Myśliwego</h1>
<?php
if (!empty($error)) {  ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
    <?php } else if (!empty($success)) {   ?>
    <div class="alert alert-success" role="alert">
    <?= $success ?>
    </div>
    <?php }
$login = "";
$haslo= "";
$haslo2= "";
$email= "";
$Imie= "";
$Nazwisko= "";
$Numer_pozwolenia= "";
$Data_urodzenia= "";
$idMysliwy = "";
if (!empty($model)) {
    $login = $model->getlogin();
    $haslo= $model->gethaslo();
    $haslo2= $model->gethaslo2();
    $email= $model->getemail();
    $Imie = $model->getImie();
    $Nazwisko= $model->getNazwisko();
    $Numer_pozwolenia= $model->getNumer_pozwolenia();
    $Data_urodzenia= $model->getData_urodzenia();
    $idMysliwy = $model->getidMysliwy();
    
    } ?>
<form method="POST" action="/<?= APP_ROOT ?>/mysliwy/edit">
    <div class="form-group">
       
    <label>Login </label>
    <input class="form-control" type="text" name="login" value="<?= $login ?>"/>
    <label>Hasło </label>
    <input class="form-control" type="text" name="haslo" value="<?= $haslo ?>"/>
    <label>Powtórz hasło</label>
    <input class="form-control" type="text" name="haslo2" value="<?= $haslo2 ?>"/>
    <label>Email </label>
    <input class="form-control" type="text" name="email" value="<?= $email ?>"/> 
    <label>Imię </label>
    <input class="form-control" type="text" name="Imie" value="<?= $Imie ?>"/>
    <label>Nazwisko </label>
    <input class="form-control" type="text" name="Nazwisko" value="<?= $Nazwisko ?>"/>
    <label>Numer pozwolenia </label>
    <input class="form-control" type="text" name="Numer_pozwolenia" value="<?= $Numer_pozwolenia ?>"/>
    <label>Data urodzenia </label>
    <input class="form-control" type="text" name="Data_urodzenia" value="<?= $Data_urodzenia ?>"/> 
    </div>
    <input type="hidden" name="idMysliwy" value="<?= $idMysliwy ?>" />
    <button class="btn btn-info" type="submit">Zapisz</button><br />
</form>