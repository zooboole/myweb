<?php
class home
{
   

      function index($f3)
              {
	       //home page
	
	$f3->set('theTags',"Linux User Group,LUG,Slackware,Distro");
	        $f3->set('title',  "home page ghanalug.org");	
				  $f3->set('content', "home.htm");			   
			    echo View::instance()->render('page.htm');
			}
		
			   
           

}
