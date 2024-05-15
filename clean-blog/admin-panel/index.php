<?php include "layouts/header.php" ?>
<?php include "../config/config.php" ?>

<?php 
//if u r not logging cant access this page
    if(!isset($_SESSION['adminname'])){
      header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
    }

    //for posts
    $posts = $conn->prepare("SELECT * FROM posts");
      $posts->execute();  
      
    //for catagory
      $cats = $conn->prepare("SELECT * FROM categories");
      $cats->execute();  

    //for admins
      $admins = $conn->prepare("SELECT * FROM admins");
      $admins->execute();  

      


?>



    <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Posts</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of posts: <?php echo $posts->rowCount() ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $cats->rowCount() ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admins->rowCount() ?></p>
              
            </div>
          </div>
        </div>
      </div>
     
            
<?php include "layouts/footer.php" ?>
