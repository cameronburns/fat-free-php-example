<?php
/* -- USER MODEL  --
*	@ CAM BURNS
*	User class that accesses user table, assists with authentication
*	Provides support to UserController
*/

class User extends DB\SQL\Mapper {
	
	/* -- CONSTRUCTOR --
	*	Map users table
	*	
	*/
	
	public function __construct(DB\SQL $db) {
		
		parent::__construct($db,'users');
		
	}
	
	/* -- FETCH ALL --
	*	Grab all user records from database
	*/
	
	public function getAll() {
		
		$this->load();
		return $this->query;
		
	}
	
	/* -- FETCH SPECIFIC/ID --
	*	Grab the record from the database with given user ID
	*/
	
	public function getRow($id) {
		
		$this->load(array('id=?',$id));
		return $this->query;
		
	}
	
	/* -- FETCH SPECIFIC/USERNAME --
	*	Grab the record from the database with given username
	*/
	
	public function getByUsername($username) {
		
		$this->load(array('username=?',$username));
		return $this->query;
		
	}
}

/* -- END OF CONTROLLER -- */	
?>