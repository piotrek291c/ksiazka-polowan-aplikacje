<h1>Edytuj Zwierzynę</h1>
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
$Nazwa = "";
$Okres_ochronny= "";
$Sezon_polowan= "";
$ilosc= "";
$idZwierzyna = "";
if (!empty($model)) {
    $Nazwa = $model->getNazwa();
    $Okres_ochronny= $model->getOkres_ochronny();
    $Sezon_polowan= $model->getSezon_polowan();
    $ilosc= $model->getilosc();
    $idZwierzyna = $model->getidZwierzyna();
    
    } ?>
<form method="POST" action="/<?= APP_ROOT ?>/zwierzyna/edit">
    <div class="form-group">
       
    <label>Nazwa </label>
    <input class="form-control" type="text" name="Nazwa" value="<?= $Nazwa ?>"/>
    <label>Okres ochronny </label>
    <input class="form-control" type="text" name="Okres_ochronny" value="<?= $Okres_ochronny ?>"/>
    <label>Sezon polowan </label>
    <input class="form-control" type="text" name="Sezon_polowan" value="<?= $Sezon_polowan ?>"/>
    <label>ilość </label>
    <input class="form-control" type="text" name="ilosc" value="<?= $ilosc ?>"/> 
    </div>
    <input type="hidden" name="idZwierzyna" value="<?= $idZwierzyna ?>" />
    <button class="btn btn-info" type="submit">Zapisz</button><br />
</form>