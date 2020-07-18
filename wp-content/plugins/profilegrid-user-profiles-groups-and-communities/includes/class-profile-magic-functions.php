<?php

class Profile_Magic_Basic_Functions 
{
	
    private $profile_magic;
		
    private $version;
		

    public function __construct( $profile_magic, $version ) 
    {
        $this->profile_magic = $profile_magic;
        $this->version = $version;
    }

    public function null_field_notice() 
    {
       //echo $this->profile_magic;
         _e( 'Some of the options below require selecting fields from your form. Since you are creating new form from scratch, there are no fields in this form yet. You can come back later and modify these field specific options. You can safely ignore them for now and save the settings.','profilegrid-user-profiles-groups-and-communities' );
    }
    
    public function get_all_users_for_combo_box($arg=array())
    {
        $wp_users = get_users($arg);
        // Array of WP_User objects.
        if(!empty($wp_users))
        {
        foreach ( $wp_users as $user ) {
                $pm_users[] =  '"'.esc_html( $user->user_login).'"';
        }
        $all_users = implode(",",$pm_users);
        }
        else
        {
            return false;
        }
        return $all_users;
    }
	
    public function get_error_frontend_message()
    {
        $error = array();
		$error['pass_length'] = __('Your password should be at least 7 characters long.','profilegrid-user-profiles-groups-and-communities');
		$error['confirm_pass_not_match'] = __('Password and confirm password do not match.','profilegrid-user-profiles-groups-and-communities');
		$error['email_not_valid'] = __('Please enter a valid e-mail address.','profilegrid-user-profiles-groups-and-communities');
		$error['number_not_valid'] = __('Please enter a valid number.','profilegrid-user-profiles-groups-and-communities');
		$error['date_not_valid'] = __('Please enter a valid date (yyyy-mm-dd format)','profilegrid-user-profiles-groups-and-communities');
		$error['required_field'] = __('This is a required field','profilegrid-user-profiles-groups-and-communities');
		$error['file_type_not_valid'] = __('This file type is not allowed.','profilegrid-user-profiles-groups-and-communities');
		$error['number_not_valid'] = __('Please enter a valid number.','profilegrid-user-profiles-groups-and-communities');
		$error['number_not_valid'] = __('Please enter a valid number.','profilegrid-user-profiles-groups-and-communities');
		$error['number_not_valid'] = __('Please enter a valid number.','profilegrid-user-profiles-groups-and-communities');
		$error['number_not_valid'] = __('Please enter a valid number.','profilegrid-user-profiles-groups-and-communities');
		
		return $error;
    }
    
    public function get_pg_extension_activate_url($path)
    {
        $plugin = $path;
        if (strpos($path, '/')) {
            $path = str_replace('/', '%2F', $path);
        }
        $activateUrl = sprintf(admin_url('plugins.php?action=activate&plugin=%s'), $path);    
        $activateUrl = wp_nonce_url($activateUrl, 'activate-plugin_' . $plugin);
        return $activateUrl;
    }
    
    public function pg_extension_install_button($plugin)
    {
        $data = new stdClass;
        $data->pg_extsion_install_url = $this->pg_get_extension_install_url($plugin);
        $data->pg_extsion_activate_url = '';
        $data->is_pg_extension_activate = $this->pg_is_extension_activated($plugin);
        $data->pg_extsion_page_url = '';
        if($data->is_pg_extension_activate) 
        {
            $data->is_pg_extension_installed = true;
        } 
        else 
        {
            $plugins = get_plugins();
            $path = $this->pg_extention_plugin_path($plugin);
            $data->is_pg_extension_installed = array_key_exists($path, $plugins);
            if($data->is_pg_extension_installed)
            {
                $data->pg_extsion_activate_url = $this->get_pg_extension_activate_url($path);
            }
            else
            {
                $data->pg_get_extension_install_url = $this->pg_get_extension_install_url($plugin);
            }
        }  
        return $data;
    }
    
