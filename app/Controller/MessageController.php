<?php
class MessageController extends AppController {
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
		$this->set( 'loggedIn', $this->Auth->loggedIn() );
		if ($this->Auth->login()) {
				$this->set( 'username', $this->Auth->user('username') );
		}
    }
	
	public function add() {
		
		if ($this->request->is('post')) {
				
			$this->Message->create();
			print_r($this->request->data);
			die('xxxxxxxxxxxx');
			if ($this->Message->save($this->request->data)) {
			
				$this->Session->setFlash(__('The message has been sent'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be sent. Please, try again.'));
			}	 
        }
		
		/* // Set User's ID in model which is needed for validation
        $this->User->id = $this->Auth->user('id');

        // Load the user (avoid populating $this->data)
        $current_user = $this->User->findById($this->User->id);
        $this->set('current_user', $current_user); */
    }
	
}

?>