<?php
session_start();
require_once('./php/CreateDb.php');
require_once('./php/component.php');

$db = new CreateDb("Productdb","Productttb");

if(isset($_POST['remove'])) {
    if($_GET['action'] == 'remove') {
        foreach($_SESSION['cart'] as $key => $value) {
            if($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('The Product has been removed from your chart')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>Cart</title>
</head>
<body class="bg-light">
    <?php
        require_once('./php/header.php');
    ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="mt-3">
                    <h6>My Chart</h6>
                    <hr>

                    <?php
                       $total = 0;        
                       
                       if($product_id = array_column($_SESSION['cart'], 'product_id')) {                           

                            $result = $db->getData();
                            while($row = mysqli_fetch_assoc($result)) {
                                foreach($product_id as $id) {
                                    if($row['id'] == $id) {
                                        cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                        $total = $total + (int)$row['product_price'];
                                    } 
                                }
                            }
                        } else {
                            echo "<h5>Your chart is empty</h5>";
                        }                        
                    ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<h6 class=\"py-3\">Price($count items)</h6>";
                                } else {
                                    echo "<h6 class=\"py-3\">Price(0 items)</h6>";
                                }
                            ?>

                            <h6>Delivery Fee:</h6>
                            <hr>
                            <h6>Amount Due: </h6>
                        </div>

                        <div class="col-md-6">
                            <h6 class="py-3">$<?php echo $total?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php
                                echo $total;
                            ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>