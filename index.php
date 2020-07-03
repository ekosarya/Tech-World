<?php
//start a session
session_start();

require_once("./php/CreateDb.php");
require_once("./php/component.php");

//create instace of createDb class
$database = new CreateDb("Productdb","Productttb");

if(isset($_POST['add'])) {
   //print_r($_POST['product_id']);
   if(isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], 'product_id');

        if(in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array (
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
            //print_r($_SESSION['cart']);
        }
        
   
    } else {
       $item_array = array(
           'product_id' => $_POST['product_id']
       );

       //create new session variable
       $_SESSION['cart'][0] = $item_array;
       //print_r($_SESSION['cart']);
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Eastore</title>
</head>

<body>

    <?php require_once('./php/header.php') ?>

    <div class="container">
        <div class="row text-center py-5">

            <?php 
               $result = $database->getData();
               while($row = mysqli_fetch_assoc($result)) {
                   component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
               }
            ?> 
            
        </div>
    </div>
</body>
</html>