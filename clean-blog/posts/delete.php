<?php require "../config/config.php";?>
<?php require "../includes/navbar.php";?>
<?php 
     
    

     if (isset($_GET['del_id'])){
        $id=$_GET['del_id'];

        $select = $conn ->query("SELECT * from posts WHERE id = '$id'");
        $select->execute();
        $posts = $select->fetch(PDO::FETCH_ASSOC);
        
        if ($_SESSION['user_id']!= $posts['user_id']){
            header('location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php');

         }else{
                    //to delete images from image folder
                unlink("images/" .$posts['img']."");
                

                $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");
                $delete->execute([
                    ':id' => $id,
                ]); 


         }

      

        header('location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php');
     }
?>