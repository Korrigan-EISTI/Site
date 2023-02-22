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
    <div id="div_main">

        <div id="div_profile" class="item">
            <div id="user_info">
                <img id="user_pic" src="../img/user_profile_pictures/mr_president.jpg">
                <p id="user_name">Lilian Fellouh</p><br>
                <p id="user_id">@mr_president</p><br>
            </div>

            <div id="profile_links">
                <a href="#">Mon profil</a><br>
                <a href="#">Message</a><br>
                <a href="#" onclick="change_theme();">Thème clair/sombre</a><br>
                <a></a>
            </div>

            <button id="post_button">Poster</button>
        </div>
        
        <div id="div_feed" class="item">
            <div id="postlist">
                <div id="posts">
                
                    <div class="post_block">
                        <div id="post_block_user_info">
                            <img src="../img/user_profile_pictures/ugo.jpg">
                            <br>
                            <b>Ugo Merlier</b>
                            <br>
                            <i>@ugo_tracteur</i>
                        </div>
                        <div id="post_block_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut laoreet enim, ac lobortis velit. Nunc turpis lorem, vehicula in faucibus ac, rhoncus in ex. Vestibulum accumsan, erat sit amet fringilla euismod, enim orci fringilla leo, ac tincidunt ipsum urna quis elit. Mauris at lacinia sapien. Suspendisse quam urna, mattis in dignissim id, tincidunt ut nisi.</p>
                        </div>
                    </div>

                    <div class="post_block">
                        <div id="post_block_user_info">
                            <img src="../img/user_profile_pictures/code_master.jpg">
                            <br>
                            <b>Joan Legrand</b>
                            <br>
                            <i>@code_master</i>
                        </div>
                        <div id="post_block_text">
                            <p>Nulla a finibus mauris. Pellentesque sapien nibh, porttitor vel eleifend a, imperdiet finibus lorem. Etiam eu urna sit amet felis tincidunt congue quis ut tortor. Nullam justo nibh, bibendum mollis venenatis quis, semper non nunc. Duis non est id sem eleifend pellentesque.</p>
                        </div>
                    </div>

                    <div class="post_block">
                        <div id="post_block_user_info">
                            <img src="../img/user_profile_pictures/fuck_liza.jpg">
                            <br>
                            <b>Aniss Hassan</b>
                            <br>
                            <i>@fuck_liza</i>
                        </div>
                        <div id="post_block_text">
                            <p>Phasellus a neque velit. Sed posuere neque tortor, ullamcorper ultricies lorem varius ac. Nam quis dapibus lacus. Aliquam lacinia ac sapien vel ultricies. Praesent vulputate dui ac mauris vehicula, vitae tempus lorem vehicula. Quisque tempus est vel orci hendrerit interdum. Fusce ut lacus et tellus imperdiet congue.</p>
                        </div>
                    </div>

                    <div class="post_block">
                        <div id="post_block_user_info">
                            <img src="../img/user_profile_pictures/car_lover.jpg">
                            <br>
                            <b>Clément Cassiet</b>
                            <br>
                            <i>@car_lover</i>
                        </div>
                        <div id="post_block_text">
                            <p>Donec nec feugiat lorem. Donec facilisis ipsum eu tellus aliquam, nec imperdiet velit fermentum. Aliquam lacinia felis justo. Nullam sed enim in risus lacinia suscipit. Morbi a aliquet elit. Morbi volutpat neque in mauris gravida condimentum.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div id="div_friendlist" class="item">
            <div>
                <input type="text" id="search_bar" placeholder="Rechercher un utilisateur"></input>
                <br><br><br>

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
    </div>

</body>

</html>