<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container wow fadeInUp" data-wow-delay="9.1s" id="slider">
    <div class="row">
        <div id="CFS-Slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#CFS-Slider" data-slide-to="0" class="active"></li>
                <li data-target="#CFS-Slider" data-slide-to="1"></li>
                <li data-target="#CFS-Slider" data-slide-to="2"></li>
                <li data-target="#CFS-Slider" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php for($i=0; $i<count($top_blogs); $i++){?>
                <div class="item <?php if($i==0) echo "active"?>">
                    <img src="<?php echo base_url("static/uploads/blog/".$top_blogs[$i]['image'])?>"/>
                    <div class="carousel-caption">
                        <p><?php echo strip_tags(html_entity_decode($top_blogs[$i]['body']))?></p>
                        <a href='<?php echo base_url("blog/show/".$top_blogs[$i]['id']);?>'></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#CFS-Slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left glyphicon-triangle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#CFS-Slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right glyphicon-triangle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- end silder -->
<section class="text-center">
    <div class="container">
        <div class = "row newCourseRow">
        <div id="newCourse" class="col-lg-5  col-lg-offset-1  col-md-5 col-md-offset-1 wow slideInLeft"
             data-wow-offset="220">
            <div>
                <img src="<?php echo base_url("static/uploads/course/".$course['image'])?>" id="courseImg"/>

                <h2><?php echo $course['name']?></h2>

                <p><span>Duration: </span><?php echo $course['duration']?></p>

                <p><span>Session: </span><?php echo $course['session']?></p>
                <a class="hover hover-5" href="<?php echo base_url('course/apply')?>">
                    <img src="<?php echo base_url('static/images/apply.png'); ?>">
                </a>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 newApp wow slideInRight" data-wow-offset="220">
            <div class="title">
                <h2 class="AR pixels">للاستفسار عن برامجنا </h2>

                <h2>REQUEST INFORMATION</h2>
                <span class="note">we'll contact you within 48 hours</span>
            </div>
            <?php echo form_open(base_url('index/send_mail')); ?>
                <div>
                    <span>Name:</span>
                    <input name="Name" type="text"/>
                </div>
                <div>
                    <span>Date of Birth:</span>
                    <input name="BirthDate" type="text"/>
                </div>
                <div>
                    <span>Current City:</span>
                    <input name="CurrentCity" type="text"/>
                </div>
                <div>
                    <span>Email:</span>
                    <input name="Email" type="text"/>
                </div>
                <div>
                    <span>MobilePhone:</span>
                    <input name="Phone" type="text"/>
                </div>
                <div>
                    <span>Field Of Study:</span>
                    <input name="Study" type="text"/>
                </div>
                <div>
                    <span>Prorgram of interset*</span>

                    <p>
                        <span id="fa" class="fa fa-caret-down"></span>
                        <select name="Interest">
                            <?php foreach($courses as $course){?>
                                <option value="<?php echo $course['id']?>"><?php echo $course['name']?></option>
                            <?php } ?>
                        </select>
                    </p>
                </div>
                <p class="clearfix"></p>
                <button type="submit"></button>
            <?php echo form_close(); ?>

        </div>
    </div>
</section>
<p class="clearfix">
    <!--  END Courses Section -->
    <section>
        <div class="container wow slideInUp" data-wow-offset="90">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div id="CFS-NEWS" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php for($i=0; $i<count($bottom_blogs); $i++){?>
                            <div class="item <?php if($i==0) echo "active"?>">
                                <img src="<?php echo base_url("static/uploads/blog/".$bottom_blogs[$i]['image'])?>"/>

                                <div class="carousel-caption">
                                    <h2><?php echo $bottom_blogs[$i]['title']?></h2>
                                    <span><?php echo $bottom_blogs[$i]['create_date']?></span>

                                    <p><?php echo strip_tags(html_entity_decode($bottom_blogs[$i]['body']))?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#CFS-NEWS" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left glyphicon-triangle-left"
                                  aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#CFS-NEWS" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right glyphicon-triangle-right"
                                  aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
