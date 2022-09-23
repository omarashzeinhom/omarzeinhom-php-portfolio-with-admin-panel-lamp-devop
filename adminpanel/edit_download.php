<?php
$page__title = 'Edit Download📥';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');

?>

<h1><?php echo $page__title; ?></h1>


<?php
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM downloads WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $download = mysqli_fetch_assoc($result);
} else {
    header('location:' . ADMIN_URL . 'manage_downloads.php');
    die("");
}; ?>


<section style="overflow: x-auto; margin: auto; max-width: 500px; width:100%; height:100%;">
    <form class="app__form-section" action="<?= HOME_URL ?>edit_download-logic.php" method="POST"
        enctype="multipart/form-data">
        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $download['id'] ?>" name="id" placeholder="Id" class="app__input">
        </div>
        <!-- Title  --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Title</label>
            <input name="download_title" class="app__input" type="text" id="downloadTitle"
                value="<?= $download['download_title'] ?>" placeholder="Enter Download Title here..." />
        </div>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Link</label>
            <input name="download_link" class="app__input" type="text" id="downloadLink"
                value="<?= $download['download_link'] ?>" placeholder="Enter Download Link here..." />
        </div>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Alt Title</label>
            <input name="download_alt_title" class="app__input" type="text" id="downloadAltTitle"
                value="<?= $download['download_alt_title'] ?>" placeholder="Enter Alt Download Title here..." />
        </div>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Alt Link</label>
            <input name="download_alt_link" class="app__input" type="text" id="downloadAltLink"
                value="<?= $download['download_alt_link'] ?>" placeholder="Enter Alt Download  Link here..." />
        </div>
        <button name="submit__editdownload" type="submit" class="btn">Update Download</button>
    </form>
</section>

<?php

include('./partials/footer/footer.php');
?>