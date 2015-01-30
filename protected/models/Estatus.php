<?php

/**
 * This is the model class for table "Estatus".
 *
 * The followings are the available columns in table 'Estatus':
 * @property string $id
 * @property string $nombre
 * @property string $relacion
 * @property string $tipoUsuario_did
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Archivo[] $archivos
 * @property TipoUsuario $tipoUsuario
 * @property Grupo[] $grupos
 * @property MateriaMaestro[] $materiaMaestros
 * @property Planeacion[] $planeacions
 * @property Usuario[] $usuarios
 */
class Estatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Estatus the static model class
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
		return 'Estatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, relacion', 'length', 'max'=>100),
			array('tipoUsuario_did', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, relacion, tipoUsuario_did', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'estatus_did'),
			'archivos' => array(self::HAS_MANY, 'Archivo', 'estatus_did'),
			'tipoUsuario' => array(self::BELONGS_TO, 'TipoUsuario', 'tipoUsuario_did'),
			'grupos' => array(self::HAS_MANY, 'Grupo', 'estatus_did'),
			'materiaMaestros' => array(self::HAS_MANY, 'MateriaMaestro', 'estatus_did'),
			'planeacions' => array(self::HAS_MANY, 'Planeacion', 'estatus_did'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'estatus_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'relacion' => 'Relacion',
			'tipoUsuario_did' => 'Tipo Usuario',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('relacion',$this->relacion,true);
		$criteria->compare('tipoUsuario_did',$this->tipoUsuario_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}