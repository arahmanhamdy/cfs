<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php
                $attributes = array('class' => 'cfsForms');
                echo form_open('course/apply', $attributes); ?>
                    <h2>STUDY FORM<span>we will contact you with in 48 hours</span></h2>
                    <h3 class="formHeader">GENERAL INFORMATION</h3>
                    <span>Name:</span>
                    <input name="Name" type="text"/>
                    <span>Date of Birth:</span>
                    <input name="BirthDate" type="text"/>
                    <span>Current City:</span>
                    <input name="CurrentCity" type="text"/>
                    <span>Email:</span>
                    <input name="Email" type="text"/>
                    <span>MobilePhone:</span>
                    <input name="Phone" type="text"/>

                    <h3 class="formHeader">EDUCATION INFORMATION</h3>
                    <span>University/college:</span>
                    <input name="University" type="text"/>
                    <span>Field Of Study:</span>
                    <input name="Study" type="text"/>
                    <span>Current Job:</span>
                    <input name="Job" type="text"/>

                    <h3 class="formHeader">PROGRAM INFORMATION</h3>
                    <span>Prorgram of interset*</span>

                    <p class="select">
                        <span id="fa" class="fa fa-caret-down"></span>
                        <select name="Interest">
                            <?php foreach($courses as $course){?>
                                <option value="<?php echo $course['id']?>"><?php echo $course['name']?></option>
                            <?php } ?>
                        </select>
                    </p>
                    <div class="fromTo">
                        <span>From:</span>
                        <input name="from">
                        <span>To:</span>
                        <input name="from">
                    </div>
                    <p class="clearfix">

                    <h3 class="formHeader">TERMS & CONDATIONS</h3>
                    <ul>
                        <li>Attedance 75% of session is a must</li>
                        <li>Practicing all Assignments & Parctical exercises through out diffrent workshops and
                            programs
                        </li>
                        <li>Gradution Project is a high priority proof of your proffessioncy and degree of benefit from
                            CFS
                        </li>

                    </ul>

                    <button class="cfsbtn apply" type="submit"></button>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</section>
