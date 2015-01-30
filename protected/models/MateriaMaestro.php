<?php

/**
 * This is the model class for table "Materia_Maestro".
 *
 * The followings are the available columns in table 'Materia_Maestro':
 * @property string $id
 * @property string $materia_aid
 * @property string $maestro_aid
 * @property string $grupo_did
 * @property string $estatus_did
 * @property string $fechaCreacion_f
 *
 * The followings are the available model relations:
 * @property Archivo[] $archivos
 * @property Grupo $grupo
 * @property Estatus $estatus
 * @property Maestro $maestro
 * @property Materia $materia
 * @property Planeacion[] $planeacions
 * @property Tutoreo[] $tutoreos
 */
class MateriaMaestro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MateriaMaestro the static model class
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
		return 'Materia_Maestro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('materia_aid, maestro_aid', 'required'),
			array('materia_aid, maestro_aid, grupo_did', 'length', 'max'=>11),
			array('estatus_did', 'length', 'max'=>10),
			array('fechaCreacion_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, materia_aid, maestro_aid, grupo_did, estatus_did, fechaCreacion_f', 'safe', 'on'=>'search'),
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
			'archivos' => array(self::HAS_MANY, 'Archivo', 'materiaMaestro_did'),
			'grupo' => array(self::BELONGS_TO, 'Grupo', 'grupo_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'maestro' => array(self::BELONGS_TO, 'Maestro', 'maestro_aid'),
			'materia' => array(self::BELONGS_TO, 'Materia', 'materia_aid'),
			'planeacions' => array(self::HAS_MANY, 'Planeacion', 'materiaMaestro_did'),
			'tutoreos' => array(self::HAS_MANY, 'Tutoreo', 'maestroMateriaGrupo_aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'materia_aid' => 'Materia',
			'maestro_aid' => 'Maestro',
			'grupo_did' => 'Grupo',
			'estatus_did' => 'Estatus',
			'fechaCreacion_f' => 'Fecha Creacion F',
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
		$criteria->compare('materia_aid',$this->materia_aid,false);
		$criteria->compare('maestro_aid',$this->maestro_aid,false);
		$criteria->compare('grupo_did',$this->grupo_did,false);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('fechaCreacion_f',$this->fechaCreacion_f,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}