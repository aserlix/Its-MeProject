<?php
//Connect to database
require('../db/connection.php');
//if sent information is not empty
if (isset($_POST)) {
  if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    try {
        //connect with db
        //If details match
        $sql = "SELECT * FROM users
                WHERE email='$email' AND password='$password' LIMIT 1 ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->fetch();
        //login sessions
        session_start();
        if ($result){
            $_SESSION["loggedIn"]=TRUE;
            $_SESSION["guid"]=$result['guid'];
            $_SESSION["username"]=$result['username'];
            $_SESSION["id"]=$result['id'];
            header("Location: ../../views/dashboard/profile.php");
        }else{
            //wrong details session redirect to login page
            $_SESSION["loginError"] = "Wrong Details";
            header("Location: ../../views/auth/login.php");

        }


        //close connection
        $conn = null;
    //error with database
    } catch(PDOException $e) {
        echo "Error adding an account" . $e->getMessage();
    }
  }
} else {
  echo ("Server Error");
}
