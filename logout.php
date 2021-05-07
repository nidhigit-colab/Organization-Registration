<?php
include('config.php');
session_start();
session_destroy();
mysqli_close($con);
header("Location:register.php");
?>