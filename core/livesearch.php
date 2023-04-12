<?php
    session_start();
    $mysqli = new mysqli("localhost", "lama", "lama_admin", "lama");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if (isset($_POST["input"])){
        
        $result = $mysqli->execute_query("SELECT * from User WHERE User.name LIKE '{$_POST["input"]}%' OR User.user_id LIKE '{$_POST["input"]}%'");
        if (mysqli_num_rows($result) > 0){
            foreach ($result as $res) {
                if(file_exists("../img/user_profile_pictures/".$res["user_id"].".webp")){
                    $img=$res["user_id"];
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
                    <button onclick='request(event)'>Ajouter</button>
                </div>
                </div>", $img, $res["name"], $res["user_id"]);
            }
        }else{
            echo "<h6 style='text-align: center;'>No data found</h6>";
        }
    }
?>

<script type="text/javascript">
    function request(event) {
        let request = new XMLHttpRequest();
        var data = new FormData();
        let user_id_2 = event.target.parentNode.children[2].innerHTML.split('@')[1];
        data.append("user_id_2", user_id_2);
        data.append("name", event.target.parentNode.children[0].innerHTML);
        request.open("POST", '/core/request.php', true);
        request.onreadystatechange = () => {
            // In local files, status is 0 upon success in Mozilla Firefox
            if (request.readyState === XMLHttpRequest.DONE) {
                if (request.responseText != "amis"){
                    event.target.parentNode.style.display = "none";
                    event.target.parentNode.parentNode.style.display = "none";
                }else{
                    alert("Vous êtes déjà amis avec " + user_id_2);
                }
            }
        };
        request.send(data);
    }
</script>