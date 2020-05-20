<?php

$current_url = $_SERVER['REQUEST_URI'];
$new_url = substr($current_url, 0, -14);
function sendEmail($post_array)
{
    $order_number = time();
    $name = $post_array['first_name'] . ' ' . $post_array['last_name'];
    $email = $post_array['email'];
    $address = $post_array['address'] . ', ' . $post_array['suburb'] . ', ' . 
               $post_array['state'] . ', ' . $post_array['country'] . ', ' . $post_array['postcode'];
    $subject = "Order confirmation";
    $msg = "
    Dear {$name}, \n
    Your order {$order_number} has been confirmed and will be shipped to {$address}. The total cost is {$_SESSION['total']}$
    ";
    mail($email, $subject, $msg);
    unset($_SESSION['cart']);
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $success = sendEmail($_POST);
}

?>

<br>
<?php if (isset($success)) { ?>
    <p>Thanks for your purchasing from our store! The detail of your order has been emailed to you.</p>
    <a class="btn btn-primary" role="button" href="<?php echo $new_url; ?>">Continue shopping</a>
<?php } else { ?>


    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
        <h4>Please enter your delivery details below.</h4>
        <p><span style="color: red;">*</span> indicates required fields</p>
        <table class="table table-borderless">
            <tr>
                <td class="form-group required"><label class="control-label">First Name</label></td>
                <td><input name="first_name" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">Last Name</label></td>
                <td><input name="last_name" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">Address</label></td>
                <td><input name="address" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">Suburb</label></td>
                <td><input name="suburb" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">State</label></td>
                <td><input name="state" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">Country</label></td>
                <td><input name="country" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">Postcode</label></td>
                <td><input name="postcode" type="text" required></td>
            </tr>
            <tr>
                <td class="form-group required"><label class="control-label">Email</label></td>
                <td><input name="email" type="email" required></td>
            </tr>
        </table>
        <div class="d-flex justify-content-between">
            <button class="btn btn-success" type="submit">Purchase</button>
            <a class="btn btn-primary" role="button" href="<?php echo $new_url; ?>">Back to shopping</a>
        </div>
    </form>
<?php } ?>