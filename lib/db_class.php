<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

 class Conected{
    
    private $db;
    private $dbHost;
    private $dbUser;
    private $dbPassword;
    private $dbName;
    private $dbSecurityPrTb;
    
    
    private static $conected = null;
    private function __construct($dbHost,$dbUser,$dbPassword, $dbName, $dbSecurityPrTb){
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;
        $this->dbSecurityPrTb = $dbSecurityPrTb;
        
        $this->db = new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
        $this->db->query("SET NAMES 'utf8'");
    }
    
    public static function setConected(){

        global $mainDBConfig;
        $dbHost = $mainDBConfig['dbHost'];
        $dbUser = $mainDBConfig['dbUser'];
        $dbPassword = $mainDBConfig['dbPassword'];
        $dbName = $mainDBConfig['dbName'];
        $dbSecurityPrTb = $mainDBConfig['dbSecurityPrTb'];

        if(self::$conected === null){
                self::$conected = new Conected($dbHost,$dbUser,$dbPassword, $dbName, $dbSecurityPrTb);
            }
        return self::$conected;
    }

     function select($table_name, $fields, $limit="", $where="", $order="", $up = true){
         for($i=0; $i<count($fields); $i++){
             if((strpos($fields[$i], "(") === false) && $fields[$i] != "*" && is_array($fields)) $fields[$i] = "`".$fields[$i]."`";
         }
         if(is_array($fields)) $fields = implode(",", $fields);
         else if($fields = '*'){}
         else $fields = "`".$fields."`";
         $table_name = "`".$this->dbSecurityPrTb.$table_name."`";
         if(!$order) {}//$order = "ORDER BY `id`";
         else{
             if($order != "RAND()"){
                 $order = "ORDER BY `$order`";
                 if(!$up) $order .= " DESC";
             }
             else $order = "ORDER BY $order";
         }
         if($limit) $limit = "LIMIT $limit";
         if($where)  $query = "SELECT $fields FROM $table_name WHERE $where $order $limit";
         else $query = "SELECT $fields FROM $table_name $order $limit";
         //echo $query.'<br/>';
         $result = $this->db->query($query);
         if(!$result) return false;
         $result = sqlObjectToAr($result);
         return $result;
     }

     function insert($table_name, $new_values){
         $table_name = "`".$this->dbSecurityPrTb.$table_name."`";
         $query = "INSERT INTO $table_name (";
         foreach ($new_values as $key => $value) $query .= "`".$key."`,";
         $query = substr($query, 0, -1);
         $query .= ") VALUES (";
         foreach ($new_values as $value) $query .= "'".addslashes($value)."',";
         $query = substr($query, 0, -1);
         $query .= ")";
         //echo $query;
         $result = $this->db->query($query);
         return $result;
     }

     function update($table_name, $new_values, $where){
         $table_name = "`".$this->dbSecurityPrTb.$table_name."`";
         $query = "UPDATE $table_name SET";
         foreach ($new_values as $key => $value){
             $query .= " `".$key."` = '".$value."',";
         }
         $query = substr($query, 0, -1);
         $query .= " WHERE ".$where;
         //echo $query."<br/>";
         $result = $this->db->query($query);
         return $result;
     }

     function delete($table_name, $where){
         $result = true;
         if(!$where) return false;
         $table_name = "`".$this->dbSecurityPrTb.$table_name."`";
         $query = "DELETE FROM $table_name WHERE ";

         if(is_array($where)){
             foreach ($where as &$value){
                 //if(!$this->db->query($query.$value)) $result = false;
                 echo $query.$value.'<br/>';
             }
         }else{
             $query .= $where;
             $result = $this->db->query($query);
         }
         return $result;
     }


    public function __destruct(){
        $this->db->close();
    }
 }

?>