<?php 

class Slug
{
var $textToConvert;
var $slug;
public function getSlug($input)
{

$this->textToConvert = $input;

$this->slug =  preg_replace('/[^A-Za-z0-9-]+/', '-', $this->textToConvert);
return $this->slug;




}


}


?>
