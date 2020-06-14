<?php
    include "view/IndexAdminView.php";
    include "BaseController.php";

    class IndexAdminController extends BaseController
    {			
        public function __construct()
	{
			
	}					

	public function run()		
	{
            $view = new IndexAdminView();
            $view->render();
	}
    }	