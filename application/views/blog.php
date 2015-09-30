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
                    <ul id="blog-Items">
                        <?php foreach ($blogs as $blog) { ?>
                            <li>
                                <div class="auther">
                                    <img src="<?php echo base_url("static/uploads/user/" . $blog['user_image']) ?>"
                                         class="img-circle">
                                    <span><?php echo $blog['username'] ?></span>
                                </div>
                                <div class="subject ar">
                                    <h2><?php echo $blog['title'] ?></h2>
                                    <span><?php echo $blog['create_date'] ?></span>

                                    <p>
                                        <?php
                                        $body = strip_tags(html_entity_decode($blog['body']));
                                        echo substr($body, 0, 120);
                                        ?>
                                        <span><a
                                                href="<?php echo base_url('blog/show/' . $blog['id']) ?>">more...</a></span>
                                    </p>
                                </div>
                                <p class="clearfix"/>
                            </li>
                        <?php } ?>
                    </ul>
                    <div id="pagination">
                        <ul class="pagination">
                            <?php foreach ($links as $link) {
                                echo "<li>" . $link . "</li>";
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>