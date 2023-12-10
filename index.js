//this part to add an item to the cart
document.querySelectorAll('.add-to-cart').forEach(button => {
	button.addEventListener('click', addToCart);
});
function addToCart(event) {
	const button = event.target;
	const product = button.parentElement;
	const price = Number(product.querySelector('.price').innerText);
	const total = document.querySelector('#total');
	total.innerText = Number(total.innerText) + price;

	const cart = document.querySelector('#cart');
	const productName = product.querySelector('.description').innerText;
	const productImage = product.querySelector('.image').src;
	const productid = product.id;
	let cartItem = cart.querySelector(`[data-id='${productid}']`);

	if (cartItem) {
		const quantityElement = cartItem.querySelector('.quantity');
		quantityElement.innerText = Number(quantityElement.innerText) + 1;
	} else {
		cartItem = document.createElement('div');
		cartItem.setAttribute('data-id', productid);
		cartItem.classList.add('cart_item');
		cartItem.innerHTML = `
			${productName} - $${price} x <span class="quantity">1</span>
			<button class="remove-one">Remove One</button>
			<button class="remove-all">Remove All</button>
		`;

		cartItem.querySelector('.remove-one').addEventListener('click', () => removeFromCart(cartItem, price));
		cartItem.querySelector('.remove-all').addEventListener('click', () => removeAllOfItem(cartItem, price));
		cart.appendChild(cartItem);
	}
}
function removeFromCart(cartItem, price) {
	const total = document.querySelector('#total');
	total.innerText = Number(total.innerText) - price;

	const quantityElement = cartItem.querySelector('.quantity');
	const quantity = Number(quantityElement.innerText) - 1;

	if (quantity === 0) {
		cartItem.remove();
	} else {
		quantityElement.innerText = quantity;
	}
}
function removeAllOfItem(cartItem, price) {
	const total = document.querySelector('#total');
	const quantityElement = cartItem.querySelector('.quantity');
	const quantity = Number(quantityElement.innerText);

	total.innerText = Number(total.innerText) - price * quantity;
	cartItem.remove();
}

//this part for printing the receipt and adding it to the database
function get_receipt(){
    let cartItems = document.querySelectorAll(".cart_item");
    let data = [];
    cartItems.forEach((item) => {
        // Assuming each cart item has a data-id attribute with the product id
        let id = item.getAttribute('data-id');
        // Assuming each cart item has a quantity element
        let quantity = item.querySelector('.quantity').innerText;
        data.push({id: id, quantity: quantity});
    });

    // Add receipt number and employee ID to the data
    let employeeId = document.querySelector("#caissier").getAttribute("data-id");
    let receiptNumber = parseInt(document.querySelector("#receipt_number").innerHTML); 
    data.push({receiptNumber: receiptNumber, employeeId: employeeId});
	document.querySelector("#receipt_number").innerHTML = receiptNumber + 1;
    // Convert the data array to JSON
    let jsonData = JSON.stringify(data);
	console.log(jsonData);
    // Create a new XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "receipt_handler.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    // Define what happens on successful data submission
    xhr.onload = function(event){
        // Do something with the returned data (optional)
        console.log(event.target.responseText);
		//clears the cart
		let cartContainer = document.querySelector("#cart");
		while (cartContainer.firstChild) {
			cartContainer.removeChild(cartContainer.firstChild);
		}
	
		// Set the total to 0
		document.querySelector("#total").textContent = "0";
    };

    // Send the JSON data
    xhr.send(jsonData);
	
}