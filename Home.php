<?php 
    include ('connection.php');
    session_start();
    if(!isset($_SESSION["USERNAME"]))
    {
      header("Location:..\User/login.php");
    }
    $Query="SELECT* FROM product_data";
    $Query2="SELECT* FROM slider_img";
    $getvalues=$connection->query($Query);
    $getslider=$connection->query($Query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="my_scripts/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="my_scripts/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="my_scripts/style.css">

  <style type="text/css">
    a{
      text-decoration:none;
    }
    p{
      text-align: center;
    }
    li a{
      font-size: 17px;
    }
    b{
      font-size: 20px;
    }
    h5{
      color: white;
    }
    .footer_icon a img:hover{
      border-radius: 50%;
     background-color: red; 



    }
    .col-md-4 a{
      text-decoration:none;
      color: black;
    }
    .col-md-4 img{
      width: 300px;
      height: 148.828px;
    }
    .item img{
      width: 100%;
      margin-top: 20px;
      
      
    }
    .card{
      margin-left: 22px; 
      margin-right: 22px;"

    }

   
  </style>
  
</head>
<body>
<!--Hearder-->
  <header>
  <!-- NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark add">
      <a class="navbar-brand" href="#"><img src="img/logo1.png" width="150" height="80" style="margin-top: -25px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarTogglerDemo02" style="margin-top: 20px;">
        <ul class="navbar-nav mr-auto navbar-right">
          <li class="nav-item active">
            <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_new_product.php">Add New Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="All_products.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_new_Admin.php">Add New Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Complains.php">Complains</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>
           <li class="nav-item">
              <form class="form-inline my-2 my-lg-0 ">
                <input class="form-control mr-sm-2" type="search"  placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0"  type="submit" style="font-size: 15px;">Search</button>

              </form>
                <ul class="navbar-nav mr-auto  navbar-right  icons"  >
                  <li class="nav-item active icons">
                    <a class="nav-link" href="#"><img  src="img/insta.png" width="30px" height="30px" style="margin-left: 15px; margin-bottom:0px;"></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="#"><img  src="img/fb.png" width="30px" height="30px" style="margin-left: 15px;"></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="#"><img  src="img/whatsapp.png" width="30px" height="30px" style="margin-left: 15px;"></a>
                  </li>
                   <li class="nav-item" >
                    <a class="nav-link" href="#"><img src="img/twitter.png" width="30px" height="30px" style="margin-left: 15px;"></a>
                  </li>
                </ul>
        

            
          </li>
        </ul>

      </div>

    </nav>
  </header>
  <center><h2 >welcome <?php echo $_SESSION["USERNAME"];?></h2></center>


<!-- BANNAR SLIDER-->
    <div style="margin-left: 1%; margin-right: 1%"  >
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="border: 2px solid black;">
    <!-- Indicators -->
      <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">




          <?php
          $i=0;
            while ($postslider=mysqli_fetch_array($getslider)) 
            {
              if($i==0)
              	{
          		?>
                <div class="item active">
          		<?php 
     			}
     			else
      			{
      			?>
                <div class="item">
                <?php 
            	}
            	?>

            <img class="img-fluid" src="..\UPLOADED_IMG/<?php echo $postslider['SLIDER_IMG'] ?>" alt="...">
              <div class="carousel-caption">
                <center>
	                <button class="btn btn-warning" onclick="add_slider()">Add New</button>
	                <button class="btn btn-danger" onclick="delete_s(<?php echo $postslider['ID'] ?>)">Delete</button>  
                </center>
              </div>
          </div>
          	<?php 
          	$i++; 
      		}
      		?>
          ...
        </div>
        <?php
       		if($i==0)
        	{
        ?>
        <center><button class="btn btn-warning" onclick="add_slider()">Add Banner</button></center>
        <?PHP  
      		}
      	?>
     </div>
    </div>


<!--PRODUCT SECTION-->
    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row">
          <!--PHP code for display data in home page-->
          <?php
            while ($postvalues=mysqli_fetch_array($getvalues)) 
            	{
            	?>
              <div class="col-md-4">
                <center><a onclick="display_row(<?php echo $postvalues['PRODUCT_ID'] ?>)" ><img src="..\UPLOADED_IMG/<?php echo $postvalues['PRODUCT_IMAGE'] ?>" width="300px;"></a></center>
            
                <div class="card mb-4 shadow-sm" >
                  <div class="card-body" >
                    <p class="card-text" style="text-align: center;"><?php echo $postvalues['PRODUCT_NAME'] ?><br><center><span style="color: green"><b><?php echo "Rs "; echo $postvalues['PRODUCT_PRICE'] ?></b></center>
                    </p>
                      <center>
                        
                    <button class="btn btn-warning" onclick="edit_row(<?php echo $postvalues['PRODUCT_ID'] ?>)">Edit</button>
                    <button class="btn btn-danger" onclick="delete_row(<?php echo $postvalues['PRODUCT_ID'] ?>)" >Delete</button>
                  </center>

                  </div>
                </div>
              </div>
          <?php }?>
         
        </div>
      </div>
    </div>


  <!--FOOTER-->
    <footer class="pt-4 my-md-5 pt-md-5 border-top " style="background-color: #212529;">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="img/logo1.png" alt="" width="100" height="60">
        <small class="d-block mb-3 text-muted" style="margin-left: 10px;">&copy; 2020-2020</small>
      </div>
      <div class="col-4 col-md" style="margin-left: 10px;">
        <h5 >Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">New Arival</a></li>
          <li><a class="text-muted" href="#">Offers</a></li>
          
        </ul>
      </div>
    
      <div class="col-4 col-md" style="">
        <h5>Brands</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">HP</a></li>
          <li><a class="text-muted" href="#">Intel</a></li>
          <li><a class="text-muted" href="#">Dell</a></li>
          <li><a class="text-muted" href="#">AMD</a></li>
        </ul>
      </div>
      <div class="col-3 col-md" style="">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>

    </div>
    <center><p style="color: white;font-size: 10px;">Need help? Or Any Query Feel Free To Contact us at 03XX-XXXXXXX or write to us   Info@somthing.pk<br>
        Call/Sms For Stock Confirmation/Queries.<br>
      Online prices and selection generally match our retail store, but may vary. Prices and offers are subject to change.<br>
      No Guarantee For Stock.<br><br><br>
 
            Copyright © 2020 www.somthing.pk. All rights reserved.<br>
            Follow us on [FaceBook] to stay updated.<br><br>
          </p></center>
    
     <div class="footer_icon"><center><a  href="#"><img  src="img/instab2.png" width="25px" height="25px" style="margin-left: 40px;"></a>
      <a  href="#"><img  src="img/fbb.png" width="25px" height="25px" style="margin-left: 40px;"></a>
      <a  href="#"><img  src="img/whatsappb.png" width="25px" height="25px" style="margin-left: 40px;;"></a>
      <a  href="#"><img  src="img/twitterb.png" width="25px" height="25px" style="margin-left: 40px;"></a>
      </center>
      </div>
      <div style="height: 10px;"></div>
    </footer>

<script type="text/javascript" src="my_scripts/jquery.min.js"></script>
  <script type="text/javascript" src="my_scripts/bootstrap.min.js"></script>
  <script>
      function delete_row(id)
      {
        if(confirm("Are you sure you want to delete"))
        {
          window.location.href="delete.php?id="+id+" ";
        }
      }

      function delete_s(id)
      {
        if(confirm("Are you sure you want to delete"))
        {
          window.location.href="delete_slider.php?id="+id+" ";
        }
      }
      function edit_row(id)
      {
        if(confirm("Are you sure you want to edit"))
        {
          window.location.href="edit.php?id="+id+" ";
        }
      }
       function display_row(id)
      {
        
          window.location.href="each_product.php?id="+id+" ";
        
      }
      function add_slider()
      {
        window.location.href="Add_slider.php";

      }
    </script>
</body>
</html>
