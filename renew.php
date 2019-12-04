<?php
    include("connection.php");
	date_default_timezone_set("Asia/Kolkata");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
		$new_date = $_POST['new_date'];
        $result = mysql_query("select * from pass where id = '$id'");
		$row = mysql_fetch_array($result);
		
		mysql_query("UPDATE pass SET date = '$new_date' WHERE id = '$id'");
		$nod = round((strtotime($new_date) - strtotime($row['date']))/(60*60*24))+1;
	}
?>


<!DOCTYPE html>
<html lang="en">
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
                <li><a href="manage.php">Manage Pass</a></li>
                  <li><a href="bus_details.html">Bus Details</a></li>
              </ul>
            </nav>
          </div>

        </div>
      </div>
      
    </header>
<style>
      
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  padding: 5px 20px 15px 20px;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
    
    input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
    
      </style>
  

   

    <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">Book Your Pass</h1>
              <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Pass</span></div>
              
            </div>
          </div>
        </div>
      </div>  


    
    <div class="row" style="margin-right: auto; margin-left: auto">
  <div class="col-75">
    <div class="container">
      <form action="invoice.php" method="post">

        <div class="row">
          <div class="col-50">
            <h3><br>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <img src="https://img.icons8.com/ios/50/000000/visa.png">
              <img src="https://img.icons8.com/cute-clipart/64/000000/mastercard.png">
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
			  <div>Rs. 
				<?php
					$dest = $row['dest'];
					$price = mysql_fetch_assoc(mysql_query("select price from destination where name = '$dest'"))['price'];
					$amt = $price * $nod;
					echo $amt;
				?>
			  </div>
            </div>
			<input type="hidden" value="<?php echo $id ?>" name="id">
			<input type="hidden" value="<?php echo $amt ?>" name="amt">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" value="<?php echo $row['name']; ?>">
            <label for="ccnum">Card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="YYYY">
              </div>
                
                <div class="col-50">
                <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="MM">
                </div>
              </div>
              <label for="cvv">CVV</label>
                <input type="password" id="cvv" name="cvv" placeholder="***">
          </div>

        </div>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
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