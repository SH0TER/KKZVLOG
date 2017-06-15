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

    $page = array(
        'title'         =>  $mainConfig['siteTitle'],
    );

    // Збереження нової дисципліни
    if(array_key_exists('new_discipline',$_POST)){

        $data = array(
            'name'         => $_POST['discipline'],
        );
        $db = Conected::setConected();
        $db->insert('discipline', $data);

        //Створення записів в таблиці оцінок
            // Завантаження переліку студентів
        $fields = array('id');
        $where = '`status` = 2';
        $db = Conected::setConected();
        $students = $db->select('users', $fields, 100, $where);

        //Завантаження id дисципліни
        $fields = array('id');
        $where = "`name` = '".$_POST['discipline']."'";
        $db = Conected::setConected();
        $discipline = $db->select('discipline', $fields, 1, $where);

        foreach ($students as $value){
            $data = array(
                'id_user'            => $value['id'],
                'id_discipline'      => $discipline[0]['id'],
                'mark'               => "",
            );
            $db = Conected::setConected();
            $db->insert('marks', $data);
        }
    }


    // Видалення дисципліни
    if(array_key_exists('del',$_GET)) {
        if (!$_GET['del']) header("Location: " . getLink('group'));

        $where = "`id` = '".$_GET['del']."'";
        $db = Conected::setConected();
        $db->delete('discipline', $where);
    }

    // Завантаження переліку пердметів 
    $fields = '*';
    $db = Conected::setConected();
    $disciplines = $db->select('discipline', $fields, '', '', 'name');
    $page['disciplines'] = $disciplines;

    require('view/page/discipline.php');
}
?>
