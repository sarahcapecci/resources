<?php

/*
Plugin Name: SP Client Document Manager Premium Trial
Plugin URI: http://www.smartypantsplugins.com
Description: Premium base file for SP Client Document Manager
Author: Anthony Brown
Author URI: http://www.smartypantsplugins.com
Version: 3.0.8.5
*/



global $sp_client_upload_premium;

$sp_client_upload_premium = "3.0.8.5";
define( 'EDD_CDM_VERSION', $sp_client_upload_premium );
define( 'EDD_CDM_ITEM_NAME','SP Client Document Manager Premium Trial' ); 
define( 'EDD_CDM_LICENSE_KEY',trim( get_option('sp_cdm_premium_license'))); 
define( 'EDD_CDM_STORE_URL', 'http://www.smartypantsplugins.com' );
define( 'EDD_CDM_DEBUG', true);
include_once ''.dirname(__FILE__).'/classes/ajax.php';
include_once ''.dirname(__FILE__).'/smarty.php';
include_once ''.dirname(__FILE__).'/functions.php';
include_once ''.dirname(__FILE__).'/classes/uploader.php';
include_once ''.dirname(__FILE__).'/admin/clients.php';
include_once ''.dirname(__FILE__).'/admin/categories.php';
include_once ''.dirname(__FILE__).'/admin/history.php';
include_once ''.dirname(__FILE__).'/admin/forms.php';
include_once ''.dirname(__FILE__).'/admin/groups.php';
include_once ''.dirname(__FILE__).'/admin/options.php';
include_once ''.dirname(__FILE__).'/user/shortcode.php';
include_once ''.dirname(__FILE__).'/user/context.php';
include_once ''.dirname(__FILE__).'/user/groups.php';
include_once ''.dirname(__FILE__).'/user/folders.php';
include_once ''.dirname(__FILE__).'/user/clients.php';
include_once ''.dirname(__FILE__).'/user/clients.widget.php';
if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	// load our custom updater if it doesn't already exist
	include_once( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
}





$cdmPremiumSettings = new cdmPremiumSettings;
add_action('cdm_premium_settings',array($cdmPremiumSettings,'view'));

$premium_add_file_link = "javascript:sp_cu_dialog_premium()";




function sp_cdm_check_admin_caps_premium(){
	global $current_user;
	if($current_user != ''){
	
	
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm') ) {
	@require_once(ABSPATH . 'wp-includes/pluggable.php');
		$role = get_role( 'administrator' );
		$role->add_cap( 'sp_cdm' );	
		$role->add_cap( 'sp_cdm_vendors' );	
		$role->add_cap( 'sp_cdm_settings' );	
		$role->add_cap( 'sp_cdm_projects' );	
		$role->add_cap( 'sp_cdm_uploader' );
	
}
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm_help') ) {$role = get_role( 'administrator' ); $role->add_cap( 'sp_cdm_help' );}
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm_forms') ) {$role = get_role( 'administrator' ); $role->add_cap( 'sp_cdm_forms' );}
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm_groups') ) {$role = get_role( 'administrator' );  $role->add_cap( 'sp_cdm_groups' );}
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm_categories') ) {$role = get_role( 'administrator' ); $role->add_cap( 'sp_cdm_categories' );}
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm_top_menu') ) {$role = get_role( 'administrator' ); $role->add_cap( 'sp_cdm_top_menu' );}
if (  user_can($current_user->ID,'manage_options') && !current_user_can('sp_cdm_show_folders_as_nav') ) {$role = get_role( 'administrator' ); $role->add_cap( 'sp_cdm_show_folders_as_nav' );}
	}
}



function sp_cdm_premium_styles(){
	
	
	
	
	  wp_register_style('cdm-premium-style', plugins_url('css/style.css', __FILE__));
	    wp_enqueue_style('cdm-premium-style');
		

	do_action('sp_cdm_premium_styles');		

	
}

add_action('wp_head', 'sp_cdm_premium_styles');	
add_action('admin_head', 'sp_cdm_premium_styles');
//add_action('cdm_add_hidden_html',array($cdmPremiumUploader,'construct'));


function sp_cdm_premium_scripts(){	
		 wp_enqueue_script('jquery-ui-position');
			 

	 
		wp_enqueue_script('hoverIntent');	 
		
		
		   wp_enqueue_script('jquery-print', plugins_url('js/jquery.print.js', __FILE__));
			 
		do_action('sp_cdm_premium_scripts');			
	
}
add_action('plugins_loaded', 'sp_cdm_premium_scripts');


add_action('admin_init', 'sp_cdm_check_admin_caps_premium');
add_action('sp_cu_admin_menu', 'sp_client_upload_menu_premium');


if($_GET['update_tables'] == 1){
	
	sp_client_upload_install_premium();
	echo '<script type="text/javascript">alert("Tables Updated");</script>';
}

include_once ''.dirname(__FILE__).'/app.php';

sp_client_upload_install_premium() ;





add_action( 'plugins_loaded', 'cdm_premium_check_community' );
add_action('admin_menu', 'cdm_premium_check_community_page');
function cdm_premium_check_community_page_content(){
	
	
}
function cdm_premium_check_community_page() {
	if(!function_exists('sp_cdm_language_init') ) {
		remove_menu_page( 'sp-client-document-manager' );
	#add_menu_page( 'sp_cu', 'Client Documents',  'manage_options', 'sp-client-document-manager', 'cdm_premium_check_community_page_content');	
	}
}

function cdm_premium_check_community() {
	if(!function_exists('sp_cdm_language_init') ) {
 
		echo $sp_client_upload;
require_once ''.dirname(__FILE__).'/classes/download-plugins.php';	


  $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
           'name' 		=> 'SP Client Project & Document Manager',
			'slug' 		=> 'sp-client-document-manager',
			 
			'version' => '1.5.8',
            'required'           => true // If false, the plugin is only 'recommended' instead of required.
           
           
            
           
           
        )

       

    );
$theme_text_domain = 'sp-cdm';
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
       
		'parent_menu_slug' 	=> 'plugins.php', 	
		'parent_url_slug' 	=> 'plugins.php', 				// Default parent URL slug
        'menu'         => 'cdm-install-plugins', // Menu slug.<br>
	    'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'SP Client Document Manager Premium requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'SP Client Document Manager recommends the following plugin: %1$s. But is not required.', 'SP Client Document Manager recommends the following plugins: %1$s. But is not required.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with  SP Client Document Manager Premium %1$s', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'error' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

 


 
	}
	
	
	
}





?>