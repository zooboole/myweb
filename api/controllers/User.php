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
			
			$user = new DB\SQL\Mapper($con, 'admin');
			$auth = new \Auth($user, array('id'=>'Username', 'pw'=>'Password'));
			$result = $auth->login($username,$userPassword);
				
				
				
					if (($result==True ) && ($username =="admin"))
					{
					
					
					
					$f3->set('SESSION.user_name',$username);	
				 	 $rand = md5(uniqid(rand(),true));
                   
                   $f3->set('SESSION.csrf',$rand);   
					
					
					//above will be admin
					//$f3->set('user', $user);
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
					
				        $f3->set('content', 'nouserfound.htm');			   
						echo View::instance()->render('page.htm');
				
				}
	    	}		  
		
		
		
		        function logout()
		        {
					    $f3=Base::instance(); 
					   $f3->clear('SESSION');
						session_commit();
					   
					   
					    
					    $f3->set('content', 'loggedout.htm');			   
						echo View::instance()->render('page.htm');
				}
		
		
		
		
        function setmyHeredoc()
        {
		$this->myHeredoc = 	 <<<END
		
		
	Hi, Admin 
     
     While logged in you can access the relative url /admin here: <a href ="/admin">admin </a> 
     to do tasks such as :<br>
     
       
	Submit a new blog <br>
   Moderate blog comments by changing status from 1 to zero.<br>
	Change admin  password 
    


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
