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
			  	$this->theirEmail = $f3->get('POST.email');
			  	$this->theirMessage = $f3->get('POST.message');
				$ip = $_SERVER['REMOTE_ADDR'];
			 	$theIp = strval($ip);
				$this->totalMessage = "new enquiry  from  ".$this->theirName ." \r\n their ip is    :".$theIp."\r\n their email  ".$this->theirEmail." \r\n their message:  ".$this->theirMessage;
			 	$theHost= $f3->get('HOST');
			 	$thePort = $f3->get('PORT');
			 	$theAuthmethod= $f3->get('authMethod');
			  	$emailUserOnDomain=$f3->get('userOnDomain');
			 	$emailPass=$f3->get('userPasswordOnDomain');
				 
				
			
				
				
				$messageSubject=$f3->get('messageSubject');
				 
				$smtp = new SMTP("$theHost", $thePort,"$theAuthmethod","$emailUserOnDomain","$emailPass");
		
			
				$smtp->set('From', '<andybrookestar@ghanalug.org>');//
				
				
				
				
				
				$smtp->set('To', '<andybrookestar@gmail.com>');//
			   	$smtp->set('Subject', 'Enquiry from ghanalug');  //
				$message = $this->totalMessage;
				$this->myBoolean =  $smtp->send($message);

					if($this->myBoolean)
					{
						$f3->set('content', 'messageSent.htm');			   
						echo View::instance()->render('page.htm');
					} 

					else{ 
					$f3->set('content', 'messageFail.htm');			   
					echo View::instance()->render('page.htm');
	 
					  }
    
                     
    
			}
	
	
			   
           

    }
