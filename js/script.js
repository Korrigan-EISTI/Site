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
const toggle_display = target => target.style.display = (target.style.display == 'none') ? 'block' : 'none';
function toggle_reply(event){
    toggle_display(event.target.parentNode.children[3]);
};
window.onload = (event) => {
    var elements = document.getElementsByClassName("show_reply");
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', toggle_reply, false);
    }
  };
