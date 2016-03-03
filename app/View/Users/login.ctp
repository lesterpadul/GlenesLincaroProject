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
							
		echo $this->Form->button('Sign-in', array(
								'div' => 'form-group',
								'class' => 'btn btn-info'
							));
    ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php
 //echo $this->Html->link( "Register",   array('action'=>'add') ); 
?>
xxxxxxxxx