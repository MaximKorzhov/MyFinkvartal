<?php
    include "view/NewsAdminView.php";
    include "view/BaseController.php";
    include "model/NewsAdminModel.php";	
        
	class NewsAdminController //extends BaseController
	{						
            public $model;
            public $view;
		
            public function __construct()
            {
		$this->model = new NewsAdminModel();                        
		$this->view = new NewsAdminView();
            }									
                        
            public function run()		
            {
		$news = $this->model->getNewsAdmin();
		$this->view->render($news);						
            }
 	}