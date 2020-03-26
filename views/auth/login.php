<?php require('../layout/headerWithRegister.php');
session_start();
//if there is login error
if (isset($_SESSION["loginError"])) {
    $loginError = $_SESSION["loginError"];
    session_destroy();
}
//if user tried to access unauthorised content
if (isset($_SESSION["notLoggedIn"])) {
    $notLoggedIn = $_SESSION["notLoggedIn"];
    session_destroy();
}
//if customer successfully registered
if (isset($_SESSION["register"])) {
    $register = $_SESSION["register"];
    session_destroy();
}
//Successful logout
if (isset($_SESSION["loggedOut"])) {
    $loggedOut = $_SESSION["loggedOut"];
    session_destroy();
}
//if user is already logged in
if (isset($_SESSION["loggedIn"])) {
    $loggedIn = $_SESSION["loggedIn"];
}
if (isset($loggedIn)) {
    header("Location:../dashboard/profile.php");
}
?>

<div class="form">
<form action="../../controllers/auth/login.php" method="post">
        <h1>Login</h1>

        <?php if (isset($loginError)) {
            ?>
        <div class="warning">
        <h4>Wrong Details</h4>
        </div>
        <?php
        }
        ?>

    <?php
    if (isset($notLoggedIn)){
        ?>
        <div class="warning">
            <h4>You are not logged In!</h4>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($register)){
        ?>
        <div class="warning">
            <h4>You have successfully registered!</h4>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($loggedOut)){
        ?>
        <div class="warning">
            <h4>Successfully logged out!</h4>
        </div>
        <?php
    }
    ?>

    <input type="email" placeholder="Email" name="email" required/>
    <br>
    <input type="password" placeholder="Password" name="password" autocomplete="new-password" required/>
    <br>
    <button class="btn btn-info">Login</button>
    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
</form>
</div>

<?php require('../layout/footer.php'); ?>