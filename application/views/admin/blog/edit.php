<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Blog</h1>
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
                    echo form_open_multipart('admin/blog/edit/' . $id, $attributes);
                    ?>

                    <div class="form-group">
                        <?php echo form_error('title'); ?>
                        <label class="col-md-4 control-label" for="title">Title <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="text" name="title" placeholder="blog title" class="form-control input-large"
                                   value="<?php echo set_value('title', $title); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo strip_tags(form_error('image')); ?>
                        <label class="col-md-4 control-label" for="image">Image <span class="required">*</span></label>

                        <div class="col-md-4">
                            <input type="file" name="image" placeholder="blog image" class="form-control input-file"
                                   value="<?php echo set_value('image'); ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="is_slider">Show in Slider</label>

                        <div class="col-md-4">
                            <select id="is_slider" name="is_slider" class="form-control">
                                <option
                                    value="false" <?php if (set_value('is_slider', $is_slider) == "false") echo 'selected' ?>>
                                    None
                                </option>
                                <option
                                    value="top" <?php if (set_value('is_slider', $is_slider) == "top") echo 'selected' ?>>
                                    Top
                                </option>
                                <option
                                    value="bottom" <?php if (set_value('is_slider', $is_slider) == "bottom") echo 'selected' ?>>
                                    Bottom
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user_id">User</label>
                        <div class="col-md-4">
                            <select id="user_id" name="user_id" class="form-control">
                                <?php foreach ($users as $user) { ?>
                                    <option value="<?php echo $user['id']?>"
                                        <?php if($id==$user['id']) echo 'selected="1"';?>>
                                        <?php echo $user['username'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <?php echo form_textarea(array('name' => 'body', 'rows' => '15', 'cols' => '80',
                                                   'value' => set_value('body', htmlspecialchars_decode($body), false))) ?>
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