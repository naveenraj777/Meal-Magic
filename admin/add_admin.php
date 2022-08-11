<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper">
    <h1 class="spl">Add Admin</h1><br>
    <?php 
            if(isset($_SESSION['add'])){
              echo "<h4 class='spl'>".$_SESSION['add']."</h4>";
              unset($_SESSION['add']);
            }
            ?><br>
        <form action="" method="post">
            <table class='smalltbl text-center'>
                <tr>
            <th>Full Name :</th> <th><input type="text" name="fullname" class="inputbox1" placeholder="Enter your name"><br><br></th></tr>
            <tr>
            <th>
            User Name :</th> <th><input type="text" name="username" class="inputbox1" placeholder="Enter your username"><br><br></th></tr>
            <tr>
           
            <th> Password  : </th> <th> <input type="password" name="password" class="inputbox1" placeholder="Enter your password"><br><br></th> </tr>
            <tr> <th  colspan="2"> <input class="btn2" type="submit" value="Add Admin" name="submit"></th></tr>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php"); ?>

<?php 

if(isset($_POST['submit'])){

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "INSERT into table_admin SET
            fullname = '$fullname',
            username = '$username',
            password = '$password'
            ";
    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==TRUE){
        ?>
                        <script> alert("Admin added successfully!!!");
                         window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
                         </script>
                         <?php
    }
    else{
        ?>
        <script> alert("Failed to add admin");
         window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
         </script>
         <?php
    }
}
   ?>