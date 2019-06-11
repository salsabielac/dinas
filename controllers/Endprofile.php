<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endprofile extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

    public function index(){
    	$this->load->view('enduser/header');
    	$this->load->view('enduser/profil');
    }

}