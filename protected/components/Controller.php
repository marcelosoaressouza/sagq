<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
	public $status = array (0 => 'New',
                                1 => 'Accepted',
                                2 => 'Rejected',
                                3 => 'Revised');
        
	public $statusImage = array (0 => '<img src="/images/icon-new.png"      alt="New"      title="New"/>',
                                     1 => '<img src="/images/icon-accepted.png" alt="Accepted" title="Accepted"/>',
                                     2 => '<img src="/images/icon-rejected.png" alt="Rejected" title="Rejected"/>',
                                     3 => '<img src="/images/icon-revised.png"  alt="Revised"  title="Revised"/>');

}