<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;
    global $User;

    if(!$User->isIdentificate()) header("Location: ".getLink('sigin'));

    // Оновлення профіля користувача
    if(array_key_exists('update_profile',$_POST)){

        //Завантаження фото
        if($_FILES['photo']['name'] && $_FILES['photo']['size']){

            $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm", '.exe', '.jar');
            foreach ($blacklist as $item)
                if(preg_match("/$item\$/i", $_FILES['photo']['name'])) header("Location: ".getLink('home'));
            $type = $_FILES['photo']['type'];
            $size = $_FILES['photo']['size'];
            if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) header("Location: ".getLink('home'));
            if ($size > 1000000000) header("Location: ".getLink('home'));

            $uploadfile = "images/users_files/".$_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
            
            $User->setPhotoUrl($uploadfile);
        }

        // Оновлення таблиці Users
        $User->setPib($_POST['pib']);
        $User->setPhone($_POST['phone']);
        $User->setAdress($_POST['adress']);

        // Оновлення таблиці Parents
        $data = array(
            'mather_pib'         => $_POST['mather_pib'],
            'mather_phone'       => $_POST['mather_phone'],
            'dad_pib'            => $_POST['dad_pib'],
            'dad_phone'          => $_POST['dad_phone']
        );
        $where = '`id_student` = '.$User->getId();

        $db = Conected::setConected();
        $db->update('parents', $data, $where);

    }

    //Завантаження даних
    $fields = '*';
    $where = "`id_student` = '".$User->getId()."'";

    $db = Conected::setConected();
    $parents = $db->select('parents', $fields, 1, $where );
    
    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
        'parents'       =>  $parents[0]
    );

    require('view/page/anketa.php');
}

?>