<?php
    include "view/NewsView.php";
    include "view/BaseController.php";
    include "model/NewsModel.php";	
        
	class NewsController //extends BaseController
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
			$docs =	$this->model->getDisclosure();
			$this->view->render($docs, $news);						
		}

 	}