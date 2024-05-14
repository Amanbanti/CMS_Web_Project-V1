<?php require "includes/header.php"; //last update?>
<?php require "config/config.php";?>

<?php 
     $posts = $conn->prepare("SELECT * FROM posts LIMIT 5");
     $posts->execute(); 



     $categories = $conn->prepare("SELECT * FROM categories");
     $categories->execute(); 
    
    
?>

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                <?php //echo 'Hello ' .$_SESSION['username'] ?>
                    <!-- Post preview-->

            <?php 
            while($row = $posts->fetch(PDO::FETCH_ASSOC)) { 
                $title = $row['title'];
                $subtitle = $row['subtitle'];
                $user_name = $row['user_name'];
                $date = $row['created_at'];
               
                
                ?>
                    <div class="post-preview">
                        <a href="http://localhost/CMS_Web_Project-V1/clean-blog/posts/post.php?post_id=<?php echo $row['id'] ?>">
                            <h2 class="post-title"> <?php echo $title; ?>  </h2>
                            <h3 class="post-subtitle"> <?php echo $subtitle; ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"> <?php echo $user_name; ?></a>
                            
                            <?php
                            $new_date = date("F j, Y", strtotime($date));
                            echo $new_date; // Output: May 10, 2024
                            ?>

                        </p>
                    </div>
            
                    <?php  } ?>


                    <!-- Divider-->
                    <hr class="my-4" />
                    
             
                </div>
            </div>



            <!--categorie section !-->

         <div class="row gx-4 gx-lg-5 justify-content-center">
            <h3 class="text-center">Categories</h3>
            <br>
            <br>
            <br>
                <?php  while( $category =  $categories->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-md-6 ">
                    <a href="http://localhost/CMS_Web_Project-V1/clean-blog/categories/category.php?cat_id=<?php echo $category['id']; ?>">
                        <div class="alert alert-dark bg-dark text-center text-white" role="alert">
                        <?php echo $category['name'] ?> 

                        </div>
                    </a>
                    </div>

                <?php }?>
             </div>




<?php require "includes/footer.php";?>
