function change_theme() {

    var root = document.querySelector(':root') ;
    var rootStyles = getComputedStyle(root) ;

    if(rootStyles.getPropertyValue('--bg_color') == '#000000') {
        root.style.setProperty('--bg_color','#feffec');
        root.style.setProperty('--police_font','#000000');
        root.style.setProperty('--user_id_font','#b5b5b5');
    }
    else {
        root.style.setProperty('--bg_color','#000000');
        root.style.setProperty('--police_font','#ffffff');
        root.style.setProperty('--user_id_font','#d3d3d3');
    }
}