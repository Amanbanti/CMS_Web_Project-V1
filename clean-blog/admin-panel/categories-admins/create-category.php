<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>

<?php

if (!isset($_SESSION['adminname'])){
  header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
}

  if(isset($_POST['submit'])){
    if($_POST['name']== '' ){
      ?>
      <div class="alert alert-danger text-center " role="alert">
                Type something in the inputs!

        </div>
  <?php  }else{
    $name = $_POST['name']; 
     $insert = $conn ->prepare("INSERT INTO categories(name)
          VALUES (:name)");

    $insert->execute([
       ':name' => $name,
  
    ]);
    
    header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/categories-admins/show-categories.php");
 

    }


}



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>



          <form method="POST" action="create-category.php" >
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

 <?php include "../layouts/footer.php" ?>
