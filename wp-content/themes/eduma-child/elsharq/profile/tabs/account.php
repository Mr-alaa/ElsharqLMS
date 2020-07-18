<div class="tab-pane container fade basic-info" id="menu1" style="color: #a7aeb5 !important;">

    <h4 class="text-black">
        Account
    </h4>
    <div class="row col-md-12">
        <div class="form-group col-md-4">
            <label>User Name</label>
            <input class="form-control" readonly
                   value="<?= um_user("user_login") ?>">
        </div>
        <div class="col-md-4">
            <label>Email</label>
            <input class="form-control" readonly value="<?= um_user('user_email') ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Password</label>
            <input class="form-control" readonly
                   value="**********">
        </div>

    </div>
    <div class="form-group">
        <a href="<?= home_url() ?>/user/<?= um_user('user_login') ?>/?um_action=edit&editPassword"
           class="btn btn-google profile-btn ">Edit Password</a>
    </div>
</div>
