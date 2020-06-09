<?php
class Comments {
	public $text;
	public $displayName;
	public $id;

	public function __construct($text, $displayName, $id){
		$this->text = utf8_encode($text);		
		$this->displayName = utf8_encode($displayName);
		$this->id = $id;
	}
}
?>