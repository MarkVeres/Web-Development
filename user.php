<?php
class User {
	public $displayName;
	public $id;

	public function __construct($displayName, $id){	
		$this->displayName = utf8_encode($displayName);
		$this->id = $id;
	}
}
?>