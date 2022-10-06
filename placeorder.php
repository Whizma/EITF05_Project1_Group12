<?php echo file_get_contents("html/header.html");
welcomeUser();
if (isset($_POST['logout'])) {
    if (!empty($_SESSION["name"])) {
        logout();
        update();
        exit;
    }
}
?>
<div class="featured">
    <form action="index1.php?page=<?=$page?>" method="post">
        <input type="hidden" name="logout" value="hej">
        <input type="submit" value="Log out" onclick="logout()"> 
    </form>
</div>



<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
    
</div>

<?php echo file_get_contents("html/footer.html");?>





