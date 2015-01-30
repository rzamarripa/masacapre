<?php

class AlumnoController extends Controller
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
		);
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
				'actions'=>array('autocompletesearch'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('@'),
			),
			/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
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
		$model=new Alumno;
		$up = new UploadPhoto;

		if(isset($_POST['Alumno']))
		{
			$model->attributes=$_POST['Alumno'];
			$up->attributes = $_POST['UploadPhoto'];
			$up->foto = CUploadedFile::getInstance($up, 'fo');

			if($up->foto == "")
			{
				if($model->save()){
					$this->redirect(array('view','id'=>$model->id));
				}
			}
				
			$nombreArchivo = str_replace(" ", "_", $up->foto);
			$nombreArchivo = str_replace("ñ", "n", $nombreArchivo);
			$nombreArchivo = str_replace("á", "a", $nombreArchivo);
			$nombreArchivo = str_replace("é", "e", $nombreArchivo);
			$nombreArchivo = str_replace("í", "i", $nombreArchivo);
			$nombreArchivo = str_replace("ó", "o", $nombreArchivo);
			$nombreArchivo = str_replace("ú", "u", $nombreArchivo);
			$nombreArchivo = str_replace("Á", "A", $nombreArchivo);
			$nombreArchivo = str_replace("É", "E", $nombreArchivo);
			$nombreArchivo = str_replace("Í", "I", $nombreArchivo);
			$nombreArchivo = str_replace("Ò", "O", $nombreArchivo);
			$nombreArchivo = str_replace("Ù", "U", $nombreArchivo);
			$nombreArchivo = date("Ymd_Gi")."_".$nombreArchivo;
			if($up->validate())
			{
				$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $nombreArchivo;
				$model->foto = $nombreArchivo;
				if($up->foto->saveAs($file) && $model->save())
				{
					$this->redirect(array('view','id'=>$model->id));
				}
			}			
		}

		$this->render('create',array(
			'model'=>$model,
			'up'=>$up,
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
		$up = new UploadPhoto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Alumno']))
		{			
			$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $model->foto;
			if(isset($file)){
				while(is_file($file) == TRUE)
		        {	            
		            unlink($file);
		        }
		        
		        $up->foto = CUploadedFile::getInstance($up, 'fo');
		        
		        if($up->foto != "")
		        {
					$nombreArchivo = str_replace(" ", "_", $up->foto);
					$nombreArchivo = str_replace(" ", "_", $up->foto);
					$nombreArchivo = str_replace("ñ", "n", $nombreArchivo);
					$nombreArchivo = str_replace("á", "a", $nombreArchivo);
					$nombreArchivo = str_replace("é", "e", $nombreArchivo);
					$nombreArchivo = str_replace("í", "i", $nombreArchivo);
					$nombreArchivo = str_replace("ó", "o", $nombreArchivo);
					$nombreArchivo = str_replace("ú", "u", $nombreArchivo);
					$nombreArchivo = str_replace("Á", "A", $nombreArchivo);
					$nombreArchivo = str_replace("É", "E", $nombreArchivo);
					$nombreArchivo = str_replace("Í", "I", $nombreArchivo);
					$nombreArchivo = str_replace("Ó", "O", $nombreArchivo);
					$nombreArchivo = str_replace("Ú", "U", $nombreArchivo);
					$nombreArchivo = date("Ymd_Gi")."_".$nombreArchivo;
					$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $nombreArchivo;
					
					$model->foto = $nombreArchivo;
								
					if($up->foto->saveAs($file) && $model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
				else
				{
					$model->foto = "sin_imagen.jpg";
					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'up'=>$up,
		));
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Alumno');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Alumno('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alumno']))
			$model->attributes=$_GET['Alumno'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Alumno::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alumno-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionAutocompletesearch()
	{
	    $q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
			$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	       	$cursor = Alumno::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
}
