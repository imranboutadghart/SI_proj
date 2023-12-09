<?php
include("database.php");
class product
{
	public $id = null;
	public $src = null;
	public $description = null;
	public $price = null;
	function __construct($n_id, $n_src, $n_description, $n_price) {
		$this->id = $n_id;
		$this->src = $n_src;
		$this->description = $n_description;
		$this->price = $n_price;
	}
	function get_product() {
		return $this;
	}
}
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
	<form action="settings.php" method="post">
		<h3>product title <br><input type="text" value=""><br></h3><br>
		<h3>product picture <br><input type="file" value=""><br></h3><br>
		<h3>product price <br><input type="text" value=""><br></h3><br>
		<h3><br><input type="submit" value="sumbit new product"><br></h3><br>
	</form>
		<!-- <?php
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?> -->
	
</body>
</html>