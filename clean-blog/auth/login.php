<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>


<?php //last update
if (isset($_SESSION['username'])){
  header("location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php");
}


if(isset($_POST['submit'])){
    if($_POST['email'] == '' || $_POST['password'] == ''){
        echo "Type something in both inputs";
    }else{
        $email = $_POST['email']; 
        $password = $_POST['password'];

        // Prepare the SQL query to fetch user with given email
        $login = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $login->bindParam(':email', $email);
        $login->execute();      

        // Fetch the user as an associative array
        $row = $login->fetch(PDO::FETCH_ASSOC);
         
        if ($login->rowCount() > 0){
            // Verify the password bc the user is registered
            if (password_verify($password, $row['mypassword'])){
                // Password is correct, redirect to index.php
                
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];

                header("location: ../index.php");
               
            } else {?>
                <php? echo?> <p style="color: red;">Incorrect password</P>
           <?php }
        } else {
            echo "User not Registered";
            header("location: register.php");
        }
    }
}
?>





               <form method="POST" action="login.php">
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

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                </form>

           
        
           
 <?php
 require "../includes/footer.php";
 ?>
