<?php
 
    session_start();
    if(isset($_POST['logoff']) == 'ok')
    {
        //Уничтожаем сессию
        session_destroy();
        header("Location: http://finkvartal.org.ru/index.php");
        exit;
    }

    //Если нажата кнопка то обрабатываем данные
    if(isset($_POST['submit']))
    {
	//Проверяем на пустоту
	if(empty($_POST['email'])) $err[] = 'Не введен Логин';	
	if(empty($_POST['pass'])) $err[] = 'Не введен Пароль';	
	//Проверяем email
	function emailValid($email)
        {
            if(function_exists('filter_var'))
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $email))
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }      
        }
        if(emailValid($_POST['email']) == false)
        {
            header("Location: http://finkvartal.org.ru/index.php");
            exit;
        }	
        //$err[] = 'Не корректный E-mail';
        //Проверяем наличие ошибок и выводим пользователю
        function showErrorMessage($data)
        {
            $err = '<ul>'."\n";	
	
            if(is_array($data))
            {
                foreach($data as $val)
                {
                    $err .= '<li style="color:red;">'. $val .'</li>'."\n";
                }
            }
            else   $err .= '<li style="color:red;">'. $data .'</li>'."\n";
    
            $err .= '</ul>'."\n";
    
            return $err;
        }
        if(count($err) > 0) echo showErrorMessage($err);
        else
        {
            /*Создаем запрос на выборку из базы 
            данных для проверки подлиности пользователя*/
            $db = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');    
            $sql = 'SELECT * FROM bez_reg WHERE login = :email';
            //AND status = 1';
            //Подготавливаем PDO выражение для SQL запроса
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->execute();

            //Получаем данные SQL запроса
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
            //Если логин совподает, проверяем пароль
            if(count($rows) > 0)
            {
                //Получаем данные из таблицы
                if(md5(md5($_POST['pass']).$rows[0]['salt']) == $rows[0]['pass'])			
                {	
                    $login = $_POST['email'];
                    $_SESSION['Name'] = $login;
                    $_SESSION['status'] = $rows[0]['status'];				
								
                    //Сбрасываем параметры
				
                    header("Location: http://finkvartal.org.ru/index_admin.php");
                    exit;
				
                }
                else
                {
                    $_SESSION['status'] = 0;
                    header("Location: http://finkvartal.org.ru/index.php");
                    //echo showErrorMessage('Неверный пароль!');
                }
            }
            else
            {
                var_dump ($rows);//showErrorMessage('Логин <b>'. $_POST['email'] .'</b> не найден!');
            }
        }
    }