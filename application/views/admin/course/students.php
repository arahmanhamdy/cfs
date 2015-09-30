<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Students</h1>
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
                                <th width="50%">Name</th>
                                <th>Course of Interest</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($students as $student) {
                                ?>
                                <tr class="<?php echo ($i % 2 == 0) ? 'odd' : 'even';?>">
                                    <td><?php echo $student['id']?></td>
                                    <td><?php echo $student['Name']?></td>
                                    <td><?php echo $student['course']?></td>
                                    <td>
                                        <a class="btn btn-danger btn-xs" href="#" data-toggle="modal"
                                           data-target="#view-data">
                                            view <span class="glyphicon glyphicon-view"></span>
                                        </a>

                                        <div class="modal fade" id="view-data" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Student Info
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td>Name</td>
                                                                <td><?php echo $student['Name']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Birth Date</td>
                                                                <td><?php echo $student['BirthDate']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Current City</td>
                                                                <td><?php echo $student['CurrentCity']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td><?php echo $student['Email']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone</td>
                                                                <td><?php echo $student['Phone']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>University</td>
                                                                <td><?php echo $student['University']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Study</td>
                                                                <td><?php echo $student['Study']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Job</td>
                                                                <td><?php echo $student['Job']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Interest</td>
                                                                <td><?php echo $student['course']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>From</td>
                                                                <td><?php echo $student['from']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>To</td>
                                                                <td><?php echo $student['to']?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Ok
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

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