<?php
//Assign Page title here
$page__title = 'Contact📞';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
?>

<h1><?php echo "$page__title" ?> </h1>



<!--- Form Start --->
<section style="overflow: x-auto; margin: auto; max-width: 1700px; width:100%; height:100%;">
    <form class="" action="contact-logic.php" enctype="multipart/form-data" method="POST">
        <div class="row ">
            <div class="col-12">
                <!-- First Name  --->
                <div class="app__inputs-wrap">
                    <label class="app__register-label">Name</label>
                    <input name="cx_name" class="app__register-input" type="text" id="firstName"
                        placeholder="Name here..." />
                </div>
                <!-- Email  --->
                <div class="app__inputs-wrap">
                    <label class="app__register-label">Email</label>
                    <input name="cx_email" class="app__register-input" type="text" id="firstName"
                        placeholder="Email here..." />
                </div>
                <!-- Message  --->
                <div class="app__inputs-wrap">
                    <label class=" app__register-label">Message</label>
                    <textarea class="app__register-input" name="cx_message">Enter your message here...</textarea>
                </div>
                <br />
                <!-- Register Button key of name -->
                <button class="app__btn" name="submit__contact">
                    EMAIL US
                </button>
                <!-- Register Button -->
            </div>
        </div>
    </form>
</section>
<!--- Form End --->
</div>
<!--- Register Card End --->



<?php
include('./partials/footer/footer.php');
?>