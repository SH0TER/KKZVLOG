<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;
    header("HTTP/1.0 404 Not Found");

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
        'slog'          => 'Блог групи'
    );

    require('view/page/404.php');
}
?>


