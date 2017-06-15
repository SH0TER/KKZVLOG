<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

class UserClass{

    private $login;
    private $password;
    private $access;
    private $status;
    private $pib;
    private $id;
    private $phone;
    private $photoUrl;
    private $adress;
    private $identificate = false;

    public function __construct(){
        session_start();
        $this->is_auth();
    }


    // Отримуємо всю інформацію про користувача з БД
    private function getUserInfo($login){

        $fields = "*";
        $where = "`login`='".$login."'";

        $db = Conected::setConected();
        $user = $db->select('users', $fields, 1, $where );

        if(!$user) return false;
        return $user[0];
    }

    // Перевірка чи користувач залогінений
    private function is_auth()
    {

        if(array_key_exists('login',$_SESSION)){
            $login = $_SESSION['login'];
            $pass = $_SESSION['password'];

            $bdUser = $this->getUserInfo($login);

            if($bdUser && $pass == $bdUser['password']){
                $this->login = $bdUser['login'];
                $this->password = $bdUser['password'];
                $this->access = $bdUser['access'];
                $this->status = $bdUser['status'];
                $this->pib = $bdUser['firstName'];
                $this->id = $bdUser['id'];
                $this->phone = $bdUser['phone'];
                $this->adress = $bdUser['adres'];
                $this->photoUrl = $bdUser['photoUrl'];
                $this->identificate = true;
            }
        }
    }

    // Залогінює користувача
    public function get_auth($login, $password){

        $bdUser = $this->getUserInfo($login);
        $pass = md5($password);
        if($bdUser && $pass == $bdUser['password']){
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $pass;
            unset($bdUser);
            $this->is_auth();
        }
        return false;
    }

    public function destruct_auth(){
        if($this->identificate){
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            $this->identificate = false;
        }else{
            return false;
        }
    }
    
    // Реєструєм нового користувача
    public function set_new_user($login, $pass, $email, $pib, $adress){

        $data = array(
            'login'         => $login,
            'password'      => md5($pass),
            'email'         => $email,
            'firstName'     => $pib,
            'phone'    => "",
            'regDate'       => date('Y-m-d H:i:s'),
            'adres'         => $adress
        );

        $db = Conected::setConected();
        $result = $db->insert('users', $data);
        
        
        //костыль под родителей 
        if($result){
            $data = array(
                'id_student'         => $this->getUserInfo($login)['id'],
                'mather_pib'         => '',
                'mather_phone'       => '',
                'dad_pib'            => '',
                'dad_phone'          => ''
            );
            $result = $db->insert('parents', $data);
        }
        
        return $result;
    }
    
    public function __destruct(){

    }

    // Гетери
    public function isIdentificate(){
        return $this->identificate;
    }
    public function getPib(){
        return $this->pib;
    }
    public function getId(){
        return $this->id;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getAccess(){
        return $this->access;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getPhotoUrl(){
        return $this->photoUrl;
    }
    public function getAdress(){
        return $this->adress;
    }
    
    //Сетри
    public function setPhone($phone)
    {
        $data = array(
            'phone'         => $phone,
        );
        $where = '`id` = '.$this->id;

        $db = Conected::setConected();
        $result = $db->update('users', $data, $where);

        if($result) $this->phone = $phone;
        return $result;
    }

    public function setPib($pib){
        $data = array(
            'firstName'         => $pib,
        );
        $where = '`id` = '.$this->id;

        $db = Conected::setConected();
        $result = $db->update('users', $data, $where);

        if($result) $this->pib = $pib;
        return $result;
    }

    public function setAdress($adress)
    {
        $data = array(
            'adres'         => $adress,
        );
        $where = '`id` = '.$this->id;

        $db = Conected::setConected();
        $result = $db->update('users', $data, $where);

        if($result) $this->adress = $adress;
        return $result;
    }

    public function setPhotoUrl($photoUrl){
        $data = array(
            'photoUrl'         => $photoUrl,
        );
        $where = '`id` = '.$this->id;

        $db = Conected::setConected();
        $result = $db->update('users', $data, $where);

        if($result) $this->photoUrl = $photoUrl;
        return $result;

    }
    
}

?>

