<h1>Usuń Mysliwego</h1>
<?php
$login = "";
$idMysliwy = "";
if (!empty($model)) {
    $login = $model->getMiejscowosc();
    $idMysliwy = $model->getidMysliwy();
}
?>
<h3>Czy na pewno chcesz usunąć Mysliwy: <b><?=$login?></b>?</h3>
<form method="POST" action="/<?= APP_ROOT ?>/mysliwy/delete">
    <input type="hidden" name="idMysliwy" value="<?=$idMysliwy?>"/>
    <button class="btn btn-info" type="submit" name="cancel" >Anuluj</button><br />
    <button class="btn btn-info"  type="submit" name="delete"> Usuń</button><br />
</form>