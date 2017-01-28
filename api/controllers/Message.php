<?php
class message
     {
       protected $theirName;
       protected $theirEmail;
       protected $theirMessage;
       protected $totalMessage;
       protected $myBoolean;
     
       
       
       
       public  function process()
              {
				  $f3=Base::instance();
				  
				 
				//receives data from contact_us form
			 	 	$this->theirName = $f3->get('POST.name');
			  	    $this->theirName = $f3->scrub($this->theirName);
			  	
			  	$this->theirEmail = $f3->get('POST.email');
			  	$this->theirEmail = $f3->scrub($this->theirEmail);
			  	
			  	
			  	$this->theirMessage = $f3->get('POST.message');
					  	$this->theirMessage =$f3->scrub($this->theirMessage);
					  	
					  	echo $f3->get('IP');
					  	$s= New  Session();

$f3->set('SESSION.test',123);
echo $f3->get('SESSION.test');
					  	
			echo 	$s->CSRF();	  	
					  	
			  	
			/*
				
				
				$ip = $_SERVER['REMOTE_ADDR'];
			 	$theIp = strval($ip);
				$this->totalMessage = "new enquiry  from  ".$this->theirName ." \r\n their ip is    :".$theIp."\r\n their email  ".$this->theirEmail." \r\n their message:  ".$this->theirMessage;
			 	$theHost= $f3->get('HOST');
			 	$thePort = $f3->get('PORT');
			 	$theAuthmethod= $f3->get('authMethod');
			  	$emailUserOnDomain=$f3->get('userOnDomain');
			 	$emailPass=$f3->get('userPasswordOnDomain');
				 
				
			
				
				
				
				 
				$smtp = new SMTP("$theHost", $thePort,"$theAuthmethod","$emailUserOnDomain","$emailPass");
		
			
			
                $FromOnDomain =$f3->get('FromOnDomain');			
				$smtp->set('From',$FromOnDomain );
			  
			 
			 
			 
			    $forwardMessageTo= $f3->get('sendMessageTo'); 
				$smtp->set('To',$forwardMessageTo );
			   
			   
			    $subject = $f3->get('Subject');
			   	$smtp->set('Subject', $subject);  
				
				
				
				
				
				$message = $this->totalMessage;
					
					
					if($this->myBoolean)
					{
						$f3->set('content', 'messageSent.htm');			   
						echo View::instance()->render('page.htm');
					} 

					else{ 
					$f3->set('content', 'messageFail.htm');			   
					echo View::instance()->render('page.htm');
	 
					  }
       */
                   
    
			}//end function process 
	
	
			 
         

    }
