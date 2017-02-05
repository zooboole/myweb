<?php
class Page
{
		protected  $theUrlBit;
		protected  $home;
        protected $sessionTest;
        protected $sessionBoolean;
        protected $myFile;
        protected $theuser;  
          
          
           function beforeroute()
				{
				$f3=Base::instance();
				$this->sessionTest =  is_null( $f3->get('SESSION.user_name')) ;		
					if ($this->sessionTest !=1)
					{
						
						$theUser = $f3->get('SESSION.user_name');
						
						
					}
					
					
				}

			function process()
              {
				$f3=Base::instance();
				$base = $f3->get('BASE');
				$f3->set('home',$base);
				
				
				
				
				$this->theUrlBit =	  $f3->get('PARAMS.page');
				$this->myFile =   file_exists("ui/{$this->theUrlBit}.htm");     
			    
			  if( ($this->myFile ==0)  OR  ($this->theUrlBit == "page"))
			{
				
			$f3->set('title',  "no such page");	
					$f3->set('content', "nopage.htm");	
					$f3->set('theTags',"no page");	   
					echo View::instance()->render('page.htm');	
			
			
			}
			  
			  
			  
			  
			    elseif($this->myFile ==1)
			   {
				
						if( (strcmp($this->theUrlBit,"admin") != 0) AND (strcmp($this->theUrlBit,"modComments") != 0)  AND (strcmp($this->theUrlBit,"adminRSPW") != 0) AND  (strcmp($this->theUrlBit,"blogSubmitForm")!=0  )    )
						{
						
						$tag = new Metatags3();
				   			$tagResult[0] = $tag->getTags("{$this->theUrlBit}" );
							$f3->set('theTags',$tagResult[0]);
							$f3->set('title',  "{$this->theUrlBit}");
							$f3->set('content', "{$this->theUrlBit}.htm");			   
							echo View::instance()->render('page.htm');
						
						
						}
						elseif (    (  (strcmp($this->theUrlBit,"admin")==0) OR              (strcmp($this->theUrlBit,"modComments")==0)OR  (strcmp($this->theUrlBit,"adminRSPW") == 0) OR  (strcmp($this->theUrlBit,"blogSubmitForm")==0  ) ) AND  (  ( $this->sessionTest == 1)   OR (  $f3->get('SESSION.user_name')!= "admin" )          ) )
			
						{
				        $f3->set('title',  "no such page");	
					$f3->set('content', "restrictedPage.htm");	
					$f3->set('theTags',"no page");	   
					echo View::instance()->render('page.htm');	
			
			
						
						
						}
		                
		                
		                elseif (    ( (strcmp($this->theUrlBit,"admin")==0)OR (strcmp($this->theUrlBit,"modComments") == 0)OR (strcmp($this->theUrlBit,"adminRSPW") == 0) OR  (strcmp($this->theUrlBit,"blogSubmitForm")==0  ) ) AND  (  ( $this->sessionTest == 0)   AND (  $f3->get('SESSION.user_name')== "admin" )          ) )
		                {
							
							
						  $f3->set('title',  "admin");	
					$f3->set('content', "{$this->theUrlBit}.htm");
					$f3->set('theTags',"admin page ");	   
			     	$f3->set('csrf',$f3->get('SESSION.csrf'));
				    $f3->set('fred',$f3->get('SESSION.user_name'));
					
					
					echo View::instance()->render('page.htm');		
							
						
						
						
						
						
						
						
						}
		                
		                
		
		               else
		               
		               {
						   echo "last logic";
					   }
		
		
		
		
				}
		
		
		
			
		
		
		
		
		
		
		
		  }//end function process 
			   
           

}
