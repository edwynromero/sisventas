<?php

class CompaniaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
public function actionGenerarPdf()
 {
 $model =Compania::model()->findAll(); //Consulta para buscar todos los registros
 $mPDF1 = Yii::app()->ePdf->mpdf('utf-8','A4','','',15,15,35,25,9,9,'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
 $mPDF1->useOnlyCoreFonts = true;
 $mPDF1->SetTitle("JuzgadoSys - Reporte");
 $mPDF1->SetAuthor("JuzgadoSys");
 $mPDF1->SetWatermarkText("Servimil");
 $mPDF1->showWatermarkText = true;
 $mPDF1->watermark_font = 'DejaVuSansCondensed';
 $mPDF1->watermarkTextAlpha = 0.1;
 $mPDF1->SetDisplayMode('fullpage');
 $mPDF1->WriteHTML($this->renderPartial('pdfReport', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
 $mPDF1->Output('Reporte_Companañia'.date('YmdHis'),'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
 exit;
 }

public function actionGenerarPdf2($id)
 {
 $model =Compania::model()->findByPk($id); //Consulta para buscar todos los registros
 $mPDF1 = Yii::app()->ePdf->mpdf('utf-8','A4','','',15,15,35,25,9,9,'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
 $mPDF1->useOnlyCoreFonts = true;
 $mPDF1->SetTitle("JuzgadoSys - Reporte");
 $mPDF1->SetAuthor("JuzgadoSys");
 $mPDF1->SetWatermarkText("Servimil");
 $mPDF1->showWatermarkText = true;
 $mPDF1->watermark_font = 'DejaVuSansCondensed';
 $mPDF1->watermarkTextAlpha = 0.1;
 $mPDF1->SetDisplayMode('fullpage');
 $mPDF1->WriteHTML($this->renderPartial('pdfReport2', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
 $mPDF1->Output('Reporte_Companañia'.date('YmdHis'),'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
 exit;
 }

	 public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GenerarPdf','GenerarPdf2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','GenerarPdf','GenerarPdf2'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Compania;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Compania']))
		{
			$model->attributes=$_POST['Compania'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idCompa));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Compania']))
		{
			$model->attributes=$_POST['Compania'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idCompa));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Compania');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Compania('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Compania']))
			$model->attributes=$_GET['Compania'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Compania the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Compania::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Compania $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='compania-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
