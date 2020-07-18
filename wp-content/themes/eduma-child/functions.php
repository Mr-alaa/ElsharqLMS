<?php

function thim_child_enqueue_styles()
{
    if (is_multisite()) {
        wp_enqueue_style('thim-child-style', get_stylesheet_uri());
    } else {
        wp_enqueue_style('thim-parent-style', get_template_directory_uri() . '/style.css');
    }
}

add_action('wp_enqueue_scripts', 'thim_child_enqueue_styles', 1000);
// set custom link to redirect after registration
function redirect_after_update()
{
    exit(wp_redirect(site_url() . "/profile"));


}

add_action('um_user_after_updating_profile', 'redirect_after_update', 10, 1);
//add singup button
function um_after_login_submit_register($args)
{
    ?>

    <div style="display:flex;justify-content: center">
        Don`t have account?<a href="<?php echo esc_url(um_get_core_page('register')); ?>" class="um-link-alt"
                              style="color: #0d8bf5 !important;">
            <?php _e('Signup now', 'ultimate-member'); ?>
        </a>
    </div>

    <?php
}

add_action('um_after_login_fields', 'um_after_login_submit_register', 1001);
//add login button to register form
function um_after_register_submit_login($args)
{
    ?>

    <div style="display:flex;justify-content: center">
        if you have already an account?<a href="<?php echo esc_url(um_get_core_page('login')); ?>" class="um-link-alt"
                                          style="color: #0d8bf5 !important;">
            <?php _e('Login', 'ultimate-member'); ?>
        </a>
    </div>

    <?php
}

add_action('um_after_register_fields', 'um_after_register_submit_login', 1001);

add_action('um_after_profile_name_inline', 'my_after_profile_name_inline', 10);
function my_after_profile_name_inline($args)
{
    ?>
    <div class="um-main-meta">
        <?php
        echo "<br>" . um_user('nickname');
        echo "<br><span style='float: left' >Student</span>";
        ?>
    </div>
<?php }

add_action('um_before_profile_main_meta', 'my_before_profile_main_meta', 10, 1);
function my_before_profile_main_meta($args)
{
    ?>
    <div class="student-name-profile">
        <span class="student-name"><?= um_user('nickname'); ?></span>
        <br>
        <span>Student</span>
    </div>
    <?php
//    echo "<br><span style='float: left;font-size: 25px;color: white' >" . um_user('nickname') . "</span>";
//    echo "<br><span style='float: left;font-size: 20px;color: white' >Student</span>";
    ?>
<?php }

add_action('um_after_profile_header_name_args', 'my_after_profile_header_name_args', 10, 1);
function my_after_profile_header_name_args($args)
{
    ?>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9" style="float: right">
            <?php
            require_once get_stylesheet_directory() . "/elsharq/profile/tabs/tabs.php"; ?>
        </div>
    </div>
    <?php
    require_once get_stylesheet_directory() . "/elsharq/profile/tabs/edit/account.php";
    require_once get_stylesheet_directory() . "/elsharq/profile/tabs/edit/personality.php";
    require_once get_stylesheet_directory() . "/elsharq/profile/tabs/edit/roles.php";

}

function profile_custom_js()
{
    wp_enqueue_script('profile-tabs-custom-js', get_template_directory_uri() . '-child/elsharq/profile/js/custom_profile.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'profile_custom_js');

add_filter('um_edit_profile_cancel_uri', 'my_edit_profile_cancel_uri', 10, 1);
function my_edit_profile_cancel_uri()
{
    return $url = site_url() . "/profile";
}

// check invitation email and if true and registration done assign learning press and courses to user
add_action('um_before_save_registration_details', 'my_before_save_registration_details', 10, 2);
function my_before_save_registration_details($user_id, $submitted)
{
    $parts = parse_url($submitted["_wp_http_referer"]);
    parse_str($parts['query'], $query);
    if ($submitted["user_email"] != get_option("invbr_" . $query['invbractiveuser'])) {
        wp_delete_user($user_id);

        exit(wp_redirect(site_url($submitted["_wp_http_referer"] . "&invited=false")));
    } else {
        assignMainLearningPath($user_id);
    }
}

function assignMainLearningPath($user_id)
{
    //get learning path
    $leaningPathPost = array(
        'numberposts' => 1,
        'post_type' => 'learningpath',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $learningPath = get_posts($leaningPathPost);
    //end
    //add learning path to user
    update_user_meta($user_id, "_user_learning_path", $learningPath[0]->ID);
    //end
    //get course phases
    $phasesPosts = array(
        'numberposts' => 10,
        'post_type' => 'learning_path_phases',
        'post_status' => 'publish',
        'fields' => 'ids',
    );
    $phases = get_posts($phasesPosts);
    //end
    // create orders and assign courses to user
    foreach ($phases as $phase) {
        $courses = get_field('_phase_courses', $phase);
        foreach ($courses as $course) {
            $user = learn_press_get_user($user_id, false);

            $item = array(
                'order_item_name' => $course->post_title,
                'item_id' => $course->ID,
                'quantity' => 1,
                'subtotal' => 0,
                'total' => 0
            );

            $order = learn_press_create_order($item);
            $order->set_customer_note('');
            $order->set_status('lp-completed');
            $order->set_total(0);
            $order->set_subtotal(0);
            $order->set_user_ip_address(learn_press_get_ip());
            $order->set_user_agent(learn_press_get_user_agent());
            $order->set_user_id($user_id);
            $order->save();
            $order->add_item($item);

            $user->enroll($course->ID, $order->id);
        }
    }
    //end
}
