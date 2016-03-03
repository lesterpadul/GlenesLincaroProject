<?php
	echo $message;
	//print_r($current_user);
	
	//echo $current_user['User']['id'].'<br />';
	echo '<h3>'.$current_user['User']['name'].'</h3><br />';
	$gender = $current_user['User']['gender'];
	if($gender=='m')
		$g = 'Male';
	else
		$g = 'Female';
	echo 'Gender: '.$g.'<br/>';
	echo $current_user['User']['created'].'<br />';
	echo $current_user['User']['last_login_time'].'<br />';
	
?>