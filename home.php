<?php 

echo file_get_contents("html/header.html");
// Get products
$stmt = "SELECT * FROM product_table";
$result = mysqli_query($conn, $stmt);
$products = $result->fetch_all(MYSQLI_ASSOC);
echo "This is home";
?>

<div class="featured">
    <h2>Products</h2>
    <p>Description</p>
</div>
<div class="product content-wrapper">
    <h2>Our Products</h2>
    <div class="products">
    <?php foreach ($products as $product): ?>
        <a href="index1.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="images/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">&dollar;<?=$product['price']?></span>

            <form action="index1.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="5" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?php echo file_get_contents("html/footer.html");?>