<?php 
class Blogmodel

{

protected $rows;
protected $connection;
protected $articleRecord;
protected $slugUrl;
protected $blogId;
protected $name;
protected $comment;
protected $email;
protected $status;
protected $mydate;
protected $IdFromBlog;
protected $commentRows;
Protected $commentRecord;
 
 
 function	__construct( )

    {
		$f3=Base::instance();
	$this->connection = $f3->get('conn');	
		
	}	


   public function getTitles()
	{
	
	$this->rows= $this->connection->exec('SELECT * from blog  ');
	return $this->rows;
   }


  public function getArticle($slugUrl)
  {
	 $this->slugUrl = $slugUrl;
	 $sql = 'SELECT * from blog WHERE  slug =:myVar';
	 $stmt = $this->connection->prepare($sql);
	 $stmt ->execute(array(':myVar'=>$this->slugUrl));
	 $this->articleRecord = $stmt->fetch(PDO::FETCH_ASSOC); 
	 return $this->articleRecord;
	}  

  public function getBlogComments($theId)
  {
	  $this->IdFromBlog = $theId;
	  
	$result2 = $this->connection ->exec("SELECT *    FROM blogComments WHERE blogId =$this->IdFromBlog AND status=1  ");
    return $result2;
 }	  

 public function insertComments($blogId,$name,$comment,$email,$thedatetime)
 {
	
	$this->blogId= $blogId;
$this->name = $name;
$this->comment = $comment;
$this->email = $email;
$this->status=1;
$this->mydate=$thedatetime;
	
	
	
	
$stmt = 	$this->connection->exec('INSERT INTO blogComments VALUES(:Id,:blogId,:name,:comment,:email,:status,:mydate)',array(':blogId'=>$this->blogId,':name'=>$this->name,':comment'=>$this->comment,':email'=>$this->email,':status'=>$this->status,':mydate'=>$this->mydate));
		return $stmt ;
		
 }


public function zeroCommentStatus($commentId)
{
	
	$stmt = $this->connection->prepare("UPDATE blogComments  SET status=? WHERE Id=?");
	$stmt->execute(array(0,$commentId));
	return $stmt;
	
	
}




}
