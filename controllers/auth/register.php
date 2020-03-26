<?php
//connect with database
require('../db/connection.php');
//require guid generator
require('../../utilities/guid.php');

//if information is sent
if (isset($_POST)) {
  if(
      //and information given is not empty
    !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
      $guid = GUID();
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $secpassword = md5($_POST['confirmpassword']);
//Check if passwords match
      if ($password==$secpassword) {
          //add details to database
           try {
               $sql = "INSERT INTO users
            (guid,username, email, password)
            VALUES
            ('$guid', '$username', '$email', '$password')";

               $conn->exec($sql);

               session_start();
               $_SESSION["loggedIn"] = TRUE;
               $_SESSION["guid"] = $guid;
               $_SESSION["username"] = $username;


           } catch (PDOException $e) {
               echo "Error adding an account" . $e->getMessage();
           }

           //adding details to details Database
           try {
               $sql = "INSERT INTO details
            (guid)
            VALUES
            ('$guid')";

               $conn->exec($sql);

               // Close Connection with Database
               $conn = null;

               //Tell about successful register
               $_SESSION["register"] = TRUE;
               header('Location: ../../views/auth/login.php');
           } catch (PDOException $e) {
               echo "Error adding an account" . $e->getMessage();
           }
       }else{
           session_start();
           $_SESSION["PasswordError"]="Passwords do not Match!";
           header("Location: ../../views/auth/register.php");
       }
  }
} else {


  //if register is unsuccessful
  header('Location: ../login.html');

}
