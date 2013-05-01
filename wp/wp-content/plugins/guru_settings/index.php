<?php
/*
Plugin Name: Guru Settings
Plugin URI: http://www.gurustugroup.com/
Description: Handles common settings and options
Version: 0.1
Author: GuRuStu Group
Author URI: http://www.gurustugroup.com/
License: A "Slug" license name e.g. GPL2
*/

if( is_admin() ){
	wp_enqueue_style('guru-styles', plugin_dir_url( __FILE__ ).'css/guru-settings.css');
	
}

// create custom plugin settings menu
add_action('admin_menu', 'guru_create_menu');

function guru_create_menu() {

	//create new top-level menu
	add_menu_page('GuRuStu Plugin Settings', 'GuRuStu Settings', 'administrator', __FILE__, 'guru_settings_page', plugins_url('/images/favicon-16.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'guru-settings-group', 'guru_contact_email' );
	register_setting( 'guru-settings-group', 'guru_hours' );
	register_setting( 'guru-settings-group', 'guru_phone' );
	register_setting( 'guru-settings-group', 'guru_fax' );
	register_setting( 'guru-settings-group', 'guru_contact_address' );
	
	register_setting( 'guru-settings-group', 'guru_facebook' );
	register_setting( 'guru-settings-group', 'guru_twitter' );
	register_setting( 'guru-settings-group', 'guru_vimeo');
	register_setting( 'guru-settings-group', 'guru_instagram');
	register_setting( 'guru-settings-group', 'guru_pinterest');

	register_setting( 'guru-settings-group', 'guru_response_iframe');
	register_setting( 'guru-settings-group', 'guru_iframe_checker');
	register_setting( 'guru-settings-group', 'guru_screen_width');

	register_setting( 'guru-settings-group', 'google_analytics' );

}

function guru_settings_page() {
?>

<script type="text/javascript">
jQuery().ready( function($){
	
	var first = $(".side-menu ul li").get(0),
		current = $("form#guru_settings fieldset").get(0);
		
	$("a", first).addClass("current");
	$(current).fadeIn();
	
	$(".side-menu ul li a").click( function(el){
		
		el.preventDefault();
		
		var currentSection = $(this).attr("href");
		
		$(".side-menu ul li a").removeClass("current");
		$(this).addClass("current");
		$("form#guru_settings fieldset").hide();
		$("form#guru_settings fieldset" + currentSection).fadeIn();
		
	});
	$('input[type=checkbox]').click(function(){
		if( $(this).attr('value') != 'checked' ){
			$(this).attr('value', 'checked');
		} else {
			$(this).attr('value', '');
		}
	});

});
</script>
<div class="wrap guru-container">
	<header>
		<h2>GuRuStu Settings</h2>
	</header>
	<aside class="side-menu">
		<ul>
			<li><a href="#section-general">General</a></li>
			<li><a href="#section-social">Social</a></li>
			<li><a href="#section-locations">Locations</a></li>
			<li><a href="#section-developer">Development</a></li>
		</ul>
	</aside>
	<section class="guru-content">
		<form method="post" action="options.php" id="guru_settings">
			
		    <?php settings_fields( 'guru-settings-group' ); ?>
		    <?php do_settings_sections( 'guru-settings-group' ); ?>
		    
		    <fieldset id="section-general">
		    	<legend>General</legend>
		    	<table class="form-table">
		    	    <tr valign="top">
		    	    	<th scope="row">Primary Email</th>
		    	    	<td><input type="text" name="guru_contact_email" value="<?php echo get_option('guru_contact_email'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Phone Number</th>
		    	    	<td><input type="text" name="guru_phone" value="<?php echo get_option('guru_phone'); ?>" /></td>
		    	    </tr>		    	    
		    	    <tr valign="top">
		    	    	<th scope="row">Fax Number</th>
		    	    	<td><input type="text" name="guru_fax" value="<?php echo get_option('guru_fax'); ?>" /></td>
		    	    </tr>		    	    
		    	    <tr valign="top">
		    	    	<th scope="row">Primary Address</th>
		    	    	<td><input type="text" name="guru_contact_address" value="<?php echo get_option('guru_contact_address'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Hours</th>
		    	    	<td><input type="text" name="guru_hours" value="<?php echo get_option('guru_hours'); ?>" /></td>
		    	    </tr>
		    	</table>
		    </fieldset>
		    <fieldset id="section-social">
		    	<legend>Social</legend>
		    	<table class="form-table">
		    	    <tr valign="top">
		    	    	<th scope="row">Facebook</th>
		    	    	<td><input type="text" name="guru_facebook" value="<?php echo get_option('guru_facebook'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Twitter</th>
		    	    	<td><input type="text" name="guru_twitter" value="<?php echo get_option('guru_twitter'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Vimeo</th>
		    	    	<td><input type="text" name="guru_vimeo" value="<?php echo get_option('guru_vimeo'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Instagram</th>
		    	    	<td><input type="text" name="guru_instagram" value="<?php echo get_option('guru_instagram'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Pinterest</th>
		    	    	<td><input type="text" name="guru_pinterest" value="<?php echo get_option('guru_pinterest'); ?>" /></td>
		    	    </tr>
		    	</table>
		    </fieldset>
		    <fieldset id="section-locations">
		    	<legend>Locations</legend>
		    	<table class="form-table">
		    	    <tr valign="top">
		    	    	<th scope="row">Location Name</th>
		    	    	<td><input type="text" name="guru_location_name" value="<?php echo get_option('guru_location_name'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Address</th>
		    	    	<td><input type="text" name="guru_address" value="<?php echo get_option('guru_address'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">City</th>
		    	    	<td><input type="text" name="guru_city" value="<?php echo get_option('guru_city'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">State</th>
		    	    	<td><input type="text" name="guru_state" value="<?php echo get_option('guru_state'); ?>" /></td>
		    	    </tr>
		    	    <tr valign="top">
		    	    	<th scope="row">Postal Code</th>
		    	    	<td><input type="text" name="guru_postal_code" value="<?php echo get_option('guru_postal_code'); ?>" /></td>
		    	    </tr>
		    	</table>
		    </fieldset>
		    <fieldset id="section-developer">
		    	<legend>Development</legend>
		    	<table class="form-table">
		    	    <tr valign="top">
		    	    	<th scope="row">Enable mobile testing</th>
		    	    	<td><input type="checkbox" name="guru_response_iframe" value="" <?php echo get_option('guru_response_iframe'); ?> /></td>
		    	    </tr>		    	    
		    	    <tr valign="top">
		    	    	<th scope="row">Enable Media Query Helper</th>
		    	    	<td><input type="checkbox" name="guru_screen_width" value="" <?php echo get_option('guru_screen_width'); ?> /></td>
		    	    </tr>
		    	</table>
		    </fieldset>
		    <p class="submit">
		    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		    </p>
		
		</form>
	</section>
	
	<div class="clearfix"></div>

</div>
<?php } ?>
<?php
	/* 
	* 
	* Add google analyics if set
	*
	*/
	$google_analytics = get_option('google_analytics');
	if( ! empty($google_analytics) && ! is_admin() ){
		add_action( 'wp_footer', 'gurustu_add_google_analytics' );
	}
	function gurustu_add_google_analytics() {
		echo '<script>';
		echo get_option('google_analytics');
		echo '</script>';
	}
	/* 
	* 
	* Display page in iframe to test mobile
	*
	*/
	$iframe = get_option('guru_response_iframe');
	require_once('responsiveTest/page-iframe.php');

	if( ! is_admin() && ! empty( $iframe ) ) {
		add_action('wp_head', guru_iframe_links );

		if( $_GET['url'] != 'dev' )
		add_action('template_redirect', 'guru_use_iframe', 1 ,1);

	}
	/* 
	* 
	* Get custom admin icon and screen width
	*
	*/
	$width = get_option('guru_screen_width');
	if( ! is_admin() && ! empty($width) ){

		add_action( 'wp_footer', 'inject_js' );
	}
	function inject_js() {
		?>	
			<script>
			jQuery(document).ready(function($){
				$('body').append('<div id="the-width" style="position: fixed;bottom: 0; right:0; background-color: black;color: white; padding: 5px 10px; z-index:99999999">Media Query: ' + $(window).width() + ' PX</div>');
					$(window).resize(function(){
					$('#the-width').html( 'Media Query: ' + $(window).width() + ' PX');
				})
			})
			</script>
<?php } ?>
<?php
	
	function get_social_icons( ){
	    $vimeo = get_option('guru_vimeo');
	    $twitter = get_option('guru_twitter');
	    $facebook = get_option('guru_facebook');
	    $contact = get_option('guru_contact_email');
	    $instagram = get_option('guru_instagram');
	    $pinterest = get_option('guru_pinterest');
	    $output = "";
	    $output .= "<ul class='social'>";
	    if( !empty($vimeo) ){
	        $output .= '<li class="vimeo"><a target="_blank" href="' . $vimeo . '">Follow us on Vimeo</a></li>';
	    }
	    if( !empty($twitter) ){
	        $output .= '<li class="twitter"><a target="_blank" href="' . $twitter . '">Follow us on Twitter</a></li>';
	    }
	    if( !empty($facebook) ){ 
	        $output .= "<li class='facebook'><a target='_blank' href='" . $facebook . "'>Follow us on Facebook</a></li>";
		}
	    if( !empty($instagram) ){
	        $output .= "<li class='instagram'><a target='_blank' href='" . $instagram . "'>Instagram</a></li>";
	    }
	    if( !empty($pinterest) ){
	        $output .= "<li class='pinterest'><a target='_blank' href='" . $pinterest . "'>Pinterest</a></li>";
	    }
	    if( !empty($contact) ){
	        $output .= "<li class='message'><a href='mailto:" . $contact . "'>Send us a message</a></li>";
	    }
	    $output .= "</ul>";
		return $output;       
	}


?>