<?php
    include("connection.php");
    if(isset($_POST['pass_id'])){
        $id = $_POST['pass_id'];
        $password = $_POST['password'];
        $result = mysql_query("select * from pass where id = '$id'");
		$row = mysql_fetch_array($result);
        if($row['password']!=$password)
        {
            header("Location: manage2.php");
            
        }
        $body="initial";
    } else {
        $id="";
        $body="none";
    }
?>

<html>
    <head>
        
            <title>Cloud Based Bus Pass System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

        
        <style>
            .pass_body{
                display: <?php echo $body; ?>;
            }
            
     
	@media print {
	  .print {
		display: none;
	  }
	  footer{
		display: none;
	  }
	}
            
        </style>
    </head>
    <body>
          <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Travelers</a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.html">Home</a>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="manage.php">Manage Pass</a></li>
                  <li><a href="bus_details.html">Bus Details</a></li>
              </ul>
            </nav>
          </div>

        </div>
      </div>
      
    </header>
              
              
              <div class="site-blocks-cover inner-page-cover print" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">Manage Pass</h1>
              <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Mange Pass</span></div>
              
            </div>
          </div>
        </div>
      </div>  


        <left>
            <form class="print" action="manage.php" method="post" style="margin-top:75px; margin-left: 75px">
            ID: <input type="text" id="pass_id" style="height:35px; margin-right: 15px;" name="pass_id" value="<?php echo $id; ?>" required>
            PASSWORD: <input type="password" id="pass_id" style="height:35px;" name="password" required> <input type="submit" class="btn btn-primary py-1 px-5 text-white" value="Search">
        </form>
              </left>
              
              <p style="color: red; margin-left: 100px;">*Incorrect Id / Password</p>
        <br/>
        <div class="pass_body">
                <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
            <div class="p-4 mb-3 bg-white">
              
                <p class="mb-0 font-weight-bold" style="float: left;">Id &nbsp &nbsp</p>
                <p class="mb-4">
                    <?php
						echo $row['id'];
					?>
                </p>
                
              <p class="mb-0 font-weight-bold" style="float: left;">Name &nbsp &nbsp</p>
                <p class="mb-4">
                    <?php
						echo $row['name'];
					?>
                </p>

              <p class="mb-0 font-weight-bold" style="float: left;">Mobile &nbsp &nbsp</p>
              <p class="mb-4">
					<?php
						echo $row['contact'];
					?>
                </p>

              <p class="mb-0 font-weight-bold" style="float: left;">Email Address &nbsp &nbsp</p>
              <p class="mb-4">
					<?php
						echo $row['email'];
					?>
                </p>
                
                <div>
                <p class="mb-0 font-weight-bold" style="float: left;">Valid Till &nbsp &nbsp</p>
              <p class="mb-4">
					<?php
						echo $row['date'];
					?>
                </p>
                <form class="print" action="renew.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="date" style="margin-right: 75px; width:200px; height:35px" min="<?php echo $row['date']; ?>" required name="new_date">
                    <input type="submit" class="btn btn-primary py-1 px-5 text-white" style="width: 200px" value="Renew Pass">
                </form>
                
                    
                </div>
                
                
                <p class="mb-0 font-weight-bold" style="float: left;">From - To &nbsp &nbsp</p>
              <p class="mb-4">
                GLA University - 
				<?php
						echo $row['dest'];
					?>
                </p>
                
                
                <p class="mb-0 font-weight-bold" style="float: left;">Amount Paid &nbsp &nbsp</p>
              <p class="mb-4">
					<?php
						echo $row['paid'];
					?>
                </p>


                <table>
                    <tr>
                        <td>
                <form class="print" action="suspend.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" style="width: 200px" class="btn btn-primary py-1 px-5 text-white" value="Suspend Pass">
                </form>
                        </td>
                        <td>
                <button class="print btn btn-primary py-1 px-5 text-white" style="width: 200px; margin-bottom:15px; margin-left: 75px;" onclick="window.print()">Print Pass</button>
                    
                        </td>
                    </tr>
                </table>
            </div>
            
            </div>
        </div>
      </div>
    </div>

        </div>
              
                      <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Travelers</h3>
              <p>Provides student a pass for their daily life to travel to/from GLA University, Mathura</p>
            </div>

            
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0" style="margin-left: auto;">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              
            </div>

            

          </div>

                    
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            </p>
          </div>
          
        </div>
      </div>
    </footer>
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

    </body>
</html>