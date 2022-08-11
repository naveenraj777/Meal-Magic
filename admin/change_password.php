<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1><br>
        
        <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">


        <table class="tbl1">
            <tr>
                <th>Current password :</th>
                <th><input type="password" name="current_password" placeholder="Current Password"></th>
            </tr>
            <tr>
                <th>New password :</th>
                <th><input type="password" name="new_password" placeholder="New Password"></th>
            </tr>
            <tr>
                <th>Confirm New password :</th>
                <th><input type="password" name="con_password" placeholder="New Password"></th>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <th colspan="2"><input class="btn2" type="submit" name="submit" value="Change Password"></th>
            </tr>
        </table>
        </form>


        <?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];  
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['con_password']);


    $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$current_password'";
    $res = mysqli_query($conn,$sql);
    if($res == TRUE){
    $count = mysqli_num_rows($res);
if($count == 1)
    {
        if($new_password ==  $confirm_password)
        {
        $sql2 = "UPDATE table_admin SET
        password = '$new_password'
        WHERE id=$id
         "; 

            $res2 = mysqli_query($conn,$sql2);
            if($res2 == TRUE)
            {
                ?>
                <script> alert("Password updated succesfully");
                 window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
                 </script>
                 <?php
            }
            else
            {
                ?>
                <script> alert("Failed to update password");
                 window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
                 </script>
                 <?php
            }
        }
        else{
            ?>
            <script> alert("No admin found");
             window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
             </script>
             <?php
        }
    }
    else{
        ?>
                <script> alert("User not found");
                 window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
                 </script>
                 <?php
    }
  }
}


?>

    </div>
</div>

<?php include('partials/footer.php'); ?>