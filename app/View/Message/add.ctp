<div class="glogForm" style="width:45%! important;">

<?php 
	echo $this->Form->create('Message', array(
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
        <legend><?php echo __('New Message'); ?></legend>
        <?php
		echo $this->Form->input('to_id', array(
					'type' => 'text',
					'placeholder' => 'Search for a recipient',
					'id' => 'search',
					'style' => 'width:400px' 
				));
				
		echo $this->Form->hidden('from_id', array('value' => AuthComponent::user('id')));
		echo $this->Form->input('content', array('type' => 'textarea',
				'placeholder' => 'Message'
			));
		echo $this->Form->button('Send', array('class' => 'btn btn-info') ); 
		
		?>
    </fieldset>
	
<?php echo $this->Form->end(); ?>



</div>
<script type="text/javascript">
	jQuery(function(){
		jQuery( "#search" ).autocomplete({
		 
				source: function( request, response ) {     
					jQuery.getJSON( "http://localhost/cakephp/Users/search", {     //the request is done to the source file declared here
						term: request.term
					}, response );
				},
				minLength: 2,                             //minimum lenght of the phrase to do the first search request to the server
				select: function( event, ui ) {           //this is done, after the request is complete
					doSomething(ui.item.id);              //call some function to do something with the selected itemz(basing on its id)
		 
				}
		});
	});
</script>
<?php 
/* if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
} */
?>