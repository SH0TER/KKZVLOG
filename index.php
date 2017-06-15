<?php
/**
 * @author Vlad1251
 * @copyright 2017
 */
 
mb_internal_encoding("UTF-8");
require("lib/file.php");
require("lib/config.php");
require("lib/db_class.php");
require("lib/function.php");
require("lib/user.php");

$User = new UserClass();
global $User;

$view = empty($_GET["view"]) ? 'home' : $_GET["view"];
global $view;

//echo $view.' '.$User->getPib().'<br/><br/>' ;

switch($view){
    case "home":{
        require_once("controllers/home.php");  
        page();
    }break;
    case "article": {
        require_once("controllers/article.php");
        page();
    }break;
    case "newarticle": {
        require_once("controllers/newarticle.php");
        page();
    }break;
    case "sigin": {
        require_once("controllers/sigin.php");
        page();
    }break;
    case "sigout": {
        require_once("controllers/sigout.php");
        page();
    }break;
    case "registration": {
        require_once("controllers/registration.php");
        page();
    }break;
    case "anketa": {
        require_once("controllers/anketa.php");
        page();
    }break;
    case "person": {
        require_once("controllers/person.php");
        page();
    }break;
    case "group": {
        require_once("controllers/group.php");
        page();
    }break;
    case "attendance": {
        require_once("controllers/attendance.php");
        page();
    }break;
    case "reportmark": {
        require_once("controllers/reportmark.php");
        page();
    }break;
    case "discipline": {
        require_once("controllers/discipline.php");
        page();
    }break;
    case "calendar": {
        require_once("controllers/calendar.php");
        page();
    }break;
    case "config": {
        require_once("controllers/config.php");
        page();
    }break;
    default:{
        require_once("controllers/404.php");
        page();
    }
}
?>