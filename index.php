<?php
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

class node
{
	public $data = null;
	public $next = null;

	function __construct($new_data) {
		$this->data = $new_data;
		$this->next = null;
	}
	function get_node()
	{
		return $this->data;
	}
}
class linked_list
{
	private $head;
	private $last;
	function __construct() {
		$this->head = null;
		$this->last = null;
	}
	function add_to_list($data)
	{
		if($this->head == null)
		{
			$this->head = new Node($data);
			$this->last = $this->head;
		}
		else {
			$this->last->next = new Node($data);
		}
	}
	function delete_node_with_id($id)
	{
		if ($this->head == null)
		{
			return;
		}
		while($this->head && $this->head->data->id == $id)
		{
			$this->head = $this->head->next;
		}
		if ($this->head == null)
		{
			return;
		}
		$prev = $this->head;
		while($prev->next)
		{
			if ($prev->next->data->id == id) {
				$prev->next = $prev->next->next;
			}
		}
	}

}

	$product = new product(1, "", "test", 70);
	echo'
	<div class="product" id='.$product->id.'>
		<img src="pizza.png" class="image" alt="logo">
		<div class="description">'. $product->description .'</div>
		<span class="price">'. $product->price .'</span>
		<button class="add-to-cart">add to cart</button>
	</div>'
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
            <a href="home.html">Home</a>
            <a href="settings.html">Settings</a>
            <a href="about.html">About Us</a>
            <a href="help.html">Help</a>
            <a href="social.html">Social Media</a>
        </nav>
	</header>
	<div id="products">
		<div class="product" id="1">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="2">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="3">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="4">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="5">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="6">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="7">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="8">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<div class="product" id="9">
			<img src="pizza.png" class="image" alt="logo">
			<div class="description">Pizza</div>
			<span class="price">50</span>
			<button class="add-to-cart">add to cart</button>
		</div>
		<!-- Add more products as needed -->
	</div>
	<div id="cart">    <!-- cart items drop here-->    <p>total<span id="total">0</span></p></div>
	
	<div class="shopping-cart">receipt:</div>
</body>
</html>