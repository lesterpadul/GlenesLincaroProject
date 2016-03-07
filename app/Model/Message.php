<?php
App::uses('AuthComponent', 'Controller/Component');
class Message extends AppModel {
	
	public $validate = array(
		'content' => array(
            'nonEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter your message.',
				'allowEmpty' => false
            )
        )
		
    );
	
	

}

?>