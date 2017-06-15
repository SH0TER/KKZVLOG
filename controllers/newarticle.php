<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;
    global $User;

    if(!$User->isIdentificate()) header("Location: ".getLink('sigin'));
    if($User->getAccess() != 1) header("Location: ".getLink('home'));

    // Обробка нової інформації
    if(array_key_exists('articleData',$_POST)) {

        // Оновлення статті
        if ($_POST['articleData']){

            // Оновлення таблиці статей
            $data = array(
                'text'         => $_POST['text'],
                'data'         => date('Y-m-d H:i:s'),
                'title'         => $_POST['title'],
            );

            //Перевірка на оновлення зображення
            $result = articleUpdateImg();
            if($result) $data['imgUrl'] = $result;

            // Оновлення запису в таблиці Articles
            $where = '`id` = '.$_POST['articleData'];

            $db = Conected::setConected();
            $db->update('articles', $data, $where);

            header("Location: ".getLink('article').'articleId='.$_POST['articleData'].'&');

        }
        // Створення нової статті
        else{

            $data = array(
                'text'          => $_POST['text'],
                'title'         => $_POST['title'],
                'data'          => date('Y-m-d H:i:s')
            );

            //Перевірка на оновлення зображення
            $result = articleUpdateImg();
            if($result) $data['imgUrl'] = $result;

            $db = Conected::setConected();
            $db->insert('articles', $data);

            // завантаження даних і формування редиректу

            //Завантаження статті
            $fields = '*';
            $where = "`title`='".$_POST['title']."'";

            $db = Conected::setConected();
            $article = $db->select('articles', $fields, 1, $where );

            header("Location: ".getLink('article').'articleId='.$article[0]['id'].'&');

        };
    }

    // Видалення статті
    if(array_key_exists('del',$_GET)){
        if(!$_GET['del']) header("Location: ".getLink('home'));

        $where = "`id` = '".$_GET['del']."'";
        $db = Conected::setConected();
        $db->delete('articles', $where);

        header("Location: ".getLink('home'));
    }


    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
    );

    //Перевірка наявності вхідних даних (update)
    if(array_key_exists('update',$_GET)){
        if(!$_GET['update']) header("Location: ".getLink('home'));

        //Завантаження статті
        $fields = '*';
        $where = '`id`='.$_GET["update"];

        $db = Conected::setConected();
        $article = $db->select('articles', $fields, 10, $where );
        $page['article'] = $article[0];

        unset($article, $where, $db, $fields);
    }

    require('view/page/newarticle.php');
}

?>