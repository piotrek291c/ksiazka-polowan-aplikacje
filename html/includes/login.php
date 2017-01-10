<?php
//$login = $_SESSION['user'];
$login = isset($_SESSION['user']) ? $_SESSION['user'] : '';
$isAdmin = false;
if (!empty($login)) {
    $db = $registry->db;
    echo 'Witaj <b>' . $login . '       </b>';
    $isAdmin = $db::isUserInRole($login, 'admin');
    if ($isAdmin) {
        echo '(admin) |';
    }
    ?> 
    <a href="/<?= APP_ROOT ?>/account/logout">Wyloguj się</a>
    <?php
} else {
    ?>
    <a href="/<?= APP_ROOT ?>/account/login">Zaloguj się</a> &nbsp; |  	
    <a href="/<?= APP_ROOT ?>/account/register">Rejstracja</a>
    <?php
}
?>