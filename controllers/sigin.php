<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;
    global $User;

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
        'slog'          => 'Блог групи',
        'error'         => false
    );

    //Авторизація
    if(array_key_exists('in_sustem',$_POST)){

        $User->get_auth($_POST['login'], $_POST['password']);

        // Невірно ввердені данні
        if(!$User->isIdentificate()){
            $page['error'] = true;
        }
    }

    if($User->isIdentificate()) header("Location: index.php");

    require('view/page/sigin.php');
}

?>