<h1>Dodaj Mysliwego</h1>
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
<form method="POST" action="/<?= APP_ROOT ?>/mysliwy/add">
        <div class="form-group">
        <label>Login: </label>
        <input type="text" name="login" class="form-control" required="true"/> 
    </div>
    <div class="form-group">
        <label>Hasło: </label>
        <input type="password" name="haslo" class="form-control" required="true"/> 
    </div>
    <div class="form-group">
        <label>Powtórz hasło: </label>
        <input type="password" name="haslo2" class="form-control" required="true"/> 
    </div> 
    <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control" required="true"/>
    </div>
    <div class="form-group">
        <label>Imię: </label>
        <input type="text" name="Imie" class="form-control" required="true"/> 
    </div>
    <div class="form-group">
        <label>Nazwisko: </label>
        <input type="text" name="Nazwisko" class="form-control" required="true" /> 
    </div>
    <div class="form-group">
        <label>Numer pozwolenia: </label>
        <input type="text" name="Numer_pozwolenia" class="form-control" required="true"/> 
    </div>
    <div class="form-group">
        <label>Data_urodzenia: </label>
        <input type="text" name="Data_urodzenia"  class="form-control" required="true"/> 
    </div>
    <button class="btn btn-info" type="submit">Dodaj</button>
</form>