<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="footer" class="wow lightSpeedIn" data-wow-offset="20">
    <div class="container text-center">
        <div class="row">
            <div class="col-xs-12 wow fadeInUp" data-wow-offset="20" data-wow-delay=".5s">
                <img src="<?php echo base_url(); ?>static/images/whiteLogo.png"/>
                <?php $links = $this->site_settings->site_settings[0];?>
                <p>Copyright © 2015 Cairo Film School, all right reserved</p>
                <ul class="visible-sm-block visible-xs-block small-social">
                    <li><a href="<?php echo $links['facebook']?>"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="<?php echo $links['twitter']?>"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="<?php echo $links['youtube']?>"><span class="fa fa-youtube"></span></a></li>
                    <li><a href="<?php echo $links['vimeo']?>"><span class="fa fa-vimeo"></span></a></li>
                    <li><a href="<?php echo $links['instagram']?>"><span class="fa fa-instagram"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="social">
    <ul class="hidden-xs hidden-sm wow fadeInUp" data-wow-delay="9.5s">
        <li><a href="<?php echo $links['facebook']?>"><span class="fa fa-facebook"></span></a></li>
        <li><a href="<?php echo $links['twitter']?>"><span class="fa fa-twitter"></span></a></li>
        <li><a href="<?php echo $links['youtube']?>"><span class="fa fa-youtube"></span></a></li>
        <li><a href="<?php echo $links['vimeo']?>"><span class="fa fa-vimeo"></span></a></li>
        <li><a href="<?php echo $links['instagram']?>"><span class="fa fa-instagram"></span></a></li>
    </ul>
    <span></span>
</section>

<?php if ($page_title == 'Home') { ?>
    <section class="loading">
        <div class="loading-wrapper">
            <div class="focus">
                cairo film school
            </div>
            <div class="mask">
                <div class="text">cairo film school</div>
            </div>
        </div>
    </section>
<?php } ?>

<script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/scripts.js" type="text/javascript"></script>

<?php if ($page_title == 'Home') { ?>
    <script src="<?php echo base_url(); ?>static/js/wow.min.js"></script>
    <script type="text/javascript">
        wow = new WOW();
        wow.init();
    </script>
<?php } ?>

</div>
</body>
</html>