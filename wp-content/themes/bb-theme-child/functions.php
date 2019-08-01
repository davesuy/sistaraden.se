<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );


function add_sistaraden_scripts() {

  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(), '1.1', 'all');
  wp_enqueue_style('fullpage-css', get_stylesheet_directory_uri() . '/css/fullpage.css', '3.0.5', true);

  wp_enqueue_script('scrolloverflow.min.js', get_stylesheet_directory_uri() . '/js/scrolloverflow.min.js', array ( 'jquery' ), '0.1.2', true);
  wp_enqueue_script('fullpage-js', get_stylesheet_directory_uri() . '/js/fullpage.js', array ( 'jquery' ), '3.0.5', true);
  //wp_enqueue_script('fullpage.extensions.min.js', get_stylesheet_directory_uri() . '/js/fullpage.extensions.min.js', array ( 'jquery' ), '3.0.5', true);
  wp_enqueue_script('easing.min.js', get_stylesheet_directory_uri() . '/js/easings.min.js', array ( 'jquery' ), '1.3', true);

  //wp_enqueue_script('jquery.fullPage.js', get_stylesheet_directory_uri() . '/js/jquery.fullPage.js', array ( 'jquery' ), '2.9.6', true);


  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom_script.js', array ( 'jquery' ), 1.1, true);

}

add_action( 'wp_enqueue_scripts', 'add_sistaraden_scripts' );

// Essential Grid Shortcodes


function esgrid_meta_func( $atts ) {

	$atts = shortcode_atts( array(
		'id' => ''
	), $atts, 'esgrid_meta' );

	$author_id = get_post_field( 'post_author',$atts['id'] );
	$author_name = get_the_author_meta('user_nicename', $author_id);

	$date = get_the_date( 'F j Y',  $atts['id']);
	$post_tags = get_the_tags($atts['id']);



	$separator = ', ';
	$post_tags_output = "";

	if ( $post_tags ) {
	    foreach( $post_tags as $tag ) {
	    		$tag_output[] = '<a href="'. get_tag_link($tag->term_id) . '">#'. $tag->name . '</a>';
	    }


	   //echo '<pre>'.print_r($tag_output, true).'</pre>';
	    $post_tags_output = implode($separator, $tag_output);
	}

	$output = "<div class='esgrid-wrapper'>";
	$output .= '<p class="esgrid-meta-text">'.$author_name.' - '.$date.'</p>';
	$output .= '<p class="esgrid-tag-text">'.$post_tags_output.'<p>';
	$output .= "</div>";

	return $output;

}

add_shortcode( 'esgrid_meta', 'esgrid_meta_func' );

