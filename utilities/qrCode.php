<?php
//QR code generator

require ("../controllers/auth/loggedIn.php");
require ("../controllers/db/connection.php");

if (isset($_SESSION["guid"])) {
    $guid = $_SESSION["guid"];
}

try{
    $sql = "SELECT * FROM details 
    WHERE guid='$guid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetch();

}catch (PDOException $e) {
    echo "Error adding an account" . $e->getMessage();
}


$id=$results['id'];


$data= sprintf("http://itsme.org.uk/views/landing/singleProfile.php?id=%s", $id);


$data = isset($_GET['data']) ? $_GET['data'] : $data;
$size = isset($_GET['size']) ? $_GET['size'] : '400x400';
$logo = isset($_GET['logo']) ? $_GET['logo'] : 'https://scontent-lhr8-1.xx.fbcdn.net/v/t1.15752-9/90624124_167505440914721_651398401086193664_n.jpg?_nc_cat=101&_nc_sid=b96e70&_nc_ohc=RdQ0_Oof1HIAX_ERZLL&_nc_ht=scontent-lhr8-1.xx&oh=f8c72014af6f6b05dd15fec61a4f7d70&oe=5E9A387D';

header('Content-type: image/png');


$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));
if ($logo !== FALSE) {
    $logo = imagecreatefromstring(file_get_contents($logo));

    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);

    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);

    // Scale logo to fit in the QR Code
    $logo_qr_width = $QR_width / 3;
    $scale = $logo_width / $logo_qr_width;
    $logo_qr_height = $logo_height / $scale;

    imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}
imagepng($QR);
imagedestroy($QR);

?>