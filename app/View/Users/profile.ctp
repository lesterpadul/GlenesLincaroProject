<div class="container">
    <div class="row">
          <div class="span4">
            <h2>User Profile</h2>
			 
			<div class="paragraphs">
			  <div class="row">
				<div class="span4 profImg">
				<?php
					$profile_image = $current_user['User']['image'];
					if($profile_image==NULL)
						$img = 'default-profile.png';
					else
						$img = 'avatar/'.$profile_image;
					
					
				?>
				  <!--<img style="float:left" src = "/img/profile-default.png" class = "img-thumbnail"/>-->
				  <?php echo $this->Html->image($img, array('alt' => 'profile', 'class' => 'img-thumbnail', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
				  <div class="content-heading userInfo">
					<?php
								$gender = $current_user['User']['gender'];
								
								
									if($gender=='m')
										$g = 'Male';
									else if($gender=='f')
										$g = 'Female';
									else	
										$g ='';
								$date = '';
								$joindate = '';
								$lastlogin = '';
								if($current_user['User']['birthdate'])
									$date = date('M-d-Y', strtotime($current_user['User']['birthdate']));
								if($current_user['User']['created']!='')
									$joindate = date('M-d-Y', strtotime($current_user['User']['created']));
								if($current_user['User']['last_login_time']!='')
									$lastlogin = date('M-d-Y', strtotime($current_user['User']['last_login_time']));

					?>
					
						<div class="row" style="margin-left:10px;">
						  <div class="span4"><?php echo $this->Html->link("Edit Information",  array('action'=>'edit', $current_user['User']['id']) ); ?></div>
						  <div class="span4"><h3><?php echo $current_user['User']['name']; ?></h3></div>
						  <div class="span4">Gender:<span><?php echo $g; ?></span></div>
						  <div class="span4">Birthdate: <span><?php echo $date; ?></span></div>
						  <div class="span4">Join Date: <span><?php echo $joindate; ?></span></div>
						  <div class="span4">Last Login: <span><?php echo $lastlogin; ?></span></div>
						  <div class="span4" style="width:37%;">Hobby: <span><?php echo $current_user['User']['hobby']; ?></span></div>
						</div>
					
				  </div>
				 
				</div>
			  </div>
			</div>
           </div>
        </div><!-- @end .row -->
		</div>
	</div>
</div>


