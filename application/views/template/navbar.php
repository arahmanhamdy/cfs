<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<p class="clearfix">
    <!-- nav -->
    <nav class="navbar navbar-default wow slideInRight" data-wow-delay="7s">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="<?php echo ($page_title=='Home') ? 'active': ''?> wow fadeInDown" data-wow-delay="7.5s"><a href="<?php echo base_url('index')?>">Home</a></li>
                    <li class="<?php echo ($page_title=='About Us') ? 'active ': ''?>wow fadeInDown" data-wow-delay="7.7s"><a href="<?php echo base_url('about')?>">About Us</a></li>
                    <li class="<?php echo ($page_title=='Blogs') ? 'active ': ''?>wow fadeInDown" data-wow-delay="7.9s"><a href="<?php echo base_url('blog/index')?>">Blog</a></li>
                    <li class="<?php echo ($page_title=='Apply') ? 'active ': ''?>wow fadeInDown" data-wow-delay="8.1s"><a href="<?php echo base_url('course/apply')?>">Apply Now</a></li>
                    <li class="<?php echo ($page_title=='Programs') ? 'active ': ''?>wow fadeInDown" data-wow-delay="8.3s"><a href="<?php echo base_url('course/index')?>">Programs</a></li>
                    <li class="<?php echo ($page_title=='Join Team') ? 'active ': ''?>wow fadeInDown" data-wow-delay="8.5s"><a href="#">Join Team</a></li>
                    <li class="<?php echo ($page_title=='Contact Us') ? 'active ': ''?>wow fadeInDown" data-wow-delay="8.7s"><a href="<?php echo base_url('contact/index')?>">Contact US</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
