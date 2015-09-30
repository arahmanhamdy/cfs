<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php
                $attributes = array('class' => 'cfsForms');
                echo form_open(current_url(), $attributes);
                ?>
                <h1>Thank you for your message</h1>
                <?php echo form_close();?>

            </div>
        </div>
    </div>
</section>