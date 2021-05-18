<?php

class Controller {
	
	protected $_controller;
	protected $_action;
	protected $_template;

	public $doNotRenderHeader;
	public $render;

	function __construct($controller, $action) { 
		
		$this->_controller = ucfirst($controller); //Artist
		$this->_action = $action; //viewall
		if($this->_controller != "Index"){
			$model = ucfirst($controller); //Artist
			$this->$model = new $model;
			
		}
		
		$this->doNotRenderHeader = 0;
		$this->render = 1;
		 // new Index 
		$this->_template = new Template($controller,$action); 
		

	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
		if ($this->render) {
			$this->_template->render($this->doNotRenderHeader);
		}
	}
		
}