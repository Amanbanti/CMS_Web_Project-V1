<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>


<?php
    if (isset($_SESSION['adminname'])){
      header("location: http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/index.php");
    }
    
    
    if(isset($_POST['submit'])){
        if($_POST['email'] == '' || $_POST['password'] == ''){ ?>
            <div class="alert alert-danger text-center " role="alert">
                      Type somthing in the inputs!
    
              </div>
       <?php }else{
            $email = $_POST['email']; 
            $password = $_POST['password'];
    
            // Prepare the SQL query to fetch user with given email
            $login = $conn->prepare("SELECT * FROM admins WHERE email = '$email'");
            $login->execute();      
    
            // Fetch the user as an associative array
            $row = $login->fetch(PDO::FETCH_ASSOC);
             
            if ($login->rowCount() > 0){
                // Verify the password bc the user is registered
                        if (password_verify($password, $row['mypassword'])){
                            // Password is correct, redirect to index.php
                            
                            $_SESSION['adminname'] = $row['adminname'];
                            $_SESSION['admin_id'] = $row['id'];
    
                            header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/index.php");
                            
                        } else {?>
                            <div class="alert alert-danger text-center " role="alert">
                                  Insert the correct password!
    
                              </div>
                      <?php }
            } else { ?>
    
                    <div class="alert alert-danger text-center " role="alert">
                            Only Admins can access this page!
    
                      </div>
              
               <?php }
        }
    }



?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>



              <form method="POST" class="p-auto" action="http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                  
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>

                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>

    <?php include "../layouts/footer.php" ?>