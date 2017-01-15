<?php
class User
{
			
            
       private $myHeredoc;     
           



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
				
				
				
					if (($result==True ) && ($username =="admin"))
					{
					$user=   $f3->set('SESSION.user_name',$username);	
					//above will be admin
					$f3->set('user', $user);
					$f3->set('content', 'loggedin.htm');	
					self::setmyHeredoc();
					$getVar = self::getmyHeredoc();
					
					
					$f3->set('info',$getVar);		   
					echo View::instance()->render('page.htm');
					
					}
					
				    elseif (($result==True ) && ($username !="admin"))
				
				    {
						$user=   $f3->set('SESSION.user_name',$username);	
					//above will be admin
					$f3->set('user', $user);
					$f3->set('content', 'loggedin.htm');	
					
					
					
					$f3->set('info','hello somebody');		   
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
		
		
		
		
        function setmyHeredoc()
        {
		$this->myHeredoc = 	 <<<END
		
		
	Hi, Admin 
	
	Now that your logged in you can access pages below<br>  
	You can submit a new blog here: <a href ="/blogSubmitForm">submit blog </a><br>
	
	Also you can change password here:<a href ="/adminRSPW">chnage admin password </a><br>
		
    Please note the above pages have restricted access & can only be accessed by admin, after logging in.		
    Also might be an idea to make a note of the relative url since its more secure to not overly adverstise 
    links 
    


END;
		
		
			}	
		
		 function getmyHeredoc()
        {
		
		return $this->myHeredoc;
			   
 }      


      function resetAdminPassword()
      {
		  
		 $f3=Base::instance();   
		  $rawpassword = $f3->get('POST.password');
		$password = trim($rawpassword);
		$crypt = \Bcrypt::instance();
		$salt = $f3->get('salt');
		$userPassword =   $crypt->hash($password,$salt)   ; 
	    $useModel = New Usermodel();
	    $useModel->update($userPassword); 
		  
	  }









}
