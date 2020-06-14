<?php
    include "view/ContactsAdminView.php";
    include "BaseController.php";
    include "model/ContactsAdminModel.php";

    class ContactsAdminController extends BaseController
    {			
	public function __construct()
	{
			
	}					

	public function run()
	{            
            //$this->getStatusAdmin();//echo "Net"; exit;
            $model = new ContactsAdminModel();
            $model->getAdmin();
            $view = new ContactsAdminView();
            $view->render();
	}
    }