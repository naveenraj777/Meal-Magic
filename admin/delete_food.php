<?php

include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    if($image_name!=""){
        $path = "../images/food/".$image_name;
        $remove = unlink($path);
        if($remove==false){
            $_SESSION['remove'] = "<div class='error'>Failed to remove image</div>" ;
            header("location:".SITEURL.'admin/manage_food.php');
            die();
        }
    }
    $sql = "DELETE FROM table_food WHERE id='$id'";

    $res = mysqli_query($conn,$sql);
    
    if($res== TRUE){
        ?>
        <script> alert("Food deleted successfully");
         window.location.href = "<?php echo SITEURL; ?>admin/manage_food.php ";
         </script>
         <?php
    }
    else{
        ?>
        <script> alert("Failed to delete food");
         window.location.href = "<?php echo SITEURL; ?>admin/manage_food.php ";
         </script>
         <?php
    }
}
else{
    header("location:".SITEURL.'admin/manage_food.php');
}

?>