<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
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
                                <th width="50%">Username</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=0;
                            foreach($users as $user){?>
                                <tr class="<?php echo ($i%2==0)? 'odd':'even';?>">
                                    <td><?php echo $user['id']?></td>
                                    <td><?php echo $user['username']?></td>
                                    <td>
                                        <a class="btn btn-success btn-xs" href="<?php echo base_url("admin/user/edit/".$user['id'])?>">Edit <span class="glyphicon glyphicon-edit"></span></a>
                                        <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#confirm-delete"
                                           data-href="<?php echo base_url("admin/user/delete/".$user['id'])?>">
                                            delete <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                        <div class="modal fade" id="confirm-delete" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Confirm Delete
                                                    </div>
                                                    <div class="modal-body">
                                                        confirm delete user "<?php echo $user['username']?>" ?
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