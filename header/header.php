<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("location:/login/login.php");
}
?>
<link rel="stylesheet" href="/header/header.css">
<link rel="shortcut icon" href="/img/lama_icon.webp">
<header>
    <img id="lama_logo" src="../img/lama_logo.webp">
    <a href='/login/deconnexion.php' id='connexion_button'>Déconnexion</a>
</header>