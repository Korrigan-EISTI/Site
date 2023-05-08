var friend="";
function click(event){
    friend=event.target.parentNode.children[2].children[2].innerHTML.split('@')[1];
    refresh();
}
function refresh(){
    let request = new XMLHttpRequest();
    var data = new FormData();
    data.append("friend_id", friend);
    request.open("POST", '/core/message_server.php', true);
    request.onreadystatechange = () =>{
        if (request.readyState === XMLHttpRequest.DONE) {
            const status = request.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                let messages = document.getElementById("message");
                messages.innerHTML="";
                messages.insertAdjacentHTML('afterbegin',request.responseText);
            }
        }
    };
    request.send(data);
}
window.onload = (event) => {
    var elements = document.getElementsByClassName("msg");
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', click, false);
    }
};
function send_message(event){
    if(event.target.parentNode.children[0].value.trim() == "" || friend == ""){
        return
    }
    let request = new XMLHttpRequest();
    // 2. Le configure : GET-request pour l'URL /article/.../load
    var data = new FormData();
    data.append("msg", event.target.parentNode.children[0].value);
    data.append("friend_id", friend);
    // 3. Envoyer la requête sur le réseau
    request.open("POST", '/core/send_message_server.php', true);
    request.onreadystatechange = () => {
        // In local files, status is 0 upon success in Mozilla Firefox
        if (request.readyState === XMLHttpRequest.DONE) {
            const status = request.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                // The request has been completed successfully
                refresh();
            }
        }
    };
    request.send(data);
}