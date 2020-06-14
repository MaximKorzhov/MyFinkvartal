<?php
	include "view/ContactsView.php";
	include "BaseController.php";

	class ContactsController extends BaseController
	{			
		public function __construct()
		{
			
		}					

		public function run()		
		{
                    $view = new ContactsView();
                    $view->render();
		}
	}	