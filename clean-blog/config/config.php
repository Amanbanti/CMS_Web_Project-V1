<?php  

//host 
$host = "localhost";

//dbname
$dbname = "cleanblog";

//user
$user = "root";

//password
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection successful";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>