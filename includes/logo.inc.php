<div class="pb-5">
    <img src="images/jobs4you-logo.png" alt="" width="250">
 <?php

    if (isset($_SESSION['employer']))
    echo '<h6 class="text-white pt-4">Create more Job opportunities in the Community!</h6>';
    else{
    echo '<h6 class="text-white pt-4">Find a job that suits your qualifications!</h6>';
    }
    ?>
</div>