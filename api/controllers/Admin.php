<?php

class Admin
{
    
       

		function beforeroute()

		{
			$f3=Base::instance();	 
		    $someuser = $f3->get('SESSION.user_name');
		    if($someuser !="admin")
		    {
				$f3->reroute('/userLogin');
			}    
		
		}


		function index()
		{
			
			$f3=Base::instance();	 
			
			 
		  self::displayForm();
		
		}

        function displayForm()
        {
		echo 	 <<<END
		
		<div class="container-fluid text-center">    
    	 <div class="row content">
        <div class="col-xs-12 text-left"> 
		 <h2 class = "gondola">Admin Reset Password </h2>
		<form role="form" action ="/password" method ="post"> 
			<div class="form-group"> 
			<label for="name">new password</label> 
			 <input type="text" class="form-control" id="name" name ="password" placeholder="Enter Your Name Please" required ="true"> 
			 </div>
			 
			
			 
			 
				
				<button type="submit" class="btn btn-default">Submit</button>
				
				</form>
				</div><!-- div column-->
				</div><!--end of row content-->
        </div><!-- end of container-->
	
		
		
END;
		
		
		
		
		
		
			
		}	





       



}













