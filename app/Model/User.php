<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	
	public $avatarUploadDir = 'upload/avatar/';
	
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
		'name' => array(
            'nonEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'Your name is required',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 5, 20), 
				'required' => false, 
				'message' => 'Usernames must be between 5 to 20 characters'
			)
        ),
		/* 'birthdate' => array(),
		'gender' => array(),
		'hobby' => array(), */
	
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            ),
			'min_length' => array(
				'rule' => array('minLength', '6'),  
				'message' => 'Password must have a mimimum of 6 characters'
			)
        ),
		
		'password_confirm' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Please confirm your password'
            ),
			 'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Both passwords must match.'
			)
        ),
		
		'email' => array(
			'required' => array(
				'rule' => array('email', true),    
				'message' => 'Please provide a valid email address.'    
			),
			 'unique' => array(
				'rule'    => array('isUniqueEmail'),
				'message' => 'This email is already in use',
			),
			'between' => array( 
				'rule' => array('between', 6, 60), 
				'message' => 'Usernames must be between 6 to 60 characters'
			)
		), 
		'upload' => array(
            'extension' => array(
				'rule' => array('extension', array("jpg", "png", "gif", "bmp","jpeg","JPG","JPEG","PNG","GIF","BMP")),
				'message' => 'Invalid image file format',
        
			)
		),

        
		
		
		'password_update' => array(
			'min_length' => array(
				'rule' => array('minLength', '6'),   
				'message' => 'Password must have a mimimum of 6 characters',
				'allowEmpty' => true,
				'required' => false
			)
        ),
		'password_confirm_update' => array(
			 'equaltofield' => array(
				'rule' => array('equaltofield','password_update'),
				'message' => 'Both passwords must match.',
				'required' => false,
			)
        )
		
		

		
    );
	
		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.username'
				),
				'conditions' => array(
					'User.username' => $check['username']
				)
			)
		);

		if(!empty($username)){
			if($this->data[$this->alias]['id'] == $username['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }

	/**
	 * Before isUniqueEmail
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($email)){
			if($this->data[$this->alias]['id'] == $email['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
	
	public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 

	/**
	 * Before Save
	 * @param array $options
	 * @return boolean
	 */
	public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		// if we get a new password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
		}
		
		/* print_r($this->data['User']);
		die; */
		// upload image
		if(isset($this->data['User']['image'])){
			$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPG","JPEG","PNG","GIF","BMP");
			extract($this->data['User']['image']);
			/* print_r($this->data['User']);
			die; */
			if ($size && !$error) {
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext, $valid_formats)) {
					
					$actual_image_name = time().".".$ext;
					//die($tmp_name.'---'.$this->avatarUploadDir.$actual_image_name);
					move_uploaded_file($tmp_name, $this->avatarUploadDir.$actual_image_name);
					$this->data['User']['upload']['image']['name'] = $this->avatarUploadDir;
					
				} else {
					//invalid image format
				}
			}
		
		}
		// fallback to our parent
		return parent::beforeSave($options);
	} 

}

?>