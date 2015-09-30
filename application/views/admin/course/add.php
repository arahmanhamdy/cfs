<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Course</h1>
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
                    echo form_open_multipart('admin/course/add', $attributes); ?>

                    <div class="form-group">
                        <?php echo form_error('name'); ?>
                        <label class="col-md-4 control-label" for="name">Name <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="text" name="name" placeholder="course name" class="form-control input-large"
                                   value="<?php echo set_value('name'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo strip_tags(form_error('image')); ?>
                        <label class="col-md-4 control-label" for="image">Image <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="file" name="image" placeholder="course image" class="form-control input-file"
                                   value="<?php echo set_value('image'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('duration'); ?>
                        <label class="col-md-4 control-label" for="duration">Duration <span
                                class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="text" name="duration" placeholder="course duration"
                                   class="form-control input-large"
                                   value="<?php echo set_value('duration'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('session'); ?>
                        <label class="col-md-4 control-label" for="session">Session <span
                                class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="text" name="session" placeholder="course session"
                                   class="form-control input-large"
                                   value="<?php echo set_value('session'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('description'); ?>
                        <label class="col-md-4 control-label" for="description">Description <span
                                class="required">*</span></label>

                        <div class="col-md-4">
                            <textarea name="description" placeholder="Course Descriptin"
                                      class="form-control"><?php echo set_value('description'); ?></textarea>
                        </div>
                    </div>

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