<?php include("kontrol.php"); ?>

<?php

// oturumu baslatalim
session_start();
// oturumu oldurelim
session_destroy();
// ansayfaya gidelim
header("location:index.php");

?>