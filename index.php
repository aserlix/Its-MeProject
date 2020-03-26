<?php
require ('controllers/db/connection.php');
try{
$sql = "SELECT * FROM details WHERE businessName IS NOT NULL";
$stmt = $conn->prepare($sql);
$stmt->execute();
$accounts = $stmt->fetchAll();

}catch (PDOException $e) {
    echo "Error finding accounts" . $e->getMessage();
}

session_start();
if (isset($_SESSION["loggedIn"])) {
    $loggedIn = $_SESSION["loggedIn"];
}

if (isset($loggedIn)) {
    ?><!DOCTYPE html>
<html>
<head>
    <title>It's Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Header/Footer CSS -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/form.css"


    <!--Dropdown arrow-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<header>
    <!--dropdown function-->
    <script src="js/main.js"></script>
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="logo"><img src="img/itsme.png" alt="Logo" height="25" width="125"></a>

        <a href="views/landing/about.php">About Us</a>
        <a href="views/landing/Contact.php">Contact Us</a>
        <a href="views/dashboard/profile.php">Profile</a>
        <a href="controllers/auth/loggout.php">Logout</a>

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</header><?php
} else {
    ?><!DOCTYPE html>
<html>
<head>
    <title>It's Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/form.css">
    <!--Dropdown arrow-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<header>

    <!--dropdown function-->
    <script src="js/main.js"></script>
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="logo"><img src="img/itsme.png" alt="Logo" height="25" width="125"></a>

        <a href="views/landing/about.php">About Us</a>
        <a href="views/landing/Contact.php">Contact Us</a>
        <a href="views/auth/login.php">Login</a>
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

    </div>
</header><?php
}
?>




    <div class="form">
    <h1><i>Welcome to It's Me</i></h1>
        <div class='img-container'>
        <img src="img/qrScan.jpg" height="100%" width="300px">
        </div>
        <p>This website is University of the West of Scotland computing science project dedicated to help small businesses, organisations or individuals to advertise themselves for free. It is fully functioning and made for everybody to use. Whenever you feel like you want to share with community about your passions, business, event, or even upcoming public meeting we are happy to assist you with that! </p>
        <p>Just simply create your free account and we will will help you with everything else!</p>
    </div>
    <div class="form">
        <h1><i>Latest active accounts!</i></h1>
        <?php
        if(count($accounts)>0){
        foreach($accounts as $profile) {
            ?>
        <div class="card">
            <h1><?php echo($profile['businessName']); ?></h1>
            <p class="title"><?php echo($profile['type']); ?></p>
            <p>about them: <?php echo implode(' ', array_slice(explode(' ', $profile['aboutBusiness']), 0, 5))."..."; ?></p>
            <div class="link">
            <button><a href="views/landing/singleProfile.php?id=<?php echo $profile['id']?>">Visit Profile</a></button>
            </div>
        </div>

            <?php
        }}
        ?>
    </div>




<footer>
    @ItsMe all rights reserved
</footer>

</body>
</html>
