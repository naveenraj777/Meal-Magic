<?php 
include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href= "css/style.css">
    <style> 
    .bg{
        background-image: url(https://th.bing.com/th/id/OIP.PT9jDIvuGJ3iYvsp8ZfCvgHaEK?w=324&h=182&c=7&o=5&dpr=1.5&pid=1.7);
        height:45vw;
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size:cover;
          image-resolution:inherit;
    }
      .main{
          
        
          text-align: center;
          
          
          display: flex;
    justify-content: center;
    align-items: center;
    }

    .text-left{
   
    padding-right: 20rem;
    }
    img {
  width: 40px;
  height: 40px;
  position: relative;
  top: 15px;
  margin-right: 10px;
  fill: #fff;
  
}
    .text-right{
    text-align: right;
    }
    .text-center{
    text-align: center;
    }
   
    ul{
        list-style: none;
        font-size: 20px;
        font-family: Verdana, Geneva, Tahoma, sans-serif ;
        
    }

    .logo{
        width:200px;
        height:200px;
        margin:-22%;
    }
    .link{
    color:black;
    background-color:cyan;
    padding:5px;
    border-radius:10px;
    border:1px solid black;
    font-size:15px;
}
.link:hover{
    color:white;
    background:linear-gradient(to top,indigo,cyan);
}
#color{
    color:maroon;
}
#color:hover{
    color:red;
}

       </style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    
   <div class="bg"> 
    <section class="navbar">
        <div class="container">
            

            <div class="menu text-right">
                <ul>
                    <li>
                        <a class="link" href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a class="link" href="<?php echo SITEURL ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a class="link" href="<?php echo SITEURL ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a class="link" href="<?php echo SITEURL ?>contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>