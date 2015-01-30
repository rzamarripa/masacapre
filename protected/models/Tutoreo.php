<?php

/**
 * This is the model class for table "Tutoreo".
 *
 * The followings are the available columns in table 'Tutoreo':
 * @property string $id
 * @property string $alumno_aid
 * @property integer $faltas
 * @property string $semana_did
 * @property integer $tareasNoEntregadas
 * @property string $conducta_did
 * @property string $observaciones
 * @property string $maestroMateriaGrupo_aid
 *
 * The followings are the available model relations:
 * @property MateriaMaestro $maestroMateriaGrupo
 * @property Alumno $alumno
 * @property Conducta $conducta
 * @property Semana $semana
 */
class Tutoreo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tutoreo the static model class
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
		return 'Tutoreo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumno_aid, faltas, semana_did, observaciones, tareasNoEntregadas, conducta_did, maestroMateriaGrupo_aid', 'required'),
			array('faltas, tareasNoEntregadas', 'numerical', 'integerOnly'=>true),
			array('alumno_aid, semana_did, conducta_did, maestroMateriaGrupo_aid', 'length', 'max'=>11),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumno_aid, faltas, semana_did, tareasNoEntregadas, conducta_did, observaciones, maestroMateriaGrupo_aid', 'safe', 'on'=>'search'),
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
			'maestroMateriaGrupo' => array(self::BELONGS_TO, 'MateriaMaestro', 'maestroMateriaGrupo_aid'),
			'alumno' => array(self::BELONGS_TO, 'Alumno', 'alumno_aid'),
			'conducta' => array(self::BELONGS_TO, 'Conducta', 'conducta_did'),
			'semana' => array(self::BELONGS_TO, 'Semana', 'semana_did'),
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
			'faltas' => 'Faltas',
			'semana_did' => 'Semana',
			'tareasNoEntregadas' => 'Tareas No Entregadas',
			'conducta_did' => 'Conducta',
			'observaciones' => 'Observaciones',
			'maestroMateriaGrupo_aid' => 'Maestro Materia Grupo',
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
		$criteria->compare('faltas',$this->faltas);
		$criteria->compare('semana_did',$this->semana_did,true);
		$criteria->compare('tareasNoEntregadas',$this->tareasNoEntregadas);
		$criteria->compare('conducta_did',$this->conducta_did,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('maestroMateriaGrupo_aid',$this->maestroMateriaGrupo_aid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}