<?php
if (isset($loggedIn)) {
    require("../layout/loggedInHeader.php");
}else{
    require("../layout/headerWithLogin.php");
}

?>
<div class="form">
   <h1><i>About Us</i></h1>
    <div class="img-container">
    <img src="../../img/itsme.png">
    </div>


<p><b>Its Me</b> is University of the West of Scotland Honours project, that was developed by student: Deividas Karunos (B00314446)</p>
<p>This website is dedicated for every individual, that would like to advertise their business, event, meeting or any other activities</p>
<p>You just need to sign up for free and fill in some fields. Your profile will contain all details, that you will provide as well as it will allow you to generate QR code, that will link every scanning device to your personal profile</p>
    <div class="link">
    <button><a href="../auth/register.php"> Create Account</a> </button>
    </div>
    <p>If you have any questions about this website or would like to share your feedback, don't hesitate to <a href="Contact.php"><b>contact us!</b></a> </p>
</div>
<?php
require("../layout/footer.php");
?>
