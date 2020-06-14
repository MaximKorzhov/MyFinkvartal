<?php
		
	$id = $_POST['action'];	
	$edit = @$_POST['submit_edit'];//Для экранирования ошибок (выключает их выдачу)	для строки
	$delete = @$_POST['submit_delete'];	
	//var_dump ($_POST);
	//echo ($id);
	if($id != 0 && $delete == 'Удалить')
	{
		try
	 	{		
			$pdo = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$stmt = $pdo->prepare('DELETE FROM news WHERE id = :id');
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
		$statement = $pdo->query('SELECT * FROM news WHERE id= ' .$id. '');
		$news_admin = '';//Для распознания переменной
			$row = $statement->fetch(PDO::FETCH_OBJ);
			$news_admin .= 
				'<div class="portfolioBox">' .
                                    '<form action="news_input.php" id="contact" method="post" >' .
					'<fieldset>' .
						'<label>Дата размещения<em>*</em></label>' .
							'<input type="text" name="date" size="8" value="' . $row->date . '"><br />' .
						'<h4>Добавить картинку</h4>' .
							'<p><input type="file" name="img" accept="image/*,image/jpeg" value = "' . $row->img . '"></p>' .
						'<label>Заголовок<em>*</em></label>' .
							'<input type="text" name="title" size="64" value = "' . $row->title . '"><br />' .
						'<label>Текст новости<em>*</em></label>' .
							'<textarea name="text" cols="60" rows="10" value = "">' . $row->text . '</textarea><br />' .
						'<button type="submit">Сохранить изменения</button>' .
						'<input type="hidden" name = "action" value="' . $row->id .'"></p>' .
					'</fieldset>' .
                                    '</form>' .				
                        	'</div>';
	}
	$file = file_get_contents('news_admin.php');
	$str = str_replace('{!news admin!}', $news_admin ,$file);
	echo $str;