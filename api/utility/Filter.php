<?php
class Filter

 {
     
     protected   $badchars = array(     "'", "‘", "’", "′", "“", "”", "„", "″", '"' ,"`" ,"^","%","_","--","xp_" ,"\\"  ); 
     protected  $holdInPut;
     protected  $badWord;
     protected $list_bad_words = array('http','www','//');
     protected  $usrIput;
     protected $usrBoolean;
     protected  $cleanUpInput;   

	function setSpam($usrStuff)
	{
	 $this->usrIput = $usrStuff;
      	       foreach($this->list_bad_words as $value)
		       {
	               if (strpos($this->usrIput,$value)  !==FALSE )
	   		      {
				 $this->usrBoolean ="1";
			 	 break;
			          
			     }
			       else
			       {
		       		$this->usrBoolean="0";
		               }
		       }     

	}



	function getSpamResult()
         	{
		       return $this->usrBoolean;
		      }







	function    stripBadChars($inputOfUser  )
	{
	$this->holdInPut = $inputOfUser ;
       	$this->cleanUpInput = str_replace($this->badchars,"",$this->holdInPut);
       
	}

function   getCleanText()
{
return $this->cleanUpInput;
}




}//end class




?>