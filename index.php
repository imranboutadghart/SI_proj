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
	catch(mysqli_sql_exception)
	{
		echo"could not connect to database";
	}
	//connected here
	$product = new product(1, "", "test", 70);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pizzeria</title>
	<link rel="icon" type="image/png" href="pizzeria_logo.png"/>
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
	$res = mysqli_query($conn, $sql);
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
	<div id="cart">    <!-- cart items drop here-->    <p>total<span id="total">0</span></p></div>
	
	<div class="shopping-cart">receipt:</div>
</body>
</html>

<?php
	mysqli_close($conn);
?>