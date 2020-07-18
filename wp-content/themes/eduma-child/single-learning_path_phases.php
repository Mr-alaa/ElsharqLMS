<?php
$phase = get_post(get_the_ID());
$args = array(
    'post_type' => 'learningpath',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'title',
    'order' => 'DESC',
);
$learningPath = new WP_Query($args);
$learningPath->the_post();
?>

<div class="page-content full-width" style="color: black">
    <h4 style="color: black">You Can Generate Your Certificate,But Aim Higher!</h4>
    <a href="<?= site_url() ?>/learning_path_phases/<?= $learningPath->post->post_name ?>"><?= $learningPath->post->post_title ?> > </a>
    <a href="<?= site_url() ?>/learning_path_phases/<?= $phase->post_name ?>"><?= $phase->post_title ?> </a>
    <h2 style="color: black">Courses in this phase <?= $phase->post_title ?></h2>
    <div class="col-lg-8" style="padding-left: 0">
        <?=$phase->post_content?>
    </div>
    <?php if (have_rows("_phase_courses", $phase->ID)) {
        $courses = get_field('_phase_courses', $phase->ID);
        ?>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <?php
                foreach ($courses as $course) {

                    ?>

                    <div class="col-xs-3 col-md-offset-1" style="padding-left: 0;margin-left: 0;margin-right: 8%">
                        <div class="card text-center">
                            <img src="<?= get_the_post_thumbnail_url($course->ID) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title"><?= $course->post_title ?></h6>
                                <p class="card-text"><?= substr($course->post_excerpt,0,100)?></p>
                                <a href="<?= site_url() ?>/courses/<?= $course->post_name ?>" class="btn btn-primary">View Course</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
