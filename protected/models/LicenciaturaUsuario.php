<?php

/**
 * This is the model class for table "Licenciatura_Usuario".
 *
 * The followings are the available columns in table 'Licenciatura_Usuario':
 * @property string $id
 * @property string $usuario_did
 * @property string $licenciatura_did
 *
 * The followings are the available model relations:
 * @property Licenciatura $licenciatura
 * @property Usuario $usuario
 */
class LicenciaturaUsuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LicenciaturaUsuario the static model class
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
		return 'Licenciatura_Usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_did, licenciatura_did', 'required'),
			array('usuario_did, licenciatura_did', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario_did, licenciatura_did', 'safe', 'on'=>'search'),
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
			'licenciatura' => array(self::BELONGS_TO, 'Licenciatura', 'licenciatura_did'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario_did' => 'Usuario',
			'licenciatura_did' => 'Licenciatura',
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
		$criteria->compare('usuario_did',$this->usuario_did,true);
		$criteria->compare('licenciatura_did',$this->licenciatura_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}