<?php
function replace_content($in='/\#CONTENT\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}

function replace_header($in='/\#HEADER\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_footer($in='/\#FOOTER\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function load_template(){
    $page = load_page('app/view/modules/page.php');
    return $page;
}
function load_page($page){
        return file_get_contents($page);
}
    
function view_page($html){
    echo $html;
}

#NEWSID#
//replaces de las noticias
function replace_title($in='/\#TITULO\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_category($in='/\#CATEGORIAS\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_subtitle($in='/\#SUBTITULO\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_date($in='/\#FECHA\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_photo($in='/\#FOTO\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_newsContent($in='/\#CONTENIDO\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_uri($in='/\#NEWSID\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}

?>