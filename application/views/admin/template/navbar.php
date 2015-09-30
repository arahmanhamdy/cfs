<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">
            Cairo Film School Admin
        </a>
    </div>
    <!-- /.navbar-header -->
    <?php if (!isset($is_logged)) { ?>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url('admin/setting')?>"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('admin/user/logout') ?>"><i class="fa fa-sign-out fa-fw"></i>
                            Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    <?php } ?>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <div style="margin: 0 20% 5px"><img src="<?php echo base_url(); ?>/static/images/logo.png"/></div>
            <ul class="nav" id="side-menu">
                <?php if (!isset($is_logged)) { ?>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/index"><i class="fa fa-dashboard fa-fw active"></i>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Blogs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/blog/index">
                                    <i class="fa fa-bars fa-fw active"></i> List Blogs
                                </a>
                            </li>
                            <li>

                                <a href="<?php echo base_url(); ?>admin/blog/add">
                                    <i class="fa fa-pencil-square-o  fa-fw active"></i> Add Blog
                                </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Courses<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/course/index">
                                    <i class="fa fa-bars fa-fw active"></i> List Courses
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/course/add">
                                    <i class="fa fa-pencil-square-o  fa-fw active"></i> Add Course
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/course/students">
                                    <i class="fa fa-bars fa-fw active"></i> Students
                                </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/user/index">
                                    <i class="fa fa-bars fa-fw active"></i> List Users
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/user/add">
                                    <i class="fa fa-pencil-square-o  fa-fw active"></i> Add User
                                </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear fa-fw"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/setting/index">
                                    <i class="fa fa-bars fa-fw active"></i> List Settings
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/setting/edit">
                                    <i class="fa fa-pencil-square-o  fa-fw active"></i> Edit Settings
                                </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>