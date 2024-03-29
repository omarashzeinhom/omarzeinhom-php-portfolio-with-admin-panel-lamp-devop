<?php
//Assign Page title here
$page__title = 'Add to Cart 🛒';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
if (isset($_GET['id'])) {
    $product_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $product_name = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $product_query = "SELECT * FROM products WHERE id=$product_id";
    $product_result = mysqli_query($connect__db, $product_query);
    $products = $product_result;
    $products_array = mysqli_fetch_assoc($product_result);
    //var_dump($products_array);
}else {
    echo "No Product Added";
}

$products_in_cart = array(
    $products_id=$product_id ??null,
    $products_name=$product_name ??null,

);

var_dump($products_in_cart);

// TODO ADD PROUDCT TO CART 
$subtotal = 0.00;





?>


<h1><?php echo "$page__title" ?> </h1>



<?php
if (isset($_SESSION['cart'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= implode($_SESSION['cart']);
            unset($_SESSION['cart']); ?>
        </p>

    </div>
    <!--- DEBUG ERROR MSG IN SESSION  END  --->

<?php endif; ?>

<div class="app__card">

    <h2>Cart Page is Still Under Development </h2>

    <form action="cart.php" method="POST">
        <table class="app__table" style="overflow: x-auto; margin: auto; max-width: 1700px; width:100%; height:100%;">
            <thead class="app__thead">
                <tr clas="app__tr">
                    <th class="app_th">Name</th>
                    <th class="app_th">Desc</th>
                    <th class="app_th">Img</th>
                    <th class="app_th">Price$</th>
                    <th class="app_th">Units</th>
                    <th class="app_th">Del</th>
                </tr>
            </thead>
            <tbody class="app__tbody">
                <?php if (!empty($products)) : ?>

                    <?php foreach ($products as $product) : ?>

                        <!---LOOP THROUGH AND DISPLAY POSTS -->
                        <tr clas="app__tr">

                            <td class="app__td" id="postsTitle"><?= $product['name']; ?></td>
                            <!--- Posts Title  -->
                            <td class="app__td" id="postsBody"> <?= substr($product['description'], 0, 50)  . " ..."; ?></td>
                            <!--- Products Image -->
                            <td class="app__td" id="postsThumbnail">
                                <img src="<?= 'images/' . $product['img'] ?? null ?>" style="padding-top: 0.4rem;border-radius: 15%; object-fit:cover; box-shadow: 0.1rem 0.1rem 0.1rem 0.1rem gray;" class="app__thumbnail-avatar" width="50px" height="50px" alt="<?= $single_product['name']; ?>" loading="lazy" />
                            </td>
                            <!--- Products Retail Price -->
                            <?php
                            //TODO GET USER SELECTED QUANTITY DYNAMICALLY
                            $user_selected_quantity = (int)$product['quantity']
                            ;?>
                            <td class="app__td"><?= $product['price']  * $user_selected_quantity . '$' ; ?></td>
                            <!--- Products Quantity -->
                            <td class="app__td">
                                <input type="number" name=".&quantity-<?= $product['id']  ?? null ?> " min="1" max="<?= $product['quantity']; ?>" placeholder="Quantity" />
                            </td>

                            <td class="app__td"><button class="btn__sm-error" type="submit" name="delete__cart">Delete From Cart</button></td>
                        </tr>
                    <?php endforeach; ?>

                <?php else : ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>




                <?php endif; ?>
            </tbody>
        </table>

        <h5>SubTotal</h5>
        <span><?= $subtotal; ?></span>

        <button type="submit" value="Update" name="update__cart">
            Update
        </button>

        <button type="submit" value="Place Order" name="placeorder">
            Finalize Order
        </button>



    </form>

</div>