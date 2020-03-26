<?php

require('../db/connection.php');
// Update user profile details
if (isset($_POST)) {

    if (

    !empty($_POST['businessName'])) {
        session_start();
        $guid = $_SESSION['guid'];
        $businessName = $_POST['businessName'];
        $type = $_POST['type'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postCode = $_POST['postCode'];
        $aboutBusiness = $_POST['aboutBusiness'];
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $number = $_POST['Number'];
        try {
            $sql = "UPDATE details 
        SET businessName = '".$businessName."',
        type = '$type',
        street = '".$street."',
        city = '$city',
        country = '$country',
        postCode = '$postCode',
        aboutBusiness = '$aboutBusiness',
        contactName = '$name',
        contactEmail = '$email',
        contactNumber = '$number'
        WHERE guid='$guid'";

            $conn->exec($sql);
            header('Location: ../../views/dashboard/profile.php');

        } catch (PDOException $e) {
            echo "Error updating details" . $e->getMessage();
        }
    }
}

