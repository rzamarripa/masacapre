<?php

/**
 * This is the model class for table "Archivo".
 *
 * The followings are the available columns in table 'Archivo':
 * @property string $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $maestro_did
 * @property string $materia_did
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Materia $materia
 * @property Estatus $estatus
 * @property Maestro $maestro
 */
class Archivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Archivo the static model class
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
		return 'Archivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maestro_did, materia_did, estatus_did', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>200),
			array('maestro_did, estatus_did', 'length', 'max'=>11),
			array('materia_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, maestro_did, materia_did, estatus_did', 'safe', 'on'=>'search'),
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
			'materia' => array(self::BELONGS_TO, 'Materia', 'materia_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'maestro' => array(self::BELONGS_TO, 'Maestro', 'maestro_did'),
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
			'descripcion' => 'Descripcion',
			'maestro_did' => 'Maestro',
			'materia_did' => 'Materia',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('maestro_did',$this->maestro_did,true);
		$criteria->compare('materia_did',$this->materia_did,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}