<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
        $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
        $result = $mysqli->query("SELECT id FROM user WHERE \"".$_POST["email"]."\" = user.email AND \"".$_POST["password"]."\"=user.password");
        if($result->num_rows)
        {
            session_start();
            $_SESSION['id']= mysqli_fetch_assoc($result)['id'];
            header("location:site.php");
        }
        else{
            echo '
            <form id="form" action="login.php" method="post">
                <input type="hidden" name="login" value="false">
            </form>
            <script type="text/javascript">
                document.getElementById("form").submit();
            </script>';
        }
        ?>
    </body>
</html>