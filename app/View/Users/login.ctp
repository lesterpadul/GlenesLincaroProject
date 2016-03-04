<div class="container">
    <div class="row">
          <div class="span4">
			<div class="glogForm">
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('User',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control'
				),
				'class' => 'well'
			)); ?>
				<fieldset>
					<div id="success"></div>
					<legend>Login</legend>
				<?php 
					echo $this->Form->input('username', array(
												'label' => 'Username',
												'placeholder' => 'Username'
											));
					
					echo $this->Form->input('password', array(
											'label' => 'Password',
											'placeholder' => 'Password'
										));
										
					/* echo $this->Form->button('Sign-in', array(
											'div' => 'form-group',
											'class' => 'btn btn-info'
										)); */
					echo $this->Js->submit('Send', array(
						'before'  => $this->Js->get('#loggingIn')->effect('fadeIn'),
						'success' => $this->Js->get('#loggingIn')->effect('fadeOut'),
						'update'  => '#success'
					));
				?>
				</fieldset>
			<?php echo $this->Form->end(); ?>
				<div id="loggingIn" style="display:none;">Logging in...</div>
			</div>
		 </div>
		<?php
		 //echo $this->Html->link( "Register",   array('action'=>'add') ); 
		?>
	</div>
</div>