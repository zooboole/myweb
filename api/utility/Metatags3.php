










 
<?php 
 class Metatags3 
 
 {
    public function getTags($input)
  {
   $andy = array(
   "default"=>"GinBrookes Foundation ,NGO,Aplaku,Weija,Accra,Ghana, West Africa",
  
   "find_us"=>"GinBrookes Foundation, Aplaku Old Town,Next to New Aplau Clinic, Weija,Accra",
   "contact_us"=>"contact us, feedback form,send message",
 );
 
   
  $myVariable =$input;
  switch($myVariable)
  {
  
    case "contact_us" : return $andy['contact_us']; break;
    
    case "find_us" : return $andy['find_us']; break;
    
  
   
  /*case "  " : return $andy['  ']; break;*/
  
  
  
  default : return $andy['default'];   
 
 
 
 
 
 
 
 
  }
  
  
  
  }



 } //class end

