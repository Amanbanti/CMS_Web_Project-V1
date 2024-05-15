<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>


<?php

if (!isset($_SESSION['adminname'])){
  header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
}

  if(isset($_POST['submit'])){
    if($_POST['email']== '' || $_POST['adminname'] == '' || $_POST['password'] == ''){
      ?>
      <div class="alert alert-danger text-center " role="alert">
                Type something in the inputs!

        </div>
  <?php  }else{
        $email = $_POST['email']; 
        $adminname = $_POST['adminname'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $created_by = $_SESSION['adminname'];


     $insert = $conn ->prepare("INSERT INTO admins (email, adminname,mypassword,created_by)
          VALUES (:email, :adminname,:password,:created_by)");

    $insert->execute([
       ':email' => $email,
       ':adminname' => $adminname,
       ':password' => $password,
       ':created_by' => $created_by,
    ]);
    
    header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/admins.php");
 

    }


}



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" >
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="adminname" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

               
            

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>


<?php include "../layouts/footer.php" ?>

