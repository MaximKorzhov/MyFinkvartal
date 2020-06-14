<?php

include "BaseView.php";	
	
class DisclosureAdminView extends BaseView
{

	public $disclosure = '';

	public function __construct()
	{			
            parent::__construct();
	}
						
	public function render($disclosure)
	{

            foreach ($disclosure as &$T)
            {
		$this->disclosure .= $this->getPage(['{!IMAGE!}', '{!ID!}', '{!TITLE!}'],
                    [$T->img, $T->id, $T->title],
			$this->getContent('view_admin/disclosure_admin_block_view'));
            }		
                                                                               
            $content = $this->getPage(['{!disclosure admin!}'], [$this->disclosure], $this->getContent('view_admin/contentArea_disclosure_admin'));		
                echo $this->getPage(['{!current_disclosure!}','{!contentArea!}', '{!footerContent!}'], 
                   ['class="current"', $content, $this->getFooter()], 
                        $this->getLayout_admin());
	}
}                                              	