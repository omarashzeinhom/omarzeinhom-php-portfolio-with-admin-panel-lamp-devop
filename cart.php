<?php
//Assign Page title here
$page__title = 'Add to Cart ';
include('./partials/header/header.php');
include('./partials/nav/nav.php');



$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM products WHERE id=$id";
$products = mysqli_query($connect__db, $query);

?>

<h1><?php echo "$page__title" ?> </h1>


<?php

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $product = mysqli_fetch_assoc($result);
    if (!$product) {
        header('location:' . HOME_URL . 'shop.php');
        echo "Product is not available right now";
        die();
    }
} else {
    header('location:' . HOME_URL . 'shop.php');
    die();
}

//var_dump($product);

?>
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
        <?php while ($single_product = mysqli_fetch_assoc($products)) : ?>
        <!---LOOP THROUGH AND DISPLAY POSTS -->
        <tr clas="app__tr">
            <td class="app__td" id="postsTitle"><?= $single_product['name']; ?></td>
            <!--- Posts Title  -->
            <td class="app__td" id="postsBody"> <?= substr($single_product['description'], 0, 50)  . " ..."; ?></td>
            <!--- Posts Body -->
            <td class="app__td" id="postsThumbnail">
                <img src="<?= 'images/' . $single_product['img'] ?>"
                    style="padding-top: 0.4rem;border-radius: 15%; object-fit:cover; box-shadow: 0.1rem 0.1rem 0.1rem 0.1rem gray;"
                    class="app__thumbnail-avatar" width="50px" height="50px" alt="<?= $single_product['name']; ?>"
                    loading="lazy" />
            </td>
            <td class="app__td"><?= $single_product['retailprice']; ?></td>
            <td class="app__td"><select>
                    <option value="1" min="1" max="<?= $single_product['quantity']; ?>">
                        <?= $single_product['quantity']; ?></option>
                </select></td>

            <td class="app__td"><a href="delete_cart.php?id=<?= $single_product['id'] ?? null; ?>"
                    class="app__alert-btn-sm">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>








<button>
    Update
</button>

<button>
    Finalize Order
</button>