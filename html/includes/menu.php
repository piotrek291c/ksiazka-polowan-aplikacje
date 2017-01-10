<?php
//$login = $_SESSION['user'];
$login = isset($_SESSION['user']) ? $_SESSION['user'] : '';
if (!empty($login)) {
    $db = $registry->db;
    if ($db::isUserInRole($login, 'admin')) {
?>
<!--Menu dla admina-->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/<?= APP_ROOT ?>">Książka</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/<?= APP_ROOT ?>/produkt">Produkty</a></li>
                        <li><a href="/<?= APP_ROOT ?>/kategoria">Kategorie</a></li>
                        <li><a href="/<?= APP_ROOT ?>/zamowienie">Zamowienia</a></li>
                        <li><a href="/<?= APP_ROOT ?>/account/logout">Wyloguj się</a></li> 
                        
                        
                        
                        
                        
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <?php
    } else { 
        ?>
<!--MENU DLA ZALOGOWANEGO ZWYKŁEGO UŻYTKOWNIKA-->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/<?= APP_ROOT ?>">Książka</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/<?= APP_ROOT ?>/zamowienie/moje_zamowienia">Zamowienia</a></li>
                        <li><a href="/<?= APP_ROOT ?>/produkt">Produkty</a></li>                       
                        <li><a href="/<?= APP_ROOT ?>/account/logout">Wyloguj się</a></li> 
                      
                
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <?php  }  ?>  <?php
} else {
    ?>
<!--MENU DLA GOŚCIA-->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/<?= APP_ROOT ?>">Książka</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                      <li><a href="/<?= APP_ROOT ?>/produkt">Produkty</a></li>
                      <li><a href="/<?= APP_ROOT ?>/ksiazka_polowan">Moje wpisy</a></li>
                      <li><a href="/<?= APP_ROOT ?>/mysliwy">Myśliwi</a></li>
                      <li><a href="/<?= APP_ROOT ?>/bron">Broń</a></li>
                      <li><a href="/<?= APP_ROOT ?>/zwierzyna">Zwierzyna</a></li>
                      <li><a href="/<?= APP_ROOT ?>/rejon">Rejon</a></li>
                      
                </ul>
            
                <ul class="nav navbar-nav">
          <li><a href="/<?= APP_ROOT ?>/account/register">Rejstracja</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Zaloguj się <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <form action="/<?= APP_ROOT ?>/account/login" method="post"> 
                    Login:<br /> 
                    <input type="text" name="login" value="" /> 
                    <br /><br /> 
                    Hasło:<br /> 
                    <input type="password" name="haslo" value="" /> 
                    <br /><br /> 
                    <input type="submit" class="btn btn-info" value="Zaloguj się" /> 
                </form> 
            </div>
          </li>
        </ul>
                
            </div><!--/.nav-collapse -->
            

            
            
        </div>
    </nav>
    <?php } ?>


