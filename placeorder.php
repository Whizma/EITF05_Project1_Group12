<?php echo file_get_contents("html/header.html");
welcomeUser();
if (isset($_POST['logout'])) {
    if (!empty($_SESSION["name"])) {
        logout();
        update();
        exit;
    }
}
//$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products_in_cart = isset($_SESSION['receipt']) ? $_SESSION['receipt'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {

    $array_product_ids = implode(",", array_keys($products_in_cart));
    // NOTE!!! Not safe
    $stmt = "SELECT * FROM product_table WHERE id IN ($array_product_ids)";
    $result = mysqli_query($conn, $stmt);
    $products = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}

?>
<div class="featured">
    <form action="index1.php?page=<?=$page?>" method="post">
        <input type="hidden" name="logout" value="hej">
        <input type="submit" value="Log out" onclick="logout()"> 
    </form>
</div>



<div class="placeorder">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
    <div class="address">
        <?php if (empty($_SESSION["name"])): ?>
            <form action ="index1.php?page=placeorder" method="post">
                Address: <input type = "text" name="address"><br>
            <input type ="submit">
        </form>
        <?php else:?>
        <p>Address: <?php echo $_SESSION["address"];?></p>

        <?php endif; ?>
    </div>
    <table>
    <h2>Receipt</h2>
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
                    <?php echo implode(",", array_keys($products_in_cart)); ?>
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
                    </td>
                    <td class="price">&dollar;<?=$product['price']?></td>
                    <td class="quantity"><?=$products_in_cart[$product['id']]?></td>
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
</div>

<?php echo file_get_contents("html/footer.html");?>





