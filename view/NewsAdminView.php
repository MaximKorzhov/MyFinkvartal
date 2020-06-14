<?php

include "BaseView.php";	
	
class NewsAdminView extends BaseView
{

	public $news = '';

		public function __construct()
		{			
			parent::__construct();			
		}
						
	public function render($news)
	{

		foreach ($news as &$T)
		{
			$this->news .= $this->getPage(['{!DATE!}', '{!IMAGE!}', '{!ID!}', '{!TITLE!}', '{!TEXT!}'],
							[$T->date, $T->img, $T->id, $T->title, $T->text],
							$this->getContent('view/news_block_view'));		
		}

		$content = $this->getPage(['{!news!}'], [$this->news], $this->getContent('view_admin/contentArea_news_admin'));
		echo $this->getPage(['{!current_news!}','{!contentArea!}', '{!footerContent!}'],
						['class="current"', $content, $this->getFooter()],
							$this->getLayout_admin());                
	}
}                                              	