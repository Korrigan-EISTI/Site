
<?php
/* Appel php pemettant d'afficher les messages privés en fonction de l'amis sléectionné */
session_start();
if(isset($_POST["friend_id"])){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
    $result = $mysqli->execute_query("SELECT user_id_1,`message` FROM `Message` WHERE (user_id_1 = ? AND user_id_2 = ?) OR (user_id_2 = ? AND user_id_1 = ?) ",[$_SESSION["user_id"],$_POST["friend_id"],$_SESSION["user_id"],$_POST["friend_id"]]);
    foreach($result as $row){
        if($row["user_id_1"]==$_SESSION["user_id"]){
            printf("<div class='message_sent'>
                <p>%s</p>
            </div>",htmlspecialchars($row["message"]));
        }
        else{
            printf("<div class='message_received'>
                <p>%s</p>
            </div>",htmlspecialchars($row["message"]));
        }
    }
}
?>