<?php
/* -- USER CONTROLLER  --
*	@ CAM BURNS
*	Controller for the login screen & authenticating a user
*	Uses the User class (models/User.php)
*/

class UserController extends Controller {
		
	/* -- RENDER --
	*	Show the login screen
	*	
	*/
	
	function render() {
		
		$this->f3->set('view', 'login.html');
		
		$template = new Template;
		echo($template->render('default.html'));
	}
	
	/* -- RESET BEFORE ROUTE --
	*	The beforeroute will redirect logged out users to the login screen. We don't want to do this on the login screen, or we'll be stuck in a loop! Instead, we'll check if they ARE logged in, and if they are, send them back home as they don't need to login again.
	*	
	*/
	
	function beforeroute() {
		
		if($this->f3->get('SESSION.username') != null) {
			$this->f3->reroute('/');
			exit;
		}

	}
	
	/* -- AUTHENTICATE --
	*	Authenticate a logging in user, set session if all is well
	*/
	
	function authenticate() {
		
		$username = $this->f3->get('POST.username');
		$password = $this->f3->get('POST.password');
		
		$user = new User($this->db);
		$user->getByUsername($username);
		
		
		
		if($user->dry()) {
			
			$this->f3->set('error','Username and password combination not found. Please try again.');
			$this->render();
			exit();
		}
		
		if(password_verify($password, $user->password)) {
			
			$this->f3->set('SESSION.userid', $user->id);
			$this->f3->set('SESSION.username', $user->username);
			$this->f3->reroute('/');
			
		} else {
			
			$this->f3->set('error','Username and password combination not found. Please try again.');
			$this->render();
			exit();
			
		}
		
	}
	
}

/* -- END OF CONTROLLER -- */	
?>