<?php

// Kickstart the framework
$f3=require('lib/base.php');

$f3->set('DEBUG',3);


if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');
$base = $f3->get('BASE');
$f3->set('home',$base);
$f3->set('salt',"1234567891234567891234");

$db = new \DB\SQL('sqlite:andyDb');
$f3->set ('conn',$db);


$f3->route('POST /password',
    function($f3) 
    {
		$rawpassword = $f3->get('POST.password');
		$password = trim($rawpassword);
		$crypt = \Bcrypt::instance();
		$salt = $f3->get('salt');
		$userPassword =   $crypt->hash($password,$salt)   ; 
	    $useModel = New Usermodel();
	    $useModel->update($userPassword); 
	
		
	
	
	
		
});

$f3->config('config.ini');

$f3->config('routes.ini');

$f3->run();
