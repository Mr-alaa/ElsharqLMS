<div class="tab-pane container active basic-info" id="home" style="color: #a7aeb5 !important;">
    <h4 style="color: black !important;">
        Basic Info
    </h4>
    <?php if (isset($_GET["password_updated"]) && $_GET["password_updated"] == true) {
        ?>
        <div class="alert alert-success" role="alert">
            password updated successfully
        </div>
        <?php
    }
    ?>
    <div class="row col-md-12">


        <div class="col-md-4">
            <label>Full Name</label>
            <input class="form-control" readonly value="<?= um_user('nickname') ?>">
        </div>
        <div class="form-group col-md-4">
            <label>ID Number</label>
            <input class="form-control" readonly
                   value="<?= um_user("user_id_numbers") != '' ? um_user("user_id_numbers") : '123456789' ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Birth Date</label>
            <input class="form-control" readonly
                   value="<?= um_user("birth_date") != '' ? um_user("birth_date") : 'dd/mm/yyyy' ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Country</label>
            <select class="form-control" readonly>
                <option disabled
                        selected> <?= um_user("country") != '' ? um_user("country") : 'country' ?></option>
            </select>
        </div>
        <div class="form-group col-md-8">
            <label>BIO</label>
            <textarea class="form-control"
                      readonly
                      style="height: 100px"><?= um_user("description") != '' ? um_user("description") : 'description' ?>
                        </textarea>
        </div>
    </div>
    <br>
    <div class="form-group">
        <a class="btn btn-google profile-btn"
           href="<?= site_url() ?>/user/<?= um_user('user_login') ?>/?um_action=edit">Edit Profile</a>
    </div>
</div>
