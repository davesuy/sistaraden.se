<?php do_action( 'fl_content_close' ); ?>

	</div><!-- .fl-page-content -->
	<?php

	do_action( 'fl_after_content' );

	if ( FLTheme::has_footer() ) :

		?>
	<footer class="fl-page-footer-wrap" itemscope="itemscope" itemtype="https://schema.org/WPFooter">
		<?php

		do_action( 'fl_footer_wrap_open' );
		do_action( 'fl_before_footer_widgets' );

		FLTheme::footer_widgets();

		do_action( 'fl_after_footer_widgets' );
		do_action( 'fl_before_footer' );

		FLTheme::footer();

		do_action( 'fl_after_footer' );
		do_action( 'fl_footer_wrap_close' );

		?>
	</footer>
	<?php endif; ?>
	<?php do_action( 'fl_page_close' ); ?>
</div><!-- .fl-page -->
<?php

wp_footer();

if(!isset($_COOKIE['username']) == "newuser" || strcmp($_COOKIE['koiCookieConsent'],'0') == 0) {
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

do_action( 'fl_body_close' );

FLTheme::footer_code();

?>
</body>
</html>
