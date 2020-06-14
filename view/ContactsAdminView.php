<?php
    include "BaseView.php";
	                           	
    class ContactsAdminView extends BaseView
    {
	public function __construct()
	{
            parent::__construct();
	}
						
	public function render()
	{                               
            echo $this->getPage(['{!current_contacts!}','{!contentArea!}', '{!footerContent!}'], 
                ['class="current"', $this->getContent('view/contentArea_contacts'), ''], 
                    $this->getLayout_admin());
	}
    }	
