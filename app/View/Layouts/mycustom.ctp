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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('override');
		
		echo $this->Html->script('jquery-1.12.1');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="nav1">
				<ul class="list-inline" style="margin:0;">
					<li><?php echo $this->Html->link( 'HOME', array( 'action' => 'home' ) ); ?></li>
					<!--<li><?php echo $this->Html->link( 'ANOTHER PAGE', array( 'action' => '#' ) ); ?></li>-->
				</ul>
			</div>
			<div class="nav2">
			<?php
			if( $loggedIn ) { 
				echo '<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi '.$username.' <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li>'.$this->Html->link( "View Account",   array('action'=>'profile') ).'</li>
							<li>'.$this->Html->link( "Logout",   array('action'=>'logout') ).'</li>
						  </ul>
						</li>
					  </ul>';
					
			}
			else {
				echo'<ul class="nav navbar-nav navbar-right">
						<li>
						  <a href="login"><span class="glyphicon glyphicon-circle-arrow-right"></span>&nbsp;Login</a>
						</li>
						<li>'.$this->Html->link( "Register",   array('action'=>'add') ).'</li>
						
					  </ul>';
			} 
			
			?>
			
			</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	
</body>
</html>