    public function pg_extention_plugin_path($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $path = 'profilegrid-user-profiles-groups-and-communities-stripe-payment-gateway/profilegrid-stripe-payment.php';
                break;
            case 'GROUPWALL':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-group-wall/profilegrid-group-wall.php';
                break;
            case 'DISPLAY_NAME':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-display-name/profilegrid-display-name.php';
                break; 
            case 'GROUP_PHOTOS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-group-photos/profilegrid-group-photos.php';
                break; 
            case 'CUSTOM_PROFILE_SLUG':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-userid-slug-changer/profilegrid-userid-slug-changer.php';
                break;
            case 'CUSTOM_GROUP_FIELDS':
                $path = 'profilegrid-user-profiles-groups-and-communities-ProfileGrid-Custom-Group-Fields/profilegrid-group-fields.php';
                break;
            case 'GEOLOCATION':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-geolocation/profilegrid-geolocation.php';
                break;
            case 'FRONTEND_GROUP':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-front-end-groups/profilegrid-front-end-groups.php';
                break;
            case 'BBPRESS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-bbpress/profilegrid-bbpress.php';
                break;
            case 'WOOCOMMERCE':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-woocommerce/profilegrid-woocommerce.php';
                break;
            case 'MAILCHIMP':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-mailchimp/profilegrid-mailchimp.php';
                break;
            case 'SOCIALLOGIN':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-social-connect/profilegrid-social-connect.php';
                break;
            case 'CUSTOM_TAB':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-custom-profile-tabs/profilegrid-custom-profile-tabs.php';
                break;
            case 'FRONTEND_GROUP_MANAGER':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-frontend-group-manager/profilegrid-frontend-group-manager.php';
                break;
            case 'MULTI_ADMINS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-multi-group-managers/profilegrid-group-multi-admin.php';
                break;
            case 'ADVANCED_WOOCOMMERCE':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-advanced-woocommerce-integration/profilegrid-advanced-woocommerce.php';
                break;
            case 'MYCRED':
                $path = 'profilegrid-user-profiles-groups-and-communities-ProfileGrid-myCred/profilegrid-mycred.php';
                break;
            case 'EVENTS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-eventprime-integration/profilegrid-eventprime-integration.php';
                break;
            case 'WISHLIST':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-woocommerce-wishlist/profilegrid-woocommerce-wishlist.php';
                break;
            case 'INSTAGRAM':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-instagram-integration/profilegrid-instagram-integration.php';
                break;
            case 'USER_PROFILE_LABELS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-profile-labels/profilegrid-profile-labels.php';
                break;
            case 'LOGIN_LOGOUT_MENU':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-menu-integration/profilegrid-menu-integration.php';
                break;
            case 'PROFILE_USER_STATUS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-user-profile-status/profilegrid-user-profile-status.php';
                break;
            case 'PROFILE_USER_PHOTOS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-user-photos/profilegrid-user-photos-extension.php';
                break;
            case 'MENU_RESTRICTIONS':
                $path = 'profilegrid-user-profiles-groups-and-communities-profilegrid-menu-restrictions/profilegrid-menu-restriction.php';
                break;
            
        }
        return $path;
    }
    
    public function pg_is_extension_activated($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $is_activate = class_exists("Profilegrid_Stripe_Payment");
                break;
            case 'GROUPWALL':
                $is_activate = class_exists("Profilegrid_Group_Wall");
                break;
            case 'DISPLAY_NAME':
                $is_activate = class_exists("Profilegrid_Display_Name");
                break;
            case 'GROUP_PHOTOS':
                $is_activate = class_exists("Profilegrid_Group_photos");
                break;
            case 'CUSTOM_PROFILE_SLUG':
                $is_activate = class_exists("Profilegrid_Userid_Slug_Changer");
                break;
            case 'CUSTOM_GROUP_FIELDS':
                $is_activate = class_exists("Profilegrid_Group_Fields");
                break;
            case 'GEOLOCATION':
                $is_activate = class_exists("Profilegrid_Geolocation");
                break;
            case 'FRONTEND_GROUP':
                $is_activate = class_exists("Profilegrid_Front_End_Groups");
                break;
            case 'BBPRESS':
                $is_activate = class_exists("Profilegrid_Bbpress");
                break;
            case 'WOOCOMMERCE':
                $is_activate = class_exists("Profilegrid_Woocommerce");
                break;
            case 'MAILCHIMP':
                $is_activate = class_exists("Profilegrid_Mailchimp");
                break;
            case 'SOCIALLOGIN':
                $is_activate = class_exists("Profilegrid_Social_Connect");
                break;
            case 'CUSTOM_TAB':
                $is_activate = class_exists("Profilegrid_User_Content");
                break;
            case 'FRONTEND_GROUP_MANAGER':
                $is_activate = class_exists("Profilegrid_Admin_Power");
                break;
            case 'MULTI_ADMINS':
                $is_activate = class_exists("Profilegrid_Group_Multi_Admins");
                break;
            case 'ADVANCED_WOOCOMMERCE':
                $is_activate = class_exists("Profilegrid_Advanced_Woocommerce");
                break;
            case 'MYCRED':
                $is_activate = class_exists("Profilegrid_Mycred");
                break;
            case 'EVENTS':
                $is_activate = class_exists("Profilegrid_EventPrime_Integration");
                break;
            case 'WISHLIST':
                $is_activate = class_exists("Profilegrid_Woocommerce_Wishlist");
                break;
            case 'INSTAGRAM':
                $is_activate = class_exists("Profilegrid_Instagram_Integration");
                break;
            case 'USER_PROFILE_LABELS':
                $is_activate = class_exists("Profilegrid_Profile_Labels");
                break;
            case 'LOGIN_LOGOUT_MENU':
                $is_activate = class_exists("Profilegrid_Menu_Integration");
                break;
            case 'PROFILE_USER_STATUS':
                $is_activate = class_exists("Profilegrid_User_Profile_Status");
                break;
            case 'PROFILE_USER_PHOTOS':
                $is_activate = class_exists("Profilegrid_User_Photos_Extension");
                break;
            case 'MENU_RESTRICTIONS':
                $is_activate = class_exists("Profilegrid_Menu_Restriction");
                break;
                
        }
        return $is_activate;
    }
    
    public function pg_get_extension_install_url($plugin)
    {
        $dbhandler = new PM_DBhandler;
        switch($plugin)
        {
            case 'WOOCOMMERCE':
                $url = "https://profilegrid.co/extensions/woocommerce-integration/";
                break;
            
            case 'DISPLAY_NAME':
                $url = "https://profilegrid.co/extensions/user-display-name/";
                break;
            
            case 'CUSTOM_PROFILE_SLUG':
                $url = "https://profilegrid.co/extensions/user-profile-custom-slugs/";
                break;
            
            case 'BBPRESS':
                $url = "https://profilegrid.co/extensions/bbpress-integration/";
                break;
            
             case 'EVENTS':
                $url = "http://profilegrid.co/extensions/eventprime-integration/";
                break;
            
            case 'STRIPE':
                $url = "https://profilegrid.co/extensions/stripe-payment-system/";
                break;
            
            case 'GROUPWALL':
                $url = "https://profilegrid.co/extensions/group-wall/";
                break;
            
            case 'GROUP_PHOTOS':
                $url = "https://profilegrid.co/extensions/group-photos/";
                break;
            
            case 'CUSTOM_GROUP_FIELDS':
                 $url = "https://profilegrid.co/extensions/custom-group-fields/";
                break;
            
            case 'GEOLOCATION':
                 $url = "https://profilegrid.co/extensions/geolocation/";
                break;
            
            case 'FRONTEND_GROUP':
                $url = "https://profilegrid.co/extensions/frontend-group-creator/";
                break;
            
            case 'MAILCHIMP':
                $url = "https://profilegrid.co/extensions/mailchimp-integration/";
                break;
            
            case 'SOCIALLOGIN':
                $url = "https://profilegrid.co/extensions/social-login/";
                break;
            
            case 'CUSTOM_TAB':
                $url = "https://profilegrid.co/extensions/custom-user-profile-tabs-content/";
                break;
            
            case 'FRONTEND_GROUP_MANAGER':
                $url = "https://profilegrid.co/extensions/frontend-group-manager/";
                break;
            
            case 'ADVANCED_WOOCOMMERCE':
                $url = "https://profilegrid.co/extensions/advanced-woocommerce-integration/";
                break;
            
            case 'MULTI_ADMINS':
                $url = "https://profilegrid.co/extensions/multi-group-managers/";
                break;
            
            case 'MYCRED':
                $url = "https://profilegrid.co/extensions/mycred-integration/";
                break;
           
            case 'WISHLIST':
                $url = "https://profilegrid.co/extensions/woocommerce-wishlist/";
                break;
            
            case 'INSTAGRAM':
                $url = "https://profilegrid.co/extensions/instagram-integration/";
                break;
            
            case 'USER_PROFILE_LABELS':
                $url = "https://profilegrid.co/extensions/profilegrid-profile-labels/";
                break;
            case 'LOGIN_LOGOUT_MENU':
                $url = "https://profilegrid.co/extensions/profilegrid-login-logout-menu/";
                break;
            case 'PROFILE_USER_STATUS':
                $url = "https://profilegrid.co/extensions/profilegrid-user-profile-status/";
                break;
            case 'PROFILE_USER_PHOTOS':
                $url = "https://profilegrid.co/extensions/profilegrid-user-photos/";
                break;
            case 'MENU_RESTRICTIONS':
                $url = "https://profilegrid.co/extensions/profilegrid-menu-restrictions/";
                break;
            default:
                $url = "http://profilegrid.co/extensions/";
                break;  
        }
        
        $mgp = $this->get_current_theme_aff_id();
        if($mgp)
        {
            $url = 'https://metagauss.com/get-profilegrid-for-wordpress/?mgp='.$mgp;
        }
                
        return $url;
    }
    
    public function pg_get_extension_options_url($plugin)
    {
        switch($plugin)
        {
            case 'STRIPE':
                $url = admin_url('admin.php?page=pm_payment_settings');
                break;
            case 'GROUPWALL':
                $url = admin_url('admin.php?page=pm_group_wall_settings');
                break;
            case 'DISPLAY_NAME':
                $url = admin_url('admin.php?page=pm_display_name_settings');
                break;
            case 'GROUP_PHOTOS':
                $url = admin_url('admin.php?page=pm_group_photos_settings');
                break;
            case 'CUSTOM_PROFILE_SLUG':
                $url = admin_url('admin.php?page=pm_uid_changer_settings');
                break;
            case 'CUSTOM_GROUP_FIELDS':
                $url = admin_url('admin.php?page=pm_group_fields_settings');
                break;
            case 'GEOLOCATION':
                $url = admin_url('admin.php?page=pm_geolocation_settings');
                break;
            case 'FRONTEND_GROUP':
                $url = admin_url('admin.php?page=pm_front_end_groups_settings');
                break;
            case 'BBPRESS':
                $url = admin_url('admin.php?page=pm_bbpress_settings');
                break;
            case 'WOOCOMMERCE':
                $url = admin_url('admin.php?page=pm_woocommerce_settings');
                break;
            case 'MAILCHIMP':
                $url = admin_url('admin.php?page=pm_mailchimp_settings');
                break;
            case 'SOCIALLOGIN':
                $url = admin_url('admin.php?page=pm_social_connect_settings');
                break;
            case 'CUSTOM_TAB':
                $url = admin_url('admin.php?page=pm_user_content_settings');
                break;
            case 'ADVANCED_WOOCOMMERCE':
                $url = admin_url('admin.php?page=pm_advanced_woocommerce_settings');
                break;
            case 'MYCRED':
                $url = admin_url('admin.php?page=pm_mycred_settings');
                break;
            case 'WISHLIST':
                $url = admin_url('admin.php?page=pm_woocommerce_wishlist_settings');
                break;
            case 'INSTAGRAM':
                $url = admin_url('admin.php?page=pm_instagram_settings');
                break;
            case 'USER_PROFILE_LABELS':
                $url = admin_url('admin.php?page=pm_profile_labels_menu');
                break;
            case 'LOGIN_LOGOUT_MENU':
                $url = admin_url('admin.php?page=pm_menu_integration_settings');
                break;
            case 'PROFILE_USER_STATUS':
                $url = admin_url('admin.php?page=pm_profile_user_status_settings');
                break;
            case 'PROFILE_USER_PHOTOS':
                $url = admin_url('admin.php?page=pm_user_photos_settings');
                break;
            
            default:
                 $url = admin_url('admin.php?page=pm_settings');
                break;  
        }
        return $url;
    }
    
    public function pg_get_title_link($plugin)
    {
       return $this->pg_get_extension_install_url($plugin);
    }
    
    public function pg_get_extension_button($plugin)
    {
        $data = $this->pg_extension_install_button($plugin);
        $optionurl = $this->pg_get_extension_options_url($plugin);
        if($data->is_pg_extension_activate)
        {
            if($plugin !='FRONTEND_GROUP_MANAGER' && $plugin !='MULTI_ADMINS' && $plugin !='EVENTS' && $plugin !='MENU_RESTRICTIONS'):
        ?>
            <li>
            <a class="install-now button pg-install-now-btn" href="<?php echo $optionurl;?>"><?php _e("OPTIONS","profilegrid-user-profiles-groups-and-communities");?></a>
            </li>
        <?php
            endif;
        }
        elseif($data->is_pg_extension_installed)
        {
            ?>
            <li>
            <a class="install-now button pg-install-now-btn" href="<?php echo $data->pg_extsion_activate_url;?>"><?php _e("Activate Now","profilegrid-user-profiles-groups-and-communities");?></a>
            </li>
        <?php
        }
        else
        {
            if($plugin=='CUSTOM_PROFILE_SLUG' || $plugin=='DISPLAY_NAME' || $plugin=='BBPRESS' || $plugin=='WOOCOMMERCE' || $plugin=='EVENTS' || $plugin=='LOGIN_LOGOUT_MENU')
            {
                $title = __('Free','profilegrid-user-profiles-groups-and-communities');
                $class = 'green_bg';
            }
            else
            {
                $class = '';
                $title = __('More Info','profilegrid-user-profiles-groups-and-communities');
            }
            ?>
            <li>
            <a class="install-now button pg-install-now-btn <?php echo $class;?>" target="_blank" href="<?php echo $data->pg_get_extension_install_url;?>"><?php echo $title;?></a>
            </li>
            <?php 
        }
    }
    
    public function pg_get_extension_shortcode($plugin)
    {
        $data = $this->pg_extension_install_button($plugin);
        $optionurl = $this->pg_get_extension_options_url($plugin);
        if($data->is_pg_extension_installed)
        {
            $link =  '<a class="pg_shortcode_link" href="'.$data->pg_extsion_activate_url.'">'.__("Activate Now","profilegrid-user-profiles-groups-and-communities").'</a>';

        }
        else
        {
           
            $link = '<a class="pg_shortcode_link" target="_blank" href="'.$data->pg_get_extension_install_url.'">'.__("More Info","profilegrid-user-profiles-groups-and-communities").'</a>';
          
        }
        return $link;
            
    }
    
    public function pg_check_free_extension($plugin)
    {
        switch($plugin)
        {
            case 'DISPLAY_NAME':
                return true;
                break;
            case 'CUSTOM_PROFILE_SLUG':
                return true;
                break;
            default:
                return false;
                break;
        }
    }
    
    public function get_current_theme_aff_id(){
        $current_theme = $this->pg_get_current_theme_name();
        $set_of_themes = $this->pg_get_theme_list_obj();
        //return $set_of_themes;
        if(!empty($set_of_themes) && property_exists($set_of_themes,$current_theme))
            return intval($set_of_themes->$current_theme);
        else
            return false;
    }
   
    public function pg_get_current_theme_name(){
        $theme_obj = wp_get_theme();
        return $theme_obj->__get('title');
    }
   
    public function pg_get_theme_list_obj(){
        $path =  plugin_dir_url(__FILE__);
        $file_path = $path . 'theme-list.json';
        $raw_json = file_get_contents($file_path);
        if($raw_json != false) {
            $raw_json = utf8_encode($raw_json);
            return json_decode($raw_json);
        } else {
            return false;
        }
    }
    
    
	
}
