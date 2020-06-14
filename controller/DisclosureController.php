<?php
    include "view/DisclosureView.php";
    include "view/BaseController.php";
    include "model/DisclosureModel.php";
        
	class DisclosureController //extends BaseController
	{						
            public $model;
            public $view;
		
            public function __construct()
            {
		$this->model = new DisclosureModel();
		$this->view = new DisclosureView();
            }									
                        
            public function run()
            {
		$disclosure = $this->model->getDisclosure();
		$this->view->render($disclosure);
            }
 	}