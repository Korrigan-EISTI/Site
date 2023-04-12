<?php
session_start();
$mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->execute_query("INSERT INTO `Request` (user_id_1,user_id_2) VALUES (?,?)",[$_SESSION["user_id"],$_POST["user_id_2"]]);
echo $_POST["name"];
?>