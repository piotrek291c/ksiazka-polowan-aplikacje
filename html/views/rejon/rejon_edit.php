<h1>Edytuj Reojn</h1>
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
$Miejscowosc = "";
$Obwod_lowiecki= "";
$Nazwa_lowiska= "";
$Mysliwy_idMysliwy= "";
$idRejon = "";
if (!empty($model)) {
    $Miejscowosc = $model->getMiejscowosc();
    $Obwod_lowiecki= $model->getObwod_lowiecki();
    $Nazwa_lowiska= $model->getNazwa_lowiska();
    $Mysliwy_idMysliwy= $model->getMysliwy_idMysliwy();
    $idRejon = $model->getidRejon();
    
    } ?>
<form method="POST" action="/<?= APP_ROOT ?>/rejon/edit">
    <div class="form-group">
       
    <label>Miejscowość </label>
    <input class="form-control" type="text" name="Miejscowosc" value="<?= $Miejscowosc ?>"/>
    <label>Obwód łowiecki </label>
    <input class="form-control" type="text" name="Obwod_lowiecki" value="<?= $Obwod_lowiecki ?>"/>
    <label>Nazwa łowiska </label>
    <input class="form-control" type="text" name="Nazwa_lowiska" value="<?= $Nazwa_lowiska ?>"/>
    <label>idMysliwy </label>
    <input class="form-control" type="text" name="Mysliwy_idMysliwy" value="<?= $Mysliwy_idMysliwy ?>"/> 
    </div>
    <input type="hidden" name="idRejon" value="<?= $idRejon ?>" />
    <button class="btn btn-info" type="submit">Zapisz</button><br />
</form>