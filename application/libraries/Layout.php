<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @author gaurav
 * 
 */
class Layout{
	private $ci;
	
	private $layoutTitle=NULL;
	
	private $layoutDescription=NULL;
	
	private $includes = array();
	
	public function __construct(){
		$this->ci =& get_instance();
	}
	
	public function setTitle($title){
		$this->layoutTitle = $title;	
	}
	
	public function setDescription($description){
		$this->layoutDescription = $description;
	}
	
	public function addInclude($path,$prependBaseUrl=true){
			$this->includes[] = (($prependBaseUrl)? (base_url().$path):$path);
			return $this;
	}
	
	public function getIncludes(){
		$includes = "";
		
		foreach ($this->includes as $include){
			if(preg_match("/js$/", $include)){
				$includes.= "<script type='text/javascript' src='".$include."'></script>";
			}else if(preg_match("/css$/", $include)){
				$includes.= "<link rel='stylesheet' href='".$include."'/>";
			}
		}
		return $includes;
	}
	
	public function view($viewName,$layouts=array(),$params=array(),$default=true){
		if(is_array($layouts) && count($layouts)>=1){
			foreach ($layouts as $layoutKey => $layout){
				$params[$layoutKey] = $this->ci->load->view($layout,$params,true);
			}
		}
		
		if($default==true){
			$params["layout_title"] = $this->layoutTitle;
			$params["layout_description"] = $this->layoutDescription;
			
			$this->ci->load->view("layouts/header",$params);
			$this->ci->load->view($viewName,$params);
			$this->ci->load->view("layouts/footer",$params);
		}else{
			$this->ci->load->view($viewName,$params);
		}
	}
	
}