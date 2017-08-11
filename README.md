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

//  Intialise the id and unit price

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

//  Intialise the id and unit price

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
``




