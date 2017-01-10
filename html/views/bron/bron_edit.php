<h1>Edytuj Broń</h1>
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
$Numer_broni = "";
$Kaliber= "";
$Nazwa_broni= "";
$Rodzaj_broni= "";
$idBron = "";
if (!empty($model)) {
    $Numer_broni = $model->getNumer_broni();
    $Kaliber= $model->getKaliber();
    $Nazwa_broni= $model->getNazwa_broni();
    $Rodzaj_broni= $model->getRodzaj_broni();
    $idBron = $model->getidBron();
    
    } ?>
<form method="POST" action="/<?= APP_ROOT ?>/bron/edit">
    <div class="form-group">
       
    <label>Numer broni </label>
    <input class="form-control" type="text" name="Numer_broni" value="<?= $Numer_broni ?>"/>
    <label>Kaliber </label>
    <input class="form-control" type="text" name="Kaliber" value="<?= $Kaliber ?>"/>
    <label>Nazwa broni </label>
    <input class="form-control" type="text" name="Nazwa_broni" value="<?= $Nazwa_broni ?>"/>
    <label>Rodzaj broni </label>
    <input class="form-control" type="text" name="Rodzaj_broni" value="<?= $Rodzaj_broni ?>"/> 
    </div>
    <input type="hidden" name="idBron" value="<?= $idBron ?>" />
    <button class="btn btn-info" type="submit">Zapisz</button><br />
</form>