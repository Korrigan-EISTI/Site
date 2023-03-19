<?php
function fetch_comment($result,$indent)
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
        <div class='post_block' style='margin-left:".$indent."px'>\n
            <div class='post_block_user_info'>\n
                <img src='../img/user_profile_pictures/%s.jpg'>
                <b>%s</b>
                <br>
                <i>@%s</i>
            </div>
            <div class='post_block_text'>
                <p>%s</p>
            </div>
        </div>", $img,htmlspecialchars($row["name"]),htmlspecialchars($row["user_id"]),htmlspecialchars($row["message"]));
        $comments = $mysqli->execute_query("SELECT Post.user_id,Post.date,Post.message,Post.id,User.name FROM Post NATURAL JOIN User WHERE parent_id = ?",[$row["id"]]);
        
        fetch_comment($comments,$indent + 50);
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
                fetch_comment($result,0);
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
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/durag_man.jpg">
                        <div>
                            <b>Adam Bouhrara</b>
                            <br>
                            <i>@durag_man</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/fabinou69.jpg">
                        <div>
                            <b>Fabien Cerf</b>
                            <br>
                            <i>@fabinou69</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/jordan_goatier.jpg">
                        <div>
                            <b>Jordan Gautier</b>
                            <br>
                            <i>@jordan_goatier</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/fuck_liza.jpg">
                        <div>
                            <b>Aniss Hassan</b>
                            <br>
                            <i>@fuck_liza</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/code_master.jpg">
                        <div>
                            <b>Joan Legrand</b>
                            <br>
                            <i>@code_master</i>
                        </div>
                    </div>
                    <div class="friend_block">
                        <img src="../img/user_profile_pictures/car_lover.jpg">
                        <div>
                            <b>Clément Cassiet</b>
                            <br>
                            <i>@car_lover</i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>