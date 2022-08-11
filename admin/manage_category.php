<?php include('partials/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1><br>
                
      <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add']."<br>";
            unset($_SESSION['add']);
        }
       ?>
         <?php 
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove']."<br>";
            unset($_SESSION['remove']);
        }
         ?>
         <?php 
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete']."<br>";
            unset($_SESSION['delete']);
        }
         ?>
         <?php 
        if(isset($_SESSION['no-category'])){
            echo $_SESSION['no-category']."<br>";
            unset($_SESSION['no-category']);
        }
         ?>
          <?php 
        if(isset($_SESSION['update'])){
            echo $_SESSION['update']."<br>";
            unset($_SESSION['update']);
        }
         ?>
         <?php 
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload']."<br>";
            unset($_SESSION['upload']);
        }
         ?>
           <?php 
        if(isset($_SESSION['failed-remove'])){
            echo $_SESSION['failed-remove']."<br>";
            unset($_SESSION['failed-remove']);
        }
         ?>
                <a href="add_category.php" class="btn1">Add Category</a><br><br>
                <table class="tbl">
              <tr class="spl">
              <th style="text-align:left">S.No</th>
              <th>Title</th>
              <th>Image Name</th>
              <th>Featured</th>
              <th>Active</th>
              <th>Actions</th>
              </tr>
              <?php
              $sql = "SELECT * FROM table_category";
              $res = mysqli_query($conn,$sql);
              $sn = 1;
              $count = mysqli_num_rows($res);
              if($count>0){
                while($rows = mysqli_fetch_assoc($res)){
                  $id = $rows['id'];
                  $title= $rows['title'];
                  $image_name = $rows['image_name'];
                  $featured = $rows['featured'];
                  $active = $rows['active'];
                  ?>
                  <tr>
                  <tr>
              <th><?php echo $sn++ ?></th>
              <th><?php echo $title; ?></th>
              <th><?php 

              if($image_name!=""){
                  ?>
                  <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                  <?php
              }
              else{
                  echo "<div class='error'>Image not added<div>";
              }
              
              ?></th>
              <th><?php echo $featured; ?></th>
              <th><?php echo $active; ?></th>
              <th><a href="<?php echo SITEURL ?>/admin/update_category.php?id=<?php echo $id ?>" class="btn2">UpdateCategory</a>
              <a href="<?php echo SITEURL ?>/admin/delete_category.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>" class="btn3">DeleteCategory</a></th>
              </tr>
                 <?php
                }
              }
              else{
                echo "No Categories available<br><br>";
              }
              ?>
              
              </table>
            </div>
        </div>
        
    <?php  include('partials/footer.php'); ?>