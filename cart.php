<?php
//Assign Page title here
$page__title = 'Add to Cart ';
include('./partials/header/header.php');
include('./partials/nav/nav.php');



?>

<h1><?php echo "$page__title" ?> </h1>





<?php


//ADD PROUDCT TO CART 

if (isset($_POST['submit__add__product__to__cart'])) {
    $product_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $product_quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $product_query = "SELECT* FROM products WHERE id=$product_id";
    $product_result = mysqli_query($connect__db, $product_query);
    $product = mysqli_fetch_assoc($product_result);
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


    //REMOVE PROUDCT TO CART 

    if (isset($_GET['remove__product__from__cart'])) {
        unset($_SESSION['cart'][$_GET['remove__product__from__cart']]);
    };

    if (isset($_GET['update__product__from__cart']) && isset($_SESSION['cart'])) {

        //LOOP THROUGH THE PRODUCT DATA SO WE CAN UPDATE THE QUANTITIES FOR EVERY PRODUCT IN CART

        foreach ($_POST as $t => $v) {
            if (strpos($t, 'quantity-') !== false && is_numeric($v)) {
                $product_quantity = (int)$v;
                //CHECKS AND VALIDATION 
                if (is_numeric(($product_id) && isset($_SESSION['cart']) && $product_quantity > 0)) {
                    //UPDATE THE NEW QUANTITY
                    $_SESSION['cart'][$product_id] = $product_quantity;
                }
            };
        };
    };


    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('location:'  . 'placeorder.php');
        exit();
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
        $products_in_cart_final = mysqli_fetch_assoc($products_in_cart_result);
        foreach ($products_in_cart_final as $product_cart_final) {
            $subtotal += (float)$product_cart_final['price'] * (int)$products_in_cart_final[$product_cart_final['id']];
        };
    };

    //var_dump($product_id, $product_quantity,);
    header('location:' . 'cart.php');
    die();
    exit();
};





$subtotal = 0.00;


?>










<form action="./cart.php" method="POST">

    <table class="app__table" style="overflow: x-auto; margin: auto; max-width: 1700px; width:100%; height:100%;">
        <thead class="app__thead">
            <tr clas="app__tr">
                <th class="app_th">Name</th>
                <th class="app_th">Desc</th>
                <th class="app_th">Img</th>
                <th class="app_th">$</th>
                <th class="app_th">Units</th>
                <th class="app_th">Del</th>
            </tr>
        </thead>
        <tbody class="app__tbody">
            <?php if (empty($products)) : ?>
            <tr>
                <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
            </tr>
            <?php else : ?>
            <?php foreach ($products as $single_product) : ?>
            <!---LOOP THROUGH AND DISPLAY POSTS -->
            <tr clas="app__tr">

                <td class="app__td" id="postsTitle"><?= $single_product['name']; ?></td>
                <!--- Posts Title  -->
                <td class="app__td" id="postsBody"> <?= substr($single_product['description'], 0, 50)  . " ..."; ?></td>
                <!--- Products Image -->
                <td class="app__td" id="postsThumbnail">
                    <img src="<?= 'images/' . $single_product['img'] ?>"
                        style="padding-top: 0.4rem;border-radius: 15%; object-fit:cover; box-shadow: 0.1rem 0.1rem 0.1rem 0.1rem gray;"
                        class="app__thumbnail-avatar" width="50px" height="50px" alt="<?= $single_product['name']; ?>"
                        loading="lazy" />
                </td>
                <!--- Products Retail Price -->
                <td class="app__td"><?= $single_product['retailprice'] . "$"; ?></td>
                <!--- Products Quantity -->
                <td class="app__td">
                    <input name="quantity" value="1" min="1" max="<?= $single_product['quantity']; ?>" type="number"
                        placeholder="Quantity" />
                </td>

                <td class="app__td"><button type="submit" name="remove__product__from__cart"></button></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div>
        <h6>SubTotal</h6>
        <span><?= $subtotal; ?></span>
    </div>



    <button type="submit" value="Update" name="update">
        Update
    </button>

    <button type="submit" value="Place Order" name="placeorder">
        Finalize Order
    </button>


</form>