<?php
	include('connection.php');
  session_start();
    if(!isset($_SESSION["USERNAME"]))
    {
      header("Location:..\User/login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Adding Slider</title>
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
  <form method="POST" enctype="multipart/form-data" >
  	<div class="form-group">
  	<label>INSERT IMAGE FOR SLIDER:</label><input type="file" name="slider_img">
  	</div>
  	 <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
  </form>
  <?php
  	if (isset($_POST["submit"])){

  			$slider_img=$_FILES['slider_img']['name'];

  			$target="..\UPLOADED_IMG/".basename($slider_img);
  			$Query="INSERT INTO slider_img (SLIDER_IMG)  VALUES('$slider_img')";
  			if($connection->query($Query))
  			{
  				
  			}
  			else
        {
  				echo "Somthing want wrong";

  			}
  			if(move_uploaded_file($_FILES['slider_img']['tmp_name'],$target))
  			{
  				echo "Upload";
  			}
  			else
        {
  				echo "Not uploaded";
  			}
		
  	}
  ?>



</body>
</html>