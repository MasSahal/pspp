<?php

namespace App\Controllers;

class App extends BaseController
{
	public function index()
	{
		return view('user/template_user');
	}
}
