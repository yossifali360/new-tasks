<?php
require_once("../../app/config.php");
require_once("../../app/response.php");
session_start();
session_destroy();
redirectTo(URL . "views/front/")
?>