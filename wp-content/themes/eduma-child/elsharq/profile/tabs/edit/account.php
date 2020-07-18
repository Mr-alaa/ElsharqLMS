<div class="container " id="change_password" style="padding: 15px 30px">
    <h4 class="text-black" style="text-align: left;padding: 17px 0px">Account</h4>

    <div class="row" style="text-align: left">
        <!--        <form method="post" action="">-->
        <div class="col-md-3">
            <label>Email</label>
            <input class="form-control" readonly disabled value="<?= um_user('user_email') ?>"
                   style="height: 27px">
        </div>
        <div class="col-md-3">
            <label>Password</label>
            <input id="newPassword" class="form-control" type="password" name="new_password" required>
            <label id="newPasswordMessage" style="display: none"></label>

        </div>
        <div class="col-md-3">
            <label>Confirm Password</label>
            <input id="confirmPassword" class="form-control" type="password" required>
            <label id="confirmPasswordMessage" style="display: none"></label>
        </div>

        <!--        </form>-->
    </div>

    <br>

    <div class="um-col-alt">


        <div class="um-left um-half">
            <a id="submitNewPassword"
               href="<?= site_url() ?>/user/<?= um_user('user_login') ?>/?um_action=edit"
               class="um-button um-alt"
               value="getNewPassword" name="submitNewPassword">Change password
            </a>
        </div>
        <div class="um-right um-half">
            <a href="<?= site_url() ?>/profile" class="um-button um-alt">
                Cancel </a>
        </div>


        <div class="um-clear"></div>

    </div>
</div>
<?php
if ($_GET['action'] == 'getNewPassword' && !empty($_GET['newPassword'])) {
    $user = get_current_user();
    wp_set_password($_GET['newPassword'], get_current_user_id());
    wp_signon(array('user_login' => um_user("user_login"), 'user_password' => $_GET['newPassword']));
    wp_redirect(site_url() . "/profile?password_updated=true");

}
?>
