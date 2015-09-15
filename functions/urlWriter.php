<?php
function url_rewrite($controller,$action,$mode = 1){
    if(REWRITEMODE==1){
        $url = "/?controller=$controller&action=$action";
    }else{
        $url = "/$controller/$action";
    }
    if($mode==2){
        $url = "<a href='".$url."' class='btn btn-default'>";
    }
    return $url;
}
?>
