<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lama - Message</title>
    <link rel="stylesheet" href="./message.css">
    <script type="text/javascript" src="./script.js"></script>
    <link rel="icon" type="image/png" href="/img/lama_icon.webp">
</head>

<body>
    <?php include("../header/header.php"); ?>
    <div class="container">

        <div id="div_message" class="items">
            <div id="message_list">
                <div id="message">
                </div>
            </div>
            
            <div class='post_block'>
                    <div class='comment_text'>
                        <textarea rows='5' placeholder='✎...'  maxlength='200'></textarea>
                        <img src='../img/send_icon.webp' class='comment_send_button' onclick=''/>
                    </div>
                </div>
        </div>

        <div id="div_friendlist" class="items">
            <div id="friendlist">
                <div id="friends">
                    <?php
                        $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
                        $result = $mysqli->execute_query("SELECT User.name, Friends.user_id_2 from Friends INNER JOIN User ON Friends.user_id_2 = User.user_id WHERE Friends.user_id_1 = ?",[$_SESSION["user_id"]]);
                        foreach($result as $row){
                            if(file_exists("../img/user_profile_pictures/".$row["user_id_2"].".webp")){
                                $img=$row["user_id_2"];
                            }
                            else{
                                $img="default";
                            }
                            printf("<div class='friend_block'>
                            <img class='msg' src='/img/message.webp'>
                            <img class='profile_picture' src='/img/user_profile_pictures/%s.webp'>
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
                            <img class='msg' src='/img/message.webp'>
                            <img class='profile_picture' src='../img/user_profile_pictures/%s.webp'>
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
                            printf("<div class='friend_block'>
                            <img src='../img/user_profile_pictures/%s.webp'>
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
    <a href='../feed/site.php' id='back_to_main_page'>↪ Revenir à la page principale</a>
</body>

</html>