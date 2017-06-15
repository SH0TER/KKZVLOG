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
        'error'         =>  false
    );

    // Обробка нової інформації
    if(array_key_exists('config',$_POST)) {
        global $confFile;

        $arrNewConf = array(
            'siteTitle'         => $_POST['portalName'],
            'slog'              => $_POST['slog'],
            'zvitInfo'          => $_POST['zvitInfo'],
            'fbLink'            => $_POST['facebook'],
        );

        $confFile->setConfig($arrNewConf);
        header("Location: ".getLink('config'));
    }
    

    require('view/page/config.php');
}

?>