<?php

    include "view/ServicesView.php";
    include "view/BaseController.php";
    include "model/Services_Model.php";	
        
    class Services_Model //extends BaseController
    {						
	public $model;
	public $view;
		
	public function __construct()
	{
            $this->model = new NewsModel();                        
            $this->view = new NewsView();
	}									
                        
	public function run()		
	{
            $news = $this->model->getNews();
            $docs = $this->model->getDisclosure();
            $this->view->render($docs, $news);						
	}

    }

	/*include "functions.php";
	$status_user = 0;
	$status_disp = 1;
	$status_admin = 10;*/
	//Запуск сессий;
	//session_start();
	//если пользователь не авторизован

	//if (!(isset($_SESSION['Name'])))
	if ($_SESSION['status'] == $status_user)
	{
		//	echo ('нет');// $_SESSION['Name'];
		//идем на страницу авторизации
		header("Location: http://finkvartal.org.ru/auth_form.php");
		exit;
	}

	$news = '<li {!current_news!}>
				<a href="news_admin.php">Информация для жильцов <span class="navi-description">Последние изменения</span>
				</a>
			</li>';
	$disclosure = '<li {!current_disclosure!}>
						<a href="disclosure_admin.php">Раскрытие информации <span class="navi-description">Договоры</span>
						</a>
					</li>';
	$bottom_panel = ' | <a href="news.php">Информация для жильцов</a> | <a href="about_as.php">О компании</a> | <a href="contacts.html">Контакты</a> | <a href="disclosure_admin.php">Раскрытие информации</a></p>';
	
	$del = '<input type="submit" name = "submit_delete" value="Удаление заявки из базы">';
	$connection = new PDO('mysql:host=localhost;dbname=finkvartal;charset=utf8','max','1qazXSW@');
	/*	var_dump ($connection);*/
	$connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
	$statement = $connection->query('SELECT * FROM application');	
	$services = '';	
				
	while($row = $statement->fetch(PDO::FETCH_OBJ)) 
	{	
   		$news .= getPage(['{!DATE!}', '{!IMAGE!}', '{!ID!}', '{!TITLE!}', '{!TEXT!}'],
							[$row->date, $row->img, $row->id, $row->title, $row->text],
							getContent('view/news_block_view'));
		$services .= getPage(['{!ID!}', '{!DATE!}', '{!NAME!}', '{!ADDRESS!}', '{!PHONE!}', '{!EMAIL!}', '{!TEXT!}' ],
								[$row->id, $row->date, $row->name, $row->address, $row->phone, $row->email, $row->text],
							getContent('view_admin/services__admin_block_view'));	 
			
	}
	
	if($_SESSION['status'] == $status_admin)
	{
		$content = getPage(['{!services admin!}'], [$services], getContent('view_admin/contentArea_services_admin'));			
		$str = getPage(['{!current_services!}','{!contentArea!}', '{!footerContent!}'], ['class="current"', $content, getFooter], getLayout_admin());	
	}
	else
	{
		$str = getPage([$news, $disclosure, $bottom_panel,'{!contentArea!}', '{!footerContent!}'], ['', '', '', $content, $footer], getLayout_admin());
	}
	echo $str;	
