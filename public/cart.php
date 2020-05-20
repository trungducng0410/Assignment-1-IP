<?php

$cart = $_SESSION['cart'];
$number_of_products = count($cart);
$hidden = isset($_GET['checkout']) ? 'hidden' : '';
$total = 0;

?>

<br>
<h1>Your Shopping Cart: </h1>
<br>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Unit price</th>
            <th scope="col">Unit quantity</th>
            <th scope="col">Required quantity</th>
            <th scope="col">Total cost</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['cart'] as $key => $item) { ?>
            <?php $total += $item['total_cost'] ?>
            <tr>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['unit_price']; ?></td>
                <td><?php echo $item['unit_quantity']; ?></td>
                <td><?php echo $item['required_quantity']; ?></td>
                <td><?php echo $item['total_cost']; ?> $</td>
                <td>
                    <form action=<?php echo ($_SERVER['REQUEST_URI']); ?> method="post">
                        <button class="btn btn-danger" type="submit" name="clear" value=<?php echo $key; ?> <?php echo $hidden; ?> onclick="return confirm('Do you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php }
        $_SESSION['total'] = $total; ?>
        <tr class="table-info">
            <td colspan="3">Number of products</td>
            <td colspan="3"><?php echo $number_of_products; ?></td>
        </tr>
        <tr class="table-info">
            <td colspan="3">Shopping cart total</td>
            <td colspan="3"><?php echo $total; ?> $</td>
        </tr>
    </tbody>
</table>
<br>
<div class="d-flex justify-content-end">
    <form action=<?php echo ($_SERVER['REQUEST_URI']); ?> method="post">
        <button class="btn btn-danger" type="submit" name="clear" value="all" <?php echo $hidden; ?> onclick="return confirm('Do you want to clear your shopping cart?')">Clear</button>
    </form>
    <a class="btn btn-success" href=<?php if (isset($category_id) && isset($product_id)) {
                                        echo ("./index.php?category_id={$category_id}&product_id={$product_id}&checkout=true");
                                    } elseif (isset($category_id) && !isset($product_id)) {
                                        echo ("./index.php?category_id={$category_id}&checkout=true");
                                    } else {
                                        echo ('./index.php?checkout=true');
                                    } ?> role="button" style="margin-left: 10px;" <?php echo $hidden; ?> onclick='return validateCheckout(<?php echo $number_of_products ?>)'>Checkout</a>
</div>
<br>

<script>
    function validateCheckout(number_item) {
        if (number_item == 0 || !(number_item)) {
            alert("Your shopping cart is empty, please select something!");
            return false;
        } else {
            return true;
        }
    }
</script>