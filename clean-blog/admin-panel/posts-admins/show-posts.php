<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>

<?php
if (!isset($_SESSION['adminname'])){
  header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
}



$posts = $conn->query("SELECT posts.id AS id, posts.title AS title, 
posts.user_name AS user_name,posts.status As status, categories.name AS name 
FROM categories
JOIN posts ON categories.id = posts.category_id");
$posts->execute();   

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Posts</h5>
            
              <table class="table">
                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                <?php  while ($post = $posts->fetch(PDO::FETCH_ASSOC)){  ?>
                  <tr>
                    <th scope="row"><?php echo $post['id'] ?></th>
                    <td><?php echo $post['title'] ?></td>
                    <td><?php echo $post['name'] ?></td>
                    <td><?php echo $post['user_name'] ?></td>
                    <?php if ($post['status']==0) {  ?>
                        <td><a href="status-posts.php?status=<?php echo $post['status'] ?>&id=<?php echo $post['id']?>" class="btn btn-danger  text-center ">Deactivated</a></td>
                    <?php } else {  ?>
                      <td><a href="status-posts.php?status=<?php echo $post['status'] ?>&id=<?php echo $post['id']?>" class="btn btn-primary  text-center ">Activated</a></td>
                    <?php }?>

                     <td><a href="delete-posts.php?pos_id=<?php echo $post['id'] ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                <?php  } ?>
                 
                </tbody>
              </table>  
            </div>
          </div>
        </div>
      </div>



<?php include "../layouts/footer.php" ?>