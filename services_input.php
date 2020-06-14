<?php
	$id = $_POST['action'];
    $date = date("Y-m-d"); //$_POST['date'];
	$name = $_POST['name'];
	$address = $_POST['address'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
    $text = $_POST['text'];
			
    //соединение с базой
	//var_dump ($_POST);
	if($phone != null && $text != null && $address != null)
	{		
		$connection = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');
		$connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
	    //далее сам запрос		
	    $sql="INSERT INTO application (date,name,address,phone,email,text) values (:date,:name,:address,:phone,:email,:text)";
		//var_dump ($sql);
	    $sth=$connection->prepare($sql);		
	    $sth->bindValue(':date', $date);
	    $sth->bindValue(':name', $name);
	    $sth->bindValue(':address', $address);
		$sth->bindValue(':phone', $phone);    
		$sth->bindValue(':email', $email);
		$sth->bindValue(':text', $text);	
	    $sth->execute();	
		header("Location: http://finkvartal.org.ru/thank_you.php");	
	}
	else
	{
		header("Location: http://finkvartal.org.ru/no_data.php");	
		exit;
	}
?>