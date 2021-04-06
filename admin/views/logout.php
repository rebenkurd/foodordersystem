<?php
include('../../config/constants.php');
include('../../config/functions.php');
session_destroy();

if (!isset($_COOKIE["user"]) && !isset($_COOKIE["pass"])) {
    setcookie("user", '', time() - (3600));
    setcookie("pass", '', time() - (3600));
}
RedirectTo("../../login.php");
