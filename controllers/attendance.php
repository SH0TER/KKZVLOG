<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

function page()
{
    global $mainConfig;
    global $User;

    if (!$User->isIdentificate()) header("Location: " . getLink('sigin'));
    if ($User->getStatus() == 0) header("Location: " . getLink('404'));

    //Оновлення звітності
    if(array_key_exists('update_point',$_POST)){
        updatePoints($_POST);
    }

    $page = array(
        'title' => $mainConfig['siteTitle'],
    );

    // Завантаження переліку днів
    $fields = '*';
    $db = Conected::setConected();
    $days = $db->select('days', $fields, 40, '', 'num');
    $page['days'] = $days;

    // Завантаження переліку студентів
    $where = '`status` = 2';
    $db = Conected::setConected();
    $students = $db->select('users', $fields, 100, $where, 'firstName');

    // Завантаження прогулів
    for ($i = 0; $i < count($students); $i++) {
        $points = array();
        foreach ($days as &$valueD) {

            $where = "`id_user` = '" . $students[$i]['id'] . "' AND `id_day` = '" . $valueD['id'] . "'";
            $db = Conected::setConected();
            $point = $db->select('attendance', $fields, 1, $where);
            $points[] = $point[0];
        }
        $students[$i]['points'] = $points;
    }
    $page['students'] = $students;

    require('view/page/attendance.php');
}
?>