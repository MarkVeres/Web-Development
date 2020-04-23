<?php
class Post {
	public $id;
	public $title;
	public $body;
	public $displayName;
	public $answerCount;

	public function __construct($id, $title, $body, $displayName, $answerCount){
		$this->id = $id;
		$this->title = utf8_encode($title);
		$this->body = utf8_encode($body);
		$this->displayName = utf8_encode($displayName);
		$this->answerCount = $answerCount;
	}
}
?>