<?php

//Check if user is logged in.

session_start();
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    $_SESSION["notLoggedIn"] = TRUE;
    //If user is not logged in transfer user to login page
    header("Location: ../auth/login.php");
}