<?php
include('../config/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM table_admin WHERE id='$id'";

$res = mysqli_query($conn,$sql);

if($res == TRUE){
    ?>
    <script> alert("Admin deleted successfully!!!");
     window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
     </script>
     <?php
}

else{
    ?>
    <script> alert("Failed to delete Admin");
     window.location.href = "<?php echo SITEURL; ?>admin/manage_admin.php ";
     </script>
     <?php
}

?>