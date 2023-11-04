<?php 

function rota(string $url, string $rota) : void {
    
    $caminho = $_SERVER['REQUEST_URI'];

    $url = "/" . $url;

    if ($caminho === $url) {
        header("location: $rota");
    } 
    
    return;
    
}

?>