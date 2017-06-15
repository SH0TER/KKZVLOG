<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */


function page(){
   global $mainConfig;
   global $User;

   $User->destruct_auth();
   header("Location: index.php");// .$_SERVER["HTTP_REFERER"]

}


?>