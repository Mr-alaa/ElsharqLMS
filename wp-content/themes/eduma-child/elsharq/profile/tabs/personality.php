<div class="tab-pane container fade" id="personality">
    <h4 style="color: black !important;">
        Personality
    </h4>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_introvert', true); ?>%</span>

        <span class="pull-left ">Introvert</span>
        <span class="pull-right ">Extrovert</span>

        <div class="progress">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_introvert', true); ?>%"></div>
        </div>
    </div>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_thinking', true); ?>%</span>

        <span class="pull-left ">Thinking</span>
        <span class="pull-right ">Feeling</span>

        <div class="progress">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_thinking', true); ?>%"></div>
        </div>
    </div>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_sensing', true); ?>%</span>

        <span class="pull-left ">Sensing</span>
        <span class="pull-right ">Intuition</span>

        <div class="progress">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_sensing', true); ?>%"></div>
        </div>
    </div>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_judging', true); ?>%</span>

        <span class="pull-left ">Judging</span>
        <span class="pull-right ">Perceiving</span>

        <div class="progress">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_judging', true); ?>%"></div>
        </div>

    </div>
    <div class="form-group">
        <a href="<?= home_url() ?>/user/<?= um_user('user_login') ?>/?um_action=edit&personality"
           class="btn btn-google profile-btn ">Edit Personality</a>
    </div>
</div>
