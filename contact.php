<?php
//Assign Page title here
$page__title = 'Contact📞';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
?>

<h1><?php echo "$page__title" ?> </h1>



<!--- Form Start --->
<form class="app__register-form" action="register__logic.php" enctype="multipart/form-data" method="POST">
    <div class="row ">
        <div class="col-12">
            <!-- First Name  --->
            <div class="app__inputs-wrap">
                <label class="app__register-label">Name</label>
                <input name="firstname" value="" class="app__register-input" type="text" id="firstName"
                    placeholder="Name here..." />
            </div>

            <!-- User Name  --->

            <div class="app__inputs-wrap">
                <label class=" app__register-label">Text Area</label>
                <textarea class="app__register-input">
                Enter your message here...
               </textarea>
            </div>


            <br />

            <!-- Register Button key of name -->
            <button class="app__btn" name="submit__register">
                EMAIL ME
            </button>
            <!-- Register Button -->


        </div>
    </div>
</form>
<!--- Form End --->

</div>
<!--- Register Card End --->



















<?php
include('./partials/footer/footer.php');
?>