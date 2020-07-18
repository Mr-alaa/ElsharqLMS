jQuery(document).ready(function ($) {
        showBasicInformation();

        // to change progress for personality and roles
        function changeProgress(element, e) {
            var ID = element.attr("id");
            var position = element.offset();
            var progressWidth = element.width();
            let clickPosition = e.pageX - position.left;
            jQuery("#" + ID + " .progress-bar").width((clickPosition / progressWidth) * 100 + '%')
            jQuery("#" + ID + "Label").text(Math.round((clickPosition / progressWidth) * 100) + '%')
            jQuery("#user" + ID).val(Math.round((clickPosition / progressWidth) * 100))

        }

        /// to get id from url to choose which tab to open
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        var ID = vars[1];
        if (ID == 'personality') {
            $('#personality').trigger('click');
            showPersonality()

        }
        if (ID == 'roles') {
            $('#roles').trigger('click');
            showRoles()

        }
        if (ID == 'editPassword') {
            $('#account').trigger('click');
            showAccount()

        }
        //end
        ///to update personality
        jQuery("#updatePersonality").on("click", function () {
            var href = $(this).attr('href');
            var userIntrovert = $('#userintrovert').val();
            var userThinking = $('#userthinking').val();
            var userSensing = $('#usersensing').val();
            var userJudging = $('#userjudging').val();
            $(this).attr("href", href + '&action=updatePersonality&user_introvert=' + userIntrovert + '&user_thinking=' + userThinking + '&user_sensing=' + userSensing + '&user_judging=' + userJudging);
        });
        ///end
        ///to update Roles

        jQuery("#updateRoles").on("click", function () {
            var href = $(this).attr('href');
            var userRoleMaker = $('#userroleMaker').val();
            var userRoleConnector = $('#userroleConnector').val();
            var userRoleGenerator = $('#userroleIdeaGenerator').val();
            var userRoleCollaborator = $('#userroleCollaborator').val();
            $(this).attr("href", href + '&action=updateProfileRoles&user_roles_connector=' + userRoleConnector + '&user_roles_maker=' + userRoleMaker + '&user_idea_generator=' + userRoleGenerator + '&user_roles_collaborator=' + userRoleCollaborator);
        });
        ///end

        jQuery('#introvert').click(function (e) {
            changeProgress(jQuery(this), e);
        });
        jQuery('#thinking').click(function (e) {
            changeProgress(jQuery(this), e);
        });
        jQuery('#sensing').click(function (e) {
            changeProgress(jQuery(this), e);
        });
        jQuery('#judging').click(function (e) {
            changeProgress(jQuery(this), e);
        });
        jQuery('#roleMaker').click(function (e) {
            changeProgress(jQuery(this), e);

        });
        jQuery('#roleConnector').click(function (e) {
            changeProgress(jQuery(this), e);

        });
        jQuery('#roleIdeaGenerator').click(function (e) {
            changeProgress(jQuery(this), e);

        });
        jQuery('#roleCollaborator').click(function (e) {
            changeProgress(jQuery(this), e);

        });


        jQuery("#account").on('click', function () {
            showAccount();

        });
        jQuery("#basic_information").on('click', function () {
            showBasicInformation();

        });
        jQuery("#personality").on('click', function () {
            showPersonality();

        });
        jQuery("#learningPath").on('click', function () {
            learningPath();

        });
        jQuery("#roles").on('click', function () {
            showRoles();

        });

        function showBasicInformation() {
            jQuery(".um-profile-body").show();
            jQuery("#change_password").hide()
            jQuery("#personality_tabs").hide()
            jQuery("#roles_tabs").hide()
        }

        function showAccount() {
            jQuery(".um-profile-body").hide();
            jQuery("#change_password").show()
            jQuery("#personality_tabs").hide()
            jQuery("#roles_tabs").hide()
        }

        function showPersonality() {
            jQuery(".um-profile-body").hide();
            jQuery("#change_password").hide()
            jQuery("#personality_tabs").show()
            jQuery("#roles_tabs").hide()

        }

        function showRoles() {
            jQuery(".um-profile-body").hide();
            jQuery("#change_password").hide()
            jQuery("#personality_tabs").hide()
            jQuery("#roles_tabs").show()
        }
        function learningPath() {
            jQuery(".um-profile-body").hide();
            jQuery("#change_password").hide()
            jQuery("#personality_tabs").hide()
            jQuery("#roles_tabs").hide()
        }

        function changePassword(newPassword, confirm) {
            if ($("#" + newPassword).val().length == 0) {
                $('#newPasswordMessage').innerText = "tes";
                $('#newPasswordMessage').show();
                return false;

            }

        }

        $('#confirmPassword').on("keyup", function () {
            if ($("#newPassword").val() == $("#confirmPassword").val()) {
                $('#confirmPasswordMessage').hide();
            } else {

                $('#confirmPasswordMessage').text("password doesn`t match");
                $('#confirmPasswordMessage').show();
            }
        });
        $('#newPassword').on("keyup", function () {
            if ($("#newPassword").val().length < 6) {
                $('#newPasswordMessage').text("password is less than 6");

                $('#newPasswordMessage').show();
            } else {
                $('#newPasswordMessage').hide();
            }
        });
        $("#submitNewPassword").on("click", function (e) {
            if ($("#newPassword").val().length < 6) {
                e.preventDefault()

                $('#newPasswordMessage').text("password is less than 6");
                $('#newPasswordMessage').show();
                return false
            } else {
                $('#newPasswordMessage').hide();


            }
            if ($("#newPassword").val() != $("#confirmPassword").val()) {
                e.preventDefault()

                $('#confirmPasswordMessage').text("password doesn`t match");
                $('#confirmPasswordMessage').show();
                return false
            } else {
                $('#confirmPasswordMessage').hide();

            }

            if ($("#newPassword").val() == $("#confirmPassword").val()) {
                var newPassword = $('#newPassword').val();
                var href = $(this).attr('href');

                $("#submitNewPassword").attr("href", href + '&action=getNewPassword&newPassword=' + newPassword);
                $("#submitNewPassword").unbind("click");

            }
            return true
        })
    }
);

