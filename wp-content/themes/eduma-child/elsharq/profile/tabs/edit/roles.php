<div class="container" id="roles_tabs" style="padding: 15px">
    <br>
    <h4 class="text-black" style="text-align: left;padding: 17px 0px">Roles</h4>

    <input id="userroleMaker" name="user_roles_maker"
           value="<?= get_user_meta(get_current_user_id(), 'user_roles_maker', true); ?>" type="hidden">
    <input id="userroleConnector" name="user_roles_connector"
           value="<?= get_user_meta(get_current_user_id(), 'user_roles_connector', true); ?>" type="hidden">
    <input id="userroleIdeaGenerator" name="user_idea_generator"
           value="<?= get_user_meta(get_current_user_id(), 'user_idea_generator', true); ?>" type="hidden">
    <input id="userroleCollaborator" name="user_roles_collaborator"
           value="<?= get_user_meta(get_current_user_id(), 'user_roles_collaborator', true); ?>" type="hidden">
    <div class="" style="width: 50%">
        <span class="pull-left ">Maker</span>
        <span class="progress-label"
              id="roleMakerLabel"><?= get_user_meta(get_current_user_id(), 'user_roles_maker', true); ?>%</span>

        <div class="progress" id="roleMaker">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_roles_maker', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="" style="width: 50%">
        <span class="pull-left ">Connector</span>
        <span class="progress-label"
              id="roleConnectorLabel"><?= get_user_meta(get_current_user_id(), 'user_roles_connector', true); ?>%</span>

        <div class="progress" id="roleConnector">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_roles_connector', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="" style="width: 50%">

        <span class="pull-left ">Idea Generator</span>
        <span class="progress-label"
              id="roleIdeaGeneratorLabel"><?= get_user_meta(get_current_user_id(), 'user_idea_generator', true); ?>%</span>

        <div class="progress" id="roleIdeaGenerator">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_idea_generator', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="" style="width: 50%">
        <span class="pull-left ">Collaborator</span>
        <span class="progress-label"
              id="roleCollaboratorLabel"><?= get_user_meta(get_current_user_id(), 'user_roles_collaborator', true); ?>%</span>

        <div class="progress" id="roleCollaborator">

            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width:<?= get_user_meta(get_current_user_id(), 'user_roles_collaborator', true); ?>%"></div>
        </div>
    </div>
    <br>
    <div class="um-col-alt">
        <div class="um-left um-half">
            <a id="updateRoles" href="<?= site_url() ?>/user/<?= um_user('user_login') ?>/?um_action=edit"
               class="um-button um-alt">
                Update Roles
            </a>
        </div>
        <div class="um-right um-half">
            <a href="<?= site_url() ?>/profile" class="um-button um-alt">
                Cancel </a>
        </div>
        <div class="um-clear"></div>

    </div>
</div>
<?php if ($_GET['action'] == 'updateProfileRoles') {
    $user_connector = $_GET["user_roles_connector"];
    $user_maker = $_GET["user_roles_maker"];
    $user_generator = $_GET["user_idea_generator"];
    $user_collaborator = $_GET["user_roles_collaborator"];
    update_user_meta(get_current_user_id(), 'user_roles_maker', $user_maker);
    update_user_meta(get_current_user_id(), 'user_idea_generator', $user_generator);
    update_user_meta(get_current_user_id(), 'user_roles_collaborator', $user_collaborator);
    update_user_meta(get_current_user_id(), 'user_roles_connector', $user_connector);
    wp_redirect(site_url() . "/profile?roles_updated=true");

}
