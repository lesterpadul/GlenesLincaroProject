<div class="glogForm" style="width:45%! important;">

<?php 
	echo $this->Form->create('User', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well'
	));
?>
	<div id="success"></div>
	<div id="saving" style="display:none;"><img src="/GlenesLincaroProject/img/pre_loader.gif"></div>
    <fieldset class='regGlen'>
        <legend><?php echo __('Register'); ?></legend>
        <?php echo $this->Form->input('username', array(
					'placeholder' => 'Username'
				));
		echo $this->Form->input('name', array(
			'placeholder' => 'Name'
		));
		echo $this->Form->input('email', array(
			'placeholder' => 'Email'
		));
        echo $this->Form->input('password', array(
			'placeholder' => 'Password'
		));
		echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'placeholder' => 'Password', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
		//echo $this->Form->button('Register', array('class' => 'btn btn-info',  'title' => 'Click here to add the user') ); 
		echo $this->Js->submit('Register', array(
						'class' => 'btn btn-info',
						'before'  => $this->Js->get('#saving')->effect('fadeIn'),
						'success' => $this->Js->get('#saving')->effect('fadeOut'),
						'update'  => '#success'
					));
		?>
    </fieldset>
	
<?php echo $this->Form->end(); ?>



</div>
<?php 
/* if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
} */
?>