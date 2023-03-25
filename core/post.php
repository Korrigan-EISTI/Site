<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
$mysqli->execute_query("INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES (?,CAST( CURDATE() AS Date ),?,?);",[$_SESSION["user_id"],$_POST["msg"],$_POST["parent_id"]]);
echo($mysqli->query("SELECT MAX(id) FROM `Post`;")->fetch_assoc()["MAX(id)"]);

?>