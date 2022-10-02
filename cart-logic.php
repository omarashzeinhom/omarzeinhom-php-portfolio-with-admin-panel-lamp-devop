<?php
include('./partials/header/header.php');

echo "test";

// TODO ADD PROUDCT TO CART 

if (isset($_POST['add__cart'])) {

    $product_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    //debug
    var_dump($product_id);
    $product_quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $product_query = "SELECT * FROM products WHERE id=$product_id";
    $product_result = mysqli_query($connect__db, $product_query);
    $product = mysqli_fetch_assoc($product_result);
    //var_dump($product);
    if ($product && $product_quantity > 0) {
        //PRODUCT EXISTS IN DB NOW SESSION VARIABLE CAN BE CREATED/UPDATED FOR THE CART
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            //IF PRODUCT EXISTS IN CART UPDATE THE QUANTITY
            $_SESSION['cart'][$product_id] += $product_quantity;
        } else {
            $_SESSION['cart'][$product_id] = $product_quantity;
        };
    } else {
        $_SESSION['cart'] = array($product_id => $product_quantity);
    };

    //REMOVE PROUDCT FROM CART 
    if (isset($_GET['delete__cart'])) {
        unset($_SESSION['cart'][$_GET['delete__cart']]);
    };

    if (isset($_GET['update__cart']) && isset($_SESSION['cart'])) {

        //LOOP THROUGH THE PRODUCT DATA SO WE CAN UPDATE THE QUANTITIES FOR EVERY PRODUCT IN CART

        foreach ($_POST as $t => $v) {
            if (strpos($t, '.&quantity-') !== false && is_numeric($v)) {
                $id= str_replace('.&quantity-', '', $t);
                $product_quantity = (int)$v;
                //CHECKS AND VALIDATION 
                if (is_numeric(($id) && isset($_SESSION['cart'][$id]) && $product_quantity > 0)) {
                    //UPDATE THE NEW QUANTITY
                    $_SESSION['cart'][$id] = $product_quantity;
                };
            };
        };
        header('location: cart.php');
        die();
    
    };

    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('location:'  . 'placeorder.php');
        die();
    };
    
    
   
    var_dump($product_id, $product_quantity);

    var_dump('ID is:'. $product['id'], 'Product name is' . $product['name'], 'Product Quantity is' . $product_quantity);

};
