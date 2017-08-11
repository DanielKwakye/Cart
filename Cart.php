<?php
/*
Shopping Cart Library by Danny Kay
All Rights Reserved
dannykay.developer@gmail.com
*/
session_start();

class Cart
{
	private  $items = [];
	private  $totalQty = 0;
	private  $totalPrice = 0;


	function __construct($oldCart)
	{
// fill the cart with old cart items
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public static function getInstance(){
		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		return new Cart($oldCart);
	}

	public function add($item, $qty){

		if ($qty > 0 && $item != null ) {

			$storedItem = Item::newInstance($item);
			if (!empty($this->items)) {
				if (array_key_exists($item->id, $this->items)) {
// putting the incoming item into a variable
					$storedItem = $this->items[$item->id];
				}
			}
// increase cart items, price and quantity
			$storedItem->qty += $qty;
			$storedItem->price = $item->price * $storedItem->qty;
			$this->items[$item->id] = $storedItem;
			$this->totalPrice += $item->price * $qty;
			$this->totalQty += $qty;	
			$_SESSION['cart'] = $this;	
		}
	}

	public function clear(){
		unset($_SESSION['cart']);
	}


	public function reduce($item, $qty)
	{
// pass the item to be reduced and the quantity of items to be removed
		if (!empty($this->items) 
			&& $this->totalQty > 0 
			&& $qty > 0 
			&& $item != null 
			&& array_key_exists($item->id, $this->items)
			&& $this->getSubQty($item) > 1
			) {
			$storedItem = Item::newInstance($item);
		if ($this->items) {
			if (array_key_exists($item->id, $this->items)) {
// putting the incoming item into a variable
				$storedItem = $this->items[$item->id];
			}
		}


// remove the specified quantity from the cart
		$storedItem->qty -= $qty;
		$storedItem->price = $item->price * $storedItem->qty;
		$this->items[$item->id] = $storedItem;
		$this->totalPrice -= $item->price * $qty;
		$this->totalQty -= $qty;

		if($this.getSubQty($item) > 0){
			$_SESSION['cart'] = $this;	
		}	

	}
}

public function update($item, $qty){
// update cart items

	if ($qty > 0 && $item != null && array_key_exists($item->id, $this->items)) {
		$this->remove($item);
		$this->add($item, $qty);
	}


}

public function remove($item){

	if ($item != null && array_key_exists($item->id, $this->items)) {
		$this->totalQty -= $this->getSubQty($item);
		$this->totalPrice -= $this->getSubPrice($item);
		unset($this->items[$item->id]);
		$_SESSION['cart'] = $this;

	}

}

public function all(){
	if(!empty($this->items)){
		return $this;
	}
}

public function get($item){
	if(!empty($this->items) && $item != null){
		return $this->items[$item->id];	
	}
}

public function getLastItem(){
	if (!empty($this->items)) {
		return end($this->items);
	}
}

public function getFirstItem(){
	if (!empty($this->items)) {
		return reset($this->items);
	}
}

public function getTotalQty(){
	return $this->totalQty;
}

public function getTotalPrice(){
	return $this->totalPrice;
}

public function getSubQty($item){
	if (!empty($this->items) && $item != null && array_key_exists($item->id, $this->items)) {
		return $this->items[$item->id]->qty;
	}
}

public function getSubPrice($item){
	if (!empty($this->items && $item != null && array_key_exists($item->id, $this->items))) {
		return $this->items[$item->id]->price;
	}
}

}


class Item
{
	public $qty = 0;
	public $price = 0;
	public $item = null;

	function __construct($item)
	{
		$this->price = $item->price;
		$this->item = $item;
	}

	public static function newInstance($item){
		return new Item($item);
	}
}




