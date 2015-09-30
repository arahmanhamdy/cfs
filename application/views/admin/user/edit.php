<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open_multipart('admin/user/edit/' . $id, $attributes);
                    ?>

                    <div class="form-group">
                        <?php echo form_error('username'); ?>
                        <label class="col-md-4 control-label" for="username">username <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="text" name="username" placeholder="user name" class="form-control input-large"
                                   value="<?php echo set_value('username', $username); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('password'); ?>
                        <label class="col-md-4 control-label" for="password">Password <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="password" name="password" class="form-control input-large">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo strip_tags(form_error('image')); ?>
                        <label class="col-md-4 control-label" for="image">Image <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="file" name="image" placeholder="user image" class="form-control input-file"
                                   value="<?php echo set_value('image'); ?>">
                        </div>
                    </div>

                    </br>

                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-success btn-xlarge" style="float: left;" type="submit">Submit</button>
                        <button class="btn btn-danger btn-xlarge" style="float: right;" type="reset">Reset</button>
                    </div>
                    <?php echo form_close(); ?>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>