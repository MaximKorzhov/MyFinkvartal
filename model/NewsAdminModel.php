<?php
                                
    include "BaseModel.php";
    //include "functions.php";
    $status_user = 0;
    $status_disp = 1;
    $status_admin = 10;
    //Запуск сессий;
    session_start();
    //если пользователь не авторизован
	
    if ($_SESSION['status'] != $status_admin)
    {
	//идем на страницу авторизации
        header("Location: http://finkvartal.org.ru/auth_form.html");
	exit;
    }

    class NewsAdminModel extends BaseModel
    {	
        //public $tablename = 'news';

	public function __construct()
	{
            parent::__construct();		
	}

	public function getNewsAdmin()
	{
            return $this->getAllRows();
	}	
    }