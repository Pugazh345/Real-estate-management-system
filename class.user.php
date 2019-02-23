<?php

require_once 'dbconfig.php';

class USER
{	

	private $conn;
	
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function plotsell($title,$plotsize,$location,$price,$description,$type,$fullname,$contactnum,$email)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO plotsell(title,plotsize,location,price,description,type,fullname,contactnum,email) 
			                                             VALUES(:user_title, :user_plotsize, :user_location, :user_price, :user_description, :user_type, :user_fulname, :user_contactnum, :user_email)");
			$stmt->bindparam(":user_title",$title);
			$stmt->bindparam(":user_plotsize",$plotsize);
			$stmt->bindparam(":user_location",$location);
			$stmt->bindparam(":user_price",$price);		
		$stmt->bindparam(":user_description",$description);
		$stmt->bindparam(":user_type",$type);	
		$stmt->bindparam(":user_fulname",$fullname);
		$stmt->bindparam(":user_contactnum",$contactnum);
		$stmt->bindparam(":user_email",$email);	



				
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function contact($name,$email,$phoneno,$subject,$message)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO contact(name,email,phonenumber,subject,message) 
			                                             VALUES(:user_name, :user_email, :user_phoneno, :user_subject, :user_message)");
			$stmt->bindparam(":user_name",$name);
			$stmt->bindparam(":user_email",$email);
			$stmt->bindparam(":user_phoneno",$phoneno);
			$stmt->bindparam(":user_subject",$subject);		
		$stmt->bindparam(":user_message",$message);	
				
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	
	
	 /* public function sendmail($name,$service,$phoneno,$comment)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 1;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress("SMTP User mail id","SMTP User mail name");		
		$mail->Username = "SMTP User mail id";  
		$mail->Password = "password";
		$mail->SetFrom("SMTP User mail id","SMTP User mail name");
		$mail->AddReplyTo("SMTP User mail id","SMTP User mail name");
		
		$message = " <br/><br/>
				   Please see the feedback Comments:
				   <br/>
				   Name: $name 
				   <br/>
				   Service: $service
				   <br/>
				   Phone Number: $phoneno
				   <br/>
				   Comment: $comment 
				   <br/>"; 
		 
		
		
		$mail->MsgHTML($message);
		$mail->Send();
	}	
	 */
	
	
}