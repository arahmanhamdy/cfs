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
                <h1>Contact Form</h1>
                <p>Sorry but there was an error sending your message - <strong>we have not received it</strong>.</p>
                <p>You message is preserved below so you do not lose what you typed. Please manually email it to us</p>
                <?php echo "<textarea name='message'>" . set_value("message") . "</textarea>"; ?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>