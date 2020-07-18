<div class="container" id="personality_tabs" style="padding: 15px">
    <br>
    <h4 class="text-black" style="text-align: left;padding: 17px 0px">Personality</h4>

    <input id="userintrovert" name="user_introvert"
           value="<?= get_user_meta(get_current_user_id(), 'user_introvert', true); ?>" type="hidden">
    <input id="userthinking" name="user_thinking"
           value="<?= get_user_meta(get_current_user_id(), 'user_thinking', true); ?>" type="hidden">
    <input id="usersensing" name="user_sensing"
           value="<?= get_user_meta(get_current_user_id(), 'user_sensing', true); ?>" type="hidden">
    <input id="userjudging" name="user_judging"
           value="<?= get_user_meta(get_current_user_id(), 'user_judging', true); ?>" type="hidden">
    <div class="" style="width: 50%">
        <span class="pull-left ">Introvert</span>
        <span class="pull-right ">Extrovert</span>
        <span class="progress-label"
              id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_introvert', true); ?>%</span>

        <div class="progress" id="introvert">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_introvert', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="" style="width: 50%">
        <span class="pull-left ">Thinking</span>
        <span class="pull-right ">Feeling</span>
        <span class="progress-label"
              id="thinkingLabel"><?= get_user_meta(get_current_user_id(), 'user_thinking', true); ?>%</span>

        <div class="progress" id="thinking">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_thinking', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="" style="width: 50%">

        <span class="pull-left ">Sensing</span>
        <span class="pull-right ">Intuition</span>
        <span class="progress-label"
              id="sensingLabel"><?= get_user_meta(get_current_user_id(), 'user_sensing', true); ?>%</span>

        <div class="progress" id="sensing">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_sensing', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="" style="width: 50%">
        <span class="pull-left ">Judging</span>
        <span class="pull-right ">Perceiving</span>
        <span class="progress-label"
              id="judgingLabel"><?= get_user_meta(get_current_user_id(), 'user_judging', true); ?>%</span>

        <div class="progress" id="judging">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_judging', true); ?>%"></div>
        </div>
    </div>
    <br>

    <div class="um-col-alt">
        <div class="um-left um-half">
            <a class="um-button um-alt" id="updatePersonality"
               href="<?= site_url() ?>/user/<?= um_user('user_login') ?>/?um_action=edit">Update Personality</a>

        </div>
        <div class="um-right um-half">
            <a href="<?= site_url() ?>/profile" class="um-button um-alt">
                Cancel </a>
        </div>
        <div class="um-clear"></div>

    </div>
</div>
<?php if ($_GET['action'] == 'updatePersonality') {
    $user_introvert = $_GET["user_introvert"];
    $user_thinking = $_GET["user_thinking"];
    $user_sensing = $_GET["user_sensing"];
    $user_judging = $_GET["user_judging"];
    update_user_meta(get_current_user_id(), 'user_introvert', $user_introvert);
    update_user_meta(get_current_user_id(), 'user_thinking', $user_thinking);
    update_user_meta(get_current_user_id(), 'user_sensing', $user_sensing);
    update_user_meta(get_current_user_id(), 'user_judging', $user_judging);
    wp_redirect(site_url() . "/profile?personality_updated=true");

}
