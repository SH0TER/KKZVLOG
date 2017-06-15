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
        'error'         =>  false
    );

    //Реэстрація
    if(array_key_exists('reg',$_POST)){

        if($_POST['password'] == $_POST['password2']){
            // Зареєструвати
            $reg = $User->set_new_user($_POST['login'], $_POST['password'], $_POST['email'],$_POST['pib'], $_POST['adress']);

            // Залогінити
            if($reg){
                $User->get_auth($_POST['login'], $_POST['password'] );
            }
        }

        // Невірно ввердені данні
        if(!$User->isIdentificate()){
            $page['error'] = true;
        }
    }
    
    if($User->isIdentificate()) header("Location: ". getLink('anketa'));
    
    require('view/page/registration.php');
}

?>