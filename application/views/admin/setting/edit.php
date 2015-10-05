<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Settings</h1>
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
                    echo form_open_multipart('admin/setting/edit/', $attributes);
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="facebook">Facebook</label>
                        <div class="col-md-8">
                            <input type="text" name="facebook" placeholder="Facebook Link" class="form-control input-large"
                                   value="<?php echo $facebook ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="twitter">Twitter</label>
                        <div class="col-md-8">
                            <input type="text" name="twitter" placeholder="twitter Link" class="form-control input-large"
                                   value="<?php echo $twitter ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="instagram">Instagram</label>
                        <div class="col-md-8">
                            <input type="text" name="instagram" placeholder="instagram Link" class="form-control input-large"
                                   value="<?php echo $instagram ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="vimeo">Vimeo</label>
                        <div class="col-md-8">
                            <input type="text" name="vimeo" placeholder="vimeo Link" class="form-control input-large"
                                   value="<?php echo $vimeo ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="youtube">Youtube</label>
                        <div class="col-md-8">
                            <input type="text" name="youtube" placeholder="youtube Link" class="form-control input-large"
                                   value="<?php echo $youtube ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="email" placeholder="email Link" class="form-control input-large"
                                   value="<?php echo $email ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="info_email">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="info_email" placeholder="email Link" class="form-control input-large"
                                   value="<?php echo $info_email ?>">
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