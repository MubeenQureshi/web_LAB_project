
<?php 
include ('connection.php');
session_start();
    if(!isset($_SESSION["USERNAME"]))
    {
      header("Location:..\User/login.php");
    }
$product_id=$_GET['id'];
$Query="SELECT* FROM product_data WHERE PRODUCT_ID=$product_id";
if ($connection->query($Query)) {
  echo "done";
  $getvalues=$connection->query($Query);
  $postvalues=mysqli_fetch_array($getvalues);
  # code...
}
else{
  echo "not done";
}




?>
<!DOCTYPE html>
<html>
<head>
  <title>Project</title>
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
<!--form for insert data into data base-->
	

	<h1 style="margin-left: 2%">ADD NEW PRODUCT</h1>
	<div class="row">
		<div class="col-md-7" style="margin-left: 2%">
			<form method="POST" enctype="multipart/form-data" >
				<div class="form-group">
			    <label >PRODUCT ID:</label>
			    <input type="text" name="product_id" class="form-control" value="<?php echo $postvalues['PRODUCT_ID'] ?>"  style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label >PRODUCT BRAND</label>
			    <input type="text" name="product_brand" class="form-control" value="<?php echo $postvalues['PRODUCT_BRAND'] ?>"  style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label >PRODUCT NAME</label>
			    <input type="text" name="product_name" class="form-control" value="<?php echo $postvalues['PRODUCT_NAME'] ?>"  style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label>PRODUCT PRICE:</label>
			    <input type="number" name="product_price" class="form-control" value="<?php echo $postvalues['PRODUCT_PRICE'] ?>" style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label>PRODUCT CODE:</label>
			    <input type="text" name="product_code" class="form-control" value="<?php echo $postvalues['PRODUCT_CODE'] ?>" style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label >PRODUCT WARRANTY</label>
			    <input type="number" name="product_warranty" class="form-control" value="<?php echo $postvalues['PRODUCT_WARRANTY'] ?>"  style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label>PRODUCT IN STOCK:</label>
			    <input type="radio" name="product_in_stock" value="1" checked="checked"  >YES
			    <input type="radio" name="product_in_stock" value="0"    >NO
			  </div>
			  <div class="form-group">
			    <label>PRODUCT DISCOUNT:</label>
			    <input type="number" name="product_discount" class="form-control" value="<?php echo $postvalues['PRODUCT_DISCOUNT'] ?>" style="width: 80%">
			  </div>
			  <div class="form-group">
			    <label>PRODUCT IMAGE:</label>
          <img src="..\UPLOADED_IMG/<?php echo $postvalues['PRODUCT_IMAGE'] ?>" width="100px;">
			    <span><?php echo $postvalues['PRODUCT_IMAGE']?></span><input type="file" name="product_img" value="" />
			  </div>
			 <h3 style="margin-left: 2%">PRODUCT DETAILS</h3><br>

			   <div class="form-group">
			   	<div class="form-group">
			    <label >PRODUCT INFO:</label><br>
			    <textarea name="product_info" rows="6" cols="50" value=""><?php echo $postvalues['PRODUCT_INFO'] ?></textarea>
			  </div>
			    <label >PRODUCT DISCRIPTIVE DETAILS:</label><br>
			    <textarea name="product_discriptive_detail" rows="6" cols="50" value=""><?php echo $postvalues['PRODUCT_DISCRIPTIVE_DETAIL'] ?></textarea>
			  </div>
			  <div class="form-group">
			    <label >PRODUCT KEY POINT:</label><br>
			    <textarea name="product_key_point" rows="6" cols="50" value=""><?php echo $postvalues['PRODUCT_KEY_POINT'] ?></textarea>
			  </div>
			  <div class="form-group">
			    <label >PRODUCT DETAIL:</label><br>
			    <textarea name="product_detail" rows="6" cols="50" value=""><?php echo $postvalues['PRODUCT_DETAIL'] ?></textarea>
			  </div>

			  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			</form>
		</div>
	</div>

	
	<?php 
	if (isset($_POST["submit"])) {
    
    


    if(empty($_FILES['product_img']['name'])){
      $ID=$postvalues['PRODUCT_ID'];
      
      $product_id=$_POST['product_id'];
      $product_brand=$_POST['product_brand'];
      $product_name=$_POST['product_name'];
      $product_price=$_POST['product_price'];
      $product_code=$_POST['product_code'];
      $product_warranty=$_POST['product_warranty'];
      $product_in_stock=$_POST['product_in_stock'];
      $product_discount=$_POST['product_discount'];
      $product_info=$_POST['product_info'];
      $product_discriptive_detail=$_POST['product_discriptive_detail'];
      $product_key_point=$_POST['product_key_point'];
      $product_detail=$_POST['product_detail'];

      $Query="UPDATE product_data SET PRODUCT_ID='$product_id',PRODUCT_NAME='$product_name',PRODUCT_BRAND='$product_brand',PRODUCT_PRICE='$product_price',PRODUCT_CODE='$product_code',PRODUCT_WARRANTY='$product_warranty',PRODUCT_IN_STOCK='$product_in_stock',PRODUCT_DISCOUNT='$product_discount',PRODUCT_INFO='$product_info',PRODUCT_KEY_POINT='$product_key_point',PRODUCT_DETAIL='$product_detail',PRODUCT_DISCRIPTIVE_DETAIL='$product_discriptive_detail' WHERE PRODUCT_ID ='$ID' ";

      if($connection->query($Query))
      {
        
        echo "<h2>Edit successfully</h2>";
      }
      else{
        echo "<h2>somthing want wrong</h2>";
      }

    }
    else{
      $ID=$postvalues['PRODUCT_ID'];
     
      
      $product_id=$_POST['product_id'];
      $product_brand=$_POST['product_brand'];
      $product_name=$_POST['product_name'];
      $product_price=$_POST['product_price'];
      $product_code=$_POST['product_code'];
      $product_warranty=$_POST['product_warranty'];
      $product_in_stock=$_POST['product_in_stock'];
      $product_discount=$_POST['product_discount'];
      $product_img=$_FILES['product_img']['name'];
      $product_info=$_POST['product_info'];
      $product_discriptive_detail=$_POST['product_discriptive_detail'];
      $product_key_point=$_POST['product_key_point'];
      $product_detail=$_POST['product_detail'];

      $target="..\UPLOADED_IMG/".basename($product_img);

      $Query="UPDATE product_data SET PRODUCT_ID='$product_id',PRODUCT_NAME='$product_name',PRODUCT_BRAND='$product_brand',PRODUCT_PRICE='$product_price',PRODUCT_CODE='$product_code',PRODUCT_WARRANTY='$product_warranty',PRODUCT_IN_STOCK='$product_in_stock',PRODUCT_DISCOUNT='$product_discount',PRODUCT_IMAGE='$product_img',PRODUCT_INFO='$product_info',PRODUCT_KEY_POINT='$product_key_point',PRODUCT_DETAIL='$product_detail',PRODUCT_DISCRIPTIVE_DETAIL='$product_discriptive_detail' WHERE PRODUCT_ID ='$ID' ";

      if($connection->query($Query))
      {
        
        echo "<h2>Edit successfully</h2>";
      }
      else{
        echo "<h2>somthing want wrong</h2>";
      }

      if(move_uploaded_file($_FILES['product_img']['tmp_name'],$target))
      {
        echo "upload";
      }
      else{
        echo "not uploaded";
      }
    }

    }





    

	 ?>
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

</body>
</html>