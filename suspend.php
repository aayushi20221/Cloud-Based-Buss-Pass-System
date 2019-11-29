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

<div>
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