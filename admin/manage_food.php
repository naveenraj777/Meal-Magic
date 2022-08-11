<?php include('partials/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Food</h1><br>
           <?php 
            if(isset($_SESSION['upload'])){
              echo $_SESSION['upload']."<br><br>";
              unset($_SESSION['upload']);
            }
            ?>
          <?php 
            if(isset($_SESSION['add'])){
              echo $_SESSION['add']."<br><br>";
              unset($_SESSION['add']);
            }
          ?>
           <?php 
            if(isset($_SESSION['remove'])){
              echo $_SESSION['remove']."<br><br>";
              unset($_SESSION['remove']);
            }
          ?>
           <?php 
            if(isset($_SESSION['delete'])){
              echo $_SESSION['delete']."<br><br>";
              unset($_SESSION['delete']);
            }
          ?>
          <?php 
            if(isset($_SESSION['no-food'])){
              echo $_SESSION['no-food']."<br><br>";
              unset($_SESSION['no-food']);
            }
          ?>
          <?php 
            if(isset($_SESSION['upload'])){
              echo $_SESSION['upload']."<br><br>";
              unset($_SESSION['upload']);
            }
          ?>
          <?php 
            if(isset($_SESSION['failed-remove'])){
              echo $_SESSION['failed-remove']."<br><br>";
              unset($_SESSION['failed-remove']);
            }
          ?>
          <?php 
            if(isset($_SESSION['update'])){
              echo $_SESSION['update']."<br><br>";
              unset($_SESSION['update']);
            }
          ?>
                <a href="add_food.php" class="btn1">Add Food</a><br><br>
        
        <table class="tbl">
              <tr class="spl">
              <th style="text-align:left">S.No</th>
              <th>Title</th>
              <th>Price</th>
              <th>Image Name</th>
              <th>Featured</th>
              <th>Active</th>
              <th>Actions</th>
              </tr>
              <?php
              $sql = "SELECT * FROM table_food";
              $res = mysqli_query($conn,$sql);
              $sn = 1;
              $count = mysqli_num_rows($res);
              if($count>0){
                while($rows = mysqli_fetch_assoc($res)){
                  $id = $rows['id'];
                  $title= $rows['title'];
                  $price = $rows['price'];
                  $image_name = $rows['image_name'];
                  $featured = $rows['featured'];
                  $active = $rows['active'];
                  ?>
                  <tr>
                  <tr>
              <td><?php echo $sn++ ?></td>
              <td><?php echo $title; ?></td>
              <td><?php echo "₹".$price; ?></td>
              <td><?php 

              if($image_name!=""){
                  ?>
                  <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                  <?php
              }
              else{
                  echo "<div class='error'>Image not added<div>";
              }
              
              ?></td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
              <td><a href="<?php echo SITEURL ?>/admin/update_food.php?id=<?php echo $id ?>" class="btn2">UpdateFood</a><br><br>
              <a href="<?php echo SITEURL ?>/admin/delete_food.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>" class="btn3">DeleteFood</a></td>
              </td>
                 <?php
                }
              }
              else{
                echo "No Foods available<br><br>";
              }
              ?>
              
              </table>
            </div>
        </div>
        
    <?php  include('partials/footer.php'); ?>