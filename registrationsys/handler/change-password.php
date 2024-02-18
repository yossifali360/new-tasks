<?php
session_start();
include("../inc/db.php");
if(isset($_POST['submit'])){
    $old_password=filter_var($_POST['old_password'],FILTER_SANITIZE_STRING);
    $new_password=filter_var($_POST['new_password'],FILTER_SANITIZE_STRING);
    $confirm_password=filter_var($_POST['confirm_password'],FILTER_SANITIZE_STRING);
    
    //data insertion in database using PDO
    $sql="SELECT * FROM users WHERE email=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_email']]);
    $data=$stmt->fetchObject();
    if($data){
        $check=password_verify($old_password,$data->password);
        if($check){
            if ($new_password===$confirm_password){
                $new_password=password_hash($new_password,PASSWORD_DEFAULT);
                $sql= 'Update users SET password =? WHERE email=?';
                $stmt=$pdo->prepare($sql);
                $stmt->execute([$new_password,$_SESSION['user_email']]);
                header('location:../show-data.php');
                die();

            }else{
                $_SESSION['error']="passwords not match";
            }
           
            

        }else{
            $_SESSION['error']=' Password isnt correct';
        }
    }else{
        $_SESSION['error']='Data is not found';
    }
    $_SESSION['success']= "data inserted in database";
    
    }
    header('location:../change-password.php');
    
