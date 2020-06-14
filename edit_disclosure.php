<?php
	
    session_start();

    if (!(isset($_SESSION['Name'])))
    {
	header("Location: http://finkvartal.org.ru/auth_form.php");
	exit;
    }	
    
    $id = $_POST['action'];	
    $edit = @$_POST['submit_edit'];//Для экранирования ошибок (выключает их выдачу)	для строки
    $delete = @$_POST['submit_delete'];	

    if($id != 0 && $delete == 'Удалить')
    {
        try {		
                $pdo = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $stmt = $pdo->prepare('DELETE FROM disclosure WHERE id = :id');
                $stmt->bindParam(':id', $id); // Воспользуемся методом bindParam
        	$stmt->execute();
 
                echo $stmt->rowCount(); // 1
            } 	
            catch(PDOException $e) 
            {
                echo 'Error: ' . $e->getMessage();
            }
        
            header ("Location: ".$_SERVER['HTTP_REFERER']);	
    }
	//header ("Location: ".$_SERVER['HTTP_REFERER']);	
	
	if($id != 0 && $edit == 'Редактировать')
        {
            $pdo = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
            $connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
            $statement = $pdo->query('SELECT * FROM disclosure WHERE id= ' .$id. '');
            $disclosure_admin = '';//Для распознания переменной
            $row = $statement->fetch(PDO::FETCH_OBJ);
            $disclosure_admin .= 
		'<div class="portfolioBox">' .
                '<form action="disclosure_input.php" enctype="multipart/form-data"  method="post" >' .
		'<fieldset>' .											
                '<label>Заголовок договора<em></em></label>' .
		'<input type="text" name="title" size="64" value="' . $row->title . '"><br />' .								
                '<h3>Отправка файла на сервер</h3>' .								
		'<p><input type="file" name="img" accept="image/*,image/jpeg" value = "' . $row->img . '"></p>' .
		'<button type="submit">Сохранить изменения</button>' .
		'<input type="hidden" name = "action" value="' . $row->id .'"></p>' .
                '</fieldset>' .	
		'</form>' .																										
		'</div>';
	}
	$file = file_get_contents('disclosure_admin.php');
	$str = str_replace('{!disclosure admin!}', $disclosure_admin ,$file);
	echo $str;