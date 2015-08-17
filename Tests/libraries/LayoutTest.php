<?php
namespace Tests\libraries;

class LayoutTest extends \PHPUnit_Framework_TestCase{
	private $ci;
	
	public function setUp(){
		$this->ci =& get_instance();
		$this->ci->load->library('layout');
	}
	
	/**
	 * @test
	 */
	public function checkCiInstanceInClass(){
		$this->assertInstanceOf('Layout', $this->ci->layout,"Issue with the instance of the layout class");
	}
	
	public function tearDown(){
		$this->ci = NULL;
	}
}