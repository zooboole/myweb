<?php
class home
{
   

      function index($f3)
              {
	       //home page
	
	$f3->set('theTags',"Linux User Group,LUG,Slackware,Distro");
	        $f3->set('title',  "home page ghanalug.org");	
				  $code = html_entity_decode("&lsaquo; a href ='/about_us'&rsaquo; click me    &lsaquo;/a  &rsaquo; " );
				  
				  $f3->set('randy',$code);
				  $f3->set('content', "home.htm");			   
			      
			  
			    echo View::instance()->render('page.htm');
			}
		
			   
           

}
