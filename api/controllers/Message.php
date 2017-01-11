<?php
class message
     {
       public $theirName;
       public $theirEmail;
       public $theirMessage;
       public $totalMessage;
       public $myBoolean;
       public  function process($f3)
              {
				//receives data from contact_us form
			 	 	$this->theirName = $f3->get('POST.name');
			  	$this->theirEmail = $f3->get('POST.email');
			  	$this->theirMessage = $f3->get('POST.message');
				$ip = $_SERVER['REMOTE_ADDR'];
			 	$theIp = strval($ip);
				$this->totalMessage = "new enquiry  from  ".$this->theirName ." \r\n their ip is    :".$theIp."\r\n their email  ".$this->theirEmail." \r\n their message:  ".$this->theirMessage;
				$smtp = new SMTP ( 'smtp.freehosting.host', 587, 'tls/ssl','andybrookestar@ghanalug.org', 'Andrina17' );
				$smtp->set('From', '<andybrookestar@ghanalug.org>');
				$smtp->set('To', '<andybrookestar@gmail.com>');
				$smtp->set('Subject', 'Enquiry from ghanalug');  
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
