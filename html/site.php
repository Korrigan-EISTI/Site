<?php
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
            <button class='show_reply' onclick='toggle_reply(event)'>Reply</button>
            <div class='reply' style='display:none'>
                <textarea rows='5' placeholder='Reply...'></textarea>
                <button class='send' onclick='send(event)'>Send</button>
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/lama_icon.png">
    <script type="text/javascript" src="../js/script.js"></script>
    <?php
    session_start();
    if(file_exists("'../img/user_profile_pictures/".$row["user_id"].".jpg")){
        $img=$row["user_id"];
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
    <?php include("header.php"); ?>
    <div id="div_main">

        <div id="div_profile" class="panel">
            <div id="user_info">
                <img id="user_pic" src="../img/user_profile_pictures/mr_president.jpg">
                <p id="user_name">Lilian Fellouh</p><br>
                <p id="user_id">@mr_president</p><br>
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
                $result = $mysqli->execute_query("SELECT Post.user_id,Post.date,Post.message,Post.id,User.name FROM Post NATURAL JOIN User WHERE parent_id IS NULL");
                fetch_comment($result);
                ?>
            </div>
        </div>
        
        <div id="div_friendlist" class="panel">
            <input type="text" id="search_bar" placeholder="Rechercher un utilisateur"></input>

            <div id="friendlist">
                <div id="friends">

                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/ugo.jpg">
                        <div>
                            <b>Ugo Merlier</b>
                            <br>
                            <i>@ugo_tracteur</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/unicorn_princess123.jpg">
                        <div>
                            <b>Manel Hamane</b>
                            <br>
                            <i>@unicorn_princess123</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/sujeebioss.jpg">
                        <div>
                            <b>Sujeeban Mahendran</b>
                            <br>
                            <i>@sujeebioss</i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>