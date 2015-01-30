<?php

/**
 * This is the model class for table "Planeacion".
 *
 * The followings are the available columns in table 'Planeacion':
 * @property string $id
 * @property string $maestro_aid
 * @property string $materia_aid
 * @property integer $semestre
 * @property string $consecutivo
 * @property string $planeacion_didactica
 * @property string $bloque
 * @property string $sesiones
 * @property string $tiempo_estimado
 * @property string $estrategia
 * @property string $tema
 * @property string $subtema
 * @property string $problema_significativo
 * @property string $activacion
 * @property string $preguntas_inductivas
 * @property string $competencias_conceptuales
 * @property string $competencias_procedimentales
 * @property string $competencias_actitudinales
 * @property string $cierre_de_clase
 * @property string $metodos_de_evaluacion
 * @property string $bibliograficos
 * @property string $electronicos
 * @property string $necesidades
 * @property string $tarea
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Maestro $maestro
 * @property Materia $materia
 */
class Planeacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Planeacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Planeacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maestro_aid, materia_aid, semestre, actividades, consecutivo, planeacion_didactica, bloque, sesiones, tiempo_estimado, subtema, tarea, estrategia, tema, problema_significativo, activacion, preguntas_inductivas, competencias_conceptuales, competencias_procedimentales, competencias_actitudinales, cierre_de_clase, metodos_de_evaluacion, bibliograficos, electronicos, necesidades', 'required'),
			array('semestre', 'numerical', 'integerOnly'=>true),
			array('maestro_aid', 'length', 'max'=>11),
			array('materia_aid, estatus_did', 'length', 'max'=>10),
			array('consecutivo, planeacion_didactica, bloque, sesiones, tiempo_estimado', 'length', 'max'=>100),
			array('actividades', 'length', 'max'=>800),
			array('subtema, tarea', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, maestro_aid, materia_aid, semestre, consecutivo, planeacion_didactica, bloque, sesiones, tiempo_estimado, estrategia, tema, subtema, problema_significativo, activacion, preguntas_inductivas, competencias_conceptuales, competencias_procedimentales, competencias_actitudinales, cierre_de_clase, metodos_de_evaluacion, bibliograficos, electronicos, necesidades, tarea, estatus_did', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'maestro' => array(self::BELONGS_TO, 'Maestro', 'maestro_aid'),
			'materia' => array(self::BELONGS_TO, 'Materia', 'materia_aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'maestro_aid' => 'Maestro',
			'materia_aid' => 'Materia',
			'semestre' => 'Semestre',
			'consecutivo' => 'Consecutivo',
			'planeacion_didactica' => 'Planeación Didáctica',
			'bloque' => 'Bloque',
			'sesiones' => 'Sesiones',
			'tiempo_estimado' => 'Tiempo Estimado',
			'estrategia' => 'Estrategias Facilitadoras',
			'tema' => 'Tema',
			'subtema' => 'Subtema',
			'problema_significativo' => 'Problema Significativo',
			'activacion' => 'Activación',
			'preguntas_inductivas' => 'Preguntas Inductivas',
			'competencias_conceptuales' => 'Competencias Conceptuales',
			'competencias_procedimentales' => 'Competencias Procedimentales',
			'competencias_actitudinales' => 'Competencias Actitudinales',
			'cierre_de_clase' => 'Cierre De Clase',
			'metodos_de_evaluacion' => 'Métodos De Evaluación',
			'bibliograficos' => 'Bibliográficos',
			'electronicos' => 'Electrónicos',
			'necesidades' => 'Necesidades',
			'tarea' => 'Tarea',
			'estatus_did' => 'Estatus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('maestro_aid',$this->maestro_aid,true);
		$criteria->compare('materia_aid',$this->materia_aid,true);
		$criteria->compare('semestre',$this->semestre);
		$criteria->compare('consecutivo',$this->consecutivo,true);
		$criteria->compare('planeacion_didactica',$this->planeacion_didactica,true);
		$criteria->compare('bloque',$this->bloque,true);
		$criteria->compare('sesiones',$this->sesiones,true);
		$criteria->compare('tiempo_estimado',$this->tiempo_estimado,true);
		$criteria->compare('estrategia',$this->estrategia,true);
		$criteria->compare('tema',$this->tema,true);
		$criteria->compare('subtema',$this->subtema,true);
		$criteria->compare('problema_significativo',$this->problema_significativo,true);
		$criteria->compare('activacion',$this->activacion,true);
		$criteria->compare('preguntas_inductivas',$this->preguntas_inductivas,true);
		$criteria->compare('competencias_conceptuales',$this->competencias_conceptuales,true);
		$criteria->compare('competencias_procedimentales',$this->competencias_procedimentales,true);
		$criteria->compare('competencias_actitudinales',$this->competencias_actitudinales,true);
		$criteria->compare('cierre_de_clase',$this->cierre_de_clase,true);
		$criteria->compare('metodos_de_evaluacion',$this->metodos_de_evaluacion,true);
		$criteria->compare('bibliograficos',$this->bibliograficos,true);
		$criteria->compare('electronicos',$this->electronicos,true);
		$criteria->compare('necesidades',$this->necesidades,true);
		$criteria->compare('tarea',$this->tarea,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}