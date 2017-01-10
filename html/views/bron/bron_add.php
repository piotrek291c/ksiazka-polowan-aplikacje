<h1>Dodaj Broń</h1>
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
<form method="POST" action="/<?= APP_ROOT ?>/bron/add">
    <div class="form-group">
    <label>Numer broni </label>
    <input type="text" name="Numer_broni" class="form-control"/>  
    <label>Kaliber </label>
    <input type="text" name="Kaliber" class="form-control"/>  
    <label>Nazwa broni </label>
    <input type="text" name="Nazwa_broni" class="form-control"/>  
    <label>Rodzaj broni </label>
    <input type="text" name="Rodzaj_broni" class="form-control"/>  
    </div>
    <button class="btn btn-info" type="submit">Dodaj</button>
</form>