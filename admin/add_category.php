<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <?php 

        if(isset($_SESSION['add'])){
            echo $_SESSION['add']."<br>";
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload']."<br>";
            unset($_SESSION['upload']);
        }
    ?><br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="smalltbl txt-center">
               <tr> <th> Title : </th>
               <th> <input type="text" name="title" placeholder="Enter the title here" class="inputbox1"></th>
               </tr>
               <tr>
                   <th>Select image:</th>
                   <th>
                       <input type="file" name="image">
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
                <input type="submit" value="Add Category" name="submit" class="btn2">
            </th>
        </tr>
</table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
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
            $image_name = "Food_Category_".rand(000,999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/". $image_name;

            $upload = move_uploaded_file($source_path,$destination_path);
            if($upload == false){
                $SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                header("location:".SITEURL.'admin/add_category.php');
                die();
            }
        }
    }
        else{
            $image_name = "";
        }
        
        $sql = "INSERT INTO table_category SET
        title = '$title',
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'
        ";

        $res = mysqli_query($conn,$sql);

        if($res==TRUE){
            ?>
            <script> alert("Category added succesfully");
             window.location.href = "<?php echo SITEURL; ?>admin/manage_category.php ";
             </script>
             <?php
        }
        else{
            ?>
            <script> alert("Failed to add category");
             window.location.href = "<?php echo SITEURL; ?>admin/manage_category.php ";
             </script>
             <?php
        }
    }
        ?>
    </div>
</div>

<?php include("partials/footer.php"); ?>