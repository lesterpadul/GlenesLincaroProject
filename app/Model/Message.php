<?php
App::uses('AuthComponent', 'Controller/Component');
class Message extends AppModel {
	
	public $validate = array(
        'username' => array(
            'nonEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 5, 15), 
				'required' => false, 
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'This username is already in use'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'Username can only be letters, numbers and underscores'
			),
        ),
		'content' => array(
            'nonEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter your message.',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 5, 20), 
				'required' => false, 
				'message' => 'Usernames must be between 5 to 20 characters'
			)
        )
		
    );
	
	

}

?>