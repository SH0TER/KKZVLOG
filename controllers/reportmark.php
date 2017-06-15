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

    //Оновлення оцінок
    if(array_key_exists('update_mark',$_POST)){
       updateMarks($_POST);
    }

    $page = array(
        'title' => $mainConfig['siteTitle'],
    );

    // Завантаження переліку пердметів 
    $fields = '*';
    $db = Conected::setConected();
    $disciplines = $db->select('discipline', $fields, 30, '', 'name');
    $page['disciplines'] = $disciplines;

    // Завантаження переліку студентів
    $where = '`status` = 2';
    $db = Conected::setConected();
    $students = $db->select('users', $fields, 100, $where, 'firstName');
    $page['students'] = $students;

    // Завантаження оцінок
    for ($i = 0; $i < count($students); $i++) {
        foreach ($disciplines as &$valueD) {

            $where = "`id_user` = '" . $students[$i]['id'] . "' AND `id_discipline` = '" . $valueD['id'] . "'";
            $db = Conected::setConected();
            $mark = $db->select('marks', $fields, 1, $where);
            $marks[] = $mark[0];
        }
        $students[$i]['marks'] = $marks;
        $marks = array();
    }
    $page['students'] = $students;

    //Розрахунок середнього балу
    for ($i = 0; $i < count($students); $i++) {
        $sumMarks = 0;

        foreach ($students[$i]['marks'] as &$value) {
            $sumMarks += intval($value['mark']);
        }

        if($sumMarks != 0){
            $centerMark = ($sumMarks) / count($students[$i]['marks']);
            $centerMark = round($centerMark, 1);
        }

        $page['students'][$i]['centerMark'] = $centerMark;
        $centerMark = 0;
    }
    unset($students);

    require('view/page/reportmark.php');
}
?>