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