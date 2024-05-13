<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>


<?php 

//if the user is not found, cant access this page
    if (!isset($_SESSION['username'])){
        header('location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php');
    }
    
    

          

            if(isset($_GET['prof_id'])){
                $id = $_GET['prof_id'];
                //first query
                $prof = $conn->prepare("SELECT * FROM users WHERE id = '$id' ");
                $prof->execute();  

                $row = $prof->fetch(PDO::FETCH_ASSOC);

                if ($_SESSION['user_id'] != $row['id']){
                    header('location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php');

                 }

                //second query
                if(isset($_POST['submit'])){
                    if($_POST['username'] == '' || $_POST['email'] == ''){
                        echo "Type something in both inputs";
                    } else {

                        $username = $_POST['username']; 
                        $email = $_POST['email'];


                        $update = $conn->prepare("UPDATE users
                                                SET email = :email, 
                                                    username = :username 
                                                    
                                                WHERE id = '$id' ");
                
                        $update->execute([
                            ':email' => $email,
                            ':username' => $username,
                            
                           
                        ]);

                        header('location: http://localhost/CMS_Web_Project-V1/clean-blog/users/profile.php?prof_id='.$_SESSION['user_id'].'');
                      
                   
                    }
                   

                }
            }
     
?>


      




<form method="POST" action='profile.php?prof_id=<?php echo $row['id'] ?>'>
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" value="<?php echo $row['email'] ?>" name="email" id="form2Example1" class="form-control" placeholder="email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="text" name="username"  value="<?php echo $row['username'] ?>"  id="form2Example2" placeholder="username" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

                 
                </form>

           
        
           
 <?php
 require "../includes/footer.php";
 ?>
