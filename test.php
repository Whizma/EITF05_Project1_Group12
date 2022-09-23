
<?php echo file_get_contents("html/header.html");?>
<?php
echo "Hello World";
?>

<section> 

<h2> body section  hej </h2>

</section>

<article class=basket> 
    <h4> basket </h4>
    <?php
        
        
      if(array_key_exists('button1', $_POST)) {
        echo "Item removed";
      } else if(array_key_exists('button_add', $_POST)) {
        echo "Item added";
      }



      function toggle_button () {
        static $button_state = 0;
        if ($button_state) {
            $button_state = 0;
        } else {
            $button_state = 1;
        }
      }
  ?>

    <article class=shopping-item> 
        <h3> this is a item </h3>
        <form method="post">
        <input type="submit" name="button1"
                value="remove item"/>
                <input type="submit" name="button_add"
                value="add item"/>
    </form>
    
    </article>
</article>


<?php echo file_get_contents("html/footer.html");?>