<?php

abstract class BaseView
{
	public function __construct()
	{
		
	}

	public function getPage(array $templatesName, array $templatesData, $template)
	{
		return str_replace($templatesName, $templatesData, $template);
	}

	public function getContent($template)
	{
		return file_get_contents($template);
	}

	public function getLayout()
	{
		return str_replace('{!date!}', date('Y'), $this->getContent('view/template'));
	}

	public function getLayout_admin()
	{
		return str_replace('{!date!}', date('Y'), $this->getContent('view_admin/template_admin'));
	}

	public function getFooter()
	{
		return $this->getContent('view/footerContent_index');
	}

	//public abstract function render();
}	