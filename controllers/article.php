<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
        'slog'          => 'Блог групи'
    );

    //Завантаження статті
    $fields = array('id','title','text','data', 'imgUrl');
    $where = '`id`='.$_GET["articleId"];

    $db = Conected::setConected();
    $article = $db->select('articles', $fields, 10, $where );
    $page['article'] = $article[0];
   
    unset($article, $where, $db, $fields);

    require('view/page/article.php');
}

?>