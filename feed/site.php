<?php
session_start();
function fetch_comment($result)
{
    global $mysqli;
    while ($row = $result->fetch_assoc()) {
        if(file_exists("'../img/user_profile_pictures/".$row["user_id"].".jpg")){
            $img=$row["user_id"];
        }
        else{
            $img="default";
        }
        printf("
        <div id='%d' class='post_block'>
            <div class='post_block_user_info'>
                <img src='../img/user_profile_pictures/%s.jpg'>
                <b>%s</b>
                <br>
                <i>@%s</i>
            </div>
            <div class='post_block_text'>
                %s
            </div>
            <button class='comment_reply_button' onclick='toggle_reply(event)'>↪ Répondre</button>
            <div class='comment_text' style='display:none'>
                <textarea rows='5' placeholder='✎...'  maxlength='200'></textarea>
                <img src='../img/send_icon.png' class='comment_send_button' onclick='send(event)'/>
            </div>
        </div>",$row["id"],$img,htmlspecialchars($row["name"]),htmlspecialchars($row["user_id"]),htmlspecialchars($row["message"]));
        $comments = $mysqli->execute_query("SELECT Post.user_id,Post.date,Post.message,Post.id,User.name FROM Post NATURAL JOIN User WHERE parent_id = ?",[$row["id"]]);
        
        echo("<div class='indent'>");
        fetch_comment($comments);
        echo("</div>");
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lama - Page d'accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/img/lama_icon.png">
    <script type="text/javascript" src="script.js"></script>
    <?php
    if(file_exists("../img/user_profile_pictures/".$_SESSION["user_id"].".jpg")){
        $img=$_SESSION["user_id"];
    }
    else{
        $img="default";
    }
    printf("<div style='display:none'>
    <p id='user_id'>%s</p>
    <p id='name'>%s</p>
    <p id='email'>%s</p>
    <p id='img'>%s</p></div>",$_SESSION["user_id"],$_SESSION["name"],$_SESSION["email"],$img);
    ?>

</head>

<body>
    <?php include("../header/header.php"); ?>
    <div id="div_main">

        <div id="div_profile" class="panel">
            <div id="user_info"><br>
                <?php
                    if(file_exists("../img/user_profile_pictures/".$_SESSION["user_id"].".jpg")){
                        $img=$_SESSION["user_id"];
                    }else{
                        $img="default";
                    }
                    printf("
                        <img id='user_pic' src='../img/user_profile_pictures/%s.jpg'>
                        <p id='user_name'>%s</p>
                        <p id='user_id'>@%s</p><br>", $img, $_SESSION["name"], $_SESSION["user_id"]);
                ?>    
            </div>

            <div id="profile_links">
                <a href="#">Mon profil</a><br>
                <a href="#">Message</a><br>
                <a href="#" onclick="change_theme();">Thème clair/sombre</a><br>
            </div>
        </div>
        
        <div id="div_feed" class="panel">
            <div id="postlist">
                <?php
                $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
                $result = $mysqli->query("SELECT Post.user_id,Post.date,Post.message,Post.id,User.name FROM Post NATURAL JOIN User WHERE parent_id IS NULL");
                fetch_comment($result);
                ?>
            </div>
        </div>
        
        <div id="div_friendlist" class="panel">
            <input type="text" id="search_bar" placeholder="Rechercher un utilisateur"></input>

            <div id="friendlist">
                <div id="friends">
                    <?php
                    $result = $mysqli->execute_query("SELECT Friends.user_id_1, User.name, Friends.user_id_2 from Friends INNER JOIN User ON Friends.user_id_2 = User.user_id WHERE Friends.user_id_1 = ?",[$_SESSION["user_id"]]);
                    foreach($result as $row){
                        if(file_exists("../img/user_profile_pictures/".$row["user_id_2"].".jpg")){
                            $img=$row["user_id_2"];
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
                    </div>", $img, $row["name"], $row["user_id_2"]);
                    }
                    $result = $mysqli->execute_query("SELECT Friends.user_id_1, User.name from Friends INNER JOIN User ON Friends.user_id_1 = User.user_id WHERE Friends.user_id_2 = ?",[$_SESSION["user_id"]]);
                    foreach($result as $row){
                        if(file_exists("../img/user_profile_pictures/".$row["user_id_1"].".jpg")){
                            $img=$row["user_id_1"];
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
                    </div>", $img, $row["name"], $row["user_id_1"]);
                    }
                    $request = $mysqli->execute_query("SELECT Request.user_id_1, User.name from Request INNER JOIN User ON Request.user_id_1 = User.user_id WHERE Request.user_id_2 = ?",[$_SESSION["user_id"]]);
                    foreach ($request as $res) {
                        if(file_exists("../img/user_profile_pictures/".$res["user_id_1"].".jpg")){
                            $img=$res["user_id_1"];
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
                            <button onclick='send_friends(event)'>Accepter</button>
                        </div>
                        </div>", $img, $res["name"], $res["user_id_1"]);
                    }
                    $request = $mysqli->execute_query("SELECT Request.user_id_1, User.name, Request.user_id_2 from Request INNER JOIN User ON Request.user_id_2 = User.user_id WHERE Request.user_id_1 = ?",[$_SESSION["user_id"]]);
                    foreach ($request as $res) {
                        if(file_exists("../img/user_profile_pictures/".$res["user_id_2"].".jpg")){
                            $img=$res["user_id_2"];
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
                            <button onclick='send_friends(event)'>Accepter</button>
                        </div>
                        </div>", $img, $res["name"], $res["user_id_2"]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>