<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            body{
                background-color: lightgray;
                background-image: url("bkg.png");
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

            <img src="logo.png" alt="image" class="center">
            <div id="d1">
            <h4>Créez un compte Poké Store</h4>
            </div>
            <br>
            <div id="d2">
            <br>
            <div id="d3">
            <small>Vous créez un compte sur :</small><br>
            <strong>Pokestore</strong>
            <br><br><br>
            </div>
            <div id="d4">
            <table>
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
