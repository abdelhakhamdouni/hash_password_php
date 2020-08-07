<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    if(isset($_GET['pass'])){
        $res = [
            'password' => password_hash($_GET['pass'], PASSWORD_DEFAULT)
        ];
        header('Content-type: application/json');
        echo json_encode($res);
        return;
    }

    if(isset($_GET['generer'])){
        $str =   substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,;.!?-_', 
        ceil(10/strlen($x)) )),1,10);
        $res = [
            "password" => $str
        ];
        header('Content-type: application/json');
        echo json_encode($res);
        return;
    }