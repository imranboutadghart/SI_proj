<?php
	//next code tries to connect to the server
	$db_server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "projectDB";
	$conn = "";
	try{
		$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	}//if the connection fails:
	catch(mysqli_sql_exception $e)
	{
		echo"could not connect to database";
	}
	//connected here
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pizzeria</title>
	<link rel="icon" type="image/png" href="assets/pizzeria_logo.png" />
	<link rel="stylesheet" href="style.css">
	<script defer src="index.js"></script>
</head>

<body>
	<header>
		<nav>
			<a href="index.php" class="logo"><img src="assets/pizzeria_logo.png" alt="logo" class="logo"></a>
			<a href="index.php">Home</a>
			<a href="about.html">About Us</a>
			<a href="help.html">Help</a>
			<a style="display: hidden;"></a>
		</nav>
	</header>
	<div id="products">
		<?php
	$sql = "select * from products";
	try {
		$res = mysqli_query($conn, $sql);
	} catch (mysqli_sql_exception $th) {
	}
	while ($row = mysqli_fetch_assoc($res))
	{
		echo'
		<div class="product" id='.$row["p_id"].'>
			<img src='.$row["p_image"].' class="image" alt="logo">
			<div class="desc-price">
				<span class="description">'. $row["p_name"] .'</span>
				<span class="price">'. $row["p_price"] .'</span> <span class="currency">dh</span>
			</div>
			<button class="add-to-cart">add to cart</button>
		</div>';
	}
		?>
		<!-- Add more products as needed -->
	</div>

	<div id="cart_container">
		<div id="general" class="hidden">
			<h2 class="title">Pizerria de lux</h2>
			<h3 class="address">Marrakesh Semlalia</h3>
			<h3 class="tel">0612312345</h3>
			<p class="line hidden">-----------------------------------------------------------</p>
		</div>
		<?php
			try {
				$rescaissier = mysqli_query($conn, "select * from employee");
				$resreceipt = mysqli_query($conn, "select * from receipts order by receipt_id desc limit 1");
			} catch (mysqli_sql_exception $th) {
			}
			$caissier = mysqli_fetch_assoc($rescaissier);
			$receiptnbr = mysqli_fetch_assoc($resreceipt);
			if ($receiptnbr == null)
				$receiptnbr = 1;
			else 
				$receiptnbr = $receiptnbr["receipt_id"] + 1;
			echo'<div><h4>caissier : <span id="caissier" data-id="'.$caissier["emp_id"].'">'.$caissier["emp_name"].'</span>
			<br>receipt #<span id="receipt_number">'.$receiptnbr.'</span>
			<br><span class="hidden" id="receipt_time"></span></h4></div>';
		?>
		<div id="cart">
			<!-- cart items drop here-->
		</div>
		<p>total<span id="total">0</span>dh</p>
		<button type="submit" class="no-print" onclick="get_receipt()">get receipt</button>
	</div>
</body>
</html>

<?php
	mysqli_close($conn);
?>