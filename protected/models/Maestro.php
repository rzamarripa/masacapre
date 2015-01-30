<?php

/**
 * This is the model class for table "Maestro".
 *
 * The followings are the available columns in table 'Maestro':
 * @property string $id
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string $usuario_did
 *
 * The followings are the available model relations:
 * @property Archivo[] $archivos
 * @property Usuario $usuario
 * @property MateriaMaestro[] $materiaMaestros
 * @property Planeacion[] $planeacions
 */
class Maestro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Maestro the static model class
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
		return 'Maestro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_did', 'required'),
			array('nombre, direccion, email', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>20),
			array('usuario_did', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, direccion, telefono, email, usuario_did', 'safe', 'on'=>'search'),
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
			'archivos' => array(self::HAS_MANY, 'Archivo', 'maestro_did'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_did'),
			'materiaMaestros' => array(self::HAS_MANY, 'MateriaMaestro', 'maestro_aid'),
			'planeacions' => array(self::HAS_MANY, 'Planeacion', 'maestro_aid'),
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
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'usuario_did' => 'Usuario',
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
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('usuario_did',$this->usuario_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}