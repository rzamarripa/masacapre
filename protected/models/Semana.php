<?php

/**
 * This is the model class for table "Semana".
 *
 * The followings are the available columns in table 'Semana':
 * @property string $id
 * @property string $nombre
 * @property string $ciclo_did
 * @property string $semestre_did
 * @property string $fechaInicial_f
 * @property string $fechaFinal_f
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Reporte[] $reportes
 * @property Semestre $semestre
 * @property Ciclo $ciclo
 * @property EstatusTutoreo $estatus
 * @property Tutoreo[] $tutoreos
 */
class Semana extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Semana the static model class
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
		return 'Semana';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>30),
			array('ciclo_did, semestre_did, estatus_did', 'length', 'max'=>11),
			array('fechaInicial_f, fechaFinal_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, ciclo_did, semestre_did, fechaInicial_f, fechaFinal_f, estatus_did', 'safe', 'on'=>'search'),
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
			'reportes' => array(self::HAS_MANY, 'Reporte', 'semana_did'),
			'semestre' => array(self::BELONGS_TO, 'Semestre', 'semestre_did'),
			'ciclo' => array(self::BELONGS_TO, 'Ciclo', 'ciclo_did'),
			'estatus' => array(self::BELONGS_TO, 'EstatusTutoreo', 'estatus_did'),
			'tutoreos' => array(self::HAS_MANY, 'Tutoreo', 'semana_did'),
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
			'ciclo_did' => 'Ciclo',
			'semestre_did' => 'Semestre',
			'fechaInicial_f' => 'Fecha Inicial',
			'fechaFinal_f' => 'Fecha Final',
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
		$criteria->compare('ciclo_did',$this->ciclo_did,true);
		$criteria->compare('semestre_did',$this->semestre_did,true);
		$criteria->compare('fechaInicial_f',$this->fechaInicial_f,true);
		$criteria->compare('fechaFinal_f',$this->fechaFinal_f,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}