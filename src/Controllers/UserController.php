<?php

namespace Controllers;
use View\View;
use Models\User;
use Exception\InvalidPropertyException;
use Libs\Mail;

class UserController {		
		
	public function index()
	{
		$stringUsers = User::all();		
		$title = 'Our users';
		View::render('users/index', compact('stringUsers', 'title'));		
	}	

	public function form()
	{
		$stringUsers = User::all();		
		$title = 'Our users';
		// Mail::send('EElenchik1@gmail.com' , 'Test!!!!!!!!!!!!!', 'Hello!!!!!!!!!!!!');		
		if( $_POST['registration']){
			try{
				$user = User::signUp($_POST);
				View::render('users/index', compact('stringUsers', 'title'));
			}	
			catch(InvalidPropertyException $e){
				View::render('users/form', ['error'=>$e->getMessage()]);
				// echo $e->getMessage();
				return;
			}	
			if($user instanceof User){
				$message='=<a href="http://test/form/user'. $user->getId().'/activate?token='.$user->getAuthToken().'">Activate</a>';
				Mail::sendMail('$user->getEmail()' , 'Активация почтового адреса', $message);
				// echo 'Congratulation!';				
			}
		}
		if( $_POST['enter']){
			try{
				$user = User::comeIn($_POST);
				View::render('users/index', compact('stringUsers', 'title'));				
			}	
			catch(InvalidPropertyException $e){
				View::render('users/form', ['error'=>$e->getMessage()]);
				// echo $e->getMessage();
				return;
			}	
			if($user instanceof User){				
				/*echo 'Вы вошли!';*/
				View::render('users/index');								
			}
		}
		if(!$_POST) View::render('users/form', compact('title'));		
	}		

	public static function output()  {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('Location: /form');            
        }            
    }

	public function activate(array $vars)
	{
		$user = User::getById($vars[1]);
		if($user->getAuthToken() == $_GET['token']){		
			$user->setConfirmed(1);
			$user->save();
			echo 'Спасибо за активацию!';
		}
		else {
			echo 'Ошибка активации!';
		}
	}
}
