<?php get_header(); ?>


<div id="fullpage">

	<div class="section">
		<div class="slide first">
			<div class="bg-white d-flex justify-content-center p-5">
				<div class="h-blue-stripe"></div>
				<h1>UTVÄRDERA, FÖRBÄTTRA,  SKAPA VÄRDE</h1>
				<p class="d-flex align-items-end">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
			</div>
		</div>

		<div class="slide second">
			<div class="bg-white d-flex justify-content-center p-5">
				<div class="down-animated h-blue-stripe"></div>
				<h1 class="is-animated">UTVÄRDERA, FÖRBÄTTRA,  SKAPA VÄRDE</h1>
				<p class="d-flex align-items-end right-animated">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
			</div>
		</div>

	</div>



	

</div>
<!-- <input type="hidden" id="_4" value="3" /> -->


<div class="fl-content-full container">
	<div class="row">
		<div class="fl-content col-md-12">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content', 'page' );
				endwhile;
			endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
