<?php
	//Запуск сессий;		     		
	session_start();
	//если пользователь не авторизован

	if (!(isset($_SESSION['Name'])))
	{
		//идем на страницу авторизации
		header("Location: http://finkvartal.org.ru/auth_form.html");
		exit;
	}	

	if( copy($_FILES['img']['tmp_name'], '/var/www/user1932/data/www/finkvartal.org.ru/img/' . $_FILES['img']['name']) )
	{
		echo "Файл загружен на сервер";
	} 
	else
	{
		echo "Ошибка при загрузке файла";
	}

	$id = $_POST['action'];    
    $title=$_POST['title'];    
	$img=$_FILES['img']['name'];

	if($id == 0)
        {
            $connection = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
            $connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
            //далее сам запрос		
            $sql="INSERT INTO disclosure (title,img) values (:title,:img)";
            //var_dump ($db);
            $sth=$connection->prepare($sql);		    
            $sth->bindValue(':title', $title);    
            $sth->bindValue(':img', $img);    
            $sth->execute();	
            header("Location: http://finkvartal.org.ru/disclosure_admin.php");		
	}
		
	if($id != 0)
	{		
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
			$connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare('UPDATE disclosure SET title=:title, img=:img WHERE id = :id');
			$stmt->execute(array(
				':id'   => $id,				
				':title' => $title,				
				':img' => $img	
			));
			
			header("Location: http://finkvartal.org.ru/disclosure_admin.php");		
		}
		catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}
