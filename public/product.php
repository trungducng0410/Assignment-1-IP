<?php
$product = get_product_by_id($product_id);
?>

<br><h1>Product Detail:</h1>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Unit price</th>
            <th scope="col">Unit quantity</th>
            <th scope="col">In Stock</th>
            <th scope="col">Quantity</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo $product['unit_price']; ?></td>
            <td><?php echo $product['unit_quantity']; ?></td>
            <td><?php echo $product['in_stock']; ?></td>
            <td>
                <form name="add_form" action='<?php echo ("index.php?category_id={$category_id}&product_id={$product_id}"); ?>' method="post" onsubmit="return validateForm()">
                    <input name='quantity' type='number' value='1' min='1' max=<?php echo $product['in_stock'] ?>>
                    <button type='submit' class='btn btn-primary' style="margin-left: 5px;">Add to cart</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

<script>
    function validateForm() {
        var value = document.forms["add_form"]["quantity"].value;
        if (value == "" || value == 0) {
            alert("Pleased enter requried quantity");
            return false;
        }
        if (value > 50) {
            alert("You buy too much in once time");
            return false;
        } else {
            return true;
        }
    }
</script>