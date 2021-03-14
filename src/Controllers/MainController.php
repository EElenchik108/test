<?php

namespace Controllers;
use View\View;

class MainController{
	public function __construct()
	{
		
	}
	public function home()
	{
		View::render('main/home');
	}	
	
}