<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gentium
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138327447-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138327447-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PCW65MS');</script>
<!-- End Google Tag Manager -->
	
<!-- Facebook Pixel Code -->
<script>
 !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '347108386155296');
  fbq('track', 'PageView');
</script>
	
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=347108386155296&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="shadow-bg"></div>
	<div class="order-form-wrapper f1">
		<div class="wpcf7">
			<form id='order-form' class="wpcf7-form f-contact-form">
				<div class="btn-form-close"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2019/04/close-icon-dk.svg" alt=""></div>
				<h3>Узнай о наших предложениях недели! Просто оставь свои контакты</h3>
				<div class="rows">
					<span class="wpcf7-form-control-wrap text-field-required">
						<input type="text" name="orderName" id="orderName" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required text-field-class wpcf7-use-title-as-watermark" size="12" placeholder="Имя">
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap text-field-required">
						<input type="text" name="orderPhone" id="orderPhone" value="" class="masked-phone wpcf7-form-control wpcf7-text wpcf7-validates-as-required text-field-class wpcf7-use-title-as-watermark" size="12" data-rule-phonevalidate="1" data-rule-phoneverified="1" placeholder="Телефон" data-mask="+38 (099) 999-99-99" minlength="19" maxlength="19" autocomplete="off">
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap Emailfield">
						<input type="email" name="orderEmail" id="orderEmail"  value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email email-class wpcf7-use-title-as-watermark" size="12" placeholder="Email" />
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap textarea">
						<textarea name="orderMessage" id="orderMessage"  class="wpcf7-form-control wpcf7-textarea textarea-class wpcf7-use-title-as-watermark" rows="9" cols="39" placeholder="Введите сообщение"></textarea>
					</span>
				</div>
				<input id="submit" class="btn-submit-order" type="submit" value="ОТПРАВИТЬ">
				<div class="done-massage">
					<strong>Спасибо!</strong> Мы получили Ваше письмо.
				</div>
			</form>
		</div>
	</div>
	<div class="order-service-form-wrapper f1" >
		<div class="wpcf7">
			<form id='order-service-form' class="wpcf7-form f-contact-form">
				<div class="btn-form-close"><img src="wp-content/uploads/2019/04/close-icon-dk.svg" alt=""></div>
				<h3>Оставьте ваши контактные данные и мы с Вами связжемся!</h3>
				<div class="rows">
					<span class="wpcf7-form-control-wrap text-field-required">
						<input type="text" name="orderService" id="orderService" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required text-field-class wpcf7-use-title-as-watermark" placeholder="Услуга">
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap text-field-required">
						<input type="text" name="orderName" id="orderName" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required text-field-class wpcf7-use-title-as-watermark"  placeholder="Имя">
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap text-field-required">
						<input type="text" name="orderPhone" id="orderPhone" value="" class="masked-phone wpcf7-form-control wpcf7-text wpcf7-validates-as-required text-field-class wpcf7-use-title-as-watermark" data-rule-phonevalidate="1" data-rule-phoneverified="1" placeholder="Телефон" data-mask="+38 (099) 999-99-99" autocomplete="off">
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap Emailfield">
						<input type="email" name="orderEmail" id="orderEmail"  value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email email-class wpcf7-use-title-as-watermark" placeholder="Email" />
					</span>
				</div>
				<div class="rows">
					<span class="wpcf7-form-control-wrap textarea">
						<textarea name="orderMessage" id="orderMessage"  class="wpcf7-form-control wpcf7-textarea textarea-class wpcf7-use-title-as-watermark" rows="9" cols="39" placeholder="Ваш комментарий"></textarea>
					</span>
				</div>
				<input id="submit" class="btn-submit-order-service" type="submit" value="ОТПРАВИТЬ">
				<div class="done-massage">
					<strong>Спасибо!</strong> Мы получили Ваш заказ.
				</div>
			</form>
		</div>
	</div>
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PCW65MS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	
	
<div id="loader" class="preloader pr__dark">
	<span class="loading">
		<span class="txt"><?php esc_html_e( 'Загрузка', 'viral' ); ?></span>
		<span class="progress">
			<span class="bar-loading"></span>
		</span>
	</span>
</div><!-- Preloader End -->
<div id="site-wrapper" class="site <?php pixe_layouts(); ?>">

	<?php if( ! is_404() ) : 

		get_template_part( 'components/header/header' );
		get_template_part( 'components/header/mobile', 'header' );
		get_template_part( 'components/section-titles/section', 'title');
		
	endif; ?>

	<div id="content" class="site-content">
