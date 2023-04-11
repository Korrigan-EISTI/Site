<link rel="stylesheet" href="/header/header.css">
<link rel="shortcut icon" href="/img/lama_icon.webp">
<header>
    <img id="lama_logo" src="../img/lama_logo.webp">
    <?php 
        if ($_SESSION["user_id"] != null && isset($_SESSION["user_id"])){
            echo "<a href='/login/deconnexion.php' id='connexion_button'>Déconnexion</a>";
        }else{
            echo "<a href='/login/login.php' id='connexion_button'>Déconnexion</a>";
        }
    ?>
    
</header>