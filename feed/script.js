function htmlToElement(html) {
    var template = document.createElement('template');
    template.innerHTML = html.trim();
    return template.content.firstChild;
}
const toggle_display = target => target.style.display = (target.style.display == 'none') ? 'block' : 'none';

const escapeHtml = (unsafe) => {
    return unsafe.replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;').replaceAll("'", '&#039;');
}
function change_theme() {
    var root = document.querySelector(':root') ;
    var rootStyles = getComputedStyle(root) ;

    if(rootStyles.getPropertyValue('--bg_color') == '#000000') {
        root.style.setProperty('--bg_color','#feffec');
        root.style.setProperty('--police_font','#000000');
        root.style.setProperty('--user_id_font','#b5b5b5');
        root.style.setProperty('--shadow','#00000020');
    }
    else {
        root.style.setProperty('--bg_color','#000000');
        root.style.setProperty('--police_font','#ffffff');
        root.style.setProperty('--user_id_font','#d3d3d3');
        root.style.setProperty('--shadow','#ffffff40');
    }
}
function toggle_reply(event){
    toggle_display(event.target.parentNode.children[3]);
};
function send(event){
    if(event.target.parentNode.children[0].value.trim()==""){
        return;
    }
    var post_block = event.target.parentNode.parentNode;
    let request = new XMLHttpRequest();
    // 2. Le configure : GET-request pour l'URL /article/.../load
    var data = new FormData();
    data.append("msg" , event.target.parentNode.children[0].value);
    data.append("parent_id",post_block.id);
    // 3. Envoyer la requête sur le réseau
    request.open("POST", '/core/post.php', true);
    request.onreadystatechange = () => {
        // In local files, status is 0 upon success in Mozilla Firefox
        if (request.readyState === XMLHttpRequest.DONE) {
            const status = request.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                // The request has been completed successfully
                var indent;
                if(!(post_block.nextSibling && post_block.nextSibling.classList.contains("indent"))){
                    post_block.insertAdjacentHTML('afterend',"<div class='indent'></div>");
                }
                post_block.nextSibling.insertAdjacentHTML('beforeend', `<div id='${request.responseText}' class='post_block'>
                    <div class='post_block_user_info'>
                        <img src='/img/user_profile_pictures/${document.getElementById("img").innerHTML}.jpg'>
                        <b>${escapeHtml(document.getElementById("name").innerHTML)}</b>
                        <br>
                        <i>@${document.getElementById("user_id").innerHTML}</i>
                    </div>
                    <div class='post_block_text'>
                        ${escapeHtml(event.target.parentNode.children[0].value)}
                    </div>
                    <button class='show_reply' onclick='toggle_reply(event)'>Reply</button>
                    <div class='reply' style='display:none'>
                        <textarea rows='5' placeholder='Reply...'></textarea>
                        <button class='send' onclick='send(event)'>Send</button>
                    </div>
                </div>`);
                event.target.parentNode.children[0].value="";
            }
        }
    };
    request.send(data);
}
window.onload = (event) => {
};

function send_friends(event){
    let request = new XMLHttpRequest();
    var data = new FormData();
    let user_id_2 = event.target.parentNode.children[2].innerHTML.split('@')[1];
    data.append("user_id_2", user_id_2);
    data.append("name", event.target.parentNode.children[0].innerHTML);
    request.open("POST", '/core/friends.php', true);
    request.onreadystatechange = () => {
        // In local files, status is 0 upon success in Mozilla Firefox
        if (request.readyState === XMLHttpRequest.DONE) {
            event.target.remove();
        }
    };
    request.send(data);
}
