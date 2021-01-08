<?php 
    include ('connection.php');
    session_start();
    if(!isset($_SESSION["USERNAME"]))
    {
      header("Location:..\User/login.php");
    }
    $product_id=$_GET['id'];
    $Query="SELECT* FROM product_data where PRODUCT_ID=".$product_id." ";
    $getvalues=$connection->query($Query);
    $postvalues=mysqli_fetch_array($getvalues)
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cosair Case</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="my_scripts/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="my_scripts/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="my_scripts/style.css">

  <style type="text/css">
    a
    {
      text-decoration:none;
    }
    
    li a
    {
      font-size: 17px;
    }
    b
    {
      font-size: 20px;
    }
    h5
    {
      color: white;
    }
    .footer_icon a img:hover
    {
      border-radius: 50%;
     background-color: red; 
    }
    .col-md-4 a
    {
      text-decoration:none;
      color: black;
    }
    .col-md-4 img
    {
      width: 300px;
      height: 148.828px;
    }
    .item img
    {
      width: 100%;
      margin-top: 20px; 
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
            <a class="nav-link" href="Add_new_product.php">ADD New Product</a>
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


<!--Product Img and Details-->
  <div class="container">
    <div class="row">
  		<div class="col-md-6" >
        <h3 style="padding-left: 20px"><b><?php echo $postvalues['PRODUCT_INFO'] ?></b></h3>
  			<img src="..\UPLOADED_IMG/<?php echo $postvalues['PRODUCT_IMAGE'] ?>" width="100%" height="auto">
  		</div>
      <div class="col-md-6" style="margin-top: 50px;">
        <!--///// First heading of the product -->
        <div>
           <p><?php echo $postvalues['PRODUCT_NAME']?>
            </p>
        </div>
        <!--///// 2nd heading of the product -->
        <div>
          <ul>
            <?php 
            $str=$postvalues['PRODUCT_KEY_POINT'];
            $size=strlen($str);
            $j=0;
            for ($i=0; $i <$size ; $i++) {
            if($j==0)
            {
              echo "<li>";
              $j=1;

            } 
            if ($str[$i]!=","){
              echo $str[$i];
              # code...
            }
            else{
              echo "</li>";
              $j=0;
              # code...
            }
            }

            ?>
          </ul>
        </div>

        <div>
          <span>Brand:</span>
          <span><?php echo $postvalues['PRODUCT_BRAND']?></span>
        </div>

        <div>
        <span>Warranty: </span>
        <span ><?php echo $postvalues['PRODUCT_WARRANTY'] ?>

        -Year</span>
        </div>

        <div>
          <span>Availability:</span>
          <span>
            <?php
            if($postvalues['PRODUCT_IN_STOCK']==1)
            {
              echo "In Stock";


            }
            else
            {
              echo "Not In Stock";
            }
            ?>
          </span>
        </div>

        <div>
          <span>Rs. <?php echo $postvalues['PRODUCT_PRICE']?></span>
        </div>
      </div>
    </div>

    <div class="row">
		  <div class="col">
			 <h4><strong>Product Details</strong></h4>
		    <div style="box-sizing: border-box; font-size: inherit; max-width: 100%; width: 800px; font-family: inherit !important;">
          <p>
            <?php echo $postvalues['PRODUCT_DETAIL']?>
           
          </p>
        </div><br style="box-sizing: border-box;" />
        <ul style="box-sizing: border-box; margin: 0px; list-style: none; padding-right: 0px; padding-left: 0px;">

          <?php
        


            $str=$postvalues['PRODUCT_DISCRIPTIVE_DETAIL'];
           
            $size=strlen($str);
      
      
          

            for ($i=0; $i <$size ; $i++) {
              if($str[$i]!=',')
              {
                echo $str[$i];
              }
              else{
                echo "<br>";
              } 
              # code...
            }
  
            
          ?>


          
        </ul>
      </div>
		</div>
	</div>
 <!--END OF Product Img and Details-->




  <script type="text/javascript" src="my_scripts/bootstrap.min.js"></script>
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

</body>
</html>