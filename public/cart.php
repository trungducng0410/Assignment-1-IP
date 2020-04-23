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