<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>


<?php

//to make sure it is been loggedin
if (!isset($_SESSION['adminname'])){
  header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
}

$admins = $conn->prepare("SELECT * FROM admins");
$admins->execute();  


?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">AdminName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin CreatedBy</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($row = $admins->fetch(PDO::FETCH_ASSOC)){  ?>
                  <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['adminname'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['created_by'] ?></td>
                    <?php if ($_SESSION['adminname']=='amanbanti'){  ?>
                      <?php if ($row['id'] != 1){  ?>
                        <td> <a href="http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/delete.php?del_id=<?php echo $row['id']?>" class="btn btn-danger text-center float-end">Delete</a></td>
                      <?php }?>
                    <?php }?>
                  </tr>
                <?php } ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
      </div>

<?php include "../layouts/footer.php" ?>


