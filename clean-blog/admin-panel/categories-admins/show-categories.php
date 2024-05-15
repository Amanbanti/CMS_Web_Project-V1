<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>


<?php
if (!isset($_SESSION['adminname'])){
  header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
}


$categories = $conn->prepare("SELECT * FROM categories");
$categories->execute();  


?>


          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/categories-admins/create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                <?php while($cat = $categories->fetch(PDO::FETCH_ASSOC)){  ?>
                  <tr>
                    <th scope="row"><?php echo $cat['id'] ?></th>
                    <td><?php echo $cat['name'] ?></td>
                    <td><a  href="http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/categories-admins/update-category.php?upd_id=<?php echo $cat['id']?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/categories-admins/delete-category.php?del_id=<?php echo $cat['id']?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                  <?php }?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



      <?php include "../layouts/footer.php" ?>