
<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM table_category WHERE id='$id'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
    else{
        $_SESSION['no-category'] = "<div class='error'>No category found</div>";
        header("location:".SITEURL.'admin/manage_category.php');
    }
}
else{
    header("location:".SITEURL.'admin/manage_category.php');
}

?>
       <div class="main-content">
            <div class="wrapper">
           
                <h1>Update Category</h1><br>
<form action="" method="post" enctype="multipart/form-data">
            <table class="smalltbl txt-center">
               <tr> <th> Title : </th>
               <th> <input type="text" name="title" placeholder="Enter the title here" class="inputbox1" value="<?php echo $title; ?>"></th>
               </tr>
               <tr>
                   <th>Current image:</th>
                   <th>
                      <?php
                      if($current_image!=""){
                          ?>
                          <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                          <?php
                      }
                      else{
                          echo "<div class='error'>Image not added</div>";
                      }
                      ?>
                   </th>
               </tr>
               <tr>
                   <th>Select image:</th>
                   <th>
                       <input type="file" name="image">
                   </th>
               </tr>
            <tr> <th> Featured: </th>
            <th> <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" id="Yes" value="Yes"> <label for="Yes">Yes</label>
                 <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" id="No" value="No"> <label for="No">No</label>        
            </th>
            </tr>
            <tr> <th> Active: </th>
            <th><input  <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" id="yes" value="Yes"> <label for="yes">Yes</label>
                <input  <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" id="no" value="No"> <label for="no">No</label>
            </th>
        </tr> 
        <tr>
            <th colspan="2">
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Update Category" name="submit" class="btn2">
            </th>
        </tr>
</table>
        </form>
        <?php

        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];
                if($image_name!=""){
                    $ext = end(explode('.',$image_name));
                    $image_name = "Food_Category_".rand(000,999).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/". $image_name;
        
                    $upload = move_uploaded_file($source_path,$destination_path);
                    if($upload == false){
                        $SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        header("location:".SITEURL.'admin/manage_category.php');
                        die();
                    }
                    if($current_image!=""){
                        $remove_path = "../images/category/".$current_image;
                        $remove = unlink($remove_path);
                        if($remove==FALSE){
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove the current image</div>";
                            header("location:".SITEURL.'admin/manage_category.php');
                            die();
                        }
                    }
            }
            else{
                $image_name = $current_image;
            }
        }
            else{
                $image_name = $current_image;
            }

            $sql2 = "UPDATE table_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE id='$id'
            ";

            $res2 = mysqli_query($conn,$sql2);

            if($res2 == TRUE){
                $_SESSION['update'] = "<div class='success'>Category updated successfully</div>";
                header("location:".SITEURL.'admin/manage_category.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to update category</div>".mysqli_error($conn);
                header("location:".SITEURL.'admin/manage_category.php');
            }
        }



        ?>

        </div>
    </div>
        <?php  include('partials/footer.php'); ?>