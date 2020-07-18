<?php
/**
 * Template Name: Template without Header / Footer / Sidebar
 * Template will display only the contents you had entered in the page editor
 */

if (is_user_logged_in()) {
    wp_redirect("profile");
} else {
    if (isset($_GET['invbractiveuser'])) {

        $inviteid = $_GET['invbractiveuser'];

        if (empty(get_option("invbr_" . $inviteid))) {
            wp_redirect("404");
        }
    } else {
        wp_redirect("404");
    }
    while (have_posts()) : the_post();
        the_content();
    endwhile;
}
?>
<style>
    .site-content {
        padding: 0 !important;
    }
</style>
<script>
    jQuery(document).ready(function ($) {

        $("#colophon").hide()
        $(".top_site_main").hide()
        $("#toolbar").hide()
        $("#user_email-11383").val("<?=get_option("invbr_" . $inviteid)?>")
        $("#user_email-11383").prop("readonly", true);
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        var ID = vars[1];
        $("#invalid-code").hide();

        if (ID == "invited=false") {
            $("#invalid-code").text("Invalid Code OR Email");
            $("#invalid-code").show();
        }

    });
</script>

