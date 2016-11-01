<?php

/**
 * This is the model class for table "compania".
 *
 * The followings are the available columns in table 'compania':
 * @property integer $idCompa
 * @property string $nomCompa
 * @property string $actividadCompa
 *
 * The followings are the available model relations:
 * @property Soldado[] $soldados
 */
class Compania extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Compania the static model class
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
		return 'compania';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomCompa, actividadCompa', 'required'),
			array('nomCompa, actividadCompa', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCompa, nomCompa, actividadCompa', 'safe', 'on'=>'search'),
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
			'soldados' => array(self::HAS_MANY, 'Soldado', 'idCompa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCompa' => 'Id Compa',
			'nomCompa' => 'Nom Compa',
			'actividadCompa' => 'Actividad Compa',
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

		$criteria->compare('idCompa',$this->idCompa);
		$criteria->compare('nomCompa',$this->nomCompa,true);
		$criteria->compare('actividadCompa',$this->actividadCompa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}