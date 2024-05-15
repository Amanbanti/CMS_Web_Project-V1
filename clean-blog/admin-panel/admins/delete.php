<?php require "../../config/config.php";?>

<?php 
     
    

     if (isset($_GET['del_id']) && $_GET['del_id']!=1 ){
        $id=$_GET['del_id'];

        $select = $conn ->query("SELECT * from admins WHERE id = '$id'");
        $select->execute();
        $admins = $select->fetch(PDO::FETCH_ASSOC);
                

            $delete = $conn->prepare("DELETE FROM admins WHERE id = :id");
            $delete->execute([
                ':id' => $id,
            ]); 


    
      

        header('location: http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/admins.php');
     }
     
    else{
        header ("Location: http://localhost/CMS_Web_Project-V1/clean-blog/404.php");
        exit();
    }

?>