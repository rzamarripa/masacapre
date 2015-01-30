<?php

/**
 * This is the model class for table "TipoUsuario".
 *
 * The followings are the available columns in table 'TipoUsuario':
 * @property string $id
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Usuario[] $usuarios
 */
class TipoUsuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoUsuario the static model class
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
		return 'TipoUsuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'tipoUsuario_did'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function tipoUsuarioZama()
	{	
		$connection = Yii::app()->db;
		$queryTipoUsuario = '
								select tu.nombre, tu.id from Usuario as u
								inner join TipoUsuario as tu on u.tipoUsuario_did = tu.id
								where u.usuario = "' . Yii::app()->user->name . '";
							';
		//echo $queryTipoUsuario;
		$commandTipoUsuario = $connection->createCommand($queryTipoUsuario);
		$tipoUsuario = $commandTipoUsuario->queryAll();
		return $tipoUsuario;
	}
}