<?php

function sanitize($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}

function requiredValue($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}


function minLength($input, $min)
{
    if (strlen($input) >= $min) {
        return true;
    }
    return false;
}

function maxLength($input, $max)
{
    if (strlen($input) <= $max) {
        return true;
    }
    return false;
}
function DisplaySessionMsg($key, $type)
{
    if (isset($_SESSION[$key])) {
        echo "<div class=\"alert alert-$type mt-2 \">";
        echo $_SESSION[$key];
        unset($_SESSION[$key]);
        echo "</div>";
    }
}
