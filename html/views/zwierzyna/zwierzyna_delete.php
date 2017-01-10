<h1>Usuń Zwierzynę</h1>
<?php
$Nazwa = "";
$idZwierzyna = "";
if (!empty($model)) {
    $Nazwa = $model->getNazwa();
    $idZwierzyna = $model->getidZwierzyna();
}
?>
<h3>Czy na pewno chcesz usunąć Zwierzynę: <b><?=$Nazwa?></b>?</h3>
<form method="POST" action="/<?= APP_ROOT ?>/zwierzyna/delete">
    <input type="hidden" name="idZwierzyna" value="<?=$idZwierzyna?>"/>
    <button class="btn btn-info" type="submit" name="cancel" >Anuluj</button><br />
    <button class="btn btn-info"  type="submit" name="delete"> Usuń  </button><br />
</form>