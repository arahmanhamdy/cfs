<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<p class="clearfix">
    <!--  END Courses Section -->
    <section class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul id="archive">
                        <h2>Archive</h2>
                        <?php foreach ($archive as $year => $months) { ?>
                            <li><b><?php echo $year ?></b></li>
                            <?php foreach ($months as $month) { ?>
                                <li>
                                    <a href="<?php echo base_url("blog/archive/$year/$month"); ?>"><?php echo $month; ?></a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
                <div class="col-md-9 text-center">
                    <div id="Items">
                        <div class="auther">
                            <img src="<?php echo base_url('static/uploads/user/'.$blog['user_image'])?>"  class="img-circle"/>
                            <span><?php echo $blog['username']?></span>
                        </div>
                        <div class="subject ar">
                            <h2><?php echo $blog['title']?></h2>
                            <span><?php echo $blog['create_date']?></span>
                        </div>
                        <p class="clearfix">
                    </div>
                    <div class="Items-subject ar">
                        <p><?php echo html_entity_decode($blog['body'])?></p>
                        <!--<section>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="..."></iframe>
                            </div>
                        </section>
                        <p class="source AR">المصدر موقع : <span>اسم الموقع </span></p>-->

                    </div>
                    <!--<form id="Subscribe">
                        <h2>Subscribe your mail to get Cairo Film School newsLetter</h2>
                        <input type="email" name="email" >
                        <button type="submit"><img src="images/submit.png"></button>
                    </form>-->
                </div>
            </div>
        </div>
    </section>