<?php
/* Appel php permettant de se connecter */
function deny()
{
    echo '
    <form id="form" action="login.php" method="post">
        <input type="hidden" name="login" value="false">
    </form>
    <script type="text/javascript">
        document.getElementById("form").submit();
    </script>';
}
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
    $result = $mysqli->execute_query("SELECT `user_id`,`name`,`email`,`password` FROM `User` WHERE ? = User.user_id",[$_POST["user_id"]]);
    if($result->num_rows)
    {
        $data=$result->fetch_assoc();
        if(password_verify($_POST["password"],$data['password'])){
            session_start();
            $_SESSION['user_id']= $data['user_id'];
            $_SESSION['name']= $data['name'];
            $_SESSION['email']= $data['email'];
            header("location:/feed/site.php");
        }
        else{
            deny();
        }
    }
    else{
        deny();
    }
?>