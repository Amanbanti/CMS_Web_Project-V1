<?php
session_start();
session_unset();
session_destroy();
header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
 ?>