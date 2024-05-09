<?php 


session_start();
session_unset();
session_destroy();


header("location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php");




?>