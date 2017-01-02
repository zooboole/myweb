<?php
class User
{
			
            
            
           



          function verify()
          {
			 
			 $f3=Base::instance(); 
			 
			  
			 
			 
			$con = $f3->get('conn');	
			$crypt = \Bcrypt::instance();
			$salt = $f3->get('salt');
			$username = $f3->get('POST.name');
			$rawpassword = $f3->get('POST.password');
			$password = trim($rawpassword);
		    $userPassword =   $crypt->hash($password,$salt)   ; 
			
			$user = new DB\SQL\Mapper($con, 'users');
			$auth = new \Auth($user, array('id'=>'Username', 'pw'=>'Password'));
			$result = $auth->login($username,$userPassword);
				if ($result==True ) 
				{
				$user=   $f3->set('SESSION.user_name',$username);	
					$f3->set('user', $user);
					 $f3->set('content', 'loggedin.htm');			   
			    echo View::instance()->render('page.htm');
					
				}
					
				
				elseif(!$result)
				{
					echo "we cound not find you";
				}
	    	}		  
		
		
		
		        function logout()
		        {
					    $f3=Base::instance(); 
					    $f3->clear('SESSION.user_name');
	                    session_commit();
					    $f3->set('content', 'loggedout.htm');			   
						echo View::instance()->render('page.htm');
				}
		
		
		
		
		
		
		
		
			   
 }      


