<?php
	include "view/About_asView.php";
	include "BaseController.php";

	class About_asController extends BaseController
	{			
		public function __construct()
		{
			
		}					

		public function run()		
		{
			$view = new About_asView();
			$view->render();
		}
	}	