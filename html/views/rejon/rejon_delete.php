<h1>Usuń Rejon</h1>
<?php
$Miejscowosc = "";
$idRejon = "";
if (!empty($model)) {
    $Miejscowosc = $model->getMiejscowosc();
    $idRejon = $model->getidRejon();
}
?>
<h3>Czy na pewno chcesz usunąć Rejon: <b><?=$Miejscowosc?></b>?</h3>
<form method="POST" action="/<?= APP_ROOT ?>/rejon/delete">
    <input type="hidden" name="idRejon" value="<?=$idRejon?>"/>
    <button class="btn btn-info" type="submit" name="cancel" >Anuluj</button><br />
    <button class="btn btn-info"  type="submit" name="delete"> Usuń</button><br />
</form>