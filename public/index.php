<?php require('../private/database.php') ?>

<?php
session_start();
$db = db_connect();

$checkout = $_GET['checkout'] == 'true' ? true : false;

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $detail_visible = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['clear'])) {
        unset($_SESSION['cart']);
    }
    if (isset($_POST['quantity'])) {
        $product = get_product_by_id($product_id);
        $product_name = $product['product_name'];
        $unit_price = $product['unit_price'];
        $unit_quantity = $product['unit_quantity'];
        $stock = $product['in_stock'];
        $required_quantity = $_POST['quantity'];
        if (!isset($_SESSION['cart'])) {
            $total_cost = $required_quantity * $unit_price;
            $cart_item = ['product_name' => $product_name, 'unit_price' => $unit_price, 'unit_quantity' => $unit_quantity, 'required_quantity' => $required_quantity, 'total_cost' => $total_cost];
            $cart = [$product_id => $cart_item];
            $_SESSION['cart'] = $cart;
        } else {
            if (isset($_SESSION['cart'][$product_id])) {
                $cart_item = $_SESSION['cart'][$product_id];
                $cart_item['required_quantity'] += $required_quantity;
                if ($cart_item['required_quantity'] > $stock) {
                    echo ("<script type='text/javascript'>alert('Out of stock');</script>");
                } else {
                    $cart_item['total_cost'] = $cart_item['required_quantity'] * $cart_item['unit_price'];
                    $_SESSION['cart'][$product_id] = $cart_item;
                }
            } else {
                $cart = $_SESSION['cart'];
                $total_cost = $required_quantity * $unit_price;
                $cart_item = ['product_name' => $product_name, 'unit_price' => $unit_price, 'unit_quantity' => $unit_quantity, 'required_quantity' => $required_quantity, 'total_cost' => $total_cost];
                $cart[$product_id] = $cart_item;
                $_SESSION['cart'] = $cart;
            }
        }
    }
}



?>
<!-- Bootstrap template - https://getbootstrap.com -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Grocery Store</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php include('./nav/navigation.php'); ?>
            </div>
            <div class="col">
                <div>
                    <?php if (!$checkout) {
                        if ($detail_visible) {
                            include('./product.php');
                        }
                    }
                    ?>
                </div>
                <div>
                    <?php if (isset($_SESSION['cart'])) {
                        include('./cart.php');
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>