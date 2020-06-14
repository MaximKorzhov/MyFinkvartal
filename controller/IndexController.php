<?php
	include "view/IndexView.php";
	include "BaseController.php";

	class IndexController extends BaseController
	{			
		public function __construct()
		{
			
		}					

		public function run()		
		{
			$view = new IndexView();
			$view->render();
		}
	}	