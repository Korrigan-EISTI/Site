const toggle_display = target => target.style.display = (target.style.display == 'none') ? 'block' : 'none';

const escapeHtml = (unsafe) => {
    return unsafe.replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;').replaceAll("'", '&#039;');
}

/* Fonction permettant de changer le theme de couleur en clair/sombre */
function change_theme() {
    var root = document.querySelector(':root');
    var rootStyles = getComputedStyle(root);

    if (rootStyles.getPropertyValue('--bg_color') == '#000000') {
        root.style.setProperty('--bg_color', '#FFF7ED');
        root.style.setProperty('--police_font', '#000000');
        root.style.setProperty('--user_id_font', '#b5b5b5');
        root.style.setProperty('--shadow', '#00000020');
    } else {
        root.style.setProperty('--bg_color', '#000000');
        root.style.setProperty('--police_font', '#ffffff');
        root.style.setProperty('--user_id_font', '#d3d3d3');
        root.style.setProperty('--shadow', '#ffffff40');
    }
}

/* Fonction affichant/cachant la text area pour les réponses */
function toggle_reply(event) {
    toggle_display(event.target.parentNode.children[3]);
}

/* Fonction envoyant les réponses à un post */
function send_reply(event){
    toggle_display(event.target.parentNode);
    send(event);
}

/* Fonction envoyant les posts (réponses et posts) */
function send(event){
    if(event.target.parentNode.children[0].value.trim()==""){
        return
    }
    var post_block = event.target.parentNode.parentNode;
    let request = new XMLHttpRequest();
    // 2. Le configure : GET-request pour l'URL /article/.../load
    var data = new FormData();
    data.append("msg", event.target.parentNode.children[0].value);
    data.append("parent_id", post_block.id);
    // 3. Envoyer la requête sur le réseau
    request.open("POST", '/core/post.php', true);
    request.onreadystatechange = () => {
        // In local files, status is 0 upon success in Mozilla Firefox
        if (request.readyState === XMLHttpRequest.DONE) {
            const status = request.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                // The request has been completed successfully
                var parent;
                if(post_block.id == 'NULL')
                {
                    parent = post_block.parentNode;
                }
                else{
                    if(!(post_block.nextSibling && post_block.nextSibling.classList.contains("indent"))){
                        post_block.insertAdjacentHTML('afterend',"<div class='indent'></div>");
                    }
                    parent=post_block.nextSibling;
                }
                parent.insertAdjacentHTML('beforeend', `<div id='${request.responseText}' class='post_block'>
                    <div class='post_block_user_info'>
                        <img src='/img/user_profile_pictures/${document.getElementById("img").innerHTML}.webp'>
                        <b>${escapeHtml(document.getElementById("name").innerHTML)}</b>
                        <br>
                        <i>@${document.getElementById("user_id").innerHTML}</i>
                    </div>
                    <div class='post_block_text'>
                        ${escapeHtml(event.target.parentNode.children[0].value)}
                    </div>
                    <button class='comment_reply_button' onclick='toggle_reply(event)'>↪ Répondre</button>
                    <div class='comment_text' style='display:none'>
                        <textarea rows='5' placeholder='✎...'></textarea>
                        <img src='../img/send_icon.webp' class='comment_send_button' onclick='send(event)'/>
                    </div>
                </div>`);
                event.target.parentNode.children[0].value = "";
            }
        }
    };
    request.send(data);
}
window.onload = (event) => {};

/* Fonction permettant d'ajouter un amis */
function send_friends(event) {
    let request = new XMLHttpRequest();
    var data = new FormData();
    let user_id_2 = event.target.parentNode.parentNode.children[0].children[1].children[2].innerHTML.split('@')[1];
    data.append("user_id_2", user_id_2);
    data.append("name", event.target.parentNode.parentNode.children[0].children[1].children[0].innerHTML);
    request.open("POST", '/core/friends.php', true);
    request.onreadystatechange = () => {
        // In local files, status is 0 upon success in Mozilla Firefox
        if (request.readyState === XMLHttpRequest.DONE) {
            event.target.parentNode.remove();
        }
    };
    request.send(data);
}

/* Fonction permettant de décliner une demande d'amis */
function send_delete(event){
    let request = new XMLHttpRequest();
    var data = new FormData();
    let user_id_2 = event.target.parentNode.parentNode.children[0].children[1].children[2].innerHTML.split('@')[1];
    data.append("user_id_2", user_id_2);
    data.append("name", event.target.parentNode.parentNode.children[0].children[1].children[0].innerHTML);
    request.open("POST", '/core/delete.php', true);
    request.onreadystatechange = () =>{
        if (request.readyState === XMLHttpRequest.DONE) {
            event.target.parentNode.parentNode.remove();
        }
    };
    request.send(data);
}

/* Fonction permettant d'afficher/cacher l'input type file pour le changement de photo de profile */
function afficher_input_file(){
    if (document.getElementById("formPP").style.display == "block") {
        document.getElementById("formPP").style.display = "none";
    }
    else{
        document.getElementById("formPP").style.display = "block";
        document.getElementById("formPP").style.textAlign = "center";
    }
}