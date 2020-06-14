<?php
		//Запуск сессий;
	session_start();
	//если пользователь не авторизован

	if (!(isset($_SESSION['Name'])))
	{
		//идем на страницу авторизации
		header("Location: http://localhost/finkvartal/auth_form.php");
		exit;
	}	
		

	copy( $_FILES['img']['tmp_name'], '/var/www/user1932/data/www/finkvartal.org.ru/img/' . $_FILES['img']['name']);
	$id = $_POST['action'];
    $date = date("Y-m-d");//$_POST['date'];
    $title = $_POST['title'];
    $text = $_POST['text'];
	$img = $_FILES['img']['name'];

	if($id == 0)
	{   
	                    
	$connection = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    	
	$connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
    //далее сам запрос		
    $sql="INSERT INTO news (date,title,text,img) values (:date,:title,:text,:img)";
	//var_dump ($db);
    $sth=$connection->prepare($sql);		
    $sth->bindValue(':date', $date);
    $sth->bindValue(':title', $title);
    $sth->bindValue(':text', $text);
	$sth->bindValue(':img', $img);    
    $sth->execute();	
	header("Location: http://finkvartal.org.ru/news_admin.php");	
	//header ("Location: ".$_SERVER['HTTP_REFERER']);
	}
		
	if($id != 0)
	{		
		try 
		{
			$pdo = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
			$connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare('UPDATE news SET date=:date, title=:title, text=:text, img=:img WHERE id = :id');
			$stmt->execute(array(
				':id'   => $id,
				':date' => $date,
				':title' => $title,
				':text' => $text,
				':img' => $img	
			));
			
			header("Location: http://finkvartal.org.ru/news_admin.php");		
		}
		catch(PDOException $e) 
		{
			echo 'Error: ' . $e->getMessage();
		}
	}
	
?>