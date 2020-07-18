<div class="tab-pane container fade" id="roles">
    <h4 style="color: black !important;">
        Roles
    </h4>
    <div class="" style="width: 50%">
        <span class="progress-label"><?= get_user_meta(get_current_user_id(), 'user_roles_maker', true); ?>%</span>

        <span class="pull-left ">Maker</span>


        <div class="progress">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_roles_maker', true); ?>%"></div>
        </div>
    </div>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_roles_connector', true); ?>%</span>

        <span class="pull-left ">Connector</span>
        <!--        <span class="pull-right ">Feeling</span>-->

        <div class="progress" >

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_roles_connector', true); ?>%"></div>
        </div>
    </div>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_idea_generator', true); ?>%</span>

        <span class="pull-left ">Idea Generator</span>
        <div class="progress" id="introvert">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_idea_generator', true); ?>%"></div>
        </div>
    </div>
    <div class="" style="width: 50%">
                      <span class="progress-label"
                            id="introvertLabel"><?= get_user_meta(get_current_user_id(), 'user_roles_collaborator', true); ?>%</span>

        <span class="pull-left ">Collaborator</span>

        <div class="progress" id="introvert">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?= get_user_meta(get_current_user_id(), 'user_roles_collaborator', true); ?>%"></div>
        </div>
    </div>
    <div class="form-group">
        <a href="<?= home_url() ?>/user/<?= um_user('full_name') ?>/?um_action=edit&roles"
           class="btn btn-google profile-btn ">Edit Roles</a>
    </div>
</div>
