<?php
function redirectTo($path)
{
    return header("Location:$path");
}
