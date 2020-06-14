<?php
	include "BaseView.php";	
	
class NewsView extends BaseView
{
	public $docs = '';
	public $news = '';

		public function __construct()
		{			
			parent::__construct();			
		}
						
	public function render($docs, $news)
	{

		foreach ($news as &$T)
		{
			$this->news .= $this->getPage(['{!DATE!}', '{!IMAGE!}', '{!ID!}', '{!TITLE!}', '{!TEXT!}'],
							[$T->date, $T->img, $T->id, $T->title, $T->text],
							$this->getContent('view/news_block_view'));		
		}

		foreach ($docs as &$D)
		{
			$this->docs .= $this->getPage(['{!IMAGE!}', '{!ID!}', '{!TITLE!}'],
								[$D->img, $D->id, $D->title],
								$this->getContent('view/doc_block_view'));
		}

		$content = $this->getPage(['{!disclosure!}', '{!news!}'], [$this->docs, $this->news], $this->getContent('view/contentArea_news'));
		echo $this->getPage(['{!current_news!}','{!contentArea!}', '{!footerContent!}'],
						['class="current"', $content, $this->getFooter()],
							$this->getLayout());
	}
}                                              	