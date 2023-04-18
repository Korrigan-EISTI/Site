<?php
    session_start();
    function fetch_comment($result)
    {
        global $mysqli;
        while ($row = $result->fetch_assoc()) {
            if(file_exists("../img/user_profile_pictures/".$row["user_id"].".webp")){
                $img=$row["user_id"];
            }
            else{
                $img="default";
            }
            printf("
            <div id='%d' class='post_block'>
                <div class='post_block_user_info'>
                    <img src='../img/user_profile_pictures/%s.webp'>
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
                    <img src='../img/send_icon.webp' class='comment_send_button' onclick='send(event)'/>
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
    <link rel="icon" type="image/png" href="/img/lama_icon.webp">
    <script type="text/javascript" src="./script.js"></script>
    <?php
    if(file_exists("../img/user_profile_pictures/".$_SESSION["user_id"].".webp")){
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
                    if(file_exists("../img/user_profile_pictures/".$_SESSION["user_id"].".webp")){
                        $img=$_SESSION["user_id"];
                    }else{
                        $img="default";
                    }
                    printf("
                        <img id='user_pic' src='../img/user_profile_pictures/%s.webp'>
                        <p id='user_name'>%s</p>
                        <p id='user_id'>@%s</p><br>", $img, $_SESSION["name"], $_SESSION["user_id"]);
                ?>
            </div>

            <div id="profile_links">
                <a href="#"> <img src="../img/user_profile_pictures/default.webp" \> </a><br>
                <a href="../message/message.php"> <img src="../img/message_icon.webp" \> </a><br>
                <a href="#" onclick="change_theme();"> <img src="../img/change_theme_icon.webp" \> </a><br>
            </div>
        </div>

        <div id="div_feed" class="panel">
            <div id="postlist">
                <div id='NULL' class='post_block'>
                    <div class='comment_text'>
                        <textarea rows='5' placeholder='✎...'  maxlength='200'></textarea>
                        <img src='../img/send_icon.webp' class='comment_send_button' onclick='send(event)'/>
                    </div>
                </div><br>
                <?php
                $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
                $result = $mysqli->query("SELECT Post.user_id,Post.date,Post.message,Post.id,User.name FROM Post NATURAL JOIN User WHERE parent_id IS NULL");
                fetch_comment($result);
                ?>
            </div>
        </div>

        <div id="div_friendlist" class="panel">
            <input type="text" id="search_bar" placeholder="Rechercher un utilisateur"></input>
            <div id="search_results">
                
            </div>
            <br>
            <div id="friendlist">
                <div id="friends">
                    <?php
                    $result = $mysqli->execute_query("SELECT Friends.user_id_1, User.name, Friends.user_id_2 from Friends INNER JOIN User ON Friends.user_id_2 = User.user_id WHERE Friends.user_id_1 = ?",[$_SESSION["user_id"]]);
                    foreach($result as $row){
                        if(file_exists("../img/user_profile_pictures/".$row["user_id_2"].".webp")){
                            $img=$row["user_id_2"];
                        }
                        else{
                            $img="default";
                        }
                        printf("<div class='friend_block'>
                        <img src='../img/user_profile_pictures/%s.webp'>
                        <div>
                            <b>%s</b>
                            <br>
                            <i>@%s</i>
                        </div>
                    </div>", $img, $row["name"], $row["user_id_2"]);
                    }
                    $result = $mysqli->execute_query("SELECT Friends.user_id_1, User.name from Friends INNER JOIN User ON Friends.user_id_1 = User.user_id WHERE Friends.user_id_2 = ?",[$_SESSION["user_id"]]);
                    foreach($result as $row){
                        if(file_exists("../img/user_profile_pictures/".$row["user_id_1"].".webp")){
                            $img=$row["user_id_1"];
                        }
                        else{
                            $img="default";
                        }
                        printf("<div class='friend_block'>
                        <img src='../img/user_profile_pictures/%s.webp'>
                        <div>
                            <b>%s</b>
                            <br>
                            <i>@%s</i>
                        </div>
                    </div>", $img, $row["name"], $row["user_id_1"]);
                    }
                    $request = $mysqli->execute_query("SELECT Request.user_id_1, User.name, Request.user_id_2 from Request INNER JOIN User ON Request.user_id_2 = User.user_id WHERE Request.user_id_1 = ?",[$_SESSION["user_id"]]);
                    foreach ($request as $res) {
                        if(file_exists("../img/user_profile_pictures/".$res["user_id_2"].".webp")){
                            $img=$res["user_id_2"];
                        }
                        else{
                            $img="default";
                        }
                        printf("<div class='added_friend_block'>
                            <div id='livesearch_infos'>
                                <img src='../img/user_profile_pictures/%s.webp'>
                                <div id='added_name_and_id'>
                                    <b>%s</b>
                                    <br>
                                    <i>@%s</i>
                                </div>
                            </div>
                            <div id='added_buttons'>
                                <button class='friend_button' onclick='send_friends(event)' style='color:green;'>✔</button>
                                <button class='friend_button' onclick='send_delete(event)' style='color:red;'>X</button>
                            </div>
                            </div>", $img, $res["name"], $res["user_id_2"]);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#search_bar").keyup(function () {
                var input = $(this).val();
                if (input != "") {
                    $.ajax({
                        url: "../core/livesearch.php",
                        method: "post",
                        data: {
                            input: input
                        },

                        success: function (data) {
                            $("#search_results").html(data);
                        }
                    });
                    $("#search_results").css("display", "flex");
                    $("#search_results").css("flex-direction", "column");
                    $("#search_results").css("gap", "1%");
                    $("#search_results").css("text-align", "left");
                } else {
                    $("#search_results").css("display", "none");
                }
            });
        });
    </script>
</body>

</html>