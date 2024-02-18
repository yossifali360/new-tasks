<?php
session_start();
include("../inc/db.php");
if(isset($_POST['submit'])){
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    
    //data insertion in database using PDO
    $sql="SELECT * FROM users WHERE email=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$email]);
    $data=$stmt->fetchObject();
    if($data){
        $check=password_verify($password,$data->password);
        if($check){
            $_SESSION["user_id"] = $data->id;
            $_SESSION["user_name"] = $data->name;
            $_SESSION["user_email"] = $data->email;
            $_SESSION["user_mobile"] = $data->phone;
            header('location:../index.php');
            die();

        }else{
            $_SESSION['error']='Email or Password isnt correct';
        }
    }else{
        $_SESSION['error']='Data is not found';
    }
    $_SESSION['success']= "data inserted in database";
    
    }
    header('location:../login.php');
    
