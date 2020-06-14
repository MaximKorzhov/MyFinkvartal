<?php

include "BaseView.php";	
	
class DisclosureView extends BaseView
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
			$this->getContent('view/doc_block_view'));
            }		
                                                                               
            $content = $this->getPage(['{!disclosure!}'], [$this->disclosure], $this->getContent('view/contentArea_disclosure'));		
                echo $this->getPage(['{!current_news!}','{!contentArea!}', '{!footerContent!}'], 
                   ['class="current"', $content, $this->getFooter()], 
                        $this->getLayout());                
	}
}                                              	