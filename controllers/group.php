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
    );

    // Отримуємо іфнормацію про студентів
    $fields = '*';
    $where = '`status` = 2';

    $db = Conected::setConected();
    $students = $db->select('users', $fields, 100, $where, 'firstName' );
    $page['students'] = $students;
    
    // Функції адміністратора
    if($User->getAccess() == 1){

        $where = '`status` = 0';
        $db = Conected::setConected();
        $students = $db->select('users', $fields, 100, $where, 'firstName' );

        foreach ($students as $key => $value){
            $page['students'][] = $value;
        }
    }
    
    require('view/page/group.php');
}
?>
