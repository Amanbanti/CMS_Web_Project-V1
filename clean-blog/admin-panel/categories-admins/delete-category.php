
<?php include "../../config/config.php" ?>

<?php 
     
    
     if (!isset($_SESSION['adminname'])){
        header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
      }
      
     if (isset($_GET['del_id'])){
        $id=$_GET['del_id'];

        $delete = $conn->prepare("DELETE FROM categories WHERE id = :id");
        $delete->execute([
            ':id' => $id,
        ]); 
       
        header('location:  http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/categories-admins/show-categories.php');

         }
     
     
    else{
        header ("Location: http://localhost/CMS_Web_Project-V1/clean-blog/404.php");
        exit();
    }

?>