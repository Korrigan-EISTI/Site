<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
        $result = $mysqli->execute_query("SELECT user_id FROM `user` WHERE ? = user.user_id AND ? = user.password",[$_POST["user_id"],$_POST["password"]]);
        if($result->num_rows)
        {
            session_start();
            $_SESSION['user_id']= mysqli_fetch_assoc($result)['user_id'];
            header("location:html/site.php");
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