<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="programs text-center">
                    <ul>
                        <?php foreach ($courses as $course) { ?>
                            <li>
                                <img src="<?php echo base_url('static/uploads/course/'.$course['image'])?>"/>

                                <div>
                                    <h2><?php echo $course['name']?></h2>

                                    <p><?php echo $course['description']?></p>
                                    <span class="clearfix"></span>
                                    <a href="<?php echo base_url('course/apply')?>" class="cfsbtn apply"></a>
                                    <span class="clearfix"></span>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
