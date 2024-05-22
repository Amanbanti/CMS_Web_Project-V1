

<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>


<?php




    
$categories = $conn->prepare("SELECT * FROM categories");
$categories->execute(); 



//last update
        //if the user is not found ,cant access this page
        if (!isset($_SESSION['username'])){
            header('location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php');

          }
        

    if(isset($_POST['submit'])){
        if($_POST['title']=='' ||$_POST['subtitle'] == '' ||
         $_POST['body'] == '' || $_POST['category_id'] == ''){
            echo '   <div class="alert alert-danger text-center " role="alert">
            one or more inputs are missing!

          </div>';
    
         }else{
           $title= $_POST['title'];
           $subtitle= $_POST['subtitle'];
           $body= $_POST['body'];
           $category_id=$_POST['category_id'];
           $img= $_FILES['img']['name'];

           //$_SESSION['user_id'] already set in login page
           $user_id= $_SESSION['user_id'];
           $user_name= $_SESSION['username'];

           $dir='images/' .basename($img);

        //for the protection of the database(:title)
           $insert = $conn->prepare("INSERT INTO posts(title,subtitle,body,category_id,img,user_id,user_name) VALUES (:title,:subtitle, :body,:category_id, :img , :user_id , :user_name)");

           $insert->execute([
            ':title' => $title,
            ':subtitle' => $subtitle,
            ':body' => $body,
            ':category_id' => $category_id,
            ':img' => $img,
            ':user_id' => $user_id,
            ':user_name' => $user_name,

           ]);

           if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)){
            // header('location: http://localhost/CMS_Web_Project-V1/clean-blog/index.php');
        
           }

          

         }

    
    }


?>


            <form method="POST" action="create.php" enctype="multipart/form-data">
              <!--enctype="multipart/form-data to process the img-->
              <div class="form-outline mb-4">
                <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" />
            </div>

              <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"></textarea>
            </div>

            <div class="form-outline mb-4">
              <select name="category_id" class="form-select" aria-label="Default select example">
              
                <?php while($cat = $categories->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                <?php } ?>
              </select>
            </div>



              
             <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
            </form>


           
<?php require "../includes/footer.php";?>