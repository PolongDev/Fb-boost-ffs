<?php
session_start();
$panel_password = '123';

function logout(){
    $_SESSION = [];
    unset($_SESSION['password']);
    session_unset();
}


function login($password){
   
    global $panel_password;
    
    if ($password == $panel_password) {
        
        $_SESSION['password'] = $password;
        return true;            
    }
    
    return false;
    
}

function isLogin(){
    global $panel_password;
    
    if( isset($_SESSION['password'])){
        if  ($_SESSION['password'] == $panel_password){
            return true;           
        } else {
            logout();
            return false;
        }
    }
    return false;
}

