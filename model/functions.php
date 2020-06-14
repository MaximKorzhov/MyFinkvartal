<?php
	session_start();

	function getPage(array $templatesName, array $templatesData, $template)
	{
		return str_replace($templatesName, $templatesData, $template);
	}

	function getContent($template)
	{
		return file_get_contents($template);
	}

	function getLayout()
	{
		return str_replace('{!date!}', date('Y'), getContent('view/template'));
	}

	function getLayout_admin()  
	{
		return str_replace('{!date!}', date('Y'), getContent('view_admin/template_admin'));
	}

	function getFooter()
	{
		return getContent('view/footerContent_index');
	}
?>
