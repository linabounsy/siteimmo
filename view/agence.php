<?php ob_start(); ?>



<div class="container my-5">


    <!-- Section: Block Content -->
    <section class="dark-grey-text">

        <h3 class="text-center font-weight-bold mb-4">Présentation de l'agence</h3>


        <div class="col-12">
            <p class="dark-grey-text text-justify">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>

    </section>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('../view/template.php');
?>