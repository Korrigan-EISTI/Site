<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
        $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
        $result = $mysqli->query("SELECT id FROM user WHERE \"".$_POST["email"]."\" = user.email");
        if($result->num_rows)
        {
            echo '<form id="form" action="login.php" method="post">
                <input type="hidden" name="created" value="false">
            </form>
            <script type="text/javascript">
                document.getElementById("form").submit();
            </script>';
        }
        else{
            $mysqli->query("INSERT INTO user (email,password) VALUES (\"".$_POST["email"]."\",\"".$_POST["password"]."\")");
            echo '
            <form id="form" action="login.php" method="post">
                <input type="hidden" name="created" value="true">
            </form>
            <script type="text/javascript">
                document.getElementById("form").submit();
            </script>';
        }
        ?>
    </body>
</html>