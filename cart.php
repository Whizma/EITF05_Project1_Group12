<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    //Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = "SELECT * FROM product_table WHERE id = $product_id"; //OBS not safe
    // $stmt->bind_param("s", $product_id);
    $result = mysqli_query($conn, $stmt);
    //Fetch the product from the database and return the result as an Array
    $product = $result->fetch_all(MYSQLI_ASSOC);
    //Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index1.php?page=cart');
    // exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

function update() {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index1.php?page=cart');
} 

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    update();
    exit;
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $_SESSION['receipt'] = array();

    foreach (array_keys($products_in_cart) as $product_id) {
        $quantity = $products_in_cart[$product_id];
        if ($product_id && (int)$quantity > 0) {
            $_SESSION['receipt'][$product_id] = $quantity;
        }
    }
    // Remove items from cart
    $_SESSION['cart'] = array();
    header('Location: index1.php?page=placeorder');
    exit;
}

//Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    //There are products in the cart so we need to select those products from the database
    //Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    //$array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));

    $array_product_ids = implode(",", array_keys($products_in_cart));
    // NOTE!!! Not safe
    $stmt = "SELECT * FROM product_table WHERE id IN ($array_product_ids)";
    $result = mysqli_query($conn, $stmt);
    // // Fetch the product from the database and return the result as an Array
    $products = $result->fetch_all(MYSQLI_ASSOC);
    // // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}

if (isset($_POST['logout'])) {
    if (!empty($_SESSION["name"])) {
        logout();
        update();
        exit;
    }
}

?>
<?php 
echo file_get_contents("html/header.html"); 
welcomeUser();
?>


<div class="featured">
    <form action="index1.php?page=<?=$page?>" method="post">
        <input type="hidden" name="logout" value="hej">
        <input type="submit" value="Log out" onclick="logout()"> 
    </form>
</div>



<div class="cart">
    <h1>Shopping Cart</h1>
    <form action="index1.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index1.php?page=product&id=<?=$product['id']?>">
                            <img src="images/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index1.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="index1.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">

        </div>
    </form>
</div>

<?php echo file_get_contents("html/footer.html");?>