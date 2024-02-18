<?php
require_once('../../app/config.php');
require_once('../../app/response.php');
require_once('../../app/validation.php');
require_once('../../app/db.php');
if (isset($_POST['submit'])) {
    $comment_name = sanitize($_POST['comment_name']);
    $comment_text = sanitize($_POST['comment_text']);
    $article_id = sanitize($_POST['article_id']);
    echo $comment_name;
    echo "Ssssssssssssssssssssssss";
    echo $comment_text;
    echo $article_id;
    if (requiredValue($comment_name) == false) {
        echo "1";
        if (minLength($comment_name, "2") && maxLength($comment_name, "300")) {
            echo "2";
            $sql = "INSERT INTO `comments`(`name`,`content`,`status`,`article_id`)
                VALUES ('$comment_name','$comment_text','pending','$article_id')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "3";
                $success = "Comment Added Successfully";
                redirectTo(URL . "views/front/home.php");
            }
        } else {
            $error = "Please enter valid inputs";
        }
    } else {
        $error = "Please enter all required fields";
    }
}
