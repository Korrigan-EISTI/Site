<?php
/* Appel php permettant d'envoyer un nouveau message privé */
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
$msg = mb_strimwidth($_POST["msg"], 0, 65000, "...");
error_log($_SESSION["user_id"].$_POST["friend_id"].$msg);
$mysqli->execute_query("INSERT INTO `Message` (user_id_1,user_id_2,`date`,message) VALUES (?,?,CAST( CURDATE() AS Date ),?);",[$_SESSION["user_id"],$_POST["friend_id"],$msg]);

?>