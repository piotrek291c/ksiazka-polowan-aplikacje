<h1>Dodaj Rejon</h1>
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
<form method="POST" action="/<?= APP_ROOT ?>/rejon/add">
    <div class="form-group">
    <label>Miejscowość </label>
    <input type="text" name="Miejscowosc" class="form-control"/>  
    <label>Obwód łowiecki </label>
    <input type="text" name="Obwod_lowiecki" class="form-control"/>  
    <label>Nazwa łowiska </label>
    <input type="text" name="Nazwa_lowiska" class="form-control"/>  
    <label>idMysliwy </label>
    <input type="text" name="Mysliwy_idMysliwy" class="form-control"/>  
    </div>
    <button class="btn btn-info" type="submit">Dodaj</button>
</form>