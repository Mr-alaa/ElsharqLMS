<?php 


	function invitation_based_registrations_register(){

		if(isset($_GET['invbractiveuser'])){
					
			$inviteid = $_GET['invbractiveuser'];
			if(get_option("invbr_".$inviteid)){
			    print_r(get_option("invbr_".$inviteid));
				$issuccess = false;
				$wperror = $username = $first_name = $last_name = $password = "";
				if(isset($_POST['invbr_register'])){
					if(isset($_POST['username'])) $username = sanitize_text_field($_POST['username']);
					if(isset($_POST['pwd'])) $password = sanitize_text_field($_POST['pwd']);
					if(isset($_POST['first_name'])) $first_name = sanitize_text_field($_POST['first_name']);
					if(isset($_POST['last_name'])) $last_name = sanitize_text_field($_POST['last_name']);
					$userdata = array(
						'user_login'  =>  $username,
						'user_email' =>   get_option("invbr_".$inviteid),
						'first_name' =>   $first_name,
						'last_name'  =>   $last_name,
						'user_pass'   =>  $password,
						'nickname' => $first_name,
						'display_name' => $first_name." ".$last_name
					);
					$user_id = wp_insert_user( $userdata ) ;
					if ( ! is_wp_error( $user_id ) ) {
						$issuccess = true;
					} else {
						$wperror = $user_id->get_error_message();
					}
				}
		
		$invbr_registration_header = get_option("invbr_registration_header") ? get_option("invbr_registration_header") : "Complete your Registration";
		$invbr_registration_username = get_option("invbr_registration_username") ? get_option("invbr_registration_username") : "Username";
		$invbr_registration_email = get_option("invbr_registration_email") ? get_option("invbr_registration_email") : "Email Address";
		$invbr_registration_password = get_option("invbr_registration_password") ? get_option("invbr_registration_password") : "Password";
		$invbr_registration_first_name = get_option("invbr_registration_first_name") ? get_option("invbr_registration_first_name") : "First Name";
		$invbr_registration_last_name = get_option("invbr_registration_last_name") ? get_option("invbr_registration_last_name") : "Last Name";
		$invbr_registration_submit = get_option("invbr_registration_submit") ? get_option("invbr_registration_submit") : "Register";
		
		echo '<body class="login login-action-login wp-core-ui locale-en-us"><div id="login">
		<link rel="stylesheet" href="'.site_url().'/wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp" type="text/css" media="all" />
		<form name="loginform" id="loginform" action="" method="post">
		<h2>'.$invbr_registration_header.'</h2><br><hr>';
		
		if(!empty($wperror)){ echo "<span style=color:red>".$wperror."</a><br>"; $wperror = "";}
		else if($issuccess){ 
			$register_redirect_url = get_option("invbr_register_redirect_url");
			if(!empty($register_redirect_url)) {
				echo '<script>window.location.href = "'.$register_redirect_url.'";</script>';
				exit;
			}
			
			echo "<br><span style=color:green>Registration successful. You can continue to <a href='".site_url()."/wp-admin'>login here.</a><br></form></body>";exit;
		}
		
		echo '<br><p><label for="user_username">'.$invbr_registration_username.'<br /><input type="text" name="username" id="user_username" class="input" value="'.$username.'" size="20" /></label></p>
		<p><label for="user_email">'.$invbr_registration_email.'<br /><input type="text" name="email" id="user_email" readonly disabled class="input" value="'.get_option("invbr_".$inviteid).'" size="20" /></label></p>
		<p><label for="user_pass">'.$invbr_registration_password.'<br /><input type="password" name="pwd" id="user_pass" class="input" value="'.$password.'" size="20" /></label></p>
		<p><label for="first_name">'.$invbr_registration_first_name.'<br /><input type="text" name="first_name" id="first_name" class="input" value="'.$first_name.'" size="20" /></label></p>
		<p><label for="last_name">'.$invbr_registration_last_name.'<br /><input type="text" name="last_name" id="last_name" class="input" value="'.$last_name.'" size="20" /></label></p>
		<input type="hidden" name="invbr_register" value="1" />
		<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="'.$invbr_registration_submit.'" /></p>
	</form><br><br></body>';
			exit;
		} else {
			 wp_die("No Invitation request found for your ID. Please contact your administrator.");
		}
		}
	}

?>
