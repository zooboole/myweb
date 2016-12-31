<?php

class Usermodel 
{
	protected $row;
	protected $connection;
	protected $rows;
	protected $theirUsername;
	protected $theirPassword;
    protected $name;   
   
   
   
    function	__construct( )

    {
		$f3=Base::instance();
		$this->connection = $f3->get('conn');	
		
	}	
	
	
	public function doIt($username,$password)
	{
	$this->theirUsername = $username;
	$this->theirPassword = $password;
	$this->connection->exec('INSERT INTO users VALUES(:Id,:Username,:Password)',array(':Username'=>$this->theirUsername,':Password'=>$this->theirPassword));
		
	}
	
	
	public function getOne($name)
	{
		$this->name = $name;
		$stmt=$this->connection->prepare('SELECT * FROM users where Username=?');
		$stmt->execute(array($name));
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    $rowNumber =  count($row['Username']);
		return $rowNumber;
	}
	
	
	
	
	public function update($newpassword)
	{
		$stmt = $this->connection->prepare("UPDATE users  SET Password=? WHERE Id=?");
		$stmt->execute(array($newpassword,1));
		 $stmt->rowCount();
	    if($stmt==1)
	    {
		echo "you have successfully changed password;make sure you remember it";	
		}
	
	}
	
	
	
}
