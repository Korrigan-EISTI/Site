<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
        $result = $mysqli->execute_query("SELECT user_id FROM User WHERE ? = user_id",[$_POST["id"]]);
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
            $mysqli->execute_query("INSERT INTO User (user_id,name,email,password) VALUES (?,?,?,?)",[$_POST["id"],$_POST["name"],$_POST["email"],password_hash($_POST["password"],$PASSWORD_DEFAULT)]);
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