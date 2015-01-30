<?php

/**
 * This is the model class for table "Reporte".
 *
 * The followings are the available columns in table 'Reporte':
 * @property string $id
 * @property string $grupo_did
 * @property string $alumno_aid
 * @property string $semana_did
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property Semana $semana
 * @property Alumno $alumno
 * @property Grupo $grupo
 */
class Reporte extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Reporte the static model class
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
		return 'Reporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grupo_did, alumno_aid, semana_did', 'required'),
			array('grupo_did, alumno_aid, semana_did', 'length', 'max'=>11),
			array('comentario', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, grupo_did, alumno_aid, semana_did, comentario', 'safe', 'on'=>'search'),
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
			'semana' => array(self::BELONGS_TO, 'Semana', 'semana_did'),
			'alumno' => array(self::BELONGS_TO, 'Alumno', 'alumno_aid'),
			'grupo' => array(self::BELONGS_TO, 'Grupo', 'grupo_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'grupo_did' => 'Grupo',
			'alumno_aid' => 'Alumno',
			'semana_did' => 'Semana',
			'comentario' => 'Comentario',
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
		$criteria->compare('grupo_did',$this->grupo_did,true);
		$criteria->compare('alumno_aid',$this->alumno_aid,true);
		$criteria->compare('semana_did',$this->semana_did,true);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}