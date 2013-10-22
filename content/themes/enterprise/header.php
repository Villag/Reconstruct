<?php
/**
 * Header Template
 *
 * The header template is generally used on every page of your site. Nearly all other templates call it
 * somewhere near the top of the file. It is used mostly as an opening wrapper, which is closed with the
 * footer.php file. It also executes key functions needed by the theme, child themes, and plugins.
 *
 * @package Enterprise
 * @subpackage Template
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<title><?php hybrid_document_title(); ?></title>

	<?php wp_head(); // wp_head ?>
	<?php if( $post ) echo get_post_meta( $post->ID, 'enterprise-css', true ); ?>

</head>

<body class="<?php hybrid_body_class(); ?>">

	<?php do_atomic( 'open_body' ); // enterprise_open_body ?>

	<?php do_atomic( 'before_header' ); // enterprise_before_header ?>

	<div id="header" class="row">

		<?php do_atomic( 'open_header' ); // enterprise_open_header ?>

		<div class="col-md-3">
		</div>

		<div id="branding" class="col-md-6">
			<?php hybrid_site_title(); ?>
			<?php hybrid_site_description(); ?>
		</div><!-- #branding -->

		<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>

		<?php do_atomic( 'header' ); // enterprise_header ?>

		<div class="col-md-3">

			<?php if (is_user_logged_in()) { ?>

			    <a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>

			    <?php get_template_part( 'before-after', 'submit' ); ?>

			<?php } else { ?>

				<a data-toggle="modal" href="#get-started" class="btn btn-primary btn-lg">Get Started</a>

				<div class="modal fade" id="get-started" tabindex="-1" role="dialog" aria-labelledby="get-started-label" aria-hidden="true">

					<div class="modal-dialog">

						<form id="login" action="login" method="post">

							<div class="modal-content">

								<div class="modal-header">

									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Login</h4>

								</div>

								<div class="modal-body">

									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" name="username" class="form-control">
									</div>

									<div class="form-group">
										<label for="password">Password</label>
										<input id="password" type="password" name="password" class="form-control">
										<a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
									</div>

								</div>

								<div class="modal-footer">

									<button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
									<input type="submit" class="btn btn-primary submit_button" value="Login">

								</div>

							</div><!-- /.modal-content -->

							<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>

						</form>

					</div><!-- /.modal-dialog -->

				</div><!-- /.modal -->

			<?php } ?>

		</div>

		<?php do_atomic( 'close_header' ); // enterprise_close_header ?>

	</div><!-- #header.row -->

	<?php do_atomic( 'after_header' ); // enterprise_after_header ?>

	<?php do_atomic( 'before_main' ); // enterprise_before_main ?>

	<div id="main"  class="row">

		<?php do_atomic( 'open_main' ); // enterprise_open_main ?>