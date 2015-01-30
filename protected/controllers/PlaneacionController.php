<?php

class PlaneacionController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','misplaneaciones','planporcoord',
				'planporadmin','cambiarestatus','detalle','reiniciar'),
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
		$model=new Planeacion;
		
		if(isset($_GET['maestroid']) && isset($_GET['matid'])){
			$model->maestro_aid = $_GET['maestroid'];
			$model->materia_aid = $_GET['matid'];
			$model->estatus_did = 1;
			$relacion = MateriaMaestro::model()->find('materia_aid = :mat && maestro_aid = :maes', array(':mat' => $_GET['matid'], 'maes'=> $_GET['maestroid']));
			$model->materiaMaestro_did = $relacion->id;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Planeacion']))
		{
			$model->attributes=$_POST['Planeacion'];
			$relacion = MateriaMaestro::model()->find('materia_aid = :mat && maestro_aid = :maes', array(':mat' => $_GET['matid'], 'maes'=> $_GET['maestroid']));
			$model->materiaMaestro_did = $relacion->id;
			if($model->save())
			{
				$usuarioActual = Usuario::model()->find('usuario = :x', array(':x' => Yii::app()->user->name));
				if($usuarioActual->tipoUsuario->id == 2 && $model->estatus->id == 1)
				{
					$body = 'El maestr@ ' . $model->maestro->nombre . ' ha realizado una nueva planeación en la materia de ' . 
					$model->materia->nombre . ' en la fecha: ' . date('d-m-Y') . '.';
					$this->avisarResponsable($body,$model->id);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
				
		}
		elseif(isset($_GET['planeacion_id']))
        {
            $tmp=$this->loadModel($_GET['planeacion_id']);
            $tmp->id=null;
            $model->attributes=$tmp->attributes;
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
		
		if(isset($_GET['id'])){
			//echo '<pre>'; print_r($_GET); echo '</pre>';			
			if($model->estatus_did == 1)
				$model->estatus_did = 2;
			elseif($model->estatus_did == 2)
				$model->estatus_did = 1;
			elseif($model->estatus_did == 3)
				$model->estatus_did = 4;
		}
		
		if(isset($_POST['Planeacion']))
		{
			
			$model->attributes=$_POST['Planeacion'];
			
			if($model->save())
			{
				
				$usuarioActual = Usuario::model()->find('usuario = :x', array(':x' => Yii::app()->user->name));
				if($usuarioActual->tipoUsuario->id == 2 && $model->estatus->id == 1)
				{
					$body = 'El maestro ' . $model->maestro->nombre . ' ha actualizado una planeación en la materia de ' . 
						$model->materia->nombre . ' en la fecha: ' . date('d-m-Y') . '.';
					$this->avisarResponsable($body,$model->id);
				}
			 	$this->redirect(array('view','id'=>$model->id));
			}
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel($id);
			$this->loadModel($id)->delete();
			if(isset($_GET['tipoUsuario']) && $_GET['tipoUsuario']==2)
			{
				if(!isset($_GET['ajax']))
					$this->redirect(array('misplaneaciones',
										'id'=>$model->id,
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=>Yii::app()->user->name));
			}
			else if(isset($_GET['tipoUsuario']) && $_GET['tipoUsuario']==3)
			{
				if(!isset($_GET['ajax']))
					$usuario = Usuario::model()->getUsuario($model->maestro->usuario->usuario);
					$this->redirect(array(	'planporcoord',	
										'id'=>$model->id,									
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=> $usuario->usuario));			
			}
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Planeacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Planeacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Planeacion']))
			$model->attributes=$_GET['Planeacion'];

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
		$model=Planeacion::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='planeacion-form')
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
	       	$cursor = Planeacion::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	public function actionMisplaneaciones()
	{
		$this->render('misplaneaciones');
	}
	
	public function actionPlanporcoord()
	{
		$this->render('planporcoord');
	}
	
	public function actionPlanporadmin()
	{
		$this->render('planporadmin');
	}
	
	public function actionEmail($a, $de, $asunto, $cuerpo)
	{
		Yii::app()->email->send($de,$a,$asunto,$cuerpo);
	}
	
	
	//Función para cambiar los estatus de las planeaciones directamente
	public function actionCambiarestatus($id)
	{
		$model=$this->loadModel($id);		
		
		$model->estatus_did = $_GET['estatus'];
		/*
		if($_GET['estatus'] == 2)
		{
			$to = array(
			'rzamarripa@freenternet.com',
			'fcastro@uss.mx',
			);
			//mensaje
			$body = 'Me es grato informarles que hemos recibido 50 visitantes más a nuestra red. Tenemos un total de ';
			//Mandar el correo.
			Yii::app()->email->send('Freenternet Robot',$to,'Ya tenemos ',$body);
		}
		*/
		
		if($model->save()){
			if(isset($_GET['tipoUsuario']) && $_GET['tipoUsuario'] == 2)
			{
				if($_GET['estatus']== 1)
				{
					$body = 'El maestro ' . $model->maestro->nombre . ' ha Liberado una planeación en la materia de ' . 
					$model->materia->nombre . ' en la fecha: ' . date('d-m-Y') . '.';															
					$this->avisarResponsable($body,$id);
				}
				$this->redirect(array(	'misplaneaciones',
										'id'=>$model->id,
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=>Yii::app()->user->name));
			}
			elseif(isset($_GET['tipoUsuario']) && $_GET['tipoUsuario'] == 3)
			{
				$usuario = Usuario::model()->getUsuario($model->maestro->usuario->usuario);
				$this->redirect(array(	'planporcoord',	
										'id'=>$model->id,									
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=> $usuario->usuario));
			}
			else
			{
				$usuario = Usuario::model()->getUsuario($model->maestro->usuario->usuario);
				$this->redirect(array(	'planporadmin',	
										'id'=>$model->id,									
										'materia'=>$model->materia->nombre, 
										'matid'=>$model->materia->id, 
										'maestroid'=>$model->maestro->id, 
										'usuario'=> $usuario->usuario));
			}
		}
		
	}
	
	public function actionDetalle($id)
	{
		$this->layout="//layouts/pdf";
		$this->render('detalle',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function avisarResponsable($body,$id)
	{
		$model=$this->loadModel($id);	
		$id = $model->materia->licenciatura->id;
		$responsable = LicenciaturaUsuario::model()->find('licenciatura_did = :x',array(':x' => $id));
		$to = $responsable->usuario->correo;		
		Yii::app()->email->send('Planeaciones Robot',$to,'Planeación: ' . $model->materia->nombre,$body);
	}
	
	public function actionReiniciar()
	{
		if(isset($_GET['mm']))
		{
			$modelos = Planeacion::model()->findAll("materiaMaestro_did = " . $_GET['mm']);
			foreach($modelos as $model){
				$model->estatus_did = 2;
				$model->save();	
			}
			$this->redirect(array('maestro/vermaestrosporcoordinador'));
		}
	}
}
