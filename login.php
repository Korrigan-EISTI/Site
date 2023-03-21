<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <style>
        body{
            background-color: black;
            font-family: Sans-serif;
        }
        .center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
        }
        #d1{
            text-align: center;
            margin-top: 100px;
            color: white;
        }
        #d2{
            border-radius: 10%;
            height: 300px;
            width: 350px;
            background-color: white;
            margin-left: auto;
            margin-right: auto;
        }
        #d3{
            padding-left:10px;
        }
        #d4{
            text-align: center;
        }
        #d5{
            color: skyblue;
        }
    </style>
    <body>
        <form action="login_server.php" method="POST">
            <div id="d1">
            <h4>Connectez-vous</h4>
            </div>
            <br>
            <div id="d2">
            <br>
            <div id="d3">
            <small>Vous vous connectez à :</small><br>
            <strong>Lama</strong>
            <br>
            </div>
            <div id="d4">
            <table>
                <tr>
                <td>Id utilisateur</td>
                <td><input name="user_id" id="user_id" ></td>
                </tr>
                <tr>
                <td>Mot de passe</td>
                <td><input type="password" name="password">	</td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Connexion">
        </form>
        <br>
        <br>
        <button type="button" onclick="location.href='create_account.php'">Creer un compte</button>
        <button type="button" onclick="location.href='model.php'">Continuer sans compte</button>
        <?php
        if(isset($_POST["login"]))
        {
            echo "<p style='background-color:red'>Identifiant ou mot de passe erroné.</p>";
        }
        if(isset($_POST["created"]))
        {
            if($_POST["created"])
            {
                echo "<p style='background-color:green'>Compte créé avec succès.</p>";
            }
            else
            {
                echo "<p style='background-color:orange'>Compte déjà existant.</p>";
            }
        }
        ?>
    </body>
</html>
