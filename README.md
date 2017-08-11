# Cart

# Set Up

PHP developers
`include 'Cart.php';`
JS developers
`<script type="text/javascript" src="Cart.js"></script>`
# Create Product Objects
PHP developers
```
class Product{
    // required fields
    
	public $id;           // product id
	public $price;        // product unit price
      
    // add optional product fields
      public $name;
}
    
$shirt = new Product();
$trousers = new Product();

//  Set the id and unit price

$shirt->id = 1;
$shirt->price = 5.0;

$trousers->id = 5;
$trousers->price = 10.0;
```
JS developers 
```
    function Product(){
    // required fields
    
	this.id;            // product id
	this.price;         // product unit price
	
    // add optional fields
  }

var shirt = new Product();
var trousers = new Product();

//  Set the id and unit price

shirt.id = 1;
shirt.price = 5.0;

trousers.id = 5;
trousers.price = 10.0;
```
In both cases the `id` and `price` fields are required

No need going through all this if product is coming from a database, the product should just have the `id` and `price` field

Thats it!

# Add To Cart
PHP Developers
```
 // add 2 shirts to cart
 Cart::getInstance()->add($shirt,2);
```
JS Developers
```
   // add 2 shirts to cart
  Cart.getInstance().add(shirt, 2);
```
# Retrieve all items in Cart
PHP Developers
```
Cart::getInstance()->all();
```
JS Developers
```
Cart.getInstance().all();
```
# Reduce a cart item
PHP Developers
```
// reduce shirt by 1
Cart::getInstance()->reduce(shirt,1);
```
JS Developers
```
// reduce shirt by 1
Cart.getInstance().reduce(shirt, 1);
```
# Get a cart item
PHP Developers
```
Cart::getInstance()->get($shirt);
```
JS Developers
```
Cart.getInstance().get(shirt);
```
# Get total quantity of items in cart
PHP Developers
```
Cart::getInstance()->getTotalQty();
```
JS Developers
```
Cart.getInstance().getTotalQty();
```
# Get total price of items in cart
PHP Developers
```
Cart::getInstance()->getTotalPrice();
```
JS Developers
```
Cart.getInstance().getTotalPrice();
```
# Get product sub quantity
PHP Developers
```
Cart::getInstance()->getSubQty($shirt);
```
JS Developers
```
Cart.getInstance().getSubQty(shirt);
```
# Get product sub price
PHP Developers
```
Cart::getInstance()->getSubPrice($shirt);
```
JS Developers
```
Cart.getInstance().getSubPrice(shirt);
```
# Remove an item from cart
PHP Developers
```
Cart::getInstance()->remove($shirt)
```
JS Developers
```
 Cart.getInstance().remove(trousers)
```
# Update an item in the cart
PHP Developers
```
\\ clear shirt quantity and set it to 3
Cart::getInstance()->update($shirt,3)
```
JS Developers
```
\\ clear shirt quantity and set it to 3
Cart.getInstance().update(shirt,3);
```
# Clear Cart
PHP Developers
```
Cart::getInstance()->clear()
```
JS Developers
```
Cart.getInstance().clear()
```
# Get last item in to cart
PHP Developers
```
Cart::getInstance()->getLastItem()
```
# Get first item in to cart
PHP Developers
```
Cart::getInstance()->getFirstItem()
```


