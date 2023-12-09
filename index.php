<?php
include("database.php");
include("classes.php");
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
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?><?php
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?><?php
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?><?php
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?><?php
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?>
		<?php
		echo'
		<div class="product" id='.$product->id.'>
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">'. $product->description .'</div>
			<span class="price">'. $product->price .'</span>
			<button class="add-to-cart">add to cart</button>
		</div>'
		?>
		<!-- Add more products as needed -->
	</div>
	<div id="cart">    <!-- cart items drop here-->    <p>total<span id="total">0</span></p></div>
	
	<div class="shopping-cart">receipt:</div>
</body>
</html>