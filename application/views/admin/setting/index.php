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
                                <th>name</th>
                                <th width="70%">value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($setting as $key => $value) {
                                ?>
                                <tr class="<?php echo ($i % 2 == 0) ? 'odd' : 'even';?>">
                                    <td><?php echo $key?></td>
                                    <td><?php echo $value?></td>
                                </tr>

                            <?php $i++; } ?>
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