<?php

$cart = $_SESSION['cart'];
$number_of_products = count($cart);
$total = 0;

?>

<br><br>
<h1>Your Shopping Cart: </h1>
<br><br>
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
                <td><a class="action" href="">Delete</a></td>
            </tr>
        <?php } ?>
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
    <form action=<?php
                    if (isset($category_id) && isset($product_id)) {
                        echo ("./index.php?category_id={$category_id}&product_id={$product_id}");
                    } elseif (isset($category_id) && !isset($product_id)) {
                        echo ("./index.php?category_id={$category_id}");
                    } else {
                        echo ('./index.php');
                    }
                    ?> method="post">
        <button class="btn btn-danger" type="submit" name="clear" value="clear" onclick="return confirm('Do you want to clear your shopping cart?')">Clear</button>
    </form>
    <a class="btn btn-success" href=<?php if (isset($category_id) && isset($product_id)) {
                                        echo ("./index.php?category_id={$category_id}&product_id={$product_id}&checkout=true");
                                    } elseif (isset($category_id) && !isset($product_id)) {
                                        echo ("./index.php?category_id={$category_id}&checkout=true");
                                    } else {
                                        echo ('./index.php?checkout=true');
                                    } ?> role="button" style="margin-left: 10px;">Checkout</a>
</div>