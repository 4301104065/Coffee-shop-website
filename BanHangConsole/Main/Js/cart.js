if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded',ready);
}
else {
    ready()
}
function ready() {
    var quantityInputs = document.getElementsByClassName('cart-quantity-input');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change',quantityChanged);
    }
}
function quantityChanged(event) {
    UpdateCartTotal();
}
function UpdateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = document.getElementsByClassName('cart-row');
    var name=[];
    var quantity=[];
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var quantityElement=cartRow.getElementsByClassName('cart-quantity-input')[0];
        var nameElement=quantityElement.name;
        nameElement=nameElement.replace('quantity[','');
        nameElement=nameElement.replace(']','');
        name.push(nameElement);
        var price=parseFloat(priceElement.innerText);
        quantity.push(quantityElement.value);
    }
    window.location.href="index.php?page=Cart&id="+name+"&quantity="+quantity;
}