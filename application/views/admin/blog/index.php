<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blogs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th width="30%">Blog Title</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>show in slider</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=0;
                            foreach($blogs as $blog){?>
                                <tr class="<?php echo ($i%2==0)? 'odd':'even';?>">
                                    <td><?php echo $blog['id']?></td>
                                    <td><?php echo $blog['title']?></td>
                                    <td><?php echo $blog['create_date']?></td>
                                    <td><?php echo $blog['username']?></td>
                                    <td>
                                        <a class="btn btn-xs <?php echo $blog['is_slider']=='top'?'disabled btn-default':'btn-info'?>"
                                           href="<?php echo base_url("admin/blog/slider/top/".$blog['id'])?>">
                                            Top <span class="glyphicon glyphicon-triangle-top"></span>
                                        </a>
                                        <a class="btn btn-xs <?php echo $blog['is_slider']=='bottom'?'disabled btn-default':'btn-info'?>"
                                           href="<?php echo base_url("admin/blog/slider/bottom/".$blog['id'])?>">
                                            Bottom <span class="glyphicon glyphicon-triangle-bottom"></span>
                                        </a>
                                        <a class="btn btn-xs <?php echo $blog['is_slider']=='false'?'disabled btn-default':'btn-info'?>"
                                           href="<?php echo base_url("admin/blog/slider/false/".$blog['id'])?>">
                                            None <span class="glyphicon glyphicon-triangle-stop"></span>
                                        </a>

                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-xs" href="<?php echo base_url("admin/blog/edit/".$blog['id'])?>">Edit <span class="glyphicon glyphicon-edit"></span></a>
                                        <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#confirm-delete"
                                           data-href="<?php echo base_url("admin/blog/delete/".$blog['id'])?>">
                                            delete <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                        <div class="modal fade" id="confirm-delete" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Confirm Delete
                                                    </div>
                                                    <div class="modal-body">
                                                        confirm delete blog "<?php echo $blog['title']?>" ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-danger btn-ok">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>