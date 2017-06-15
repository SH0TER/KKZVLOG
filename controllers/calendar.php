<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page(){
    global $mainConfig;
    global $User;

    if(!$User->isIdentificate()) header("Location: ".getLink('sigin'));
    if($User->getAccess() != 1) header("Location: ".getLink('attendance'));

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
    );

    // Збереження нової дисципліни
    if(array_key_exists('new_day',$_POST)){

        $data = array(
            'num'         => $_POST['num'],
        );
        $db = Conected::setConected();
        $db->insert('days', $data);

        //Створення записів в таблиці відвідуваності
        // Завантаження переліку студентів
        $fields = array('id');
        $where = '`status` = 2';
        $db = Conected::setConected();
        $students = $db->select('users', $fields, 100, $where);

        //Завантаження id дня
        $fields = array('id');
        $where = "`num` = '".$_POST['num']."'";
        $db = Conected::setConected();
        $day = $db->select('days', $fields, 1, $where);

        foreach ($students as $value){
            $data = array(
                'id_user'           => $value['id'],
                'id_day'            => $day[0]['id'],
                'point'               => "",
            );
            $db = Conected::setConected();
            $db->insert('attendance', $data);
        }
    }


    // Видалення дисципліни
    if(array_key_exists('del',$_GET)) {
        if (!$_GET['del']) header("Location: " . getLink('attendance'));

        $where = "`id` = '".$_GET['del']."'";
        $db = Conected::setConected();
        $db->delete('days', $where);
    }

    // Завантаження переліку пердметів 
    $fields = '*';
    $db = Conected::setConected();
    $days = $db->select('days', $fields, '', '', 'num');
    $page['calendar'] = $days;

    require('view/page/calendar.php');
}
?>
