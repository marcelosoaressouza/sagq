<?php

class RequirementController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
        
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('accessControl');
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'viewBox'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array('model'=>$this->loadModel($id)));
	}

	public function actionViewBox($id)
	{
                $this->renderPartial('viewBox', array('model'=>$this->loadModel($id)));
	}
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$modelRequirement = new Requirement;
                $modelProcessRequirement = new ProcessRequirement;
                
		if(isset($_POST['Requirement']))
		{
                        if ($_POST['requirement_id_old'] != 0)
                        {
                            $modelProcessRequirement->setAttribute('process_id'    , $_GET['id']);
                            $modelProcessRequirement->setAttribute('requirement_id', $_POST['requirement_id_old']);
                            
                        }
                        else
                        {
                        
                            $modelRequirement->attributes=$_POST['Requirement'];
                        
                            if($modelRequirement->save())
                            {
                                    $modelProcessRequirement->setAttribute('process_id'    , $_GET['id']);
                                    $modelProcessRequirement->setAttribute('requirement_id', $modelRequirement->id);
                                
                            }
                        }
                        
                        if($modelProcessRequirement->save())
                        {
                            $this->redirect(array('view', 'id' => $modelProcessRequirement->requirement_id));
                        }
		}

		$this->render('create',array('model'=>$modelRequirement, 'allRequirements' => Requirement::model()->findAll()));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['Requirement']))
		{
			$model->attributes=$_POST['Requirement'];
                        
			if($model->save())
                        {
				$this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
                        {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                        }
		}
		else
                {
			$this->loadModel($id)->delete();
			$this->redirect(array('/process/index'));
                }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Requirement');
                
		$this->render('index',array('dataProvider'=>$dataProvider));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Requirement('search');
		$model->unsetAttributes();
                
		if(isset($_GET['Requirement']))
                {
			$model->attributes=$_GET['Requirement'];
                }

		$this->render('admin',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Requirement::model()->findByPk((int)$id);
                
		if($model===null)
                {
			throw new CHttpException(404,'The requested page does not exist.');
                }
                
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='requirement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
