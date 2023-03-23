<link rel="stylesheet" href="../css/header.css">
<link rel="shortcut icon" href="/img/lama_icon.png">
<header>
    <img id="lama_logo" src="../img/lama_logo.png">
    <?php 
        if ($_SESSION["user_id"] != null && isset($_SESSION["user_id"])){
            echo "<a href='/deconnexion.php' id='connexion_button'>Déconnexion</a>";
        }else{
            echo "<a href='/login.php' id='connexion_button'>Déconnexion</a>";
        }
    ?>
    
</header>