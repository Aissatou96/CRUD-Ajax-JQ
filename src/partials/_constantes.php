<?php
    require_once "_utiles.php";
   
    define('DB_HOST',$_SERVER['HTTP_HOST']);
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','odc_live');

    define('ID','id');
    define('PAGE','page');
    define('NB_ELT','nb_elt');
    define('PAS','pas');   
    define('CHAMP','champ');   
    
    $url = getUrl().'asset/img/index_404.php';    
    define('IMG_INDEX',$url);
    
?>