<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/login');
		$this->load->view('home/footer');
		
	}
	public function daftar()
	{
		$this->load->view('home/header');
		$this->load->view('home/daftar');
		$this->load->view('home/footer');

	}
}
