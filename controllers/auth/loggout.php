<?php

//Logout: destroy all logged in sessions

session_start();
if (isset($_SESSION["loggedIn"])) {
    session_destroy();
}
if (isset($_SESSION["guid"])) {
    session_destroy();
}
if (isset($_SESSION["username"])) {
    session_destroy();
}
if (isset($_SESSION["id"])) {
    session_destroy();
}

//Start Logged out session with message, that user successfully logged out

session_start();
$_SESSION["loggedOut"] = TRUE;

//Transfer user to login page

header("Location: ../../views/auth/login.php");