<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" >
                <?php
                $attributes = array('class' => 'cfsForms');
                echo form_open(current_url(), $attributes);
                ?>
                <h2>COUNTACT US<span>we will contact you with in 48 hours</span></h2>
                <?php echo validation_errors();?>
                    <span>Name:</span>
                    <input name="name" type="text" value="<?php echo set_value('name'); ?>"/>
                    <span>Email:</span>
                    <input name="email" type="text" value="<?php echo set_value('email'); ?>"/>
                    <span>Message:</span>
                    <textarea name="message"></textarea>
                    <button class="cfsbtn submit" type="submit" ></button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>