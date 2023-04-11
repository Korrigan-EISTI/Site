<?php
session_start();
$mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (isset($_POST["input"])){
    
    $result = $mysqli->execute_query("SELECT * from User WHERE User.name LIKE '{$_POST["input"]}%' OR User.user_id LIKE '{$_POST["input"]}%'");
    if (mysqli_num_rows($result) > 0){
        foreach ($result as $res) {
            if(file_exists("../img/user_profile_pictures/".$res["user_id"].".jpg")){
                $img=$res["user_id"];
            }
            else{
                $img="default";
            }
            printf("<div class='friend_block'>
            <img src='../img/user_profile_pictures/%s.jpg'>
            <div>
                <b>%s</b>
                <br>
                <i>@%s</i>
            </div>
            </div>", $img, $res["name"], $res["user_id"]);
        }
    }else{
        echo "<h6 style='text-align: center;'>No data found</h6>";
    }
    
}

?>
