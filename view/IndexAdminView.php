<?php
    include "BaseView.php";
	                           	
    class IndexAdminView extends BaseView
    {
        
	public function __construct()
	{
            parent::__construct();            
	}
						
	public function render()
	{            
            $status_user = 0;
            $status_disp = 1;
            $status_admin = 10;                        
            session_start();
            $news = '<li {!current_news!}>
			<a href="news_admin.php">Информация для жильцов <span class="navi-description">Последние изменения</span>
			</a>
                    </li>';
            $disclosure = '<li {!current_disclosure!}><a href="disclosure_admin.php">Раскрытие информации <span class="navi-description">Договоры</span></a></li>';			
            $bottom_panel = ' | <a href="news.php">Информация для жильцов</a> | <a href="about_as.php">О компании</a> | <a href="contacts.html">Контакты</a> | <a href="disclosure_admin.php">Раскрытие информации</a></p>';
            $content = $this->getContent('view/contentArea_index');

            if($_SESSION['status'] == $status_admin)
            {
                echo $str = $this->getPage(['{!contentArea!}', '{!footerContent!}'],
                [$content, $this->getFooter()],
                    $this->getLayout_admin());
            }
            else
            {	
                echo $str = $this->getPage([$news, $disclosure, $bottom_panel,'{!contentArea!}', '{!footerContent!}'],
                ['', '', '', $content, $this->getFooter()],
                    $this->getLayout_admin());
            }            
        }
    }	