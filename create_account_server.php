<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
        $login=simplexml_load_file("logins.xml");
        $auth=false;
        foreach ($login->user as $user)
        {
            if($_POST["email"]==$user->email)
            {
                $exist=true;
            }
        }
        if($exist)
        {
            echo '
            <form id="form" action="login.php" method="post">
                <input type="hidden" name="created" value="false">
            </form>
            <script type="text/javascript">
                document.getElementById("form").submit();
            </script>';
        }
        else{
            print_r($login);
            $new_user=$login->addChild('user');
            $new_user->addChild('email',$_POST["email"]);
            $new_user->addChild('password',$_POST["password"]);
            print_r($login);
            $login->asXML("logins.xml");
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