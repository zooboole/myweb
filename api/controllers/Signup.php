<?php
class Signup
{
 

				function index()
					{
					$f3=Base::instance();	  
					$username=$f3->get('POST.username');
					$rawPassword=$f3->get('POST.password');
					$crypt = \Bcrypt::instance();
					$salt = $f3->get('salt');
					$trimPassword = trim($rawPassword);
					$password =   $crypt->hash($trimPassword,$salt)   ; 
					$user = new Usermodel();
			
			
					$rowCount=   $user->getOne($username);
						if (($rowCount ==1)|| ($username =="admin") ||($username=="administration"))
	 
						{
							echo "sorry you cann not have that name";
						}
	 
							else
								{
	
	
								$user->doIt($username,$password);
								echo "seems to inserted data in database";
			             
								}	
			
				
			
							}
		
			   function checkUsrInput()
			   {
				   echo "hello"; 
				   
				 }  
           

}//end class
