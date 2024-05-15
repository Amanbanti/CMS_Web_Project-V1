<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>


<?php 
   
   if (!isset($_SESSION['adminname'])){
    header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
  }
  

  if(isset($_GET['upd_id'])){
                $id = $_GET['upd_id'];
                
                $select = $conn->query("SELECT * FROM categories WHERE id = '$id'");
                $select->execute();
                $rows = $select->fetch(PDO::FETCH_ASSOC);

    
        if(isset($_POST['submit'])){
                    if($_POST['name']==''){
                        echo '<div class="alert alert-danger text-center " role="alert">
                        Type somthing in the inputs!
      
                </div>';
                    } else {
                       $name= $_POST['name'];
                      

                        //for the protection of the database(:title)
                        $update = $conn->prepare("UPDATE categories 
                                                SET name = :name
                                                WHERE id = :id ");
                
                        $update->execute([
                            ':name' => $name,
                            ':id' => $id
                          
                        ]);

                    }
                    header ("Location:  http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/categories-admins/show-categories.php");
                   
                }
            }else{
                header ("Location: http://localhost/CMS_Web_Project-V1/clean-blog/404.php");
                exit();
            }?>



       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="update-category.php?upd_id=<?php echo $id ?>" >


                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="<?php echo $rows['name'] ?>" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php include "../layouts/footer.php" ?>