// Register Portfolio Custom Post Type
function sr_portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portfolios', 'text_domain' ),
		'name_admin_bar'        => __( 'Portfolio', 'text_domain' ),
		'archives'              => __( 'Portfolio Archives', 'text_domain' ),
		'attributes'            => __( 'Portfolio Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Portfolio:', 'text_domain' ),
		'all_items'             => __( 'All Portfolios', 'text_domain' ),
		'add_new_item'          => __( 'Add New Portfolio', 'text_domain' ),
		'add_new'               => __( 'Add New Portfolio', 'text_domain' ),
		'new_item'              => __( 'New Portfolio', 'text_domain' ),
		'edit_item'             => __( 'Edit Portfolio', 'text_domain' ),
		'update_item'           => __( 'Update Portfolio', 'text_domain' ),
		'view_item'             => __( 'View Portfolio', 'text_domain' ),
		'view_items'            => __( 'View Portfolios', 'text_domain' ),
		'search_items'          => __( 'Search Portfolio', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into portfolio', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this portfolio', 'text_domain' ),
		'items_list'            => __( 'Portfolios list', 'text_domain' ),
		'items_list_navigation' => __( 'Portfolios list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter portfolios list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'text_domain' ),
		'description'           => __( 'Lists of Sistaraden Portfolios', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'portfolio_category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}

add_action( 'init', 'sr_portfolio', 0 );

// Register Custom Taxonomy
function portfolio_category() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Portfolio Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Portfolio Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Portfolio Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Portfolio Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Portfolio Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Portfolio Category', 'text_domain' ),
		'update_item'                => __( 'Update Portfolio Category', 'text_domain' ),
		'view_item'                  => __( 'View Portfolio Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate portfolio categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove portfolio categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Portfolio Categories', 'text_domain' ),
		'search_items'               => __( 'Search Portfolio Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No portfolio categories', 'text_domain' ),
		'items_list'                 => __( 'Portfolio Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Portfolio Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}

add_action( 'init', 'portfolio_category', 0 );


// Register Job Custom Post Type
function sr_job() {

	$labels = array(
		'name'                  => _x( 'Jobs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Jobs', 'text_domain' ),
		'name_admin_bar'        => __( 'Job', 'text_domain' ),
		'archives'              => __( 'Job Archives', 'text_domain' ),
		'attributes'            => __( 'Job Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Job:', 'text_domain' ),
		'all_items'             => __( 'All Jobs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Job', 'text_domain' ),
		'add_new'               => __( 'Add New Job', 'text_domain' ),
		'new_item'              => __( 'New Job', 'text_domain' ),
		'edit_item'             => __( 'Edit Job', 'text_domain' ),
		'update_item'           => __( 'Update Job', 'text_domain' ),
		'view_item'             => __( 'View Job', 'text_domain' ),
		'view_items'            => __( 'View Jobs', 'text_domain' ),
		'search_items'          => __( 'Search Job', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into job', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this job', 'text_domain' ),
		'items_list'            => __( 'Jobs list', 'text_domain' ),
		'items_list_navigation' => __( 'Jobs list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter jobs list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Job', 'text_domain' ),
		'description'           => __( 'Lists of Sistaraden Jobs', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'job_category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'job', $args );

}

add_action( 'init', 'sr_job', 0 );

// Register Custom Taxonomy
function job_category() {

	$labels = array(
		'name'                       => _x( 'Job Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Job Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Job Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Job Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Job Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Job Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Job Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Job Category', 'text_domain' ),
		'update_item'                => __( 'Update Job Category', 'text_domain' ),
		'view_item'                  => __( 'View Job Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate job categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove job categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Job Categories', 'text_domain' ),
		'search_items'               => __( 'Search Job Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No job categories', 'text_domain' ),
		'items_list'                 => __( 'Job Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Job Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'job_category', array( 'job' ), $args );

}

add_action( 'init', 'job_category', 0 );

function add_last_nav_item($items) {

	$last_items = "";

	if ( wp_is_mobile() ) {

		 $last_items = do_shortcode('[fl_builder_insert_layout slug="mobile-elements"]');
	}


	if(!empty($last_items )) {

		 return $items .= $last_items;

	} else {

		return $items;

	}



}

add_filter('wp_nav_menu_items','add_last_nav_item');

// Login Page

function wpabsolute_login_form_shortcode( $atts, $content = null ) {
$a = shortcode_atts( array(
	'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
	'label_username' => __( 'Email' ),
	'label_password' => __( 'Password' ),
	'label_remember' => __( 'Remember Me' ),
	'label_log_in' => __( 'Log In' ),
	'remember_checked' => true,
	), $atts );

	$args = array(
	'echo' => false,
	'remember' => true,
	'redirect' => esc_url( $a['redirect'] ),
	'label_username' => esc_attr( $a['label_username'] ),
	'label_password' => esc_attr( $a['label_password'] ),
	'label_remember' => esc_attr( $a['label_remember'] ),
	'label_log_in' => esc_attr( $a['label_log_in'] ),
	'value_remember' => $a['remember_checked']
	);

	return wp_login_form( $args );
}

add_shortcode( 'login_form', 'wpabsolute_login_form_shortcode' );

//Page Slug Body Class

function add_slug_body_class( $classes ) {

	global $post;


    $current_language = ICL_LANGUAGE_CODE;

    if($current_language == 'de'){

        $output_lang = 'german-language';

    }elseif($current_language == "en") {

         $output_lang = 'english-language';

    } else {

    	$output_lang = 'swedish-language';

    }

	if ( isset( $post ) ) {

		$classes[] = $post->post_type . '-' . $post->post_name;
		$classes[] = $output_lang;
	}

	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );

function cookie_consent_banner () {

	if(!isset($_COOKIE['username']) || strcmp($_COOKIE['koiCookieConsent'],'0') == 0){
		 if(ICL_LANGUAGE_CODE=='sv'){
		 	$policyLink = esc_url('https://info.sistaraden.se/datapolicy');
		 }

	    if(ICL_LANGUAGE_CODE=='de'){
	    	$policyLink = esc_url('http://info.sistaraden.se/datapolicy-english/');
	    }


	    echo '<div id="cookie-consent-banner"><div class="cookieconsent full-width"><div class="container cookie-consent-container"><div class="row"><p>';
		echo _e("We use cookies. When using our website you consent to the use of cookies according to our ");
		echo '<a href="'.$policyLink.'" target="_blank">';
		echo _e("Privacy Policy");
		echo '</a></p></div><div class="row"><div class="buttons">';
		echo '<button class="primary-btn yes-btn" onclick="window.runKoiTracking()">';
		echo _e('I agree');
		echo '</button><button class="secondary-btn no-btn" onclick="window.removeKoiConsent()">';
		echo _e('No, thank you');
		echo '</button></div></div></div></div></div>';
	}
}
add_shortcode('cookie-consent-banner', 'cookie_consent_banner');

// wpml shortcodes --------------------

add_shortcode( 'wpml_language', 'wpml_find_language');


/* ---------------------------------------------------------------------------

 * Shortcode [wpml_language language="en"] [/wpml_language]

 * --------------------------------------------------------------------------- */

function wpml_find_language( $atts, $content = null ) {

   $a = shortcode_atts( array(
		'language' => 'se'
	), $atts );

    $language = $a['language'];

    $current_language = ICL_LANGUAGE_CODE;

    if($current_language == $language){

        $output = do_shortcode($content);

    }elseif($language == "se") {

         $output = do_shortcode($content);

    }

    return $output;
}

function hook_tracking_code (){
	?>
		<?php if(ICL_LANGUAGE_CODE=='sv') { ?>
		    <script type="text/javascript">
		       var _ss = _ss || [];
		       _ss.push(['_setDomain', 'https://koi-3QND5HPDTM.marketingautomation.services/net']);
		       _ss.push(['_setAccount', 'KOI-3Z5541FJ9K']);
		       _ss.push(['_trackPageView']);
			    (function () {
					var checkConsent = function () {
						var results = document.cookie.match('(^|;) ?koiCookieConsent=([^;]*)(;|$)');

						if (!results || !results[2]) {
							return;
						}
						return decodeURIComponent(results[2]) === "1";
					};

					var setCookie = function (v) {
						var expires = (new Date((new Date()).getTime() + 324000000000));
						document.cookie = 'koiCookieConsent=' + v + '; expires=' + expires.toUTCString();
					};

					window.runKoiTracking = function () {
						if (window.koiTrackingRan) {
							return;
						}
						if (!checkConsent()) setCookie('1');
						window.koiTrackingRan = true;
						var ss = document.createElement('script');
						ss.type = 'text/javascript'; ss.async = true;
						ss.src = 'https:koi-3QND5HPDTM.marketingautomation.services/client/ss.js?ver=2.2.1';
						var scr = document.getElementsByTagName('script')[0];
						scr.parentNode.insertBefore(ss, scr);
					};
					window.removeKoiConsent = function () {
						setCookie('0');
					};
					if (checkConsent()) {
						runKoiTracking();
					}
				})();
		    </script>
		<?php } elseif(ICL_LANGUAGE_CODE=='en') { ?>
		    <script type="text/javascript">
		       var _ss = _ss || [];
		       _ss.push(['_setDomain', 'https://koi-3QND5HPDTM.marketingautomation.services/net']);
		       _ss.push(['_setAccount', 'KOI-44NW0LZQYW']);
		       _ss.push(['_trackPageView']);
		    	(function () {
					var checkConsent = function () {
						var results = document.cookie.match('(^|;) ?koiCookieConsent=([^;]*)(;|$)');

						if (!results || !results[2]) {
							return;
						}
						return decodeURIComponent(results[2]) === "1";
					};

					var setCookie = function (v) {
						var expires = (new Date((new Date()).getTime() + 324000000000));
						document.cookie = 'koiCookieConsent=' + v + '; expires=' + expires.toUTCString();
					};

					window.runKoiTracking = function () {
						if (window.koiTrackingRan) {
							return;
						}
						if (!checkConsent()) setCookie('1');
						window.koiTrackingRan = true;
						var ss = document.createElement('script');
						ss.type = 'text/javascript'; ss.async = true;
						ss.src = 'https:koi-3QND5HPDTM.marketingautomation.services/client/ss.js?ver=2.2.1';
						var scr = document.getElementsByTagName('script')[0];
						scr.parentNode.insertBefore(ss, scr);
					};
					window.removeKoiConsent = function () {
						setCookie('0');
					};
					if (checkConsent()) {
						runKoiTracking();
					}
				})();
		    </script>
		<?php } elseif(ICL_LANGUAGE_CODE=='de') { ?>
		    <script type="text/javascript">
		       var _ss = _ss || [];
		       _ss.push(['_setDomain', 'https://koi-3QND5HPDTM.marketingautomation.services/net']);
		       _ss.push(['_setAccount', 'KOI-44NVFR81FS']);
		       _ss.push(['_trackPageView']);
			    (function () {
					var checkConsent = function () {
						var results = document.cookie.match('(^|;) ?koiCookieConsent=([^;]*)(;|$)');

						if (!results || !results[2]) {
							return;
						}
						return decodeURIComponent(results[2]) === "1";
					};

					var setCookie = function (v) {
						var expires = (new Date((new Date()).getTime() + 324000000000));
						document.cookie = 'koiCookieConsent=' + v + '; expires=' + expires.toUTCString();
					};

					window.runKoiTracking = function () {
						if (window.koiTrackingRan) {
							return;
						}
						if (!checkConsent()) setCookie('1');
						window.koiTrackingRan = true;
						var ss = document.createElement('script');
						ss.type = 'text/javascript'; ss.async = true;
						ss.src = 'https:koi-3QND5HPDTM.marketingautomation.services/client/ss.js?ver=2.2.1';
						var scr = document.getElementsByTagName('script')[0];
						scr.parentNode.insertBefore(ss, scr);
					};
					window.removeKoiConsent = function () {
						setCookie('0');
					};
					if (checkConsent()) {
						runKoiTracking();
					}
				})();
		    </script>
		<?php } ?>
	<?php
}
add_action('wp_head', 'hook_tracking_code');

function footer_ga_hook_tracking_code () {

	// ANALYTICS TRACKING CODE

	// DE

	if ( defined( 'ICL_LANGUAGE_CODE' ) && 'sv' == ICL_LANGUAGE_CODE ) {


		?>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112406859-1"></script>
		<script>
		 window.dataLayer = window.dataLayer || [];
		 function gtag(){dataLayer.push(arguments);}
		 gtag('js', new Date());

		 gtag('config', 'UA-112406859-1');

		</script>

	<?php }
	// SV language
	else if ( defined( 'ICL_LANGUAGE_CODE' ) && 'de' == ICL_LANGUAGE_CODE ) {

		 ?>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112406859-2"></script>
		<script>
		 window.dataLayer = window.dataLayer || [];
		 function gtag(){dataLayer.push(arguments);}
		 gtag('js', new Date());

		 gtag('config', 'UA-112406859-2');

		</script>

	<?php }
	// EN language
	else if ( defined( 'ICL_LANGUAGE_CODE' ) && 'en' == ICL_LANGUAGE_CODE ) {

		?>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112406859-3"></script>
		<script>
		 window.dataLayer = window.dataLayer || [];
		 function gtag(){dataLayer.push(arguments);}
		 gtag('js', new Date());

		 gtag('config', 'UA-112406859-3');

		</script>

	<?php }


}

add_action('wp_footer', 'footer_ga_hook_tracking_code');

function fb_pixel_base_code (){
?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '176908109581048');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=176908109581048&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->
<?php
}
add_action('wp_head', 'fb_pixel_base_code');
?>
