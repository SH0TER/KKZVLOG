<?php
/**
 * @author Vlad1251
 * @copyright 2017
 */

$confFile = new FileClass('lib/config.txt');
global $confFile;

$mainConfig = $confFile->uploadFileToMass();
global $mainConfig;

$mainDBConfig = array(
    'dbHost'            =>  "localhost",
    'dbUser'            =>  "root",
    'dbPassword'        =>  "",
    'dbName'            =>  "blog",
    'dbSecurityPrTb'    =>  "security_"
);
global $mainDBConfig;
?>