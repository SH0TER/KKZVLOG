<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */


function sqlObjectToAr($object){
    $array = array();
    for($i=0; $i<$object->num_rows; $i++){
        $array[$i] = $object->fetch_assoc();
    }
    return $array;
}

function getLink($view=''){
    return 'index.php?view='.$view.'&';
}

function updateMarks($request){
    $idDiscipline = null;
    $idStudent = null;
    $mark = null;

    foreach ($request as $key => $value){
        //Отсортировка (далее проходят только данные об оценках
        if(preg_match('/^[0-9]/', $key)) {

            $data = explode("-", $key);
            $idStudent = $data[0];
            $idDiscipline = $data[1];
            //echo 's '.$idStudent. " d ".$idDiscipline.'<br/>';

            // Оновлення таблиці Marks
            $data = array(
                'mark'         => $value,
            );
            $where = "`id_user` = ".$idStudent." AND `id_discipline` = ".$idDiscipline."";
            $db = Conected::setConected();
            $db->update('marks', $data, $where);
        }

    }
}

function updatePoints($request){
    $idDay = null;
    $idStudent = null;
    $point = null;

    array_pop ( $request );

    foreach ($request as $key => $value){

        $data = explode("-", $key);
        $idStudent = $data[0];
        $idDay = $data[1];
        //echo 's '.$idStudent. " d ".$idDay.'<br/>';

        // Оновлення таблиці attendance
        $data = array(
            'point'         => $value,
        );
        $where = "`id_user` = ".$idStudent." AND `id_day` = ".$idDay."";
        $db = Conected::setConected();
        $db->update('attendance', $data, $where);
    }
}

function articleUpdateImg(){
    if ($_FILES['photo']['name']) {
        //Завантаження фото
        if ($_FILES['photo']['name'] && $_FILES['photo']['size']) {

            $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm", '.exe', '.jar');
            foreach ($blacklist as $item)
                if (preg_match("/$item\$/i", $_FILES['photo']['name'])) return false;
            $type = $_FILES['photo']['type'];
            $size = $_FILES['photo']['size'];
            if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) return false;
            if ($size > 1000000000) return false;

            $uploadfile = "images/users_files/" . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

            return $uploadfile;
        }
    }
    return false;
}


?>