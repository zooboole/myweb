<?php
class Page
{
		protected  $theUrlBit;
		protected  $home;


           function beforeroute(){
		
	}

	function afterroute(){
		
	}




 
				function process($f3)
              {
				 
				//general pages
	         
				
				$base = $f3->get('BASE');
				$f3->set('home',$base);
	
	
				$this->theUrlBit =   $f3->get('PARAMS.page');
	         
	         
				if( file_exists("ui/{$this->theUrlBit}.htm"))
			   {
				  
				   $tag = new Metatags3();
				   
				$tagResult[0] = $tag->getTags("{$this->theUrlBit}" );
				$f3->set('theTags',$tagResult[0]);
				   
				   
				   
				   
				  $f3->set('title',  "{$this->theUrlBit}");
				  $f3->set('content', "{$this->theUrlBit}.htm");			   
			    echo View::instance()->render('page.htm');
			
			
			
			}
		else
		{
			
		$f3->set('title',  "no such page");	
		 $f3->set('content', "nopage.htm");	
		 	$f3->set('theTags',"no page");	   
			    echo View::instance()->render('page.htm');	
		}
		
		  }
			   
           

}
