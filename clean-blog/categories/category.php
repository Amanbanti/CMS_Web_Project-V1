<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>




<?php 
     $posts = $conn->prepare("SELECT * FROM posts");
     $posts->execute(); 


    
?>


            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                <?php //echo 'Hello ' .$_SESSION['username'] ?>
                    <!-- Post preview-->

                            <?php 
                            if(isset($_GET['cat_id'])){
                                $cat_id=$_GET['cat_id'];
                                while($row = $posts->fetch(PDO::FETCH_ASSOC)) { 
                                    if( $cat_id == $row['category_id']){
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
                                   
                                
                            
                            
                                    <?php }
                                
                                } 
                               
                                
                                
                            }else{
                                header ("location :http//localhost/CMS_Web_Project-V1/clean-blog/404.php");
                            }?>


                    <!-- Divider-->
                    <hr class="my-4" />
                    
             
                </div>
            </div>






<?php require "../includes/footer.php";?>
