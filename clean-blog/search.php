<?php require "includes/header.php";?>
<?php require "config/config.php";?>


<?php 


if(isset($_POST['search'])){
    if($_POST['search'] == ''){
        echo '<div class="alert bg-warning text-center text-center text-white" role="alert">
        Type something!
            </div>';
          
    }else{
        $search = $_POST['search'];
        $data = $conn -> query("SELECT * FROM posts WHERE title LIKE '%$search%' AND status = 1 ");

        $data->execute();
        if($data-> rowCount() == 0){
            echo '<div class="alert bg-warning text-center text-center text-white" role="alert">
            No Search is found!
                </div>';
        }

       
    }
}



?>

<div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

            <?php   if(!$_POST['search'] == ''){?>
                <div><?php echo $data-> rowCount() ?> posts are found!</div>
            <?php } ?>

            <?php 


        if(!$_POST['search'] == ''){
            if($data-> rowCount() > 0){
                while( $row =$data->fetch(PDO:: FETCH_ASSOC)) { 
                    $title = $row['title'];
                    $subtitle = $row['subtitle'];
                    $user_name = $row['user_name'];
                    $date1 = $row['created_at'];
                
                    
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
                                $new_date = date("F j, Y", strtotime($date1));
                                echo $new_date; // Output: May 10, 2024
                                ?>

                            </p>
                        </div>
                
                        <?php  } } }?>


                    <!-- Divider-->
                    <hr class="my-4" />
                    
             
                </div>
            </div>



<?php require "includes/footer.php";?>