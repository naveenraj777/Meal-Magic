<?php include('partials-front/menu.php'); ?>
               
    
    <section class="food-search text-center">
        <div class="container">

        
            
            <form action="<?php echo SITEURL.'food-search.php'; ?>" method="POST">
                <input type="search" name="search" placeholder="Search for Food..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

                $sql = "SELECT * FROM table_category WHERE active='Yes' AND featured='Yes' LIMIT 3 ";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count>0){

                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $image_name = $row['image_name'];
                        $title = $row['title'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                if($image_name==""){
                                    echo "<div class='error'>Image not found</div>";
                                }
                                else{
                                    ?>
                                       <img src="<?php echo SITEURL.'images/category/'.$image_name; ?>"  class="img-responsive img-curve" width="300px" height="350px">
                                    <?php
                                }
                                ?>

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        <?php
                    }
                }
                else{

                    echo "<div class='error'>No category found</div>";
                }

        ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
   
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            
            $sql2 = "SELECT * FROM table_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            $res2 = mysqli_query($conn,$sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2 > 0){

                while($row = mysqli_fetch_assoc($res2)){
                    $id = $row['id'];
                    $title =  $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                <div class="food-menu-box">
                  <div class="food-menu-img">
                   
              
                <?php

                if($image_name == ""){
                    echo "<div class='error'>Image not available</div>";
                }
                
                else{
                    ?>

                     <img src="<?php echo SITEURL.'images/food/'.$image_name; ?>"  class="img-responsive img-curve" width="30px" height="100px">
                    <?php
                }
                
                ?>
               </div>
                    <div class="food-menu-desc">
                    <h4><?php echo $title; ?> </h4>
                    <p class="food-price"><?php echo '₹'.$price; ?></p>
                    <p class="food-detail">
                    <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                    <?php
                }
            }
            else{
                echo "<div class='error'>Food not available</div>";
            }


            ?>

 
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL ?>foods.php">See All Foods</a>
        </p>
    </section>
    

    <?php include('partials-front/footer.php'); ?>