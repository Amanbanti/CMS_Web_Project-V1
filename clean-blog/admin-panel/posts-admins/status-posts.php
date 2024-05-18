<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>


<?php 
   
   if (!isset($_SESSION['adminname'])){
    header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
  }
  

  if(isset($_GET['id']) && isset($_GET['status'])){
                $id = $_GET['id'];
                $status = $_GET['status'];
               
    
                      
                if ($status==0){ 
                        $update = $conn->prepare("UPDATE posts 
                            SET status = 1
                            WHERE id = '$id' ");
                
                        $update->execute();

                    
                    header ("Location:  http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/posts-admins/show-posts.php");
                }else{
                    $update = $conn->prepare("UPDATE posts 
                    SET status = 0
                    WHERE id = '$id' ");
    
                    $update->execute();
    
    
                    header ("Location:  http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/posts-admins/show-posts.php");
                }  
                
            } else{
                header ("Location: http://localhost/CMS_Web_Project-V1/clean-blog/404.php");
                
            }
            
            
            
            
            ?>
