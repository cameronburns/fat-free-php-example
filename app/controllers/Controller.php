<?php
/* -- CONTROLLER  --
*	@ CAM BURNS
*	Main controller that sets all default values & default site view
*/

class Controller {
	
	protected $f3;
	protected $db;
	
	/* -- CONSTRUCTOR --
	*	General stuff; connect to the database, define f3
	*	
	*/
	
	function __construct() {
		
		// F3
		$f3=Base::instance();
		$this->f3 = $f3;
		
		// Database
		$db = new DB\SQL($f3->get('db').'dbname='.$f3->get('dbname'),$f3->get('dbuser'),$f3->get('dbpass'));
		$this->db = $db;		
	}
	
	/* -- BEFORE ROUTE --
	*	Check if user is logged in, otherwise send to login page
	*	
	*/
	
	function beforeroute() {
		
		if($this->f3->get('SESSION.username') === null) {
			$this->f3->reroute('/login');
			exit;
		}
	}

}

/* -- END OF CONTROLLER -- */	
?>