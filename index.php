<?php
	include("classes.php");
	//next code for connectinng to the server
	$db_server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "projectDB";
	$conn = "";
	try{
		$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	}
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
	<link rel="icon" type="image/png" href="pizzeria_logo.png" />
	<link rel="stylesheet" href="style.css">
	<script defer src="index.js"></script>
</head>

<body>
	<header>
		<nav>
			<a href="index.php">Home</a>
			<a href="settings.php">Settings</a>
			<a href="#">About Us</a>
			<a href="#">Help</a>
			<a href="#">Social Media</a>
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
		$product = new product($row["p_id"], $row["p_image"], $row["p_name"], $row["p_price"]);
		echo'
		<div class="product" id='.$product->id.'>
			<img src='.$product->src.' class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>';
	}
		?>
		<!-- Add more products as needed -->
	</div>

	<div id="cart_container">
		
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
			echo'<div>caissier : <span id="caissier" data-id="'.$caissier["emp_id"].'">'.$caissier["emp_name"].'</span>
			<br>receipt #<span id="receipt_number">'.$receiptnbr.'</span></div>';
		?>
		<div id="cart">
			<!-- cart items drop here-->
		</div>
		<p>total<span id="total">0</span>dh</p>
		<button type="submit" onclick="get_receipt()">get receipt</button>
	</div>
</body>

</html>

<?php
	mysqli_close($conn);
?>