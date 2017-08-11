
var Cart = {

	getInstance : function(){
		var oldCart = localStorage.getItem('cart') || null ;
		var mycart = JSON.parse(oldCart);
		return new cartInstance(mycart);
	}

}

function cartInstance(oldCart){
	var self = this;
	this.passme = {
		items : {},
		totalQty : 0,
		totalPrice : 0
	}

	if (oldCart !== null) {

		this.passme.items = oldCart.items;
		this.passme.totalQty = oldCart.totalQty;
		this.passme.totalPrice = oldCart.totalPrice;
	}



	this.add = function(item, qty){

		if (item != null && qty > 0) {
			var storedItem = Item.itemInstance(item);

			if(Object.keys(this.passme.items).length > 0 ){

				if(item.id in this.passme.items){
					storedItem = this.passme.items[item.id];
				}
			}

			storedItem.qty += qty;
			storedItem.price = item.price * storedItem.qty;

	// return this.totalQty;
	this.passme.items[item.id] = storedItem;
	this.passme.totalPrice += item.price * qty;
	this.passme.totalQty += qty;
	localStorage.setItem('cart',JSON.stringify(this.passme)); 

	}
}

this.all = function(){
	if (this.passme) {
		return this.passme;
	}
}

this.reduce = function(item,qty){
// pass the item to be reduced and the quantity of items to be removed
if (Object.keys(this.passme.items).length > 0 
	&& this.passme.totalQty > 0 
	&& qty > 0 
	&& item != null
	&& this.getSubQty(item) > 1
	) {
	var storedItem = Item.itemInstance(item);
if (this.passme.items) {
	if (item.id in this.passme.items) {
// putting the incoming item into a variable
	storedItem = this.passme.items[item.id];
	}
}

// remove the specified quantity from the cart
	storedItem.qty -= qty;
	storedItem.price = item.price * qty;

	this.passme.items[item.id] = storedItem;
	this.passme.totalPrice -= item.price * qty;
	this.passme.totalQty -= qty;
	if(this.getSubQty(item) > 0){
		localStorage.setItem('cart',JSON.stringify(this.passme)); 
	}


	}
}

this.clear = function(){
	localStorage.clear('cart');
}

this.remove = function(item){
	if (item != null && item.id in this.passme.items) {

		this.passme.totalQty -= this.getSubQty(item);
		this.passme.totalPrice -= this.getSubPrice(item);
		var id = item.id;
		delete this.passme.items[id];
		localStorage.setItem('cart',JSON.stringify(this.passme));

	}
}

this.update = function(item,qty){
	if (qty > 0 && item != null && item.id in this.passme.items) {

		this.remove(item);
		this.add(item,qty);

	}
}


this.get = function(item){
	if(Object.keys(this.passme.items).length > 0 && item != null){
		return this.passme.items[item.id];
	}
}

this.getTotalQty = function(){
	return this.passme.totalQty;
}

this.getTotalPrice = function(){
	return this.passme.totalPrice;
}

this.getSubQty = function(item){
	if (item != null) {
		return this.passme.items[item.id].qty;
	}
}

this.getSubPrice = function(item){
		if (Object.keys(this.passme.items).length > 0 && item != null) {
			return this.passme.items[item.id].price;
		}
	}

}

var Item = {

	itemInstance : function(item){
		return new ItemInstance(item);
	}
}

function ItemInstance(item){
	this.qty = 0;
	this.price = item.price;
	this.item = item;

}

