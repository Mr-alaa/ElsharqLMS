<?php
/**
 * Template Name: Profile Page
 *
 **/
get_header();
$profile = LP_Profile::instance();
$user = $profile->get_user();
?>

    <div class="container full-width">
        <div class="row user-info">
            <div class="col-md-2">
                <?php echo $user->get_profile_picture(null, '270'); ?>
            </div>
            <div class="col-md-4 fullname-profile">
                <h2 style="color: white">  <?php echo um_user('nickname'); ?></h2>
                <p style="color: white">Student</p>
            </div>

        </div>

        <?php
        // Start the Loop.
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
        <div class="tab-content">
            <?php
            require_once get_stylesheet_directory() . "/elsharq/profile/tabs/basic_information.php";
            require_once get_stylesheet_directory() . "/elsharq/profile/tabs/account.php";
            ?>
            <div class="tab-pane container fade" id="menu2">...</div>
            <?php
            require_once get_stylesheet_directory() . "/elsharq/profile/tabs/personality.php";
            require_once get_stylesheet_directory() . "/elsharq/profile/tabs/roles.php";

            ?>
        </div>

    </div><!-- #main-content -->
    </section>
<?php get_footer();
                                                                                                                                                                                                                                                                                                                       
