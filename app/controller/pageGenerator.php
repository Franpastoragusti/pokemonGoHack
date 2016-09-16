<?php
function replace_content($in='/\#CONTENT\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}

 $data[$i+1]["titulo"]
function replace_header($in='/\#HEADER\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_data($in='/\#DATA\#/ms', $out,$page){
    return preg_replace($in, $out, $page);        
}
function replace_category($in='/\#CATEGORIA\#/ms', $out,$page){
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
?>