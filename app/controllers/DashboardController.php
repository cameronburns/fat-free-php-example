<?php
/* -- DASHBOARD CONTROLLER  --
*	@ CAM BURNS
*	Controller for the main dashboard, once user has been authenticated
*	Uses the Email class (models/Email.php)
*	Uses the User class (models/User.php)
*/

class DashboardController extends Controller {
	
	/* -- RENDER --
	*	Show the dashboard, Grab emails from db, print to screen
	*	
	*/
	
	function render() {
		
		$emails = new Email($this->db);
		
		$this->f3->set('email_count',count($emails->getUserEmails($this->f3->get('SESSION.userid'))));
		$this->f3->set('dashboard', true);
		$this->f3->set('username',$this->f3->get('SESSION.username'));
		
		if(empty($this->f3->get('view'))) {
		$this->f3->set('view', 'home.html');
		}
		
		$template = new Template;
		echo($template->render('default.html'));
		
	}
	
	/* -- SHOW INBOX --
	*	Grab emails from db, print to screen
	*/
	
	function showInbox() {
		
		$email = new Email($this->db);
		$userEmails = $email->getUserEmails($this->f3->get('SESSION.userid'));
		
		if($email->dry()) {
			
			$this->f3->set('error','No emails found');
			$this->render();
			exit();
		}
		
		$this->f3->set('email_array',array());
				
		foreach ($userEmails as $emailquery) {
		
		$user = new User($this->db);
		$user->getRow($emailquery->fromid);
		$from = $user->username;
		
		$excerpt = (strlen($emailquery['content']) > 103) ? substr($emailquery['content'],0,100).'...' : $emailquery['content'];
		
		$this->f3->push('email_array',array(
		'id'=>$emailquery['id'],
		'subject'=>$emailquery['subject'],
		'content'=>$emailquery['content'],
		'viewed'=>$emailquery['viewed'],
		'from'=>$from,
		'excerpt'=>$excerpt));
			
		}
					
		$this->f3->set('view', 'inbox.html');
		$this->render();
			
		
	}
	
	/* -- SHOW EMAIL --
	*	Grab email with given ID, print to screen
	*/
	
	function showEmail() {
		
		$email = new Email($this->db);
		$email->getRow($this->f3->get('PARAMS.messageid'));
		
		if($email->dry()) {
			
			$this->f3->set('error','Email not found');
			$this->render();
			exit();
		}
		
		if($email->viewed == 0) {
			
			$email->markAs($email->id,1);
			
		}
		
		$this->f3->set('email_id',$email->id);
		$this->f3->set('email_subject', $email->subject);
		$this->f3->set('email_content', nl2br($email->content));
		
		$user = new User($this->db);
		$user->getRow($email->fromid);
		
		$this->f3->set('email_from', $user->username);

		$this->showInbox();
	}
	
	/* -- MARK UNREAD --
	*	Mark an email as unread, redirect to inbox to avoid marking as read again
	*/
	
	function markAsUnread() {
		
		$email = new Email($this->db);
		$email->getRow($this->f3->get('PARAMS.messageid'));

		$email->markAs($email->id,0);
		
		$this->f3->reroute('/inbox');

	}
	
	/* -- DELETE EMAIL --
	*	Delete email with given ID
	*/
	
	function deleteEmail() {
		
		$email = new Email($this->db);
		$email->deleteEmail($this->f3->get('PARAMS.messageid'));
				
		$this->f3->reroute('/inbox');

	}
	
	/* -- COMPOSE EMAIL --
	*	Show compose page, send list of users
	*/
	
	function composeEmail() {
		
		$user = new User($this->db);
		$allUsers = $user->getAll();
		
		$this->f3->set('all_users',$allUsers);		
		$this->f3->set('view','compose.html');
		$this->render();

	}
	
	/* -- SEND EMAIL --
	*	Take the POSTed email and send it to given user ID, show sent message
	*/
	
	function sendEmail() {
		
		$email = new Email($this->db);
		$email->addEmail($this->f3->get('SESSION.userid'));
		
		$this->f3->set('sent',true);
		$this->composeEmail();

	}
	
	/* -- LOGOUT --
	*	Destroy session, send back to login screen
	*/
	
	function logout() {
		
		$this->f3->clear('SESSION');
		$this->f3->reroute('/login');
		
	}
}

/* -- END OF CONTROLLER -- */	
?>