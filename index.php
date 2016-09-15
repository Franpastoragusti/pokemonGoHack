<?php
require_once"app/controller/pageGenerator.php";


$pagina=load_template();

$header = load_page("app/view/modules/mainHeader.php");

$content = load_page("app/view/modules/noticiasMenu.php");

$page = replace_header('/\#HEADER\#/ms', $header, $pagina);

$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);

view_page($page);



?>