		</div>
		<!-- /wrapper -->
		<?php get_sidebar('footer'); ?>
		<div class="row">
			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<p id="footerMenu">
					<?php 
					$footer = array(
						'theme_location'  => 'footer-menu',
						'menu'            => '',
						'container'       => false,
						'container_class' => 'top-bar-section',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<section class="top-bar-section"><ul class="right">%3$s</ul></section>',
						'depth'           => 0,
						'walker'          => ''
					);
					wp_nav_menu($footer); ?>
				</p>
				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'foundation'); ?> 
					<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//foundation.com" title="Foundation">Foundation</a>.
				</p>
				<!-- /copyright -->
				
			</footer>
			<!-- /footer -->
		</div>

		<?php wp_footer(); ?>
		
		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
	
	</body>
</html>
