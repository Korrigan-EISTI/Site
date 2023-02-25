<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <script type="text/javascript">
            function validate()
            {
                var password1=document.getElementById("password1");
                var password2=document.getElementById("password2");
                if(password1.value.localeCompare(password2.value)==0){
                    return true;
                }
                alert("2nd mot de passe different du premier");
                return false;
            }
        </script>
    </head>
    <body>
        <h1>Login</h1>
        <form onsubmit="return validate()" action="create_account_server.php" method="POST">
            <table>
                <tr>
                    <td>Id utilisateur</td>
                    <td><input name="id" id="id" ></td>
                </tr>
                <tr>
                    <td>Nom d'utilisateur</td>
                    <td><input name="name" id="name" ></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id="email" ></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td>Réentrez votre mot de passe</td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Créer">
        </form>
    </body>
</html>
