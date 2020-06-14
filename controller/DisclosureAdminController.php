<?php
    include "view/DisclosureAdminView.php";
    include "view/BaseController.php";
    include "model/DisclosureAdminModel.php";
        
	class DisclosureAdminController //extends BaseController
	{						
            public $model;
            public $view;
		
            public function __construct()
            {
		$this->model = new DisclosureAdminModel();
		$this->view = new DisclosureAdminView();
            }									
                        
            public function run()
            {
		$disclosure = $this->model->getDisclosureAdmin();
		$this->view->render($disclosure);
            }
 	}