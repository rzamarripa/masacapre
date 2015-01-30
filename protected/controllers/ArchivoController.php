<?php

class ArchivoController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','cambiarestatus'),
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
		$model=new Archivo;
		$up = new UploadForm;		
		
		if(isset($_GET['maestroid']) && isset($_GET['matid'])){
			$model->maestro_did = $_GET['maestroid'];
			$model->materia_did = $_GET['matid'];			
			$relacion = MateriaMaestro::model()->find('materia_aid = :mat && maestro_aid = :maes', array(':mat' => $_GET['matid'], 'maes'=> $_GET['maestroid']));
			$model->materiaMaestro_did = $relacion->id;
		}
		
		if(isset($_POST['Archivo']) && isset($_POST['UploadForm']))
		{
			$model->attributes=$_POST['Archivo'];
			$up->attributes = $_POST['UploadForm'];
			$up->archivo = CUploadedFile::getInstance($up, 'arch');			
			$nombreArchivo = str_replace(" ", "_", $up->archivo);
			$nombreArchivo = str_replace("ñ", "n", $up->archivo);
			$nombreArchivo = str_replace("á", "a", $up->archivo);
			$nombreArchivo = str_replace("é", "e", $up->archivo);
			$nombreArchivo = str_replace("í", "i", $up->archivo);
			$nombreArchivo = str_replace("ó", "o", $up->archivo);
			$nombreArchivo = str_replace("ú", "u", $up->archivo);
			$nombreArchivo = date("Ymd_Gi")."_".$nombreArchivo;
			if($up->validate())
			{
				$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $nombreArchivo;
				$model->nombre = $nombreArchivo;
				if($up->archivo->saveAs($file) && $model->save())
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
		$up = new UploadForm;
		
		if(isset($_POST['Archivo']))
		{
			$model->attributes=$_POST['Archivo'];
			$up->attributes = $_POST['UploadForm'];
			
			$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $model->nombre;
			while(is_file($file) == TRUE)
	        {	            
	            unlink($file);
	        }
			
			//echo $file;
			
			$up->archivo = CUploadedFile::getInstance($up, 'arch');	
			$nombreArchivo = str_replace(" ", "_", $up->archivo);
			$nombreArchivo = date("Ymd_Gi")."_".$nombreArchivo;
			$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $nombreArchivo;
			
			$model->nombre = $nombreArchivo;
						
			if($up->archivo->saveAs($file) && $model->save())
				$this->redirect(array('view','id'=>$model->id));
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
			$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'recursos' . DIRECTORY_SEPARATOR . $_GET["nombre"];
			$model=$this->loadModel($id);
			//echo '<pre>'; print_r($model->attributes); echo '</pre>';			
			$this->loadModel($id)->delete();
			unlink($file);
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('planeacion/misplaneaciones','matid'=>$model->materia_did, 'maestroid'=>$model->maestro_did,'materia'=>$model->materia->nombre,'usuario'=>Yii::app()->user->name));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Archivo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Archivo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Archivo']))
			$model->attributes=$_GET['Archivo'];

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
		$model=Archivo::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='archivo-form')
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
	       	$cursor = Archivo::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	//Función para cambiar los estatus de las planeaciones directamente
	public function actionCambiarestatus($id)
	{
		$model=$this->loadModel($id);		
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		$model->estatus_did = $_GET['estatus'];
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		if($model->save()){
			if(isset($_GET['tipoUsuario']) && $_GET['tipoUsuario'] == 2)
			{
				$this->redirect(array(	'planeacion/misplaneaciones',
										'id'=>$model->id,
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=>Yii::app()->user->name));
			}
			elseif(isset($_GET['tipoUsuario']) && $_GET['tipoUsuario'] == 3)
			{
				$usuario = Usuario::model()->getUsuario($model->maestro->usuario->usuario);
				$this->redirect(array(	'planeacion/planporcoord',	
										'id'=>$model->id,									
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=> $usuario->usuario));
			}
			else
			{
				$usuario = Usuario::model()->getUsuario($model->maestro->usuario->usuario);
				$this->redirect(array(	'planeacion/planporadmin',	
										'id'=>$model->id,									
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=> $usuario->usuario));
			}
		}
		
	}
}
