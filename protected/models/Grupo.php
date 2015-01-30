<?php

/**
 * This is the model class for table "Grupo".
 *
 * The followings are the available columns in table 'Grupo':
 * @property string $id
 * @property string $nombre
 * @property integer $nivelEscolar
 * @property string $semestre_did
 * @property string $ciclo_did
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property AlumnosGrupo[] $alumnosGrupos
 * @property Ciclo $ciclo
 * @property Semestre $semestre
 * @property Estatus $estatus
 * @property MateriaMaestro[] $materiaMaestros
 * @property Reporte[] $reportes
 */
class Grupo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Grupo the static model class
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
		return 'Grupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nivelEscolar, semestre_did, ciclo_did', 'required'),
			array('nivelEscolar', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('semestre_did, ciclo_did', 'length', 'max'=>11),
			array('estatus_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, nivelEscolar, semestre_did, ciclo_did, estatus_did', 'safe', 'on'=>'search'),
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
			'alumnosGrupos' => array(self::HAS_MANY, 'AlumnosGrupo', 'grupo_aid'),
			'ciclo' => array(self::BELONGS_TO, 'Ciclo', 'ciclo_did'),
			'semestre' => array(self::BELONGS_TO, 'Semestre', 'semestre_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'materiaMaestros' => array(self::HAS_MANY, 'MateriaMaestro', 'grupo_did'),
			'reportes' => array(self::HAS_MANY, 'Reporte', 'grupo_did'),
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
			'nivelEscolar' => 'Nivel Escolar',
			'semestre_did' => 'Semestre',
			'ciclo_did' => 'Ciclo',
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
		$criteria->compare('nivelEscolar',$this->nivelEscolar);
		$criteria->compare('semestre_did',$this->semestre_did,true);
		$criteria->compare('ciclo_did',$this->ciclo_did,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}