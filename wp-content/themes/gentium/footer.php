<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gentium
 */

?>
	</div>
    <?php if( ! is_404() ) : ?>

    <!-- site-footer -->
    <?php get_template_part( 'components/footer/footer' ); ?>
		<?php wp_footer(); ?>
    <?php endif; ?>
</div>
<!-- <script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=2d7f8d4b138608b2be534f97f9e62229" charset="UTF-8"></script> -->
<script type="text/javascript" id="meedget_script" src="https://meedget.ru/js/client.min.js?meedget_id=7124"></script>
<script type="text/javascript">
  (function(d, w, s) {
 var widgetHash = 'nca0scvjzl6qokh44ul9', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
 gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
 var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
  })(document, window, 'script');
</script>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
</body>
</html>
