<?php

/**
 * This is the model class for table "Materia".
 *
 * The followings are the available columns in table 'Materia':
 * @property string $id
 * @property string $nombre
 * @property string $licenciatura_aid
 * @property integer $cantidad_planeaciones
 *
 * The followings are the available model relations:
 * @property Archivo[] $archivos
 * @property Licenciatura $licenciatura
 * @property MateriaMaestro[] $materiaMaestros
 * @property Planeacion[] $planeacions
 */
class Materia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Materia the static model class
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
		return 'Materia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licenciatura_aid', 'required'),
			array('cantidad_planeaciones', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('licenciatura_aid', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, licenciatura_aid, cantidad_planeaciones', 'safe', 'on'=>'search'),
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
			'archivos' => array(self::HAS_MANY, 'Archivo', 'materia_did'),
			'licenciatura' => array(self::BELONGS_TO, 'Licenciatura', 'licenciatura_aid'),
			'materiaMaestros' => array(self::HAS_MANY, 'MateriaMaestro', 'materia_aid'),
			'planeacions' => array(self::HAS_MANY, 'Planeacion', 'materia_aid'),
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
			'licenciatura_aid' => 'Licenciatura',
			'cantidad_planeaciones' => 'Cantidad Planeaciones',
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
		$criteria->compare('licenciatura_aid',$this->licenciatura_aid,true);
		$criteria->compare('cantidad_planeaciones',$this->cantidad_planeaciones);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}