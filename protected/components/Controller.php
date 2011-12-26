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



    function init()
    {
        parent::init();

        ClassSession::savedSessionId();  /// just to be SURE it is set

        Yii::app()->setTimeZone(Yii::app()->params['timezone']);

    }


    /**
       If there's a returnTo, then use it.
       XXX this may break with ajax, watch out
    **/
    public function redirect($url,$terminate=true,$statusCode=302){
        if(isset($_GET['returnTo'])) {
            // NOTE: do NOT use an array!!
            parent::redirect(
                urldecode($_GET['returnTo']));
        } else {
            parent::redirect($url,$terminate,$statusCode);
        }

    }

    public function savedSessionSummary()
    {
        return ClassSession::model()->findByPk(ClassSession::savedSessionId())->summary;
    }


}