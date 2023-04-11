<?php
session_start();
$mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->execute_query("INSERT INTO `Friends` (user_id_1,user_id_2) VALUES (?,?)",[$_SESSION["user_id"],$_POST["user_id_2"]]);
$mysqli->execute_query("DELETE from `Request` WHERE ? = user_id_1 AND ? = user_id_2", [$_SESSION["user_id"], $_POST["user_id_2"]]);
$mysqli->execute_query("DELETE from `Request` WHERE ? = user_id_2 AND ? = user_id_1", [$_SESSION["user_id"], $_POST["user_id_2"]]);
echo json_encode(['name' => $_POST["name"]]);
?>