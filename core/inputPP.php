<?php
/* Appel php appelé par le Javascript pour changer de photo de profile */
session_start();
$target_dir = "../img/user_profile_pictures/";
$target_file = $target_dir . basename($_SESSION["user_id"].".webp");
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Si le fichier image est l'actuelle photo de profile
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["filename"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Si le ficheir existe déjà
if (file_exists($target_file)) {
  unlink($target_file); // On le supprime
}

// On regarde la taille du fichier
if ($_FILES["filename"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// S'il y a des erreurs
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// S'il n'y a pas d'erreurs
} else {
  if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["filename"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
header("location:/feed/site.php");
?>