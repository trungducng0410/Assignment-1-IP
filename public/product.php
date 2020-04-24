<?php
$product = get_product_by_id($product_id);
echo "<br><br><h1>Product Detail:</h1>";
echo ("<strong>Product ID:</strong> {$product['product_id']}<br>");
echo ("<strong>Product Name:</strong> {$product['product_name']}<br>");
echo ("<strong>Unit Price:</strong> {$product['unit_price']} $<br>");
echo ("<strong>Unit Quantity:</strong> {$product['unit_quantity']}<br>");
echo ("<strong>In Stock:</strong> {$product['in_stock']}<br>");
echo ("<form name='add_form' action='index.php?category_id={$category_id}&product_id={$product_id}' method='post' onsubmit='return validateForm()'>");
echo ("<strong>Quantity: </strong><input name='quantity' type='number' value='1' min='1' max={$product['in_stock']}><br><br>");
echo ("<button type='submit' class='btn btn-primary'>Add to cart</button>");
echo ("</form>");
?>

<script>
    function validateForm() {
        var value = document.forms["add_form"]["quantity"].value;
        if (value == "" || value == 0) {
            alert("Pleased enter requried quantity");
            return false;
        } if (value > 50) {
            alert("You buy too much in once time");
            return false;
        } else {
            return true;
        }
    }
</script>