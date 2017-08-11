# Cart

# Set Up

PHP developers

`include 'Cart.php';`

JS developers

`<script type="text/javascript" src="Cart.js"></script>`

# Create Product Objects

PHP developers


``` class Product{
    
    // (required) 
    // $id is the product id
    // $price is the product price
			public $id;
			public $price;  // product unit price
      
    // (optional) add optional product fields
      public $name;
}
    
$shirt = new Product();
$trousers = new Product();

$shirt->id = 1;
$shirt->price = 5.0;

$trousers->id = 5;
$trousers->price = 10.0;
   
```

JS developers 

```
    function Product(){
	this.id;
	this.price;
  }

var shirt = new Product();
var trousers = new Product();

shirt.id = 1;
shirt.price = 5.0;

trousers.id = 5;
trousers.price = 10.0;

```



