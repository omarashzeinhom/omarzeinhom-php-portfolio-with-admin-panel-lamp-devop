<?php
include('./partials/header/header.php');

echo "test";

// TODO ADD PROUDCT TO CART 

if (isset($_POST['add__cart'])) {

    $product_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    var_dump($product_id);
    $product_quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $product_query = "SELECT * FROM products WHERE id=$product_id";
    $product_result = mysqli_query($connect__db, $product_query);
    $product = mysqli_fetch_assoc($product_result);
    var_dump($product);
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
            if (strpos($t, 'quantity=') !== false && is_numeric($v)) {
                $id= str_replace('quantity-', '', $t);
                $product_quantity = (int)$v;
                //CHECKS AND VALIDATION 
                if (is_numeric(($product_id) && isset($_SESSION['cart'][$product_id]) && $product_quantity > 0)) {
                    //UPDATE THE NEW QUANTITY
                    $_SESSION['cart'][$product_id] = $product_quantity;
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

    //CHECK SESSIONS VARIABLE FOR PRODUCTS IN CART
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array(); // 
    $subtotal = 0.00;
    if ($products_in_cart) {
        //THERE ARE NO PRODUCTS IN CART ADD THEM
        //PRDOUCT IN CART ARRAA TO QUESTION MARK STRING ARAAAY , SQL STATEMNET NEEDS TO ICNLUDE (?,?,?,...ETC);
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $proudcts_in_cart_query = "SELECT * FROM products WHERE id IN ('. $array_to_question_marks .')";
        $products_in_cart_result = mysqli_query($connect__db, $proudcts_in_cart_query);
        
        foreach ($products_in_cart_result as $product_cart_final) {
            $subtotal += (float)$product_cart_final['price'] * (int)$products_in_cart_final[$product_cart_final['id']];
        };
    };
    var_dump($product_id, $product_quantity,);

};





$subtotal = 0.00;
