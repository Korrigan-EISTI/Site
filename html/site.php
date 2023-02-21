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
    <header>
        <img id="lama_logo" src="../img/lama_logo.png">
        <a href="/login.php" id="connexion_button">Connexion</a>
    </header>
    <br>
    <div id="div_main" class="container">

        <div id="div_profile" class="item">
            <br><br>
            <div id="user_info">
                <img id="user_pic" src="../img/profile_picture.png">
                <p id="user_name">Lilian Fellouh</p>
                <p id="user_id">@lilian_fellouh_45</p>
            </div>
            <br><br><br>
            <div id="profile_links">
                <a href="#">Mon profil</a><br><br>
                <a href="#">Message</a><br><br>
                <a href="#" onclick="change_theme();">Thème clair/sombre</a><br><br>
                <a></a>
            </div>
            <br><br>
            <button id="post_button">Poster</button>
            <br><br><br><br><br>
        </div>
        
        <div id="div_feed" class="item">
            <p>Feed</p>
        </div>
        
        <div id="div_friendlist" class="item">
            <div>
                <input type="text" id="search_bar" placeholder="Rechercher un utilisateur"></input>
                <br><br><br>
                <div id="friendlist">
                    <div id="friends">
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Ugo Merlier</b>
                                <br>
                                <i>@ugo_merlier_95</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Manel Hamane</b>
                                <br>
                                <i>@manel_hamane_95</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Sujeeban Mahendran</b>
                                <br>
                                <i>@sujeeban_mahendran_95</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Adam Bouhrara</b>
                                <br>
                                <i>@adam_bouhrara_75</i>
                            </div>
                        </div>
                        <!-- <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Fabien Cerf</b>
                                <br>
                                <i>@fabien_cerf_78</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Jordan Gautier</b>
                                <br>
                                <i>@jordan_gautier_78</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Jordan Gautier</b>
                                <br>
                                <i>@jordan_gautier_78</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Jordan Gautier</b>
                                <br>
                                <i>@jordan_gautier_78</i>
                            </div>
                        </div>
                        <div class="friend_block">
                            <img class="friend_img" src="../img/profile_picture.png">
                            <div class="friend_text">
                                <b>Jordan Gautier</b>
                                <br>
                                <i>@jordan_gautier_78</i>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>