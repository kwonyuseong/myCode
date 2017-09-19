<?php
session_start();

function DBconn_func(){
    try {
        $dsn ='mysql:host=localhost;dbname=personal_project';
        $user = 'root';
        $pass = '1234';

        $pdo = new PDO($dsn,$user,$pass);

        } catch (Exception $e) {
        $e->GetMassage();

        }
        return $pdo;
  }
  $pdo = DBconn_func();
 ?>
