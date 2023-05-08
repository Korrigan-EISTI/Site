<?php
    /* Appel php permettant de rechercher des amis (recherche qui se réduit au fur et à mesure de l'écriture de lettres) */
    session_start();
    $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if (isset($_POST["input"])){
        // On récupère les amis en fonction de ce que contient la variable input
        $result = $mysqli->execute_query("SELECT * from User WHERE User.name LIKE '{$_POST["input"]}%' OR User.user_id LIKE '{$_POST["input"]}%'");
        if (mysqli_num_rows($result) > 0){
            foreach ($result as $res) {
                if(file_exists("../img/user_profile_pictures/".$res["user_id"].".webp")){
                    $img=$res["user_id"];
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
                    <button class='friend_button' onclick='request(event)'>+</button>
                </div>
                </div>", $img, $res["name"], $res["user_id"]);
            }
        }else{
            echo "<h6 style='text-align: center;'>Aucun profil correspondant</h6>";
        }
    }
?>

<script type="text/javascript">
    /* Fonction AJAX permettant de faire une demande d'amis */
    function request(event) {
        let request = new XMLHttpRequest();
        var data = new FormData();
        // On récupère l'id de l'utilisateur que l'on veut ajouter
        let user_id_2 = event.target.parentNode.parentNode.children[0].children[1].children[2].innerHTML.split('@')[1];
        data.append("user_id_2", user_id_2);
        // On récupère le nom de l'utilisateur que l'on veut ajouter
        data.append("name", event.target.parentNode.parentNode.children[0].children[1].children[0].innerHTML);
        request.open("POST", '/core/request.php', true);
        request.onreadystatechange = () => {
            // In local files, status is 0 upon success in Mozilla Firefox
            if (request.readyState === XMLHttpRequest.DONE) {
                // Si on est déjà amis avec l'utilisateur que l'on souhaite ajouter
                if (request.responseText == "amis"){
                    alert("Vous êtes déjà amis avec " + user_id_2);
                }else{
                    event.target.parentNode.style.display = "none";
                    event.target.parentNode.parentNode.style.display = "none";
                }
            }
        };
        request.send(data);
    }
</script>