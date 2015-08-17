<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function test(){
		$this->load->library("layout");
		
		
		
		$this->layout->setTitle("My Layout");
		$this->layout->setDescription("My Description");
		$this->layout->view("home");
	}
}
