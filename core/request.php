<?php
    session_start();
    $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $result = $mysqli ->execute_query("SELECT * FROM `Friends` WHERE ? = Friends.user_id_1 AND ? = Friends.user_id_2 OR (? = Friends.user_id_2 AND ? = Friends.user_id_1)", [$_SESSION["user_id"], $_POST["user_id_2"], $_SESSION["user_id"], $_POST["user_id_2"]]);
    if (mysqli_num_rows($result) == 0){
        $mysqli->execute_query("INSERT INTO `Request` (user_id_1,user_id_2) VALUES (?,?)",[$_POST["user_id_2"], $_SESSION["user_id"]]);
        echo $_POST["name"];
    }else{
        echo "amis";
    }
    
?>