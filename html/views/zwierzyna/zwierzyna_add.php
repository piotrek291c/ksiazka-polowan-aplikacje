<h1>Dodaj Zwierzynę</h1>
<?php
if (!empty($error)) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
    <?php }
else if (!empty($success)) {  ?> 
    <div class="alert alert-success" role="alert">
        <?= $success ?>
    </div>
    <?php } ?>
<form method="POST" action="/<?= APP_ROOT ?>/zwierzyna/add">
    <div class="form-group">
    <label>Nazwa </label>
    <input type="text" name="Nazwa" class="form-control"/>  
    <label>Okres ochronny </label>
    <input type="text" name="Okres_ochronny" class="form-control"/>  
    <label>Sezon polowan </label>
    <input type="text" name="Sezon_polowan" class="form-control"/>  
    <label>ilość</label>
    <input type="text" name="ilosc" class="form-control"/>  
    </div>
    <button class="btn btn-info" type="submit">Dodaj</button>
</form>