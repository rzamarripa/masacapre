<?php

/**
 * This is the model class for table "Alumno".
 *
 * The followings are the available columns in table 'Alumno':
 * @property string $id
 * @property string $nombre
 * @property string $matricula
 * @property string $foto
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property AlumnosGrupo[] $alumnosGrupos
 * @property Reporte[] $reportes
 * @property Tutoreo[] $tutoreos
 */
class Alumno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Alumno the static model class
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
		return 'Alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, foto', 'length', 'max'=>100),
			array('matricula, estatus_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, matricula, foto, estatus_did', 'safe', 'on'=>'search'),
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
			'alumnosGrupos' => array(self::HAS_MANY, 'AlumnosGrupo', 'alumno_aid'),
			'reportes' => array(self::HAS_MANY, 'Reporte', 'alumno_aid'),
			'tutoreos' => array(self::HAS_MANY, 'Tutoreo', 'alumno_aid'),
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
			'matricula' => 'Matricula',
			'foto' => 'Foto',
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
		$criteria->compare('matricula',$this->matricula,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}