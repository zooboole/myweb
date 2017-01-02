<?php
class Blog 

		{
			protected   $theTitle;//title
			protected   $mainText;//article
			protected  $imageFile;//image uploaded
			protected $imageSrcPath;
			protected $slug;// title converted to slug if white space 
			protected $connection; //db connection
			protected $datetime;	
			protected $myvar;	
			protected $blogUrl;
			protected $blogR;
			protected $blogC;
			protected $keywords;//for metatags
			 function beforeroute()
           {
			          
            
           
			}
			
			
			
			
			
		
							public 	function process()
              {
				
						
					
					
					$f3=Base::instance();	 
					
					 if( ($f3->get('SESSION.user_name')=== NULL )OR ($f3->get('SESSION.user_name')!== 'admin'))  
					
					{
					$f3->reroute('/userLogin');	
					}	
					
					else
					{
					 
					$this->connection = $f3->get('conn');
					
				     $this->keywords= $f3->get('POST.keywords');
				
				
				
					$title = $f3->get('POST.title');
					$this->theTitle =trim($title);
					
					$this->mainText = $f3->get('POST.maintext');
				    $slimy = New Slug();
				    $this->slug =$slimy->getSlug($this->theTitle);
					$web = \Web::instance();
					$a =	$web->receive(NULL,true,true );
					
					
					
					$name = array_keys($a);
				 	$this->imageFile =  $name[0];
					
					
					$this->imageSrcPath=    "   <img src = \"../$this->imageFile\"   class = \"img-responsive pull-left \" hspace = \"10px\" vspace = \"10px\"    >          ";
				   
	  	           	$this->datetime =     date("Y-m-d h:i:sa");
	           $stmt =     $this->connection->exec('INSERT into blog values (:Id,:title,:article,:slug,:imageSrc,:mydate,:keywords)',array (':title'=>$this->theTitle,':article'=>$this->mainText,':slug'=>$this->slug,':imageSrc'=>$this->imageSrcPath,':mydate'=>$this->datetime,':keywords'=>$this->keywords));
					if($stmt)
					{
									
				       $f3->set('content', 'blogEntrySuccessful.htm');			   
						echo View::instance()->render('page.htm');
					}
			
					else
						{
						echo "something went wrong";	
						}
				
				
				}	//end of else			
			
			
			
			
				}
			   
          
            public 	function blogTitles()
			{
				$f3=Base::instance();	
			  
			   $home =$f3->get('BASE');
			 
			 
			  $f3->set('home',$home);
			 
			  
				$blogData = new Blogmodel();
				$result = $blogData->getTitles();
				
				
				
				 $f3->set('result', $result);	
				
				echo View::instance()->render('blogTitles.htm'); 
				
				      
	        
			}
          
          public function blogArticle()
          
          {
			  $f3=Base::instance();
			  $this->blogUrl =   $f3->get('PARAMS.url'); 
			  $theUrl=  $this->blogUrl;
		      $blogRecord = new Blogmodel();
		      $result=   $this->blogR = $blogRecord->getArticle( $theUrl)  ;  
		 // now to get cooments using blog article id
		 $id = $result['Id'];
		 
		 $result2 = $blogRecord->getBlogComments($id);
		 
		// var_dump($result2);
		 
		 
		 
		  $f3->set('result', $result);	//blog
		  $f3->set('result2',$result2); //blog comments
		    echo View::instance()->render('blogArticle.htm'); 
		
		  }
          
         public function blogComments()
         {
				$f3=Base::instance();
			 	$blogId= $f3->get('POST.artId');
			 	$name=  $f3->get('POST.name');
			 	$comment =  $f3->get('POST.comments');
			 	$email =  $f3->get('POST.email');
			 	$thedatetime =     date("Y-m-d h:i:sa");
				
				
				
				$blogComment = new Blogmodel();
			$logic=	$blogComment->insertComments($blogId,$name,$comment,$email,$thedatetime);
			 
			    if($logic ==True)
			    {
					
					
					
					 
					 
					  $f3->set('content', 'blogCommentOK.htm');			   
			    echo View::instance()->render('page.htm');
			
					 
					 
					 
				}
			 
		 }  

}
