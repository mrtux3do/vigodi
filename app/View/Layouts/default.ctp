<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Vigodi
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('owl.carousel.min');
		echo $this->Html->css('owl.theme.default.min');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('dropzone');
		echo $this->Html->script('owl.carousel.min');
		echo $this->Html->script('web_app_basic');
		echo $this->Html->script('product');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('jquery.countdown.min');

		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="tuan">
		<!-- Login popup -->
	<div class="login-popup">
		<div class="pop-up-content">
			<label id="btn-close"></label>
			<form method="POST" action="/website/Auth/login">
				<div class="form-group" style="margin-bottom: 50px">
					<label>Email</label>
					<input type="email" name="data[User][email]" id="email" required placeholder="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="data[User][password]" id="password" required placeholder="password">
				</div>
				<button type="submit" id="btn-login">Log in</button>
			</form>
		</div>
	</div>
	<div id="header">
		<?php echo $this->element('header'); ?>
	</div>

	<div id="content">
		<?php echo $this->fetch('content'); ?>
	</div>

	<div id="footer">
        <?php echo $this->element('footer'); ?>
	</div>
</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</html>
