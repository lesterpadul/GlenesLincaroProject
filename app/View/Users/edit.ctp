<div class="container">
    <div class="row">
          <div class="span4">
            <h2>User Profile</h2>
			 
			<div class="paragraphs">
			  <div class="row">
				<div class="span4 profImg">
				<?php
					$profile_image = $current_user['User']['image'];
					if($profile_image=='')
						$img = 'default-profile.png';
					else
						$img = 'avatar/'.$profile_image;
					
					
				?>
				  <!--<img style="float:left" src = "/img/profile-default.png" class = "img-thumbnail"/>-->
				  <?php echo $this->Html->image($img, array('alt' => 'profile', 'class' => 'img-thumbnail', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
				  <div class="ChImg">
					<?php 
						
						echo $this->Form->create('User',array('enctype'=>'multipart/form-data')); 
							echo $this->Form->input('upload', array('type' => 'file'));
							echo $this->Form->button('Upload', array('class' => 'btn btn-info') ); 
						echo $this->Form->end();
				
					?>
				  </div>
				  <div class="content-heading userInfo">
						<div style="width:45%! important;">
							<?php 
								echo $this->Form->create('User');
							?>
								
								<fieldset>
									<?php 
									//echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
									echo $this->Form->input('name', array(
										'placeholder' => 'Name'
									));

									echo $this->Form->input('birthdate', array('type' => 'text', 'id' => 'birthDate', 'div'=>array('style' => 'position:relative') ));
									$gender = $current_user['User']['gender'];
									$options2= array(
										'm' => 'Male',
										'f' => 'Female',
									);
									$attributes2 = array(
										'legend' => false, 
										'value' => $gender,
									);
									echo $this->Form->radio('User.gender', $options2, $attributes2);
									
									echo $this->Form->input('hobby', array('type' => 'textarea'));
									
									echo $this->Form->button('Update', array('class' => 'btn btn-info') ); 
									?>
								</fieldset>
								
							<?php echo $this->Form->end(); ?>
						</div>
					
				  </div>
				 
				</div>
			  </div>
			</div>
           </div>
        </div><!-- @end .row -->
</div>
	
<script type="text/javascript">
jQuery(document).ready(function(){
	
	//enable datepicker
	jQuery("#birthDate").Zebra_DatePicker({
		format: 'Y-m-d'
	});
	 
});
</script>