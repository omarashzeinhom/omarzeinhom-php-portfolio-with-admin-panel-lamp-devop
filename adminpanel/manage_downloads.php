<?php
$page__title = 'Manage Downloads📥';
include('./partials/sidenav/sidenav.php');

//FETCH ALL THE OTHER USERS ASIDE FROM THE CURRENT USER
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connect__db, $query);
?>





<h1><?php echo $page__title; ?></h1>

<!--- DISPLAY USERS -->


<br />
<!--- User Options --->
<ul>
    <li class='app__sidenav-item'><a href="<?= HOME_URL ?>add_download.php" class="app__link-btn">Add
            Download📥</a></li>

</ul>
<br />
<?php if (isset($SESSION_['add-download-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['add-download-success'];
            unset($_SESSION['add-download-success']); ?>
        </p>
    </div>

<?php endif; ?>



<div class="section__center">
    <table class="app__table">
        <thead class="app__thead">

            <tr clas="app__tr">
                <th class="app_th">Name</th>
                <th class="app_th">Username</th>
                <th class="app_th">Edit</th>
                <th class="app_th">Delete</th>
                <th class="app_th">Admin</th>
            </tr>

        </thead>
        <tbody class="app__tbody">
            <!---LOOP THROUGH AND DISPLAY USER -->
            <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                <tr clas="app__tr">

                    <td class="app__td"><?= " {$user['firstname']} {$user['lastname']}" ?></td>
                    <td class="app__td"><?= "{$user['username']}" ?></td>

                    <td class="app__td"><a href="<?= ADMIN_URL ?>edit_user.php?id=<?= $user['id'] ?>" class="app__link-btn">Edit</a></td>
                    <td class="app__td"><a href="<?= ADMIN_URL ?>delete-user.php?id=<?= $user['id'] ?>" class="app__alert-btn-sm">Delete</a>
                    </td>
                    <td class="app__td"><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>

                </tr>

            <?php endwhile; ?>


        </tbody>
    </table>

</div>



<?php

include('./partials/footer/footer.php');
?>