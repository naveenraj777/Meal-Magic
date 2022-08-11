<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
       
        <form action="" method="post" enctype="multipart/form-data">
            <table class="smalltbl txt-center">
               <tr> <th> Title : </th>
               <th> <input type="text" name="title" placeholder="Enter the title here" class="inputbox1"></th>
               </tr>
               <tr> <th>Description: </th>
               <th> <textarea rows="4" cols="50" name="description" placeholder="Enter the Description here" class="inputbox1"></textarea></th>
               </tr>
               <tr> <th> Price : </th>
               <th> <input type="number" name="price" placeholder="Enter the Price here" class="inputbox1"></th>
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
               <select name="category">
               <?php 

               $sql = "SELECT * FROM table_category WHERE active='Yes'";

               $res = mysqli_query($conn,$sql);

               $count = mysqli_num_rows($res);

               if($count>0){

                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                   
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
            <th> <input type="radio" name="featured" id="Yes" value="Yes"> <label for="Yes">Yes</label>
                 <input type="radio" name="featured" id="No" value="No"> <label for="No">No</label>        
            </th>
            </tr>
            <tr> <th> Active: </th>
            <th><input type="radio" name="active" id="yes"value="Yes"> <label for="yes">Yes</label>
                <input type="radio" name="active" id="no" value="No"> <label for="no">No</label>
            </th>
        </tr> 
        <tr>
            <th colspan="2">
                <input type="submit" value="Add Food" name="submit" class="btn2">
            </th>
        </tr>
</table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
            }
            else{
                $featured = "No";
            }
            if(isset($_POST['active'])){
                $active= $_POST['active'];
                }
                else{
                    $active = "No";
                }
     

        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            if($image_name!=""){
            $ext = end(explode('.',$image_name));
            $image_name = "Food_name_".rand(000,999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/food/". $image_name;

            $upload = move_uploaded_file($source_path,$destination_path);
            if($upload == false){
                $SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                header("location:".SITEURL.'admin/add_food.php');
                die();
            }
        }
    }
        else{
            $image_name = "";
        }
        
        $sql2 = "INSERT INTO table_food SET
        title = '$title',
        description = '$description',
        price = '$price',
        image_name = '$image_name',
        category_id = '$category',
        featured = '$featured',
        active = '$active'
        ";

        $res2 = mysqli_query($conn,$sql2);

        if($res2==TRUE){
            ?>
            <script> alert("Food added succesfully");
             window.location.href = "<?php echo SITEURL; ?>admin/manage_food.php ";
             </script>
             <?php
        }
        else{
            ?>
            <script> alert("Failed to add food");
             window.location.href = "<?php echo SITEURL; ?>admin/add_food.php ";
             </script>
             <?php
        }
    }
        ?>
    </div>
</div>

<?php include("partials/footer.php"); ?>