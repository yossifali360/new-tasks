<?php

$pdo = new PDO("mysql:host=localhost;dbname=crud2","root","");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

$pdo->query("SELECT * FROM `users`");

// $statement = $pdo->query("INSERT INTO `users` (`username`, `password`) VALUES ('yossif','123456')");
// echo $statement->rowCount();

// $statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES ('yossif2','123456')");
// $statement->execute();
// echo $statement->rowCount();

// $statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?,?)");
// $statement->execute(['yossif3','123456']);
// echo $statement->rowCount();

// $statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (:username,:password)");
// $statement->execute(["username"=>"yossif4", "password"=>"123456"]);
// echo $statement->rowCount();

// $query = $pdo->query("SELECT * FROM `users`");
// echo "<pre>";
// var_dump($query->fetchAll(PDO::FETCH_ASSOC));
// echo "</pre>";

// $user = ['joy','123456'];
// $statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (:username,:password)");
// $statement->bindValue(":username",$user[0]);
// $statement->bindValue(":password",$user[1]);
// $statement->execute();

// $user = ['joy2','123456'];
// $statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (:username,:password)");
// $statement->bindParam(":username",$user[0]);
// $statement->bindParam(":password",$user[1]);
// $statement->execute();

$user = ['joy2','123456'];
$statement = $pdo->prepare("INSERT INTO `users` (`username`, `password`) VALUES (:username,:password)");
$statement->bindParam(":username",$user[0],PDO::PARAM_STR);
$statement->bindParam(":password",$user[1]);
$statement->execute();