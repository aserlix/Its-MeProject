<?php

require ('../../controllers/auth/loggedIn.php');

if (isset($_SESSION["loggedIn"])) {
    $loggedIn = $_SESSION["loggedIn"];
}
if (isset($loggedIn)) {
    require ("../layout/loggedInHeader.php");
}else{
    require ("../layout/headerWithLogin.php");
}
require ('../../controllers/db/connection.php');


// retrieve already existent data from database
try{
    $guid=$_SESSION["guid"];
    if ($guid){
        $sql = "SELECT * FROM details
                WHERE guid='$guid'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

// set the resulting array to associative
        $profileDetails = $stmt->fetch();
    }


}catch(PDOException $e) {
    echo "Error adding an account" . $e->getMessage();}
?>
<div class="form">
    <div class="inputs">
        <p>Profile Details</p>
        <form class="inputs" action="../../controllers/profile/update.php" method="post">
            <p>Business/Organisation Name</p>
            <input type="text" value="<?php echo $profileDetails['businessName'] ?>" placeholder="Required" name="businessName"  required />
            <p>Activity description</p>
            <input type="text" value="<?php echo $profileDetails['type'] ?>" placeholder="Required" name="type"  required />
            <h4>Location</h4>
            <p>House number/name Street</p>
            <input type="text" value="<?php echo $profileDetails['street'] ?>" placeholder="Required" name="street"/>
            <p>City</p>
            <input type="text" value="<?php echo $profileDetails['city'] ?>" placeholder="Required" name="city"  required />
            <p>Country</p>
            <input type="text" value="<?php echo $profileDetails['country'] ?>" placeholder="Required" name="country"  required />
            <p>Post Code</p>
            <input type="text" value="<?php echo $profileDetails['postCode'] ?>" placeholder="Required" name="postCode"/>
            <p>Tell us about yourself or the activity you do</p>
            <input type="text" value="<?php echo $profileDetails['aboutBusiness'] ?>" placeholder="Required" name="aboutBusiness"  required />
            <h4>contact details</h4>
            <p>Full name:</p>
            <input type="text" value="<?php echo $profileDetails['contactName'] ?>" placeholder="Required" name="Name" required />
            <p>email</p>
            <input type="text" value="<?php echo $profileDetails['contactEmail'] ?>" placeholder="Required" name="Email" required />
            <p>Phone number</p>
            <input type="text" value="<?php echo $profileDetails['contactNumber'] ?>" placeholder="Required" name="Number" required />
            <button class="btn btn-info">Update</button>
        </form>
        <form action="../../controllers/profile/get.php">
            <p></p>
            <button>Check Your profile view</button>
        </form>
    </div>
</div>