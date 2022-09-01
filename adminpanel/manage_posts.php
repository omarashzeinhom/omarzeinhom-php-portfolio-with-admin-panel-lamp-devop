<?php
$page__title = 'Manage Posts📝';
include('./partials/sidenav/sidenav.php'); ?>


<h1><?php echo $page__title; ?></h1>


<ul class='app__sidenav-items'>
        <li class='app__sidenav-item'><a class="app__link-btn" href="<?= ADMIN_URL ?>add_post.php">Add
                        Post📝</a></li>
        <li class='app__sidenav-item'><a class="app__link-btn" href="<?= ADMIN_URL ?>edit_post.php">Edit
                        Post📝</a></li>

</ul>


<table class="app__table">
        <thead class="app__thead">

                <tr clas="app__tr">
                        <th class="app_th">Title</th>
                        <th class="app_th">Post</th>
                        <th class="app_th">Edit</th>
                        <th class="app_th">Delete</th>

                </tr>

        </thead>
        <tbody class="app__tbody">
                <!---LOOP THROUGH AND DISPLAY USER -->
                <tr clas="app__tr">

                        <td class="app__td"></td>
                        <td class="app__td"></td>

                        <td class="app__td"><a href="" class="app__link-btn">Edit</a></td>
                        <td class="app__td"><a href="" class="app__alert-btn-sm">Delete</a>
                        </td>

                </tr>



        </tbody>
</table>

<?php

include('./partials/footer/footer.php');
?>