<?php include "../layouts/header.php" ?>
<?php include "../../config/config.php" ?>

<?php
if (!isset($_SESSION['adminname'])){
  header("Location:http://localhost/CMS_Web_Project-V1/clean-blog/admin-panel/admins/login-admins.php");
}


$comments = $conn->query("SELECT comments.id AS id, posts.title AS title, 
comments.user_name_comment AS user_name,comments.status_comment As status,comments.comment As comment
FROM comments
JOIN posts  ON comments.id_comment = posts.id");
$comments->execute();





?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Comments</h5>
            
              <table class="table">
                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Comment</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                <?php  while ($comm= $comments ->fetch(PDO::FETCH_ASSOC)){  ?>
                  <tr>
                    <th scope="row"><?php echo $comm['id'] ?></th>
                    <td><?php echo $comm['title'] ?></td>
                    <td><?php echo $comm['comment'] ?></td>
                    <td><?php echo $comm['user_name'] ?></td>
                    <?php if ($comm['status']==0) {  ?>
                        <td><a href="status-comment.php?status=<?php echo $comm['status'] ?>&id=<?php echo $comm['id']?>" class="btn btn-danger  text-center ">Deactivated</a></td>
                    <?php } else {  ?>
                      <td><a href="status-comment.php?status=<?php echo $comm['status'] ?>&id=<?php echo $comm['id']?>" class="btn btn-primary  text-center ">Activated</a></td>
                    <?php }?>

                     <td><a href="delete-comment.php?pos_id=<?php echo $comm['id'] ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                <?php  } ?>
                 
                </tbody>
              </table>  
            </div>
          </div>
        </div>
      </div>



<?php include "../layouts/footer.php" ?>