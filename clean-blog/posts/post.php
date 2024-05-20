<?php require "../includes/navbar.php";?>
<?php require "../config/config.php";?>

<?php 


if(isset($_GET['post_id'])){
    $id = $_GET['post_id'];

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
    $select->execute();
    $post = $select->fetch(PDO::FETCH_ASSOC);

    // Fetch comments for the post
    $comments_query = $conn->prepare("SELECT * FROM comments WHERE status_comment = 1 && id_comment = :id_comment ORDER BY created_at DESC");
    $comments_query->execute([':id_comment' => $id]);
    $comments = $comments_query->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location: http://localhost/CMS_Web_Project-V1/clean-blog/404.php");
    exit();
}

if(isset($_POST['submit']) && isset($_GET['post_id'])){

    if (isset($_SESSION['username']) && !empty($_POST['comment'])) {

        $id = $_GET['post_id'];
        $user_name = $_SESSION['username'];
        $comment = $_POST['comment'];

        $insert = $conn->prepare("INSERT INTO comments (id_comment, user_name_comment, comment)
                                  VALUES (:id_comment, :user_name_comment, :comment)");
        $insert->execute([
            ':id_comment' => $id, 
            ':user_name_comment' => $user_name,
            ':comment' => $comment
        ]); 

        header("Location: http://localhost/CMS_Web_Project-V1/clean-blog/posts/post.php?post_id=" . $id);
        exit();
       } 
   
}


?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('images/<?php echo $post['img']; ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php echo $post['title'] ?></h1>
                    <h2 class="subheading"><?php echo $post['subtitle'] ?></h2>
                    <span class="meta">
                        Posted by
                        <a href="http://localhost/CMS_Web_Project-V1/clean-blog/index.php"><?php echo $post['user_name'] ?></a>
                        <?php
                        $new_date = date("F j, Y", strtotime($post['created_at']));
                        echo $new_date; // Output: May 10, 2024 
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php echo $post['body']?></p>
                <?php if(isset($_SESSION['username'])){ ?>
                    <?php if ($_SESSION['username'] == $post['user_name']){ ?>
                        <a href="http://localhost/CMS_Web_Project-V1/clean-blog/posts/delete.php?del_id=<?php echo $post['id']?>" class="btn btn-danger text-center float-end">Delete</a>
                        <a href="http://localhost/CMS_Web_Project-V1/clean-blog/posts/update.php?upd_id=<?php echo $post['id']?>" class="btn btn-warning text-center">Update</a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</article>







<!--the Comment Section -->



<section>
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <h3 class="mb-5">Comments</h3>
                <div class="card">

                <?php foreach($comments as $com) { ?>
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <div>
                                <h6 class="fw-bold text-primary"><?php echo $com['user_name_comment'] ?> <small class="p-3 text-black"><?php
                                    $new_date = date("F j, Y", strtotime($com['created_at']));
                                    echo $new_date; // Output: May 10, 2024
                                ?></small></h6>
                            </div>
                        </div>
                        <p class="mt-3 mb-4 pb-2">
                            <?php echo $com['comment'] ?>
                        </p>
                        <hr class="my-4" />
                    </div>
                <?php } ?>



                <!--checking the comment has an input -->
                    <?php 
                         if (isset($_POST['comment']) && empty($_POST['comment'])) {
                            echo '<div class="alert alert-danger text-center" role="alert">
                                        Type something in the comment input!
                                    </div>';
                         }
                    
                    
                    ?>




                    <?php 
                                if ( $comments_query->rowCount() == 0){
                                    echo '<div class="alert alert-secondary" role="alert">
                                    No comments for this post!
                                    </div>';

                                    
                                }
                            
                     ?>





                <?php  if (isset($_SESSION['username'])){ ?>


                    <form method="POST" action="post.php?post_id=<?php echo $id ?>">
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                    <textarea class="form-control" id="" placeholder="write message" rows="4" name="comment"></textarea>
                                </div>
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Post comment</button>
                            </div>
                        </div>
                    </form>
                <?php }else{

                        echo '<div class="alert alert-warning text-center" role="alert">
                                Login to Comment to this post!
                        </div>';

                }?>


                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "../includes/footer.php";?>
