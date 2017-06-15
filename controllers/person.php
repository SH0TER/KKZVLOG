<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;
    global $User;

    if(!$User->isIdentificate()) header("Location: ".getLink('sigin'));

    //Підтверждення користувача
    if(array_key_exists('set',$_GET)){
        if(!$_GET['set']) header("Location: ".getLink('group'));

        $data = array(
            'status'         => 2,
        );
        $where = "`id` = '".$_GET['set']."'";

        $db = Conected::setConected();
        $db->update('users', $data, $where);

        //Створення записів в таблиці оцінок
            // Завантаження переліку пердметів
        $fields = array('id');
        $db = Conected::setConected();
        $disciplines = $db->select('discipline', $fields);

       foreach ($disciplines as $value){
           $data = array(
               'id_user'            => $_GET['set'],
               'id_discipline'      => $value['id'],
               'mark'               => "",
           );

           $db = Conected::setConected();
           $db->insert('marks', $data);
       }

        //Створення записів в таблиці відвідуваності
        // Завантаження переліку днів
        $fields = array('id');
        $db = Conected::setConected();
        $days = $db->select('days', $fields);

        var_dump($days);

        foreach ($days as $value){
            $data = array(
                'id_user'            => $_GET['set'],
                'id_day'               => $value['id'],
                'point'               => "",
            );

            $db = Conected::setConected();
            $db->insert('attendance', $data);
        }

        header("Location: ".getLink('group'));
    }

    //Видалення користувача
    if(array_key_exists('del',$_GET)){
        if(!$_GET['del']) header("Location: ".getLink('group'));

        $where = "`id` = '".$_GET['del']."'";
        $db = Conected::setConected();
        $result = $db->delete('users', $where);

        //Видалення інформації про батьків
        if($result){
            $where = "`id_student` = '".$_GET['del']."'";
            $db = Conected::setConected();
            $db->delete('parents', $where);
        }

        header("Location: ".getLink('group'));
    }


    //Перевірка наявності вхідних даних
    if(array_key_exists('id',$_GET)){
        if(!$_GET['id']) header("Location: ".getLink('group'));
    }else header("Location: ".getLink('group'));


    //Завантаження даних
    $fields = '*';
    $where = "`id` = '".$_GET['id']."'";

    $db = Conected::setConected();
    $student_info = $db->select('users', $fields, 1, $where );

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
        'student_info'       =>  $student_info[0]
    );

    // Інформація для адміністратора
    if($User->getAccess() == 1){

        $where = "`id_student` = '".$_GET['id']."'";
        $db = Conected::setConected();
        $parents = $db->select('parents', $fields, 1, $where);

        if($parents){
            $page['parents'] = $parents[0];
        }
    }

    require('view/page/person.php');
}

?>