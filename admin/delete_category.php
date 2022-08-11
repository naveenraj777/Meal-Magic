<?php

include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    if($image_name!=""){
        $path = "../images/category/".$image_name;
        $remove = unlink($path);
        if($remove==false){
            $_SESSION['remove'] = "<div class='error'>Failed to remove image</div>" ;
            header("location:".SITEURL.'admin/manage_category.php');
            die();
        }
    }
    $sql = "DELETE FROM table_category WHERE id='$id'";

    $res = mysqli_query($conn,$sql);
    
    if($res== TRUE){
        ?>
        <script> alert("Category deleted successfully");
         window.location.href = "<?php echo SITEURL; ?>admin/manage_category.php ";
         </script>
         <?php
    }
    else{
        ?>
        <script> alert("Failed to delete category");
         window.location.href = "<?php echo SITEURL; ?>admin/manage_category.php ";
         </script>
         <?php
    }
}
else{
    header("location:".SITEURL.'admin/manage_category.php');
}

?>