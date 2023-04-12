<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lama - Création de compte</title>
    <link rel="stylesheet" href="./login.css">
    <link rel="icon" type="image/webp" href="/img/lama_icon.webp">
</head>

<script type="text/javascript">
    function validate() {
        var password1 = document.getElementById("password1");
        var password2 = document.getElementById("password2");
        if (password1.value.localeCompare(password2.value) == 0) {
            return true;
        }
        alert("Les deux mots de passe ne correspondent pas");
        return false;
    }
</script>


<body>
    <div id="d1">
        <img id="lama_logo" src="../img/lama_logo.webp">
    </div>
    <div id="main_div">
        <h2>Création de compte</h2>
        <form onsubmit="return validate()" action="create_account_server.php" method="POST">
            <table>
                <tr>
                    <td>Identifiant</td>
                    <td><input name="id" id="id" required></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><input name="name" id="name" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" id="password1" required></td>
                </tr>
                <tr>
                    <td>Confirmer votre mot de passe</td>
                    <td><input type="password" name="password" id="password2" required></td>
                </tr>
            </table>
            <br>
            <input id="create_account_button" type="submit" value="Créer">
        </form>
        <br><br>
        <p>Cliquez <a href="login.php">ici</a> pour revenir à la fenêtre de connexion.</p>
    </div>
</body>

</html>