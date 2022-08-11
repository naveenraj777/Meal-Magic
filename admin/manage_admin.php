<?php include('partials/menu.php'); ?>


        <div class="main-content">
            <div class="wrapper">
           
                <h1>Manage Admin</h1><br>
               
             <?php 
            if(isset($_SESSION['delete'])){
              echo $_SESSION['delete']."<br>";
              unset($_SESSION['delete']);
            }
            ?>
            <?php 
            if(isset($_SESSION['update'])){
              echo $_SESSION['update']."<br>";
              unset($_SESSION['update']);
            }
            ?>
             <?php 
            if(isset($_SESSION['user-not-found'])){
              echo $_SESSION['user-not-found']."<br>";
              unset($_SESSION['user-not-found']);
            }
            ?>
             <?php 
            if(isset($_SESSION['pwd-not-match'])){
              echo $_SESSION['pwd-not-match']."<br>";
              unset($_SESSION['pwd-not-match']);
            }
            ?>
            <?php 
            if(isset($_SESSION['pwd-update'])){
              echo $_SESSION['pwd-update']."<br>";
              unset($_SESSION['pwd-update']);
            }
            ?>
                <a href="add_admin.php" class="btn1">Add Admin</a><br><br>
              <table class="tbl">
              <tr class="spl">
              <th>S.No</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Actions</th>
              </tr>
              <?php
              $sql = "SELECT * FROM table_admin";
              $res = mysqli_query($conn,$sql);
              $sn = 1;
              $count = mysqli_num_rows($res);
              if($count>0){
                while($rows = mysqli_fetch_assoc($res)){
                  $id = $rows['id'];
                  $fullname = $rows['fullname'];
                  $username = $rows['username'];
                  ?>
                  <tr>
                  <tr>
              <th><?php echo $sn++ ?></th>
              <th><?php echo $fullname; ?></th>
              <th><?php echo $username; ?></th>
              <th><a href="<?php echo SITEURL ?>/admin/change_password.php?id=<?php echo $id; ?>" class="btn1">ChangePassword</a>
                <a href="<?php echo SITEURL ?>/admin/update_admin.php?id=<?php echo $id; ?>" class="btn2">UpdateAdmin</a>
                  <a href="<?php echo SITEURL ?>/admin/delete_admin.php?id=<?php echo $id; ?>" class="btn3">DeleteAdmin</a></th>
              </tr>
                 <?php
                }
              }
              else{
                echo "ERROR";
              }
              ?>
              
              </table>
            </div>
        </div>
    <?php  include('partials/footer.php'); ?>