<?php

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
		$this->set( 'loggedIn', $this->Auth->loggedIn() );
		if ($this->Auth->login()) {
				$this->set( 'username', $this->Auth->user('username') );
		}
    }
	


	public function login() {
		
		//if already logged-in, redirect
		/* if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'home'));	
					
		} */
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				//$this->redirect($this->Auth->redirectUrl());
				$this->User->id = $this->Auth->user('id'); // target correct record
				$this->User->saveField('last_login_time', date(DATE_ATOM)); // save login time
				
				$this->redirect(array('action' => 'home'));	
			} else {
				$this->Session->setFlash('Invalid username or password');
			}
		} 
		

	}
	
	public function home(){
		$this->set('message','<h3>message list must go here.</h3>');
		
	}
	
	public function profile(){
		$this->set('message','<h3>Profile Page</h3>');
		
		// Set User's ID in model which is needed for validation
        $this->User->id = $this->Auth->user('id');

        // Load the user (avoid populating $this->data)
        $current_user = $this->User->findById($this->User->id);
        $this->set('current_user', $current_user);
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
		//$this->set( 'loggedIn', $this->Auth->loggedIn() );
    }


    public function add() {
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
			
				/* $ip = '8.8.8.8';
				$remote_add = DboSource::expression('INET_ATON("'.$ip.'")');
				$this->User->saveField('created_ip', $remote_add); //save ip */
				
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }
    }

    public function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				print_r($this->request->data);
				die;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
			
			// Set User's ID in model which is needed for validation
			$this->User->id = $this->Auth->user('id');

			// Load the user (avoid populating $this->data)
			$current_user = $this->User->findById($this->User->id);
			$this->set('current_user', $current_user);
    }

    public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

}

?>