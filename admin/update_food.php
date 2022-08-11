
<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];  
    $sql1 = "SELECT * FROM table_food WHERE id='$id'";
    $res1 = mysqli_query($conn,$sql1);

        $row = mysqli_fetch_assoc($res1);
        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_category = $row['category_id'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];

}
else{
    header("location:".SITEURL.'admin/manage_food.php');
}

?>
       <div class="main-content">
            <div class="wrapper">
           
                <h1>Update Food</h1><br>
<form action="" method="post" enctype="multipart/form-data">
<table class="smalltbl txt-center">
               <tr> <th> Title : </th>
               <th> <input type="text" name="title" class="inputbox1" value="<?php echo $title; ?>"></th>
               </tr>
               <tr> <th>Description: </th>
               <th> <textarea rows="4" cols="50" name="description" class="inputbox1" ><?php echo $description; ?></textarea></th>
               </tr>
               <tr> <th> Price : </th>
               <th> <input type="number" name="price"  class="inputbox1"  value="<?php echo $price; ?>"></th>
               </tr>
               <tr>
                   <th>Current image:</th>
                   <th>
                      <?php
                      if($current_image!=""){
                          ?>
                          <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
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
               <tr>
               <th>Category</th>
               <th>
               <select name="category1">
               <?php 

               $sql2 = "SELECT * FROM table_category WHERE active='Yes'";

               $res2 = mysqli_query($conn,$sql2);

               $count = mysqli_num_rows($res2);

               if($count>0){

                while($row2 = mysqli_fetch_assoc($res2)){
                    $category_id = $row2['id'];
                    $title = $row2[  'title'];
                   
                    ?>
                    <option <?php if($current_category == $category_id){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $title; ?></option>
                    <?php
                }
               }
               else{
                   ?>
                   <option value="0">No Categories found</option>
                   <?php
               }


               ?>
               
                 </select>
               </th>
            </tr>
            <tr> <th> Featured: </th>
            <th> <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" id="Yes" value="Yes"> <label for="Yes">Yes</label>
                 <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" id="No" value="No"> <label for="No">No</label>        
            </th>
            </tr>
            <tr> <th> Active: </th>
            <th><input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" id="yes"value="Yes"> <label for="yes">Yes</label>
                <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" id="no" value="No"> <label for="no">No</label>
            </th>
        </tr> 
        <tr>
        <th colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            
                <input type="submit" value="Update Food" name="submit" class="btn2">
            </th>
        </tr>
</table>
        </form>
        <?php

        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category1'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];
                if($image_name!=""){
                    $ext = end(explode('.',$image_name));
                    $image_name = "Food_name_".rand(000,999).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/food/". $image_name;
        
                    $upload = move_uploaded_file($source_path,$destination_path);
                    if($upload == FALSE){
                        $SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        header("location:".SITEURL.'admin/manage_food.php');
                        die();
                    }
                    if($current_image!=""){
                        $remove_path = "../images/food/".$current_image;
                        $remove = unlink($remove_path);
                        if($remove==FALSE){
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove the current image</div>";
                            header("location:".SITEURL.'admin/manage_food.php');
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


            $sql3 = "UPDATE table_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
            WHERE id=$id
            ";


            $res3 = mysqli_query($conn,$sql3);

            if($res3 == TRUE){
                $_SESSION['update'] = "<div class='success'>Food updated successfully</div>";
                header("location:".SITEURL.'admin/manage_food.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to update Food</div>".mysqli_error($conn);
                header("location:".SITEURL.'admin/manage_food.php');
            }
        

        }
            

           

        ?>

        </div>
    </div>
        <?php  include('partials/footer.php'); ?>