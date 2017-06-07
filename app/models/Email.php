<?php
/* -- EMAIL MODEL  --
*	@ CAM BURNS
*	Email class that provides emails & database updating
*	Provides support for EmailController
*/

class Email extends DB\SQL\Mapper {
	
	/* -- CONSTRUCTOR --
	*	Map emails table
	*	
	*/
	
	public function __construct(DB\SQL $db) {
		
		parent::__construct($db,'emails');
		
	}
	
	/* -- FETCH ALL --
	*	Grab all the records from database
	*/
	
	public function getAll() {
		
		$this->load();
		return $this->query;
		
	}
	
	/* -- FETCH ALL EMAILS TO USER --
	*	Grab all the records from database for a specific user
	*/
	
	public function getUserEmails($id) {
		
		$this->load(array('toid=?',$id));
		return $this->query;
		
	}
	
	/* -- FETCH EMAIL --
	*	Grab the record from the database with given ID
	*/
	
	public function getRow($id) {
		
		$this->load(array('id=?',$id));
		return $this->query;
		
	}
	
	/* -- MARK AS READ --
	*	Mark the given email as read
	*/
	
	public function markAs($id,$status) {
		
		$this->load(array('id=?',$id));
		$this->viewed = $status;
		$this->save();
		
	}
	
	/* -- ADD EMAIL --
	*	Add a new email that has been POSTed
	*/
	
	public function addEmail($id) {
		
		$this->copyFrom('POST',function($val) {
			return array_intersect_key($val, array_flip(array('subject','content','toid')));
		});
		
		$this->fromid = $id;
		
		$this->save();
		
	}
	
	/* -- DELETE EMAIL --
	*	Delete given email ID
	*/
	
	public function deleteEmail($id) {
		
		$this->load(array('id=?',$id));
		$this->erase();
		
	}
}

/* -- END OF CONTROLLER -- */	
?>