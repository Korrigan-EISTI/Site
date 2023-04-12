<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lama - Connexion</title>
    <link rel="stylesheet" href="./login.css">
    <link rel="icon" type="image/png" href="/img/lama_icon.webp">
</head>

<body>

    <div id="d1">
        <img id="lama_logo" src="../img/lama_logo.webp">
    </div>
    <br>
    <div id="d2">
        <form action="login_server.php" method="POST">
            <div id="login_fields">
                <div>
                    <div>
                        <img src="../img/user_profile_pictures/default.webp">
                    </div>
                    <div class="p_and_input">
                        <p>Identifiant</p>
                        <input name="user_id" id="user_id">
                    </div>
                </div>
                <div>
                    <img src="../img/password_icon.webp">
                    <div class="p_and_input">
                        <p>Mot de passe</p>
                        <input type="password" name="password">
                    </div>
                </div>
            </div>
            <input id="connexion_button" type="submit" value="Connexion">
        </form>
        <p>Cliquez <a href="create_account.php">ici</a> pour accéder à la fenêtre de création de compte.</p>
    </div>

    <?php
        if(isset($_POST["login"]))
        {
            echo "<p style='background-color:red'>⚠ Identifiant ou mot de passe erroné ⚠</p>";
        }
        if(isset($_POST["created"]))
        {
            if($_POST["created"])
            {
                echo "<p style='background-color:green'>Compte créé avec succès ☑</p>";
            }
            else
            {
                echo "<p style='background-color:orange'>⚠ Compte déjà existant ⚠</p>";
            }
        }
    ?>

</body>

</html>