<h1>Usuń Broń</h1>
<?php
$Nazwa_broni = "";
$idBron = "";
if (!empty($model)) {
    $Nazwa_broni = $model->getNazwa_broni();
    $idBron = $model->getidBron();
}
?>
<h3>Czy na pewno chcesz usunąć Broń: <b><?=$Nazwa_broni?></b>?</h3>
<form method="POST" action="/<?= APP_ROOT ?>/bron/delete">
    <input type="hidden" name="idBron" value="<?=$idBron?>"/>
    <button class="btn btn-info" type="submit" name="cancel" >Anuluj</button><br />
    <button class="btn btn-info"  type="submit" name="delete"> Usuń</button><br />
</form>