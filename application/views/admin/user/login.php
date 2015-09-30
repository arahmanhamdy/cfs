<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('admin/user/login', $attributes);
                ?>
                <?php echo form_error('password'); ?>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Username <span class="required">*</span></label>
                    <div class="col-md-6">
                        <input type="text" name="username" placeholder="username" class="form-control input-large"
                               value="<?php echo set_value('username'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Password <span class="required">*</span></label>
                    <div class="col-md-6">
                        <input type="password" name="password" placeholder="password" class="form-control input-large"
                               value="">
                    </div>
                </div>

                </br>

                <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-success btn-xlarge" style="float: left;" type="submit">Submit</button>
                    <button class="btn btn-danger btn-xlarge" style="float: right;" type="reset">Reset</button>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>