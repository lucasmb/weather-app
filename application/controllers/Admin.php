<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend {

	public function index()
	{
		$this->render->set_page('admin');
		$this->render->page('admin');
	}
}