<?php

/**
 * This is the model class for table "AlumnosGrupo".
 *
 * The followings are the available columns in table 'AlumnosGrupo':
 * @property string $id
 * @property string $alumno_aid
 * @property string $grupo_aid
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Alumno $alumno
 * @property Grupo $grupo
 */
class AlumnosGrupo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlumnosGrupo the static model class
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
		return 'AlumnosGrupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumno_aid, grupo_aid', 'required'),
			array('alumno_aid', 'length', 'max'=>10),
			array('grupo_aid, estatus_did', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumno_aid, grupo_aid, estatus_did', 'safe', 'on'=>'search'),
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
			'alumno' => array(self::BELONGS_TO, 'Alumno', 'alumno_aid'),
			'grupo' => array(self::BELONGS_TO, 'Grupo', 'grupo_aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alumno_aid' => 'Alumno',
			'grupo_aid' => 'Grupo',
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
		$criteria->compare('alumno_aid',$this->alumno_aid,true);
		$criteria->compare('grupo_aid',$this->grupo_aid,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}