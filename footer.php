</main>


<footer class="footer">
	<div class="container">
		<div class="footer__site-info">
			<?php
			$site_url  = get_site_url();
			$site_name = get_bloginfo();
			echo '<a href="' . esc_url($site_url) . '">' . $site_name . '</a>';
			?>
			<span class="icon"><i class="fa-solid fa-copyright"></i></span>
			<span class="footer__year"><?php echo date('Y'); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</div>
</body>

</html>