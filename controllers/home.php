<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
        'slog'          =>  'Група РПЗ-34А'
    );

    
    //Извлечение статей
    $fields = array('id','title','text','data');
    
    $db = Conected::setConected();
    $articles = $db->select('articles', $fields, 10, '', 'data', false);
    
    $page['articles'] = $articles;
    unset($articles);

    require('view/page/home.php');
}

?>