<?php
    include("connection.php");
	date_default_timezone_set("Asia/Kolkata");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $result = mysql_query("select * from pass where id = '$id'");
		$row = mysql_fetch_array($result);
		$nod = round((strtotime($row['date']) - time())/(60*60*24))+1;
	}
?>

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

<div style="padding-block: 50px; margin-left:50px;">
Refund has been initiated and 

Rs. 
<?php
	$dest = $row['dest'];
	$price = mysql_fetch_assoc(mysql_query("select price from destination where name = '$dest'"))['price'];
	$amt = $price * $nod;
	echo $amt;
	mysql_query("UPDATE pass SET paid = paid - '$amt' WHERE id = '$id'");
	mysql_query("UPDATE pass SET date = CURDATE() WHERE id = '$id'");
?> will be Credited to your account in 3-4 working days.
</div>

<form action="index.html">

    <input type="submit"class="btn btn-primary py-1 px-5 text-white" style="width: 200px; margin-left: 50px" value="Home">
    
</form>