
function click(event){
    let request = new XMLHttpRequest();
    var data = new FormData();
    data.append("friend_id", event.target.parentNode.children[2].children[2].innerHTML.split('@')[1]);
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