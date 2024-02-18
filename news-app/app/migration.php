<?php


define("DB_HOST", "localhost");
define("DB_NAME", "news_app");
define("DB_PASSWORD", "");
define("DB_USER", "root");

// connect to mysql 
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

// drop database 
$sql = "DROP DATABASE IF EXISTS `news_app` ";
mysqli_query($conn, $sql);



// create database 
$sql = "CREATE DATABASE `news_app`";
mysqli_query($conn, $sql);

// connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}


// create user tables
$sql = "CREATE TABLE IF NOT EXISTS  `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255)  UNIQUE NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin','writer') NOT NULL DEFAULT 'writer',
    `status` ENUM('active','inactive') NOT NULL DEFAULT 'active'
)";

mysqli_query($conn, $sql);


// create category tables
$sql = "CREATE TABLE IF NOT EXISTS  `categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
   ` name` VARCHAR(255) UNIQUE NOT NULL
   
)";
mysqli_query($conn, $sql);

// create article tables
$sql = "CREATE TABLE IF NOT EXISTS `articles` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    number_of_views INT DEFAULT 1000,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    `category_id` INT NOT NULL,
    FOREIGN  KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ,
    `user_id` int not null,
    FOREIGN  KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
)";

mysqli_query($conn, $sql);


// create comment tables
$sql = "CREATE TABLE IF NOT EXISTS `comments` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    ` article_id` INT NOT NULL,
    FOREIGN  KEY (` article_id`) REFERENCES `articles`(`id`) ON DELETE CASCADE 
)";

$result = mysqli_query($conn, $sql);
