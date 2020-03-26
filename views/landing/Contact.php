<?php
if (isset($loggedIn)) {
    require("../layout/loggedInHeader.php");
}else{
    require("../layout/headerWithLogin.php");
}

?>

<div class="form">
    <h1><i>Contact us</i></h1>
    <div class="card">
        <img src="https://scontent-lhr8-1.xx.fbcdn.net/v/t1.0-9/53373542_2254790314543154_1300012147241123840_n.jpg?_nc_cat=109&_nc_sid=7aed08&_nc_ohc=ykA797i8hiMAX_vnJrt&_nc_ht=scontent-lhr8-1.xx&oh=7d6bcb088e1b6825b07b016b9178d8c2&oe=5E9A50A6" alt="David" style="width:100%">
        <h1>Deividas Karunos</h1>
        <p class="title">Computing Science Student</p>
        <p>University of the West of Scotland</p>
        <div style="margin: 24px 0;">
            <a href="https://www.linkedin.com/in/deividas-karunos-217a95139/"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.facebook.com/DeiDeiHere"><i class="fa fa-facebook"></i></a>
        </div>
        <p>info@itsme.org.uk</p>
    </div>
</div>


<?php
require("../layout/footer.php");
?>
