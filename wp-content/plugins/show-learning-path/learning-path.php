<?php
/**
 * Plugin Name: Learning Path Plugin
 * Description: Display content of learning path
 * Version: 0.1
 * Author: atarek
 */
defined('ABSPATH') || exit;

function tbare_wordpress_plugin_demo($atts)
{
    $content = learningPathView();

    return $content;
}

add_shortcode('tbare-plugin-demo', 'tbare_wordpress_plugin_demo');

function learningPathView()
{
    $args = array(
        'post_type' => 'learningpath',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'orderby' => 'title',
        'order' => 'DESC',
    );
    $loop = new WP_Query($args);
    $loop->the_post();
    ?>

    <div class="container">
        <h1>
            <?= $loop->post->post_title ?>
        </h1>
        <?php
        if (have_rows("_learning_path_phases_created", $loop->post->ID)) {
            $phases = get_field('_learning_path_phases_created', $loop->post->ID);
            ?>
            <div class="row">

                <?php
                $index=1;
                foreach ($phases as $phase) {
                    ?>
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <div class="col-md-1 text-at-middle">
                            <h1><?=$index?></h1>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= get_the_post_thumbnail_url($phase->ID) ?>">
                        </div>
                        <div class="col-md-4">
                            <h3>  <?= $phase->post_title ?></h3>
                            <p>
                                <?= substr($phase->post_content, 0, 250) . "..." ?>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <div class="progress-circle p10">
                                <span>10%</span>
                                <div class="left-half-clipper">
                                    <div class="first50-bar"></div>
                                    <div class="value-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-at-middle">
                            <a href="<?=site_url()?>/learning_path_phases/<?=$phase->post_name?>"><h3><i class="fa fa-arrow-right" aria-hidden="true"></i></h3></a>
                        </div>
                    </div>
                    <?php
                    $index++;
                }
                ?>
            </div>
            <?php
        } ?>
    </div>
    <?php
}

function learnpath_style()
{
    wp_register_style('learnpath-style', plugins_url('assets/style.css', __FILE__));
    wp_enqueue_style('learnpath-style');

}

add_action('init', 'learnpath_style');
