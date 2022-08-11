<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM table_admin WHERE id='$id'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $fullname = $row['fullname'];
        $username = $row['username'];
    }
    else{
        $_SESSION['no-category'] = "<div class='error'>No Admin found</div>";
        header("location:".SITEURL.'admin/manage_admin.php');
    }
}
else{
    header("location:".SITEURL.'admin/manage_admin.php');
}

?>

<div class="main-content">
            <div class="wrapper">
           
                <h1>Update Admin</h1><br>

                <form action="" method="post">
            Full Name : <input type="text" name="fullname" value="<?php echo $fullname; ?>"><br><br>
            User Name : <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input class="btn2" type="submit" value="Update Admin" name="submit">
        </form>

        <?php
        
        if(isset($_POST['submit'])){

            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];

            $sql2 = "UPDATE table_admin SET

            fullname =  '$fullname',
            username =  '$username'

            WHERE id='$id'
            ";

            $res2 = mysqli_query($conn,$sql2);

            if($res2 == TRUE){

                $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
                header("location:".SITEURL.'admin/manage_admin.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
                header("location:".SITEURL.'admin/manage_admin.php');
            }

        }


        ?>


            </div>
</div>

<?php include("partials/footer.php");
